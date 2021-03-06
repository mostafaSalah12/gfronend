<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller { 

    public function index(){
        $cars = $this->getCars();
        $cars["baseServerURL"] = baseServerURL;
        $this->load->view("template/en/header", $cars);
        $this->load->view("template/en/about/about_header");
        $this->load->view("template/en/about/about");
        $this->load->view("template/en/about/mission_vision");
        $this->load->view("template/en/about/team");
        $this->load->view("template/en/about/message");
        $this->load->view("template/en/about/history");
        $this->load->view("template/en/footer");
    }

    private function getCars(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.brands);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":1,
            "page":1,
            "noOfRows":100
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || !isset($json->totalCount)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["totalCount"] = $json->totalCount;
            $response["result"] = $json->result;
            return $response;
        }
    }
}