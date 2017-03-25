<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->primary_table = 'user';
    }
    
    function checkAvailability($username){
        $available = 0;
        if(trim($username) != ''){
            $sql = $this->db->select('IF(COUNT(userid) > 0,0,1) AS useravailable',false)
                            ->from($this->primary_table)
                            ->where('username',$username)
                            ->get();
            $res = $sql->row_array();
            $available = $res['useravailable'];
        }else{
            $available = 2;
        }
        return $available;
    }
    function registerUser($userdata) {
        $userdata['salt'] = $this->generateRandomString();
        $option = [
            'salt' => $userdata['salt'],
            'cost' => 15
        ];
        $userdata['password'] = password_hash($userdata['password'], PASSWORD_DEFAULT, $option);
        $userdata['createdate'] = date('Y-m-d H:i:s');
        $this->db->insert($this->primary_table, $userdata);
        $userid = $this->db->insert_id();
        return ($userid > 0) ? 1 : 0;
    }

    function validateLogin($userdata) {
        $udata = array();
        if (isset($userdata['username']) && trim($userdata['username']) != '') {
            $sql = $this->db->select('userid,username,password,salt')
                    ->from($this->primary_table)
                    ->where('username', $userdata['username'])
                    ->where('active', 1)
                    ->get();
            if ($sql->num_rows()) {
                $res = $sql->row_array();
                $option = [
                    'salt' => $res['salt'],
                    'cost' => 15
                ];
                if($res['password'] == password_hash($userdata['password'], PASSWORD_DEFAULT, $option)){
                    $udata = array('success' => 1,'userdetails' => array('username' => $res['username'],'userid' => $res['userid']));
                }else{
                    $udata = array('success' => 0);
                }
            } else {
                $udata = array('success' => 0);
            }
        }
        return $udata;
    }

    function validate_username($uname) {
        $ucnt = 0;
        if (trim($uname) != '') {
            $sql = $this->db->select('count(username) as usercnt')
                    ->from($this->primary_table)
                    ->where('username', strtolower($uname))
                    ->get();
            $res = $sql->row_array();
            $ucnt = $res['usercnt'];
        }
        return ($ucnt > 0) ? 0 : 1;
    }

    private function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*{}[]';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
