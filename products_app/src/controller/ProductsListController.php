<?php

    include_once("src/core/Controller.php");
    // views
    include_once("src/view/classes/ViewClasses.php");

    class ProductsListController extends Controller{

        function __construct(){
            parent::__construct();
            session_start();
            error_log(__CLASS__." created");
            $this->appUtils = new AppUtils();
            $this->sessionUtils = new SessionUtils();
        }

        function invoke(){

            if(!$this->sessionUtils->isAuthenticated()){
                header("Location: /products_app/signin");
            }

            $navbarViewData = $this->getNavbarViewData("");

            $INPUT_SELECT_NAME = "inputSelectName";
            $INPUT_LIST_NAME = "inputListName";
            $INPUT_PRODUCT_NAME = "inputProductName";
            $INPUT_PRODUCT_COUNT = "inputProductCount";
            $BTN_UPDATE_LIST = "btnUpdateList";
            $BTN_ADD_LIST = "btnAddList";
            $BTN_DELETE_LIST = "btnDeleteList";
            $BTN_ADD_PRODUCT = "btnAddProduct";
            $BTN_DELETE_PRODUCT = "btnDeleteProduct";

            $inputProductName = $this->getPostValue($INPUT_PRODUCT_NAME);
            $inputProductCount = $this->getPostValue($INPUT_PRODUCT_COUNT);
            $inputListName = $this->getPostValue($INPUT_LIST_NAME);
            $inputSelectName = $this->getPostValue($INPUT_SELECT_NAME);

            $products_json = isset($_SESSION[strtolower($this->sessionUtils->getUserName())])
                                ? $_SESSION[strtolower($this->sessionUtils->getUserName())] : "";

            $products_array = json_decode($products_json, true) != NULL
                                ? json_decode($products_json, true) : [];

            if($this->isClickedBtn($BTN_ADD_LIST)){
                $products_array[$inputListName] = [];
                $inputSelectName = strtolower($inputListName);
            }
            if($this->isClickedBtn($BTN_DELETE_LIST)){
                unset($products_array[$inputSelectName]);
            }

            if($inputSelectName != NULL && strlen($inputSelectName) > 0) {

                if($this->isClickedBtn($BTN_ADD_PRODUCT)){
                    array_push($products_array[$inputSelectName], [
                        "name" => $inputProductName, "count" => $inputProductCount
                    ]);
                }
                if($this->isClickedBtn($BTN_DELETE_PRODUCT)){
                    $productCount = count($products_array[$inputSelectName]);
                    $checkedCheckboxes =
                        $this->appUtils->getCheckedCheckboxesFromForm($_POST, "selectedProduct", $productCount);
                    foreach($checkedCheckboxes as $selectedProduct){
                        foreach($products_array[$inputSelectName] as $i=>$product){
                            if(strtolower($product["name"]) == strtolower($selectedProduct["value"])){
                                unset($products_array[$inputSelectName][$i]);
                            }
                        }
                    }
                }

            }

            $selectOptions = [];
            foreach(array_keys($products_array) as $list_name){
                array_push($selectOptions, [
                    "id" => strtolower($list_name),
                    "name" => $list_name
                ]);
            }

            $products = isset($products_array[$inputSelectName])
                        ? $products_array[$inputSelectName] : [];

            $form = new FormContainer();
            $form->addTextInput($INPUT_LIST_NAME, [
                "placeholder" => "List Name",
                "group" => $INPUT_LIST_NAME,
                "value" => $inputListName
            ]);
            $form->addSelectInput($INPUT_SELECT_NAME, [
                "label" => "Current List:",
                "group" => $INPUT_SELECT_NAME,
                "selected" => $inputSelectName,
                "options" => $selectOptions
            ]);
            $form->addTextInput($INPUT_PRODUCT_NAME, [
                "placeholder" => "Product Name",
                "group" => $INPUT_PRODUCT_NAME,
                "value" => $inputProductName
            ]);
            $form->addNumberInput($INPUT_PRODUCT_COUNT, [
                "placeholder" => "Product Count",
                "group" => $INPUT_PRODUCT_COUNT,
                "value" => $inputProductCount
            ]);

            $form->addBtn($BTN_UPDATE_LIST, [
                "text" => "Atjaunot",
                "class" => "btn btn-block btn-primary",
                "group" => "clickedBtn",
                "value" => $BTN_UPDATE_LIST
            ]);
            $form->addBtn($BTN_ADD_LIST, [
                "text" => "Pievienot sarakstu",
                "class" => "btn btn-block btn-success",
                "group" => "clickedBtn",
                "value" => $BTN_ADD_LIST
            ]);
            $form->addBtn($BTN_DELETE_LIST, [
                "text" => "Nodzēst sarakstu",
                "class" => "btn btn-block btn-danger",
                "group" => "clickedBtn",
                "value" => $BTN_DELETE_LIST
            ]);
            $form->addBtn($BTN_ADD_PRODUCT, [
                "text" => "Pievienot produktu",
                "class" => "btn btn-block btn-success",
                "group" => "clickedBtn",
                "value" => $BTN_ADD_PRODUCT
            ]);
            $form->addBtn($BTN_DELETE_PRODUCT, [
                "text" => "Nodzest produktu",
                "class" => "btn btn-block btn-danger",
                "group" => "clickedBtn",
                "value" => $BTN_DELETE_PRODUCT
            ]);

            $_SESSION[strtolower($this->sessionUtils->getUserName())] = json_encode($products_array);

            $data = [
                "0" => $INPUT_SELECT_NAME,
                "1" => $INPUT_LIST_NAME,
                "2" => $INPUT_PRODUCT_NAME,
                "3" => $INPUT_PRODUCT_COUNT,
                "4" => $BTN_UPDATE_LIST,
                "5" => $BTN_ADD_LIST,
                "6" => $BTN_DELETE_LIST,
                "7" => $BTN_ADD_PRODUCT,
                "8" => $BTN_DELETE_PRODUCT,

                "form" => $form,
                "sessionUtils" => $this->sessionUtils,
                "products" => $products,
                "navbarData" => new NavbarView($navbarViewData),
            ];
            $view = new ProductsListPageView($data);
            include_once("src/view/template_view.php");
        }

        function isClickedBtn($name){
            return isset($_POST["clickedBtn"]) ? $_POST["clickedBtn"] == $name : false ;
        }

    }
?>