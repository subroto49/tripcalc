<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('user_check');
        $this->settings = fetch_site_settings();
    }

    public function index() {
        $user_details = validate_user_status();
        $data['settings'] = $this->settings;
        if($user_details['success']){
            $data['menu'] = fetch_menu();
            $this->load->view('dashboard',$data);
        }else{
            redirect('logout');
        }
    }
}
