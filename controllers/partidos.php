<?php

    class Partidos Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {

            $this->view->render('partidos/index');
        }
    }
?>