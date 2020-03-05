<?php

    class Pabellon Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {

            $this->view->render('pabellon/index');
        }
    }
?>