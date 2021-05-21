<?php
    include_once("src/controller/ProductsListController.php");
    include_once("src/controller/NotFoundController.php");
    include_once("src/controller/ApiController.php");
    include_once("src/controller/SignInController.php");
    include_once("src/controller/SignOutController.php");
    include_once("src/core/consts/Paths.php");
    include_once("src/core/RegExUtils.php");
    include_once("src/core/SessionUtils.php");

    class Router {

        private $reUtils;
        private $sessionUtils;
        private $controller;

        public function __construct(){
            $this->reUtils = new RegExUtils();
            $this->sessionUtils = new SessionUtils();
        }

        public function process(){

            $uri = $_SERVER["REQUEST_URI"];
            error_log($uri);

            if($this->reUtils->matchPath(Paths::$API_URI, $uri)){ $this->controller = new ApiController();}
            else if($this->reUtils->matchPath(Paths::$SIGN_IN_URI, $uri)){ $this->controller = new SignInController();}
            else if($this->reUtils->matchPath(Paths::$SIGN_OUT_URI, $uri)){ $this->controller = new SignOutController();}
            else if($this->reUtils->matchPath(Paths::$PRODUCT_LIST_URI, $uri)){ $this->controller = new ProductsListController();}
            else { $this->controller = new NotFoundController();}
            $this->privilegedInvoke();
        }


        private function privilegedInvoke(){
            // if(!$this->sessionUtils->isAuthenticated()
            //     && !$this->reUtils->matchPath(Paths::$API_URI, $_SERVER["REQUEST_URI"])){
            //     $this->controller = new SignInController();
            // }
            $this->controller->invoke();
        }
    }

?>