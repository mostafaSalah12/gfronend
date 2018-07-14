<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignInAr extends CI_Controller { 

    public function index(){
        $this->load->view("template/ar/components/login-register");
    }

}