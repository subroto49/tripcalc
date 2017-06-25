<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trip_model extends CI_Model {

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
                    $insdata[$i]['contactname'] = $val;
                    $insdata[$i]['contactemail'] = (isset($data['inputEmail'][$k])) ? $data['inputEmail'][$k] : '';
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
    
}
