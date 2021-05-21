<?php

    include_once("src/core/Controller.php");
    // views
    include_once("src/view/classes/ViewClasses.php");

    class ApiController extends Controller{

        private $rgUtils;

        function __construct(){
            parent::__construct();
            session_start();
            error_log(__CLASS__." created");
            $this->rgUtils = new RegExUtils();
        }



        function invoke(){
            header('Content-Type: application/json');
            $GET_JSON_URI = "/products_app/api/{username}";


            $data = $this->rgUtils->getPathParams($GET_JSON_URI, $_SERVER["REQUEST_URI"]);

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $_SESSION[strtolower($data['username'])] = file_get_contents('php://input');

            } else if($_SERVER['REQUEST_METHOD'] == "GET"){

                $products_json = isset($_SESSION[strtolower($data['username'])])
                                    ? $_SESSION[strtolower($data['username'])] : "";

                echo $products_json;
            }

        }
    }
?>