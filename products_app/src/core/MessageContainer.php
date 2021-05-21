<?php

    class MessageContainer {

        private $errorCode =    "0";
        private $warningCode =  "1";
        private $successCode =  "2";
        private $infoCode =     "3";

        private $messages;

        public function __construct(){
            $this->messages = [];
        }

        public function addError($code, $message){
            $this->messages[$code] = [$this->errorCode, $message];            
        }

        public function addWarning($code, $message){
            $this->messages[$code] = [$this->warningCode, $message];
        }

        public function addSuccess($code, $message){
            $this->messages[$code] = [$this->successCode, $message];
        }

        public function addInfo($code, $message){
            $this->messages[$code] = [$this->infoCode, $message];
        }

        public function generate($code){
            if(isset($this->messages[$code]) && strlen($this->messages[$code][1]) > 0){
                $color = $this->getColor($this->messages[$code][0]);
                echo '<div class="alert alert-'.$color.'">'.$this->messages[$code][1].'</div>';
            } else {
                error_log("No message by this code");
            }
        }

        public function hasErrors(){
            foreach($this->messages as $message){
                if($message[0] == $this->errorCode && strlen($message[1])>0) return true;
            }
            return false;
        }

        public function getMessageByCode($code){
            return isset($this->messages[$code]) ? $this->messages[$code] : "";
        }

        private function getColor($msgType){
            switch($msgType){
                case $this->errorCode:
                    return "danger";
                    break;
                case $this->warningCode:
                    return "warning";
                    break;
                case $this->successCode:
                    return "success";
                    break;
                case $this->infoCode:
                    return "info";
                    break;
            }
        }


    }

?>