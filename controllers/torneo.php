<?php

    class Torneo Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();
            $this->view->render('torneo/index');
        }
    }
?>