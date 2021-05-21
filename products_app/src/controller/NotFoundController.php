<?php

    include_once("src/core/Controller.php");
    // views
    include_once("src/view/classes/ViewClasses.php");

    class NotFoundController extends Controller{

        function __construct(){
            parent::__construct();
            // session_start();
            error_log(__CLASS__." created");
        }

        function invoke(){


            $navbarViewData = $this->getNavbarViewData("produkti");

            $data = [
                "navbarData" => new NavbarView($navbarViewData)
            ];
            $view = new NotFoundPageView($data);
            include_once("src/view/template_view.php");
        }
    }
?>