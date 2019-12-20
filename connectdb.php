<?php
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_base = "cart";
        $db_table = "products";
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base);
        if($mysqli->connect_error){
                die("no connection");
        }
        session_start();
        if(isset($_SESSION['logged_user'])){
                $result = $mysqli->query("select is_admin from users where login='".$_SESSION['logged_user']."'");
                    $isAdmin = mysqli_fetch_array($result);
                    $isAdmin = $isAdmin['is_admin'];
        }
        function logReq($message){
                $file = fopen("request.log","a");
                fwrite($file,$message."     \n");
                fclose($file);
        }
?>