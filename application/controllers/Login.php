<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->settings = fetch_site_settings();
        $this->load->model('login_model', 'login');
    }

    public function index() {
        $data['settings'] = $this->settings;
        $session_details = $this->session->userdata();
        $username = (isset($session_details['username'])) ? $session_details['username'] : '';
        $pstdata = $this->input->post();
        if (trim($username) == '') {
            if(count($pstdata)){
                $userdata['username'] = $pstdata['inputUser'];
                $userdata['password'] = $pstdata['inputPass'];
                $validate = $this->login->validateLogin($userdata);
                switch($validate['success']){
                    case 1:
                        $this->session->set_userdata('username',$validate['userdetails']['username']);
                        $this->session->set_userdata('userid',$validate['userdetails']['userid']);
                        $data['username'] = $validate['userdetails']['username'];
                        $this->load->view('dashboard', $data);
                        break;
                    case 0:
                        $data['page'] = 'login';
                        $data['login_failed'] = 1;
                        $this->load->view('login', $data);
                        break;
                }
            }else{
                $data['page'] = 'login';
                $this->load->view('login', $data);
            }
        }else{
        }
        
    }

    public function register() {
        $data['settings'] = $this->settings;
        $username = (isset($session_details['username'])) ? $session_details['username'] : '';
        $data['page'] = 'register';
        $pstdata = $this->input->post();
        if(count($pstdata)){
            $registerdata['username'] = $pstdata['inputUser'];
            $registerdata['password'] = $pstdata['inputPass'];
            $registerdata['emailaddress'] = $pstdata['inputEmail'];
            
            $data['register_success'] = $this->login->registerUser($registerdata);
        }
        $this->load->view('register', $data);
    }

    public function check_availability() {
        $username = $this->input->post('inputUser');
        $available = $this->login->checkAvailability($username);
        switch($available){
            case 0:
                $response = array(
                    'valid' => false,
                    'message' => 'Username Not Available'
                );
                break;
            case 1:
                $response = array(
                    'valid' => true,
                    'message' => 'Username is Available'
                );
                break;
            default:
                $response = array(
                    'valid' => false,
                    'message' => 'Username is empty'
                );
                break;
        }
        echo json_encode($response);
    }

}
