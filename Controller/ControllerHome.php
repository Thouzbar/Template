<?php

require_once 'view/View.php';

class ControllerHome {
    
    public function home($action) {
        $view = new View($action);
        $view->generate(array('page'));
    }
}