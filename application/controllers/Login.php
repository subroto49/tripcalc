<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->settings = fetch_site_settings();
    }
    
    public function index() {
        $data['settings'] = $this->settings ;
        $this->load->view('login',$data);
    }
}
