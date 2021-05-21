<?php

    class Model {

        private $name;

        public function __construct($name){
            $this->name = $name;
        }

        public function log($message){
            error_log("From {$this->name}: $message");
        }
    }

?>