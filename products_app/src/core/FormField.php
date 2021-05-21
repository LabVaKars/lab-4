<?php
    class FormField{
        static $STRING = "string";
        static $DATE = "date";
        static $NUMBER = "number";
        
        private $type;
        private $viewClass;
        private $validationRules = [];

        public function __construct($type, $viewClass){
            $this->type = $type;
            $this->viewClass = $viewClass;
            $this->validationRules = [];
        }

        public function addValidationRule($validationRule){
            array_push($validationRules, $validationRule);
        }

    }

?>