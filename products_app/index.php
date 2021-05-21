<?php
    error_log("!!!IMPORTING CORE CLASES!!!");
    include_once("src/core/Model.php");
    include_once("src/core/Controller.php");
    include_once("src/core/View.php");
    include_once("src/core/SessionUtils.php");
    include_once("src/core/AppUtils.php");
    include_once("src/core/Router.php");
    include_once("src/core/FormContainer.php");
    include_once("src/core/MessageContainer.php");
    error_log("!!!IMPORTING VIEW CLASES!!!");


    $router = new Router();
    $router->process();

?>

