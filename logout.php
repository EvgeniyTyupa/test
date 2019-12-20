<?php
    include("connectdb.php");
    unset($_SESSION['logged_user']);
    unset($_SESSION['cart']);
    header('Location: log.php');


?>