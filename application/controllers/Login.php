<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->settings = fetch_site_settings();
        $this->load->model('login_model', 'login');
        $this->load->helper('cookie');
    }

    public function index() {
        $data['settings'] = $this->settings;
        $session_details = $this->session->userdata();
        $username = (isset($session_details['username'])) ? $session_details['username'] : '';
        $cookie_data = get_cookie('rememberme');
        $pstdata = $this->input->post();
        $data['menu'] = fetch_menu('login');
        if (trim($username) == '' && trim($cookie_data) == '') {
            if (count($pstdata)) {
                $userdata['username'] = $pstdata['inputUser'];
                $userdata['password'] = $pstdata['inputPass'];
                $userdata['rememberme'] = (isset($pstdata['inputRemember'])) ? $pstdata['inputRemember'] : '';
                $validate = $this->login->validateLogin($userdata);
                switch ($validate['success']) {
                    case 1:
                        $this->session->set_userdata('username', $validate['userdetails']['username']);
                        $this->session->set_userdata('userid', $validate['userdetails']['userid']);
                        $this->session->set_userdata('saved', $validate['userdetails']['saved_data']);
                        $data['username'] = $validate['userdetails']['username'];
                        header('location: dashboard');
                        break;
                    case 0:
                        $data['page'] = 'login';
                        $data['login_failed'] = 1;
                        $this->load->view('login', $data);
                        break;
                }
            } else {
                $this->load->view('login', $data);
            }
        } else if (trim($username) != '') {
            header('location: dashboard');
        } else if (trim($username) == '' && trim($cookie_data) != '') {
            $userdata = $this->login->validateCookie($cookie_data);
            if ($userdata['userid'] != '' && $userdata['username'] != '') {
                $this->session->set_userdata('username', $userdata['username']);
                $this->session->set_userdata('userid', $userdata['userid']);
                $this->session->set_userdata('saved', $cookie_data);
                header('location: dashboard');
            } else {
                delete_cookie('rememberme');
                $this->load->view('login', $data);
            }
        }
    }

    public function register() {
        $data['settings'] = $this->settings;
        $username = (isset($session_details['username'])) ? $session_details['username'] : '';
        $pstdata = $this->input->post();
        if (count($pstdata)) {
            $registerdata['username'] = $pstdata['inputUser'];
            $registerdata['password'] = $pstdata['inputPass'];
            $registerdata['emailaddress'] = $pstdata['inputEmail'];

            $data['register_success'] = $this->login->registerUser($registerdata);
        }
        $data['menu'] = fetch_menu('register');
        $this->load->view('register', $data);
    }

    public function check_availability() {
        $username = $this->input->post('inputUser');
        $available = $this->login->checkAvailability($username);
        switch ($available) {
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

    function logout() {
        $saved_data = $this->session->userdata('saved');
        $userid = $this->session->userdata('userid');
        delete_cookie('rememberme');
        $this->login->remove_cookie_data($userid, $saved_data);
        $this->session->sess_destroy();
//        header("location:/");
        redirect(base_url());
    }

}
