<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RegisterController extends CI_Controller {
   
    public function signIn() {
        $_EMAIL = $this->input->post("form_login_email");
        $_PASSWORD = $this->input->post("form_login_password");


        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.login);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "username":"'.$_EMAIL.'",
            "password":"'.$_PASSWORD.'"
            }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = "<strong>Invalid</strong> email or password!";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Login succeeded";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->load->helper('url');
            $userdata = $json;
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    public function signInAr() {
        $_EMAIL = $this->input->post("form_login_email");
        $_PASSWORD = $this->input->post("form_login_password");

        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.login);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "username":"'.$_EMAIL.'",
            "password":"'.$_PASSWORD.'"
            }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = "أحد المُدخَلات غير صحيح. يرجى التأكد من صحة المُدخَلات ثم أعد المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم تسجيل الدخول بنجاح.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->load->helper('url');
            $userdata = $json;
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    public function signUp() {
        $_FIRST_NAME = $this->input->post("form_register_first_name");
        $_LAST_NAME = $this->input->post("form_register_last_name");
        $_MOBILE = $this->input->post("form_register_mobile_number");
        $_EMAIL = $this->input->post("form_register_email");
        $_PASSWORD = $this->input->post("form_choose_password");
        $_CONFIRM_PASSWORD = $this->input->post("form_re_enter_password");


        $_FIRST_NAME = preg_replace('/\s+/', '', $_FIRST_NAME);
        $_LAST_NAME = preg_replace('/\s+/', '', $_LAST_NAME);
        $_MOBILE = preg_replace('/\s+/', '', $_MOBILE);
        $_EMAIL = preg_replace('/\s+/', '', $_EMAIL);

        if ($_FIRST_NAME == null || $_FIRST_NAME == ''){
            $message = "First Name is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_FIRST_NAME) < 2 || strlen($_FIRST_NAME) > 20) {
            $message = "First Name must be 2–20 characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_FIRST_NAME)) {
            $message = "Invalid First Name, special characters are not allowed. Please try again.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_LAST_NAME == null || $_LAST_NAME == '') {
            $message = "Last Name is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_LAST_NAME) < 2 || strlen($_LAST_NAME) > 20) {
            $message = "Last Name must be 2–20 characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_LAST_NAME)) {
            $message = "Invalid Last Name, special characters are not allowed. Please try again.";
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
        } else if ($_PASSWORD == null || $_PASSWORD == '') {
            $message = "Password is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_PASSWORD) < 6) {
            $message = "Your password must be at least 6 characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_PASSWORD)) {
            $message = "Inavlid Password, only alphanumeric characters (A-z, 0-9) are allowed. Please try again.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_CONFIRM_PASSWORD == null || $_CONFIRM_PASSWORD == '') {
            $message = "Confirm Password is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_PASSWORD !== $_CONFIRM_PASSWORD) {
            $message = "Passwords do not match. Please make sure both passwords are identical.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $this->signUpApiRequest($_FIRST_NAME, $_LAST_NAME, $_EMAIL, $_MOBILE, $_PASSWORD);
        }
    }

    public function signUpAr() {
        $_FIRST_NAME = $this->input->post("form_register_first_name");
        $_LAST_NAME = $this->input->post("form_register_last_name");
        $_MOBILE = $this->input->post("form_register_mobile_number");
        $_EMAIL = $this->input->post("form_register_email");
        $_PASSWORD = $this->input->post("form_choose_password");
        $_CONFIRM_PASSWORD = $this->input->post("form_re_enter_password");


        $_FIRST_NAME = preg_replace('/\s+/', '', $_FIRST_NAME);
        $_LAST_NAME = preg_replace('/\s+/', '', $_LAST_NAME);
        $_MOBILE = preg_replace('/\s+/', '', $_MOBILE);
        $_EMAIL = preg_replace('/\s+/', '', $_EMAIL);

        if ($_FIRST_NAME == null || $_FIRST_NAME == ''){
            $message = "الإسم الأول مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_FIRST_NAME) < 2 || strlen($_FIRST_NAME) > 20) {
            $message = "الاسم الأول يجب أن يكون 2–20 حرفًا.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_FIRST_NAME)) {
            $message = "الاسم الأول غير صحيح لا يسمح بالرموز. يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_LAST_NAME == null || $_LAST_NAME == '') {
            $message = "اسم العائلة مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_LAST_NAME) < 2 || strlen($_LAST_NAME) > 20) {
            $message = "اسم العائلة يجب أن يكون 2–20 حرفًا.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateName($_LAST_NAME)) {
            $message = "اسم العائلة غير صحيح، لا يسمح بالرموز. يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_MOBILE == null || $_MOBILE == '') {
            $message = "رقم الموبايل مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if (strlen($_MOBILE) != 11) {
            $message = "رقم الموبايل غير صحيح، يجب أن يكون رقم الموبايل 6 أحرف.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
        } else if ($_EMAIL == null || $_EMAIL == ''){
            $message = "البريد الإلكتروني مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validateEmail($_EMAIL)) {
            $message = "البريد الإلكتروني غير صحيح. يرجى التأكد من البريد الإلكتروني.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_PASSWORD == null || $_PASSWORD == '') {
            $message = "كلمة السر مطلوب.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_PASSWORD) < 6) {
            $message = "يجب أن تكون كلمة السر 6 أحرف على الأقل.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_PASSWORD)) {
            $message = "كلمة السر غير صحيحة، لا يسمح إلا بالأحرف الأبجدية و الأرقام، يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_CONFIRM_PASSWORD == null || $_CONFIRM_PASSWORD == '') {
            $message = "يجب تأكيد كلمة المرور.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_PASSWORD !== $_CONFIRM_PASSWORD) {
            $message = "كلمات السر غير متطابقة. يرجى التأكد من تطابق كلمتَي السر.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $this->signUpApiRequestAr($_FIRST_NAME, $_LAST_NAME, $_EMAIL, $_MOBILE, $_PASSWORD);
        }
    }

    private function signUpApiRequest($_FIRST_NAME, $_LAST_NAME, $_EMAIL, $_MOBILE, $_PASSWORD){
        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.register);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "firstName":"'.$_FIRST_NAME.'",
            "lastName": "'.$_LAST_NAME.'",
            "email": "'.$_EMAIL.'",
            "password": "'.$_PASSWORD.'",
            "mobile":"'.$_MOBILE.'",
            "userLanguage":"EN"
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
        } else if (isset($json->statusCode) && $json->statusCode == 'EMAIL_EXISTS' ) {
            $message = 'This e-email is already exists, please try again with another e-mail address.';
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Registration succeeded";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->load->helper('url');
            $userdata = $json;
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    private function signUpApiRequestAr($_FIRST_NAME, $_LAST_NAME, $_EMAIL, $_MOBILE, $_PASSWORD, $_CONFIRM_PASSWORD){
        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.register);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "firstName":"'.$_FIRST_NAME.'",
            "lastName": "'.$_LAST_NAME.'",
            "email": "'.$_EMAIL.'",
            "password": "'.$_PASSWORD.'",
            "mobile":"'.$_MOBILE.'",
            "userLanguage":"AR"
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
        } else if (isset($json->statusCode) && $json->statusCode == 'EMAIL_EXISTS' ) {
            $message = 'هذا البريد الإلكتروني موجود بالفعل، يرجى إعادة المحاولة بإستخدام بريد إلكتروني آخر.';
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم إنشاء حساب جديد بنجاح";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->load->helper('url');
            $userdata = $json;
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    private function validateEmail($email){
        return preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email);
    }
    private function validateName($name){
        return preg_match('/^([A-Za-z0-9- ]+)*$/', $name);
    }
    private function validatePassword($password){
        return preg_match('/^([A-Za-z0-9]+)*$/', $password);
    }

}
?>