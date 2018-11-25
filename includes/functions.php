<?php
function display_errors($errors=array()){
    $output = '';
    if(!empty($errors)){
        $output .= "<div class\"errors\">";
        $output .= "<ul>";
        foreach($errors as $error){
            $output .= "<li>" .$error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

//Redirect
function redirect_to($location){
    header('Location: ' .$location);
    exit; //exit() should be set if more action is set after this redirect.
}

?>