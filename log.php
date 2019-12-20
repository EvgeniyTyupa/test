<?php
    include("log.html");
    include("connectdb.php");
    if(isset($_POST['login']) && isset($_POST['pass'])){
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['pass'];


        if($mysqli->connect_error){
            die("no connection");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="stylesheet" type="text/css" href="input.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <video autoplay muted loop id="myVideo">
        <source src="video/index.mp4" type="video/mp4">
    </video>
    <div class="telo">
        <div class="navbar">
            <div id="navleft">
                <a href="index.php" >
                    <div id="navheader">
                        <span id="headtext">electroperedachi</span>
                    </div>
                </a>
            </div>
            <div id="navright"> 
                <div class="navelement" id="user">
                    <img src="img/user.png" id="userimg">
                    <div class="modalogin">
                        <div class="arrow-up">            
                        </div>
                        <div class="modalmain">   
                            <?php
                                if(isset($_SESSION['logged_user'])){
                                    echo "<p>Hello,<a href='office.php' id='nickname'>".$_SESSION['logged_user']."</a></p>";
                                }
                                else{
                                    ?>
                                    <a href="log.php">Log in</a>
                                    <a href="reg.php">Registration</a>
                                    <?php
                                }
                            ?> 
                        </div>
                        </div>      
                    </div>
                    <div class="navelement">
                        <a href="shop.php" class="linkRouting">shop</a>
                    </div>
                    
                    <div class="navelement">
                        <a href="photo.php" class="linkRouting">photo</a>
                    </div>  
                    <div class="navelement">
                        <a href="music.php" class="linkRouting">music</a>
                    </div> 
                    <div class="navelement">
                        <a href="events.php" class="linkRouting">events</a>
                    </div> 
                    <div class="navelement" id="contact">
                        <a href="contact.php" class="linkRouting">contact us</a>
                    </div>
                </div> 
                <div id="showme">
                    <span id="menu">menu</span>
                    <div id="navmenu">
                        <div id="menufon"></div>
                        <a href="photo.php">
                            <div class="navelement">
                                <span class="navtext">photo</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="navelement">
                                <span class="navtext">music</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="navelement">
                                <span class="navtext">events</span>
                            </div>
                        </a>
                        <a href="shop.php">
                            <div class="navelement">
                                <span class="navtext">shop</span>
                            </div>
                        </a>
                        <a href="">
                            <div class="navelement">
                                <span class="navtext">contact us</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="outcont">
                    <div class="regmain">
                        <h1>Log in</h1>
                        <form action="log.php" method="POST">
                            <div class="field">
                                <label>Login: </label>
                                <input placeholder="Login" required name="login">
                            </div>
                            <div class="field">
                                <label>Password: </label>
                                <input placeholder="Password" required name="pass" type="password">
                            </div>
                            <div id="inputGo">
                                <input type="submit" value="Log In"/>
                            </div>
                        </form>
                        <?php
                            if(isset($login)){
                                $result = $mysqli->query("select pass from users where login = '$login'");
                                if(mysqli_num_rows($result) > 0){
                                    $row = mysqli_fetch_array($result);
                                    $hash = $row['pass'];
                                    if(password_verify($pass, $hash)){
                                        $ad = $mysqli->query("select is_admin from users where login = '$login'");
                                        $admin = mysqli_fetch_array($ad);
                                        $admin = $admin['is_admin'];
                                        if($admin == 1){
                                            echo "<p>Welcome Admin '$login'</p>";
                                            $_SESSION['logged_user'] = $login;
                                            echo "<script>window.location='office.php'</script>";
                                        }
                                        else{
                                            echo "<p>Welcome '$login'!</p>";
                                            $_SESSION['logged_user'] = $login;
                                            echo "<script>window.location='office.php'</script>";
                                        }
                                        
                                    }
                                    else{
                                        echo "<p>Wrong password!</p>";
                                    }
                                }
                                else if(mysqli_num_rows($result) <= 0){
                                   echo "<p>Wrong Login or Pass!</p>";
                                }

                            }
                                
                        ?>
                    </div>
                </div>
        </div>
       
        
    </div>
    <div class="footer">
        <div id="footleft">
            <div id="footLinks">
                    <a href="">soundcloud</a>
                    <a href="https://www.facebook.com/electroperedachi" target="_blank">facebook</a>
                </div>
                <div id="cartDiv">
                    <a href="shopcart.php" id="cartLink">
                        <img src="img/cart.png" alt="cart">
                        <?php
                            if(isset($_SESSION['cart'])){
                                echo "<div id='cartCercle'>";
                                echo "<span>".count($_SESSION['cart'])."<span>";
                                echo "</div>";
                            }
                        ?>
                    </a>
                </div> 
            </div>
        </div>
    </div>
    
</body>
</html>