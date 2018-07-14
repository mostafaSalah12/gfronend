<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile extends CI_Controller { 

    function __construct(){

      parent::__construct();
      $this->load->helper(array('form', 'url'));
   }

    public function index(){
        $this->load->view("template/en/profile/edit-profile");
    }

    public function layoutAr(){
        $this->load->view("template/ar/profile/edit-profile");
    }

    public function executeEdits(){
        $user_info = $this->session->userdata('user_info');
        $_FNAME = $this->input->post("firstName");
        $_LNAME = $this->input->post("lastName");
        $_MOBILE = $this->input->post("mobile");
        $_EMAIL = $this->input->post("email");
        $_PROFILE_PIC = $this->getBase64Image();

        $jsonRequest = '{';
        if ($_FNAME != null && strlen($_FNAME) > 3 ){
            $jsonRequest .='"firstName":"'.$_FNAME.'",';
        }
        if($_LNAME != null && strlen($_LNAME) > 3){
            $jsonRequest .='"lastName":"'.$_LNAME.'",';
        }
        if($_MOBILE != null && strlen($_MOBILE) == 11){
            $jsonRequest .='"mobile":"'.$_MOBILE.'",';
        }
        if ($_PROFILE_PIC != null){
            $jsonRequest .='"profilePic":"'.$_PROFILE_PIC.'",';
        }
        if ($_EMAIL != null && strlen($_EMAIL) > 4) {
            $jsonRequest .='"email":"'.$_EMAIL.'",';
        }
        $jsonRequest .='"userLanguage":"EN" }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.updateUser);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,   $jsonRequest); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = $json->error;
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (isset($json->statusCode) && $json->statusCode == "USER_NOT_FOUND") {
            $message = "User not found! Please enter a valid e-mail.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Profile has been updated successfully!";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    public function executeEditsAr(){
        $user_info = $this->session->userdata('user_info');
        $_FNAME = $this->input->post("firstName");
        $_LNAME = $this->input->post("lastName");
        $_MOBILE = $this->input->post("mobile");
        $_EMAIL = $this->input->post("email");
        $_PROFILE_PIC = $this->getBase64Image();

        $jsonRequest = '{';
        if ($_FNAME != null && strlen($_FNAME) > 3 ){
            $jsonRequest .='"firstName":"'.$_FNAME.'",';
        }
        if($_LNAME != null && strlen($_LNAME) > 3){
            $jsonRequest .='"lastName":"'.$_LNAME.'",';
        }
        if($_MOBILE != null && strlen($_MOBILE) == 11){
            $jsonRequest .='"mobile":"'.$_MOBILE.'",';
        }
        if ($_PROFILE_PIC != null){
            $jsonRequest .='"profilePic":"'.$_PROFILE_PIC.'",';
        }
        if ($_EMAIL != null && strlen($_EMAIL) > 4) {
            $jsonRequest .='"email":"'.$_EMAIL.'",';
        }
        $jsonRequest .='"userLanguage":"AR" }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.updateUser);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,   $jsonRequest); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = $json->error;
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (isset($json->statusCode) && $json->statusCode == "USER_NOT_FOUND") {
            $message = "هذا المستخدم غير موجود! الرجاء التأكد من صحة البريد الإلكتروني.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم نحديث الحساب الشخصي بنجاح!";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
            $this->session->set_userdata('user_info', $userdata);
        }
    }

    public function changePassword(){
        $_PASSWORD = $this->input->post("current_password");
        $_NEW_PASSWORD = $this->input->post("new_password");
        $_CONFIRM_PASSWORD = $this->input->post("confirm_password");

        if ($_PASSWORD == null || $_PASSWORD == '') {
            $message = "Current Password is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_PASSWORD)) {
            $message = "Inavlid Current Password, only alphanumeric characters (A-z, 0-9) are allowed. Please try again.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_NEW_PASSWORD == null || $_NEW_PASSWORD == '') {
            $message = "New Password is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_NEW_PASSWORD) < 6) {
            $message = "Your new password must be at least 6 characters long.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_NEW_PASSWORD)) {
            $message = "Inavlid New Password, only alphanumeric characters (A-z, 0-9) are allowed. Please try again.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_CONFIRM_PASSWORD == null || $_CONFIRM_PASSWORD == '') {
            $message = "Confirm Password is required.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_NEW_PASSWORD !== $_CONFIRM_PASSWORD) {
            $message = "Passwords do not match. Please make sure both passwords are identical.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $this->changePasswordEn($_PASSWORD, $_NEW_PASSWORD);
        }
    }

    public function changePasswordAr(){
        $_PASSWORD = $this->input->post("current_password");
        $_NEW_PASSWORD = $this->input->post("new_password");
        $_CONFIRM_PASSWORD = $this->input->post("confirm_password");

        if ($_PASSWORD == null || $_PASSWORD == '') {
            $message = "كلمة السر الحالية مطلوبة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_PASSWORD)) {
            $message = "كلمة السر الحالية غير صحيحة، يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_NEW_PASSWORD == null || $_NEW_PASSWORD == '') {
            $message = "كلمة السر الجديدة مطلوبة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (strlen($_NEW_PASSWORD) < 6) {
            $message = "يجب أن تكون كلمة السر الجديدة 6 أحرف على الأقل.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (!$this->validatePassword($_NEW_PASSWORD)) {
            $message = "كلمة السر الجديدة غير صحيحة، لا يسمح إلا بالأحرف الأبجدية و الأرقام، يرجى إعادة المحاولة.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_CONFIRM_PASSWORD == null || $_CONFIRM_PASSWORD == '') {
            $message = "يجب تأكيد كلمة المرور.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if ($_NEW_PASSWORD !== $_CONFIRM_PASSWORD) {
            $message = "كلمات السر غير متطابقة. يرجى التأكد من تطابق كلمتَي السر.";
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $this->changePasswordSubmitAr($_PASSWORD, $_NEW_PASSWORD);
        }
    }

    private function changePasswordEn($_PASSWORD, $_NEW_PASSWORD){
        $user_info = $this->session->userdata('user_info');
        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.changePassword);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "oldPassword":"'.$_PASSWORD.'",
            "newPassword":"'.$_NEW_PASSWORD.'"
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = $json->error;
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (isset($json->statusCode) && $json->statusCode == 'PASSWORD_NOT_MATCH' ) {
            $message = 'Invalid Password.';
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "Password has been changed successfully.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

    private function changePasswordSubmitAr($_PASSWORD, $_NEW_PASSWORD){
        $user_info = $this->session->userdata('user_info');
        //Request API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, baseServerURL.changePassword);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{
            "oldPassword":"'.$_PASSWORD.'",
            "newPassword":"'.$_NEW_PASSWORD.'"
        }' ); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json','Authorization: Bearer '.$user_info->token)); 
        $checkResponse = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($checkResponse);
        if(isset($json->error)){
            $message = $json->error;
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else if (isset($json->statusCode) && $json->statusCode == 'PASSWORD_NOT_MATCH' ) {
            $message = 'كلمة السر غير صحيحة، يرجى إعادة المحاولة.';
            $status = "false"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        } else {
            $message = "تم تغير كلمة السر بنجاح.";
            $status = "true"; 
            $status_array = array( 'message' => $message, 'status' => $status);
            echo json_encode($status_array);
        }
    }

    private function getBase64Image(){
        if(isset($_FILES["profilePic"]["tmp_name"])){
            $path = $_FILES["profilePic"]["name"];
            $imageFileType = pathinfo($path, PATHINFO_EXTENSION);
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $status = "false"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
            } else if ($_FILES["profilePic"]["size"] > 500000){
                $message = "Sorry, your file is too large.";
                $status = "false"; 
                $status_array = array( 'message' => $message, 'status' => $status);
                echo json_encode($status_array);
            } else {
                return base64_encode(file_get_contents( $_FILES["profilePic"]["tmp_name"] ));
            }
        } else {
            return null;
        }
    }

    private function validatePassword($password){
        return preg_match('/^([A-Za-z0-9]+)*$/', $password);
    }

    public function logout(){
        $this->session->unset_userdata('user_info');
        redirect(base_url().'home', 'refresh');
    }

    public function logoutAr(){
        $this->session->unset_userdata('user_info');
        redirect(base_url().'ar/home', 'refresh');
    }
}
