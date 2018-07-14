<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarModels extends CI_Controller {
    /**
     * This method is the default entry point of the website.
     * This method responsible on loading the home page of el Geyushi website.
    */

    public function index($brandName){
        $models = $this->getCarModels($brandName);
        if ($models == null)
        {
            $this->output->set_status_header('404'); 
            $this->load->view('template/en/errors/error404');//loading in custom error view
        } else {
            $cars = $this->getCars();
            $cars["baseServerURL"] = baseServerURL;
            $models["baseServerURL"] = baseServerURL;
            $models["imagesBaseURL"] = imagesBaseURL;
            $this->load->view("template/en/header", $cars);
            $this->load->view("template/en/components/carModels", $models);
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

    private function getCarModels($brandName){
        $brand = $this->getBrandByName($brandName);
        if ($brand == null)
            return null;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findModelByBrandId);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "noOfRows":100,
            "id":'.$brand["result"][0]->brandId.',
            "language":1
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["brandNameEn"] = $brand["result"][0]->brandNameEn;
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


}