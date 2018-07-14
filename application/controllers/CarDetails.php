<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarDetails extends CI_Controller {
    /**
     * This method is the default entry point of the website.
     * This method responsible on loading the home page of el Geyushi website.
    */

    public function index($brandName, $ModelId, $carId){
        
        $brand = $this->getBrandByName($brandName);
        $model = $this->getModelById($ModelId);
        $carDetails = $this-> getCarDetails($carId);
        if ($brand == null) {
            $this->output->set_status_header('404'); 
            $this->load->view('template/en/errors/error404');//loading in custom error view
        } else if ($model == null) {
            $this->output->set_status_header('404'); 
            $this->load->view('template/en/errors/error404');//loading in custom error view
        } else if ($carDetails == null) {
            $this->output->set_status_header('404'); 
            $this->load->view('template/en/errors/error404');//loading in custom error view
        } else {
            $cars = $this->getCars();
            $cars["baseServerURL"] = baseServerURL;
            $carDetails["baseServerURL"] = baseServerURL;
            $carDetails["imagesBaseURL"] = imagesBaseURL;
            $carDetails["brandName"] = $brandName;
            $carDetails["modelId"] = $ModelId;
            $this->load->view("template/en/header", $cars);
            $this->load->view("template/en/components/carDetails", $carDetails);
            $this->load->view("template/en/footer");
        }
        

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

    private function getBrandByName($brandName){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.brandName);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "value":"'.$brandName.'",
            "language":1
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

    private function getModelById($modelId){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findModelById);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "id":'.$modelId.',
            "language":1
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || (!isset($json->result) || $json->result == null)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["result"] = $json->result;
            return $response;
        }
    }

    private function getCarDetails($carId){
        $ch = curl_init();
        $url = baseServerURL.findCarById.'/'.$carId.'/1';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json'));
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || (!isset($json->result) || $json->result == null)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["result"] = $json->result;
            return $response;
        }
    }
}