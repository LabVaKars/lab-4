<?php

    class RegExUtils {

        public $REGEX_NUM = "{integer}";

        private function trimSlashes($str){
            $str = trim($str);
            if($str[0] == "/"){
                $str = substr($str, 1);
            }
            if($str[strlen($str)-1] == "/"){
                $str = substr($str, 0, strlen($str)-1);
            }
            return $str;
        }
        
        public function trimCurlyBraces($str){
            $str = trim($str);
            if($str[0] == "{"){
                $str = substr($str, 1);
            }
            if($str[strlen($str)-1] == "}"){
                $str = substr($str, 0, strlen($str)-1);
            }
            return $str;
        }

        public function getPathParams($template, $uri){
            // path parameters passed in {}
            $data = [];

            $templatePaths = explode("/", $this->trimSlashes($template));
            $uriPaths = explode("/", $this->trimSlashes($uri));

            error_log(implode("::", $templatePaths));
            error_log(implode("::",$uriPaths));
            
            if(count($uriPaths) == count($templatePaths)){
                for($i=0; $i<count($uriPaths); $i++){
                    if(preg_match("/\{[a-zA-Z0-9]+\}/", $templatePaths[$i])){
                        $data[$this->trimCurlyBraces($templatePaths[$i])] = $uriPaths[$i];
                    } else if($uriPaths[$i] == $templatePaths[$i]) {
                        continue;
                    } else {
                        error_log("path doesn't match");
                        return null;
                    }
                }
            } else {
                error_log("path parameters doesn't match");
                return null;
            }
            return $data;
        }

        public function uriToRegex($uri){
            error_log($uri);
            $uri = preg_replace("/\//", "\/", $uri);
            $uri = preg_replace("/\{[a-zA-Z0-9]+\}/", "[a-zA-Z0-9]+", $uri);
            $uri = "/^".$uri."$/";
            error_log("result regex: ".$uri);
            return $uri;
        }
    
        public function matchPath($temp, $uri){
            $temp = $this->uriToRegex($this->trimSlashes($temp));
            $uri = $this->trimSlashes($uri);
            return preg_match($temp, $uri);
        }

    }

?>