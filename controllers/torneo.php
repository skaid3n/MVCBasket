<?php

    class Torneo Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {

            $this->view->render('torneo/index');
        }
    }
?>