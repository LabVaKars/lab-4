<?php

    class AppUtils {


        public function getCheckedCheckboxesID($post, $group, $count){
            $checked = [];
            for($i=0; $i<$count; $i++){
                if(isset($post[$group.$i])) {
                    array_push($checked, $post[$group.$i]);
                }
            }
            return $checked;
        }

        public function getCheckedCheckboxesFromForm($post, $group, $count){
            $checked = [];
            for($i=0; $i<$count; $i++){
                if(isset($post[$group.$i])) {
                    array_push($checked, [
                        "index" => $i,
                        "value" => $post[$group.$i]
                    ]);
                }
            }
            return $checked;
        }

        public function getCheckedCheckboxesFromArray($fullArray, $checkArray){
            $checked = [];
            for($i=0; $i<count($fullArray); $i++){
                if($this->isInCheckedArray($fullArray[$i]["id"], $checkArray)) {
                    array_push($checked, [
                        "index" => $i,
                        "value" => $fullArray[$i]["id"]
                    ]);
                }
            }
            return $checked;
        }

        private function isInCheckedArray($id, $checkArray){
            if($checkArray != null){
                foreach($checkArray as $checked){
                    if($checked["id"] == $id) return true;
                }
                return false;
            }
        }

        public function prepareCheckBox($fullArray, $checkArray){
            for($i=0; $i<count($fullArray); $i++){
                $fullArray[$i]["checked"] = false;
            }
            if($checkArray != null) {
                foreach($checkArray as $id){
                    $fullArray[$id["index"]]["checked"] = true;
                }
            }
            return $fullArray;
        }
    }

?>