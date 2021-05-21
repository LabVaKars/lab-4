<?php

    include_once("src/core/Controller.php");
    // views
    include_once("src/view/classes/ViewClasses.php");

    class SignOutController extends Controller{

        function __construct(){
            parent::__construct();
            session_start();
            error_log(__CLASS__." created");
        }

        function invoke(){
            // $this->sessionUtils->closeSession();
            $_SESSION["signedIn"] = false;
            header("Location: /products_app/products");
        }
    }
?>