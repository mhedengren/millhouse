<?php

class Input {

    //Purpose: check if data exists
    public static function exists($type = "post") {

        switch ($type) {
            case "post":
                // Use  !empty() to see if post variable is not empty
                return (!empty($_POST)) ? true : false;
            break;

            case "get":
                return (!empty($_GET)) ? true : false;
            break;
            
            default:
                return false;
            break;
        }
    }

    //Define what item to get
    public static function get($item) {

        // Check for post data first and return it, otherwise the same for get data 
        if(isset($_POST[$item])){
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return "";
    }

}