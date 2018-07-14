<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCar extends CI_Controller { 

    public function index(){
        $user_info = $this->session->userdata('user_info');
        if ($user_info == null){
            echo 'Please refresh the current page!';
        } else {
            $addCar["carBrands"] = $this->getCarBrands($user_info);
            $addCar["carModels"] = $this->getCarModels($user_info);
            $this->load->view("template/en/profile/add-car", $addCar);
        }
        
    }

    public function layoutAr(){
        $user_info = $this->session->userdata('user_info');
        if ($user_info == null){
            echo 'يرجى تحديث الصفحه الحالية!';
        } else {
            $addCar["carBrands"] = $this->getCarBrandsAr($user_info);
            $addCar["carModels"] = $this->getCarModelsAr($user_info);
            $this->load->view("template/ar/profile/add-car", $addCar);
        }
    }

    private function getCarBrands($user_info){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.brands);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":1,
            "page":1,
            "noOfRows":100,
            "typeId":2
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
            $response["result"] = $json->result;
            return $response;
        }
    }

    private function getCarBrandsAr($user_info){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.brands);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":2,
            "page":1,
            "noOfRows":100,
            "typeId":2
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
            $response["result"] = $json->result;
            return $response;
        }
    }

    private function getCarModels($user_info){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.models);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":1,
            "page":1,
            "noOfRows":100,
            "typeId":2
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
            $response["result"] = $json->result;
            return $response;
        }
    }

    private function getCarModelsAr($user_info){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.models);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":2,
            "page":1,
            "noOfRows":100,
            "typeId":2
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
            $response["result"] = $json->result;
            return $response;
        }
    }

    public function getModels($brandId){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findModelByBrandId);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":1,
            "page":1,
            "noOfRows":100,
            "typeId":2,
            "id":'.$brandId.'
         }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || $json->statusCode != "OK"){
            echo null;
        } else {
            echo json_encode($json->result);
        }
    }

    public function getModelsAr($brandId){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findModelByBrandId);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "language":2,
            "page":1,
            "noOfRows":100,
            "typeId":2,
            "id":'.$brandId.'
         }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode) || $json->statusCode != "OK"){
            echo null;
        } else {
            echo json_encode($json->result);
        }
    }


    public function addCarForm(){
        $user_info = $this->session->userdata('user_info');
        $_BRAND_ID = $this->input->post("car_brand_select");
        $_MODEL_ID = $this->input->post("car_model_select");
        $_CHASE_NUMBER = $this->input->post("car_chase_number");
        $_PLATE_NUMBER = $this->input->post("car_plate_number");
        $_LICENSE_NAME = $this->input->post("license_name");

        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.addUserCar);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "carBrandId":'.$_BRAND_ID.',
            "carModelId":'.$_MODEL_ID.',
            "chaseNumber":"'.$_CHASE_NUMBER.'",
            "carNumber":"'.$_PLATE_NUMBER.'",
            "nameInLicence":"'.$_LICENSE_NAME.'"
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json', 'Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = "Make sure you fill all the required fileds and try again later!";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Car has been added successfully.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

    public function addCarFormAr(){
        $user_info = $this->session->userdata('user_info');
        $_BRAND_ID = $this->input->post("car_brand_select");
        $_MODEL_ID = $this->input->post("car_model_select");
        $_CHASE_NUMBER = $this->input->post("car_chase_number");
        $_PLATE_NUMBER = $this->input->post("car_plate_number");
        $_LICENSE_NAME = $this->input->post("license_name");

        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.addUserCar);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "carBrandId":'.$_BRAND_ID.',
            "carModelId":'.$_MODEL_ID.',
            "chaseNumber":"'.$_CHASE_NUMBER.'",
            "carNumber":"'.$_PLATE_NUMBER.'",
            "nameInLicence":"'.$_LICENSE_NAME.'"
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json', 'Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = "أحد المُدخَلات غير صحيح. يرجى التأكد من صحة المُدخَلات ثم أعد المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم إضافة السيارة بنجاح.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

}