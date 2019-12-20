<?php
include('reg.html');
if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['email'])){
    
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    $db_host = "localhost";
    $db_user = "u207696943_test";
    $db_pass = "123321";
    $db_base = "u207696943_test_db";
    $db_table = "users";

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_base);

    if($mysqli->connect_error){
        die("no connection");
    }
    $pwd = password_hash($pass, PASSWORD_DEFAULT);
    $result = $mysqli->query("select login from users where login = '$login'");
    if(mysqli_num_rows($result) <= 0){
        $result = $mysqli->query("insert into ".$db_table." (login, pass, email) values ('$login','$pwd','$email')");
        header("Location: log.php");
    }
    else if(mysqli_num_rows($result) > 0){
        echo "User already registered!<br>";
    }
}
?>