<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    /**
     * This method is the default entry point of the website.
     * This method responsible on loading the home page of el Geyushi website.
    */
    
    public function index(){
        $cars = $this->getCars();
        $cars["baseServerURL"] = baseServerURL;
        $cars["imagesBaseURL"] = imagesBaseURL;
        $userCars = $this->getMyCars();
        $this->load->view("template/en/header", $cars);
        $this->load->view("template/en/profile/main-page", $userCars);
        $this->load->view("template/en/footer");
    }

    public function layoutAr(){
        $cars = $this->getCarsAr();
        $cars["baseServerURL"] = baseServerURL;
        $cars["imagesBaseURL"] = imagesBaseURL;
        $userCars = $this->getMyCarsAr();
        $this->load->view("template/ar/header", $cars);
        $this->load->view("template/ar/profile/main-page", $userCars);
        $this->load->view("template/ar/footer");
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

    private function getCarsAr(){
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

    private function getMyCars(){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.myCars);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":1,
            "page":1,
            "noOfRows":100
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || !isset($json->totalCount)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["totalCount"] = $json->totalCount;
            $response["userCars"] = $json->result;
            return $response;
        }
    }

    private function getMyCarsAr(){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.myCars);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":2,
            "page":1,
            "noOfRows":100
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || !isset($json->totalCount)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["totalCount"] = $json->totalCount;
            $response["userCars"] = $json->result;
            return $response;
        }
    }
}