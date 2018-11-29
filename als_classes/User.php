<?php 

class User {

    private $_db,
            $_data;

    public function __construct() {
        $this->_db = DB::getInstance();
    }
/*
    public function create ($fields = array()) {
        if(!this->_db->insert("users", $fields)){
            throw new Exception("There was a problem creating an account.");
        }
    } 

    */

    // Purpose: find user by username or id
    public function find($user = null) {

        if ($user) {
            $field = (is_numeric($user)) ? "id" : "username";
            $data = $this->_db->getAll("users", array($field, "=", $user));
            
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login( $username = null, $password = null) {
        $user = $this->find($username);
        
        print_r($user);
        /*if($user) {
            if($this->data()->password)

        }*/

        return false;
    }
    private function data() {
        return $this->_data;

    }
}

