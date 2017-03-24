<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function fetch_site_settings() {
    $settings_arr = array();
    $CI = & get_instance();
    
    $sql = $CI->db->select('item,itemvalue')
                  ->from('site_settings')
                  ->get();
    $res = $sql->result_array();
    foreach($res as $vl){
        $settings_arr[$vl['item']] = $vl['itemvalue'];
    }
    
    return $settings_arr;
}