<?php
    include("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="stylesheet" type="text/css" href="photo.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <title>electroperedachi</title>
    <script>
        $(document).ready(function(){
            $('.slider').bxSlider();
        });
  </script>
</head>
<body>
    <!-- <video autoplay muted loop id="myVideo">
        <source src="video/index.mp4" type="video/mp4">
    </video> -->
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
                <!-- <div class="navelement">
                    <a href="music.php" class="linkRouting">music</a>
                </div> 
                <div class="navelement">
                    <a href="events.php" class="linkRouting">events</a>
                </div> 
                <div class="navelement" id="contact">
                    <a href="contact.php" class="linkRouting">contact us</a>
                </div> -->
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
        <div id="photoList1">
            <?php
                $arrPhotoPath = [];
                $result = $mysqli->query("select img from photos where name = '".$_GET['value']."'");
                $names = mysqli_fetch_all($result);
                
                for($i = 0;$i < count($names);$i++){
                    array_push($arrPhotoPath, $names[$i][0]);
                }
            ?>
                <div class="imgCont">
                    <div class="slider">
                        <?php
                            for($i = 0; $i < count($arrPhotoPath); $i++){
                                ?>
                                    <img src="<?=$arrPhotoPath[$i]?>" alt="electroperedachi" style="widht:auto; height:530px">
                                <?php
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
                    <a href="https://www.youtube.com/electroperedachi" target="_blank">youtube</a>
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