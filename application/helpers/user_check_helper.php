<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validate_user_status() {
    
    $sess_arr = array();
    $CI = & get_instance();
    $sess_data = $CI->session->userdata();
    if(!isset($sess_data['username']) || !isset($sess_data['userid']) || !isset($sess_data['saved'])){
        $sess_arr['success'] = 0;
    }else{
        $sql = $CI->db->select("count(login_token) as token_cnt")
                      ->from('user_login')
                      ->where("userid",$sess_data['userid'])
                      ->where('login_token',$sess_data['saved'])
                      ->get();
        $res = $sql->row_array();
        if($res['token_cnt'] > 0){
            $sess_arr['success'] = 1;
            $sess_arr['username'] = $sess_data['username'];
            $sess_arr['auth_token'] = $sess_data['saved'];
            $sess_arr['userid'] = $sess_data['userid'];
        }else{
            $sess_arr['success'] = 0;
        }
    }
    return $sess_arr;
}