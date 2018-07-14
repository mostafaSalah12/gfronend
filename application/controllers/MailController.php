<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailController extends CI_Controller {
    /**
     * This method is the default entry point of the website.
     * This method responsible on loading the home page of el Geyushi website.
    */

    public function sendMailAr() {
        $_NAME = $this->input->post("form_name");
        $_EMAIL = $this->input->post("form_email");
        $_SUBJECT = $this->input->post("form_subject");
        $_PHONE = $this->input->post("form_phone");
        $_MESSAGE = $this->input->post("form_message");

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'no-replay@geyushimotors.com', // change it to yours
            'smtp_pass' => 'GM@2018worldcup', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = isset($_NAME) ? "Name: $_NAME<br><br>" : '';
        $message = isset($_EMAIL) ? $message."Email: $_EMAIL<br><br>" : $message.'';
        $message = isset($_PHONE) ? $message."Phone: $_PHONE<br><br>" : $message.'';
        $message = isset($_MESSAGE) ? $message."Message:<br>$_MESSAGE<br><br>" : $message.'';
        $message = $message.'<br><br><br>This Form was submitted from: <strong>Geyushi Motors Contact Form</strong>.';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($_EMAIL); // change it to yours
        $this->email->to('no-replay@geyushimotors.com');// change it to yours
        $this->email->subject($_SUBJECT);
        $this->email->message($message);
        if($this->email->send()) {
            $message = 'لقد تم إرسال رسالتك <strong>بنجاح</strong> و سوف يتم الرد عليك في أقرب وقت ممكن.';
            $status = "true";
        } else {
            $message = '<strong>تعذر</strong> إرسال البريد الإلكتروني بسبب خطأ غير متوقع. الرجاء معاودة المحاولة في وقت لاحق.<br /><br />';
            $status = "false";
        }
        $status_array = array( 'message' => $message, 'status' => $status);
        echo json_encode($status_array);
    }

    public function sendMail() {
        $_NAME = $this->input->post("form_name");
        $_EMAIL = $this->input->post("form_email");
        $_SUBJECT = $this->input->post("form_subject");
        $_PHONE = $this->input->post("form_phone");
        $_MESSAGE = $this->input->post("form_message");

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'no-replay@geyushimotors.com', // change it to yours
            'smtp_pass' => 'GM@2018worldcup', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = isset($_NAME) ? "Name: $_NAME<br><br>" : '';
        $message = isset($_EMAIL) ? $message."Email: $_EMAIL<br><br>" : $message.'';
        $message = isset($_PHONE) ? $message."Phone: $_PHONE<br><br>" : $message.'';
        $message = isset($_MESSAGE) ? $message."Message:<br>$_MESSAGE<br><br>" : $message.'';
        $message = $message.'<br><br><br>This Form was submitted from: <strong>Geyushi Motors Contact Form</strong>.';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($_EMAIL); // change it to yours
        $this->email->to('no-replay@geyushimotors.com');// change it to yours
        $this->email->subject($_SUBJECT);
        $this->email->message($message);
        if($this->email->send()) {
            $message = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
            $status = "true";
        } else {
            $message = 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br />';
            $status = "false";
        }
        $status_array = array( 'message' => $message, 'status' => $status);
        echo json_encode($status_array);
    }

    public function sendQuickEmailAr(){
        $_EMAIL = $this->input->post("footer_form_email");
        $_MESSAGE = $this->input->post("footer_form_message");

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'no-replay@geyushimotors.com', // change it to yours
            'smtp_pass' => 'GM@2018worldcup', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = '';
        $message = isset($_EMAIL) ? $message."Email: $_EMAIL<br><br>" : $message.'';
        $message = isset($_MESSAGE) ? $message."Message:<br>$_MESSAGE<br><br>" : $message.'';
        $message = $message.'<br><br><br>This Form was submitted from: <strong>Geyushi Motors Contact Form</strong>.';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($_EMAIL); // change it to yours
        $this->email->to('no-replay@geyushimotors.com');// change it to yours
        $this->email->subject("Geyushi Motors Quick Contact Form");
        $this->email->message($message);
        if($this->email->send()) {
            $message = 'لقد تم إرسال رسالتك <strong>بنجاح</strong> و سوف يتم الرد عليك في أقرب وقت ممكن.';
            $status = "true";
        } else {
            $message = '<strong>تعذر</strong> إرسال البريد الإلكتروني بسبب خطأ غير متوقع. الرجاء معاودة المحاولة في وقت لاحق.<br /><br />';
            $status = "false";
        }
        $status_array = array( 'message' => $message, 'status' => $status);
        echo json_encode($status_array);

    }

    public function sendQuickEmail(){
        $_EMAIL = $this->input->post("footer_form_email");
        $_MESSAGE = $this->input->post("footer_form_message");

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'no-replay@geyushimotors.com', // change it to yours
            'smtp_pass' => 'GM@2018worldcup', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = '';
        $message = isset($_EMAIL) ? $message."Email: $_EMAIL<br><br>" : $message.'';
        $message = isset($_MESSAGE) ? $message."Message:<br>$_MESSAGE<br><br>" : $message.'';
        $message = $message.'<br><br><br>This Form was submitted from: <strong>Geyushi Motors Contact Form</strong>.';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($_EMAIL); // change it to yours
        $this->email->to('no-replay@geyushimotors.com');// change it to yours
        $this->email->subject("Geyushi Motors Quick Contact Form");
        $this->email->message($message);
        if($this->email->send()) {
            $message = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
            $status = "true";
        } else {
            $message = 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br />';
            $status = "false";
        }
        $status_array = array( 'message' => $message, 'status' => $status);
        echo json_encode($status_array);

    }
}