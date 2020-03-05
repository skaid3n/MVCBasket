<?php

    class Equipo Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {

            $this->view->render('equipo/index');
        }
    }
?>