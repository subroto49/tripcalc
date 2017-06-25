<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('user_check');
        $this->load->model('trip_model','trip');
        $this->load->model('friend_model','friends');
        $this->settings = fetch_site_settings();
    }

    function create_trip(){
        $user_details = validate_user_status();
        $data['settings'] = $this->settings;
        $data['contact_list_me'] = $this->friends->get_contact_list($user_details['userid'],'me');
        if ($user_details['success']) {
            $data['menu'] = fetch_menu();
            $this->load->view('new_trip',$data);
        }else{
            redirect(base_url().'logout');
        }
    }

}

?>