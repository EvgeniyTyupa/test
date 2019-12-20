<?php
include("connectdb.php");
if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['email'])){
    
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $email = $_POST['email'];
    $phone = "+380".$_POST['phone'];
    $pwd = password_hash($pass, PASSWORD_DEFAULT);
    
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="stylesheet" type="text/css" href="input.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Registration</title>
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
                <h1>Registration</h1>
                <form method="POST" action="reg.php">
                    <div class="field">
                        <label>Login: </label>
                        <input name="login" type="text" required placeholder="Login" autocomplete="off" value="<?=@$login?>"/>
                    </div>     
                    <div class="field">
                        <label>Phone: </label>
                        <input name="phone" type="text" required placeholder="Phone Number" autocomplete="off" value="<?=@$phone?>"/>
                    </div>          
                    <div class="field">
                        <label>Email: </label>
                        <input name="email" type="email" required placeholder="Email" autocomplete="off" value="<?=@$email?>"/>
                    </div>
                    <div class="field">
                        <label>Password: </label>
                        <input name="pass" type="password" required placeholder="Password"/>
                    </div> 
                    <div class="field">
                        <label>Password again: </label>
                        <input name="pass2" type="password" required placeholder="Re-Password"/>
                    </div> 
                    <div id="inputGo">
                        <input type="submit" value="Log In"/>
                    </div>
                    
                </form>
            </div>
            <?php
                if(isset($login)){
                    if($pass == $pass2){
                        $result = $mysqli->query("select login from users where login = '$login'");
                        if(mysqli_num_rows($result) <= 0){
                            $result = $mysqli->query("insert into users (login, pass, email, phone, is_admin, user_img) values ('$login','$pwd','$email','$phone','0', '')");
                            echo "<p>DONE</p>";
                            echo "<script>window.location='log.php'</script>";
                        }
                        else if(mysqli_num_rows($result) > 0){
                            echo "<p>User already registered!</p><br>";
                        }
                    }
                    else{
                        echo "<p>The entered passwords do not match!</p>";
                    }
                }
                
            ?>
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