<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequestTestDrive extends CI_Controller { 

    function __construct(){

      parent::__construct();
      $this->load->helper(array('form', 'url'));
   }

    public function index($carId, $carNameEn, $carNameAr){
        $data['carId'] = $carId;
        $data['carNameEn'] = $carNameEn;
        $data['carNameAr'] = $carNameAr;
        $this->load->view("template/en/car/request-drive", $data);
    }

    public function layoutAr($carId, $carNameEn, $carNameAr){
        $data['carId'] = $carId;
        $data['carNameEn'] = $carNameEn;
        $data['carNameAr'] = $carNameAr;
        $this->load->view("template/ar/car/request-drive", $data);
    }

    public function sendRequest(){
        $_FULL_NAME = $this->input->post("full_name");
        $_MOBILE = $this->input->post("mobile");
        $_EMAIL = $this->input->post("email");
        $_NOTE = $this->input->post("form_notes");

        $_CAR_ID = $this->input->post('car_id');
        $_CAR_NAME_EN = $this->input->post('car_name_en');
        $_CAR_NAME_AR = $this->input->post('car_name_ar');

        $_FULL_NAME = preg_replace('/\s+/', '', $_FULL_NAME);
        $_MOBILE = preg_replace('/\s+/', '', $_MOBILE);
        $_EMAIL = preg_replace('/\s+/', '', $_EMAIL);
        $_NOTE = preg_replace('/\s+/', '', $_NOTE);

        if ($_FULL_NAME == null || $_FULL_NAME == ''){
            $message = "Full Name is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_FULL_NAME) < 4) {
            $message = "First Name must be 4 or more characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_FULL_NAME)) {
            $message = "Invalid Full Name, special characters are not allowed. Please try again.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_MOBILE == null || $_MOBILE == '') {
            $message = "Mobile Number is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if (strlen($_MOBILE) != 11) {
            $message = "Invalid Mobile Number, Mobile number must be 11 characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if ($_EMAIL == null || $_EMAIL == ''){
            $message = "Email is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateEmail($_EMAIL)) {
            $message = "Invalid email address. Please make sure your email address is correct.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, baseServerURL.addRequestTestDrive);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
                "clientName":"'.$_FULL_NAME.'",
                "clientEmail": "'.$_MOBILE.'",
                "clientPhone": "'.$_EMAIL.'",
                "note": "'.$_NOTE.'",
                "carId":"'.$_CAR_ID.'",
                "carNameEn":"'.$_CAR_NAME_EN.'",
                "carNameAr":"'.$_CAR_NAME_AR.'",
                "language":"1"
            }' ); 
            curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
            $checkResponse = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($checkResponse);
            if(isset($json->error)){
                $message = $json->error;
                $status = "false"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
            } else {
                $message = "Test Drive has been requested successfully! We will call you to confirm the request as soon as possible.";
                $status = "true"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
                $this->load->helper('url');
            }
        }
    }

    public function sendRequestAr(){
        $_FULL_NAME = $this->input->post("full_name");
        $_MOBILE = $this->input->post("mobile");
        $_EMAIL = $this->input->post("email");
        $_NOTE = $this->input->post("form_notes");

        $_CAR_ID = $this->input->post('car_id');
        $_CAR_NAME_EN = $this->input->post('car_name_en');
        $_CAR_NAME_AR = $this->input->post('car_name_ar');

        $_FULL_NAME = preg_replace('/\s+/', '', $_FULL_NAME);
        $_MOBILE = preg_replace('/\s+/', '', $_MOBILE);
        $_EMAIL = preg_replace('/\s+/', '', $_EMAIL);
        $_NOTE = preg_replace('/\s+/', '', $_NOTE);

        if ($_FULL_NAME == null || $_FULL_NAME == ''){
            $message = "الاسم بالكامل مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_FULL_NAME) < 4) {
            $message = "يجب أن يكون الاسم 4 أحرف على الأقل.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_FULL_NAME)) {
            $message = "الاسم غير صحيح لا يسمح بالرموز. يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_MOBILE == null || $_MOBILE == '') {
            $message = "رقم الموبايل مطلوب";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if (strlen($_MOBILE) != 11) {
            $message = "يجب أن يكون رقم الموبايل 11 حرف.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if ($_EMAIL == null || $_EMAIL == ''){
            $message = "البريد الإلكتروني مطلوب";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateEmail($_EMAIL)) {
            $message = "البريد الإلكتروني غير صحيح. يرجى التأكد من البريد الإلكتروني.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, baseServerURL.addRequestTestDrive);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
                "clientName":"'.$_FULL_NAME.'",
                "clientEmail": "'.$_MOBILE.'",
                "clientPhone": "'.$_EMAIL.'",
                "note": "'.$_NOTE.'",
                "carId":"'.$_CAR_ID.'",
                "carNameEn":"'.$_CAR_NAME_EN.'",
                "carNameAr":"'.$_CAR_NAME_AR.'",
                "language":"2"
            }' ); 
            curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
            $checkResponse = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($checkResponse);
            if(isset($json->error)){
                $message = $json->error;
                $status = "false"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
            } else {
                $message = "تم إرسال طلب اختبار القيادة بنجاح! سوف نقوم بالتواصل معك في اقرب وقت ممكن.";
                $status = "true"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
            }
        }
    }

    private function validateEmail($email){
        return preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email);
    }
    private function validateName($name){
        return preg_match('/^([A-Za-z0-9- ]+)*$/', $name);
    }
}
