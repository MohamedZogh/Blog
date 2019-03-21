<?php

class Response{

    public $_success;
    public $_message;

     function __construct($success, $message) {
           
        $this->_success = $success;
        $this->_message = $message;
    }
}
?>