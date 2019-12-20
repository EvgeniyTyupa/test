<?php
        $db_host = "localhost";
        $db_user = "u207696943_nadai";
        $db_pass = "rjkjc2828";
        $db_base = "u207696943_cart";
        $db_table = "products";
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base);
        if($mysqli->connect_error){
                die("no connection");
        }
        session_start();

?>