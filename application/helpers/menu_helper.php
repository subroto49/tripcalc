<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function fetch_menu($menu_type='user') {
    
    $menulst = array();
    $CI = & get_instance();
    $table = 'menu';
    $sess_data = $CI->session->userdata();
    $sql =  $CI->db->select("menuid,menuname,menuurl,menuparent")
                   ->from($table)
                   ->where('menustatus',1)
                   ->where("menuaccess",$menu_type)
                   ->order_by('menuposition')
                   ->get();
    $res = $sql->result_array();
    $i = 0;
    foreach($res as $k => $val){
        if($val['menuparent'] == 0){
            $menulst[$val['menuid']]['menuname'] = $val['menuname'];
            $menulst[$val['menuid']]['menuurl'] = $val['menuurl'];
            if(!isset($menulst[$val['menuid']]['child'])){
                $menulst[$val['menuid']]['child'] = array();
            }
        }else{
            if(!isset($menulst[$val['menuparent']])) {
                $menulst[$val['menuparent']] = array();
            }
            $menulst[$val['menuparent']]['child'][$val['menuid']]['menuname'] = $val['menuname'];
            $menulst[$val['menuparent']]['child'][$val['menuid']]['menuurl']  = $val['menuurl'];
        }
    }
    return $menulst;
}