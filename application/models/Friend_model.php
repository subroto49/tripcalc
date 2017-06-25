<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Friend_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->primary_table = 'contacts';
    }
    
    function save_friend_data($data){
        $insdata = array();
        $insid = 0;
        $userid = $this->session->userdata('userid');
        if(count($data)){
            $i = 0;
            if(isset($data['inputName']) && count($data['inputName'])){
                foreach($data['inputName'] as $k => $val){
                    $insdata[$i]['contactname'] = ucwords(strtolower($val));
                    $insdata[$i]['contactemail'] = (isset($data['inputEmail'][$k])) ? strtolower($data['inputEmail'][$k]) : '';
                    $insdata[$i]['userid'] = $userid;
                    $i++;
                }
            }
            
            if(count($insdata)){
                $this->db->insert_batch($this->primary_table,$insdata);
                $insid = $this->db->insert_id();
            }
        }
        
        return $insid;
    }
    
    function fetch_user_friends($user,$term){
        $list = array();
        if(trim($user) != '' && $user != 0){
            $sql= $this->db->select('contactid,contactname')
                           ->from($this->primary_table)
                           ->where('userid',$user)
                           ->like('contactname',$term)
                           ->get();
            if($sql->num_rows()){
                $res = $sql->result_array();
                foreach($res as $k => $v){
                    $list[$k]['id'] = $v['contactid'];
                    $list[$k]['value'] = $v['contactname'];
                    $k++;
                }
            }
        }
        return $list;
    }
    
    function get_contact_list($userid,$aliastype=''){
        $contact_list = array();
        if(trim($userid) != ''){
            $sql = $this->db->select('contactid,contactname')
                        ->from($this->primary_table)
                        ->where('userid',$userid);
            if(trim($aliastype) != ''){
                $sql = $sql->where('alias',$aliastype);
            }
            $sql = $sql->get();
            if($sql->num_rows()){
                $contact_list   = $sql->result_array();
            }
        }
        return $contact_list;
    }
}
