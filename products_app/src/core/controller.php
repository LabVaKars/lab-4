<?php

    class Controller {

        protected $sessionUtils;
        protected $roles;

        public function __construct(){
            $this->sessionUtils = new SessionUtils();
        }

        public function getRoles(){
            return $this->roles;
        }

        public function getNavbarViewData($active){
            return [
                "active" => $active,
                "auth" => $this->sessionUtils->isAuthenticated(),
                "user_type" => $this->sessionUtils->getUserType(),
                "user_name" => $this->sessionUtils->getUserName()
            ];

        }

        public function getPostValue($name, $default = ""){
            return isset($_POST[$name]) ? $_POST[$name] : $default;
        }

    }
?>