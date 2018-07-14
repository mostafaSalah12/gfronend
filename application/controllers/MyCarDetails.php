<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCarDetails extends CI_Controller { 

    public function index($userCarId){
        $userCar = $this->getUserCar($userCarId);
        $userCar["services"] = $this->getServiceTypes();
        $this->load->view("template/en/profile/car-details", $userCar);
    }

    public function layoutAr($userCarId){
        $userCar = $this->getUserCarAr($userCarId);
        $userCar["services"] = $this->getServiceTypesAr();
        $this->load->view("template/ar/profile/car-details", $userCar);
    }

    private function getServiceTypes(){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findAllService);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "page":1,
            "noOfRows":100,
            "language":1
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            return null;
        } else {
            return $json->result;;
        }
    }

    private function getServiceTypesAr(){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.findAllService);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "page":1,
            "noOfRows":100,
            "language":2
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            return null;
        } else {
            return $json->result;;
        }
    }

    private function getUserCar($userCarId){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.getUserCarById);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "id":'.$userCarId.',
            "language":1
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["userCar"] = $json->result;
            return $response;
        }
    }

    private function getUserCarAr($userCarId){
        $user_info = $this->session->userdata('user_info');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.getUserCarById);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "id":'.$userCarId.',
            "language":2
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            return null;
        } else {
            $response["statusCode"] = $json->statusCode;
            $response["userCar"] = $json->result;
            return $response;
        }
    }

    public function requestMaintenance(){
        $user_info = $this->session->userdata('user_info');
        $_KILOMETERS = $this->input->post("car_kilometers");
        $_SERVICE_TYPE = $this->input->post("car_service_select");
        $_CAR_ID = $this->input->post('user_car_id');
        $_NOTES = $this->input->post("form_notes");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.requestMaintaince);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "lookupServiceTypeId":'.$_SERVICE_TYPE.',
            "userCarId":'.$_CAR_ID.',
            "kiloMeter":"'.$_KILOMETERS.'",
            "note":"'.$_NOTES.'",
            "language":1
            }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            $message = "Make sure you fill all the required fileds and try again later!";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Maintenance has been requested successfully! We will call you to confirm the request as soon as possible.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

    public function requestMaintenanceAr(){
        $user_info = $this->session->userdata('user_info');
        $_KILOMETERS = $this->input->post("car_kilometers");
        $_SERVICE_TYPE = $this->input->post("car_service_select");
        $_CAR_ID = $this->input->post('user_car_id');
        $_NOTES = $this->input->post("form_notes");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.requestMaintaince);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "lookupServiceTypeId":'.$_SERVICE_TYPE.',
            "userCarId":'.$_CAR_ID.',
            "kiloMeter":"'.$_KILOMETERS.'",
            "note":"'.$_NOTES.'",
            "language":2
            }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(!isset($json->statusCode)){
            $message = "أحد المُدخَلات غير صحيح. يرجى التأكد من صحة المُدخَلات ثم أعد المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم إرسال طلب الصيانة بنجاح! سوف نقوم بالتواصل معك في اقرب وقت ممكن.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

}