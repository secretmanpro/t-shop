<?php
    include_once("Controller.php");
    class LienHeController extends Controller{
        public function getLienHe(){
            return $this->loadView("lien-he.php");
        }
    }
?>