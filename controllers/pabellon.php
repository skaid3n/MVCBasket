<?php

    class Pabellon Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();
            $this->view->render('pabellon/index');
        }
    }
?>