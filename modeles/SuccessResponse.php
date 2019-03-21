<?php

class SuccessResponse extends Response{

    public $_object;

    public function __construct($success, $message, $object) {
           
        parent::__construct($success, $message);
        $this ->_object = $object;
    }
}
?>