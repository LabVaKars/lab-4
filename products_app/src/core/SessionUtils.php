<?php

    class SessionUtils {


        public function __construct(){}

        public function startSession($userType, $userName){
            session_start();
            $_SESSION["userType"] = $userType;
            $_SESSION["userName"] = $userName;
            $_SESSION["signedIn"] = true;
        }

        public function isAuthenticated(){
            if(isset($_SESSION["signedIn"])){
                return $_SESSION["signedIn"];
            } else {
                return false;
            }
        }

        public function getUserType(){
            if(isset($_SESSION["userType"])){
                return $_SESSION["userType"];
            } else {
                return "";
            }
        }

        public function getUserName(){
            if(isset($_SESSION["userName"])){
                return $_SESSION["userName"];
            } else {
                return "";
            }
        }

        public function isAdmin(){
            return $this->getUserType() == "admin";
        }

        public function isUser(){
            return $this->getUserType() == "user";
        }

        public function isAnonym(){
            return $this->getUserType() == "";
        }

        public function closeSession(){
            session_destroy();
        }

    }

?>