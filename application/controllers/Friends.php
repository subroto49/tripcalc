<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('user_check');
        $this->settings = fetch_site_settings();
    }

    function add_friends(){
    	$user_details = validate_user_status();
        $data['settings'] = $this->settings;
        if($user_details['success']){
            $data['menu'] = fetch_menu();
            $this->load->view('add_friends_list',$data);
        }else{
            redirect('logout');
        }
    }

    function save_member_data(){
    	$pstdata = $this->input->post();
    	if($pstdata){
    		print_r($pstdata);
    	}
    }
}
?>