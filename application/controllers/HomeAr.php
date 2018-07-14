<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAr extends CI_Controller {
    /**
     * This method is the default entry point of the website.
     * This method responsible on loading the home page of el Geyushi website.
    */
    public function index(){
        $cars = $this->getCars();
        $cars["baseServerURL"] = baseServerURL;
        $cars["imagesBaseURL"] = imagesBaseURL;
        $this->load->view("template/ar/header", $cars);
        $this->load->view("template/ar/slideshow");
        //$this->load->view("template/ar/components/smallServices");
        $this->load->view("template/ar/components/whyChooseUs");
        $this->load->view("template/ar/components/carsSection", $cars);
        /*$this->load->view("template/ar/components/latestNews");
        $this->load->view("template/ar/components/ourApps");
        $this->load->view("template/ar/components/callToAction");*/
        $this->load->view("template/ar/footer");
    }

    private function getCars(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.brands);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":2,
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