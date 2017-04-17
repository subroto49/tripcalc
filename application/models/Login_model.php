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
        $this->load->helper('cookie');
        $this->primary_table = 'user';
    }

    function checkAvailability($username) {
        $available = 0;
        if (trim($username) != '') {
            $sql = $this->db->select('IF(COUNT(userid) > 0,0,1) AS useravailable', false)
                    ->from($this->primary_table)
                    ->where('username', $username)
                    ->get();
            $res = $sql->row_array();
            $available = $res['useravailable'];
        } else {
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
                if ($res['password'] == password_hash($userdata['password'], PASSWORD_DEFAULT, $option)) {
                    $cookiedata = '';
                    $cookiedata = $this->save_cookie_data($res['userid'],$userdata['rememberme']);
                    $udata = array('success' => 1, 'userdetails' => array('username' => $res['username'], 'userid' => $res['userid'],"saved_data" => $cookiedata));
                } else {
                    $udata = array('success' => 0);
                }
            } else {
                $udata = array('success' => 0);
            }
        }
        return $udata;
    }

    function save_cookie_data($userid,$rememberflag) {
        $cookie_value = '';
        if (trim($userid) != '' && $userid != 0) {
            $cookie_value = base64_encode($userid."_".$this->generateRandomString(25));

            $cookie = array(
            'name' => 'rememberme',
            'value' => $cookie_value,
            'expire' => ($rememberflag) ? time() + 86500 : "",
            'path' => '/',
            );
            set_cookie($cookie);
            $this->db->insert('user_login',array("userid" => $userid, "login_token" => $cookie_value));
        }
        return $cookie_value;
    }
    
    function remove_cookie_data($userid,$saved_data){
        if(trim($userid) != '' && trim($saved_data)!= ''){
            $this->db->where(array('userid' => $userid, "login_token" => $saved_data));
            $this->db->delete('user_login');
        }
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
    
    public function validateCookie($data){
        $username = '';
        $userid = '';
        if(trim($data)!= ''){
            $data = base64_decode($data);
            $tmp = explode("_",$data);
            $userid = (isset($tmp['0']) && trim($tmp['0'])!= '') ? trim($tmp['0']) : '';
            $token  = (isset($tmp['1']) && trim($tmp['1'])!= '') ? trim($tmp['1']) : '';
            
            if($userid != '' && $token != ''){
                $sql =  $this->db->select("u.username")
                                 ->from('user_login l')
                                 ->join('user u','l.userid = u.userid')
                                 ->where('l.userid',$userid)
                                 ->where('l.login_token',$token)
                                 ->limit(1)
                                 ->get();
                $res =  $sql->row_array();
                if($sql->num_rows()){
                    $username = $res['username'];
                } 
            }
            return array("userid" => $userid,"username" => $username);
        }
    }
}
