<?php
    class View {

        private $template;
        private $data;

        function __construct($template, $data){
            $this->template = $template;
            $this->data = $data;
        }

        function generate(){
            $data = $this->data;
            include("src/view/templates/".$this->template."_temp.php");
        }

    }
?>