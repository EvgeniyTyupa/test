<?php
    include("log.html");
    if(isset($_POST['login']) && isset($_POST['pass'])){
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['pass'];


        $db_host = "localhost";
        $db_user = "u207696943_test";
        $db_pass = "123321";
        $db_base = "u207696943_test_db";
        $db_table = "users";

        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base);

        if($mysqli->connect_error){
            die("no connection");
        }
       
        $result = $mysqli->query("select pass from users where login = '$login'");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $hash = $row['pass'];
            if(password_verify($pass, $hash)){
                echo "Welcome '$login'!",'<br>';
            }
            else{
                echo "Wrong password!","<br>";
            }
        }
        else if(mysqli_num_rows($result) <= 0){
           echo "wrong login or pass!","<br>";
        }

    }
?>