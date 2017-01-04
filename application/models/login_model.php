<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /*
     * Moldex Realty
     * Model for admin login
     * Hercival Aragon
     * Nov 22, 2016
    */
    class Login_model extends CI_Model {

        function __construct(){
            parent::__construct();
        }
    
        public function check($name, $pass ){
            return $this->db->where(array('username' => $name, 'password' => $pass))->get('admin');
        }
        
        public function check_users($name, $pass ){
            return $this->db->where(array('username' => $name, 'password' => $pass))->get('admin');
        }

        function getuInfo(){
            return $this->db->get('user_info');
        }

        public function forgotpass($email){
            $this->db->where('email', $email);
            $q = $this->db->get('admin');
            return $q->row();
        }
    }
?>