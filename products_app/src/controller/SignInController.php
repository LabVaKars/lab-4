<?php

    include_once("src/core/Controller.php");
    // views
    include_once("src/view/classes/ViewClasses.php");

    class SignInController extends Controller{


        function __construct(){
            parent::__construct();
            session_start();
            error_log(__CLASS__." created");
        }

        function invoke(){
            $INPUT_IDENTIF = "inputIdentif";

            // getting data from form
            $identif = $this->getPostValue($INPUT_IDENTIF);
            $signInBtn = $this->getPostValue("signInBtn");

            $form = new FormContainer();
            $form->addTextInput($INPUT_IDENTIF, [
                "label" => "Lietotāja identifikators:",
                "group" => $INPUT_IDENTIF,
                "value" => $identif
            ]);

            $messages = new MessageContainer();
            if($signInBtn != null && strlen($signInBtn) > 0){
                $messages->addError(
                    $INPUT_IDENTIF, "");
            }

            if($signInBtn != null && strlen($signInBtn) > 0){

                if(!$messages->hasErrors()){

                    $this->sessionUtils->startSession("user",strtolower($identif));

                    header("Location: /products_app/products");

                }
            }

            $navbarViewData = $this->getNavbarViewData("home");

            $data = [
                "0" => $INPUT_IDENTIF,

                "navbarData" => new NavbarView($navbarViewData),
                "form" => $form,
                "messages" => $messages
            ];
            $view = new SignInPageView($data);
            include_once("src/view/template_view.php");
        }

    }
?>