<?php
// include_once('Response.php');

class FalseResponse extends Response{

    function __construct($success, $message) {
           
        parent::__construct($success, $message);
    }
}
?>