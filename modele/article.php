<?php

class Article{

    public $id;
    
    public $title;

    public $content;

    public function getInfos(){
        return $this->$id."\n".$this->$title."\n".$this->$content;
    }
}
?>
