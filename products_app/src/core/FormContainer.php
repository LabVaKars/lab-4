<?php

    class FormContainer {

        private $formFields;

        public function __construct(){
            $this->formFields = [];
        }

        public function addTextInput($code, $data){
            $this->formFields[$code] = new HTMLTextInputView($data);
        }

        public function addPasswordInput($code, $data){
            $this->formFields[$code] = new HTMLPasswordInputView($data);
        }

        public function addNumberInput($code, $data){
            $this->formFields[$code] = new HTMLNumberInputView($data);
        }

        public function addDateInput($code, $data){
            $this->formFields[$code] = new HTMLDateInputView($data);
        }

        public function addDateTimeInput($code, $data){
            $this->formFields[$code] = new HTMLDateTimeInputView($data);
        }

        public function addTextareaInput($code, $data){
            $this->formFields[$code] = new HTMLTextareaView($data);
        }

        public function addCheckBoxInput($code, $data){
            $this->formFields[$code] = new HTMLCheckBoxView($data);
        }

        public function addRadioBoxInput($code, $data){
            $this->formFields[$code] = new HTMLRadioBoxView($data);
        }

        public function addSelectInput($code, $data){
            $this->formFields[$code] = new HTMLSelectView($data);
        }

        public function addFileInput($code, $data){
            $this->formFields[$code] = new HTMLFileUploadView($data);
        }

        public function addBtn($code, $data){
            $this->formFields[$code] = new HTMLButtonView($data);
        }

        public function generate($code){
            if(isset($this->formFields[$code])){
                $this->formFields[$code]->generate();
            } else {
                error_log("No field by this code");
            }
        }

        public function getMessageByCode($code){
            return isset($this->errors[$code]) ? $this->errors[$code] : "";
        }

    }

?>