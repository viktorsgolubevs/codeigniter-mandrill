<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mandrill_test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mandrill_send');
    }
    
    public function index() {
        $this->load->view('welcome_message');
    }

    public function simple_email() {
        // Email settings data
        $message = array(
            'subject' => 'This is my test subject',
            'html' => '<p>This is my message<p>',
            'text' => 'This is my plaintext message',
            'from_email' => 'sender Email',
            'from_name' => 'sender Name Surname', //optional
            'to' => array(
                // add more sub-arrays for additional recipients
                array(
                    'email' => 'receiver Email',
                    'name'  => 'receiver Name Surname', // optional
                    'type'  => 'to' //optional. Default is 'to'. Other options: cc & bcc
                )
            )
            /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE','track_clicks' => TRUE) go here */
        );

        $mail = $this->mandrill_send->send_email($message);

        print_r($mail); // For debugging
    }

    public function templated_email() {

        // Html template
        $html_template = $this->load->view('welcome_message', '', true);

        // Email settings data
        $message = array(
            'subject' => 'This is my test subject',
            'html' => $html_template,
            'from_email' => 'sender Email',
            'from_name' => 'sender Name Surname', //optional
            'to' => array(
                // add more sub-arrays for additional recipients
                array(
                    'email' => 'receiver Email',
                    'name'  => 'receiver Name Surname', // optional
                    'type'  => 'to' //optional. Default is 'to'. Other options: cc & bcc
                )
            )
            /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE','track_clicks' => TRUE) go here */
        );

        $mail = $this->mandrill_send->send_email($message);

        print_r($mail); // For debugging
    }

    // Information about senders that have tried to use this account, both verified and unverified
    public function sender_list() {

        $mail = $this->mandrill_send->sender_list();
        print_r($mail); // For debugging

    }

    // Detailed information about a single sender
    public function single_sender() {

        $email = 'test email';
        $mail = $this->mandrill_send->single_sender($email);
        print_r($mail); // For debugging

    }

    // Get the 100 most clicked URLs
    public function get_urls() {

        $email = 'me@viktorsgolubevs.lv';
        $mail = $this->mandrill_send->get_urls();
        print_r($mail); // For debugging
    }
}


