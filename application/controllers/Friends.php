<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('user_check');
        $this->load->model('friend_model','friend');
        $this->settings = fetch_site_settings();
    }

    function add_friends() {
        $user_details = validate_user_status();
        $data['settings'] = $this->settings;
        if ($user_details['success']) {
            $data['menu'] = fetch_menu();
            $flashdata = $this->session->flashdata('success');
            if($flashdata != null){
                switch($flashdata){
                    case 0:
                        $data['success'] = 0;
                        $data['save_message'] = 'Oops!!! Some error in save your friends details.<br>Please try again';
                        break;
                    default:
                        $data['success'] = 1;
                        $data['save_message'] = 'We have saved your friends data successfully';
                }
            }
            $this->load->view('add_friends_list', $data);
        } else {
            redirect('logout');
        }
    }

    function save_member_data() {
        $pstdata = $this->input->post();
        $ins_res = $this->friend->save_friend_data($pstdata);
        $this->session->set_flashdata('success',$ins_res);
        redirect(base_url().'add-members');
    }
    
    function fetch_friends(){
        $gdata  = $this->input->get();
        $userid = $this->session->userdata('userid');
        $list = $this->friend->fetch_user_friends($userid,$gdata['term']);
        echo json_encode($list);
    }
}

?>