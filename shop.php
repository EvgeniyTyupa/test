<?php
    include_once("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>electroperedachi</title>
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
            
            <?php
                
                if(isset($_COOKIE['inspect'])){
                    $inspect = $_COOKIE['inspect'];
                }
                

                $result = $mysqli->query("select * from products");
                if(mysqli_num_rows($result) > 0){
                    echo "<div class='context'>";
                    echo "<div id='inspectData'>";
                    if(isset($inspect)){
                        $zapros = $mysqli->query("select * from ".$db_table." where id = '$inspect'");
                        $inspectFile = mysqli_fetch_array($zapros);
                        echo "<div id='inspectContainer'>";
                        echo "<form action='shopcart.php?id=".$inspectFile['id']."' method='POST'>";
                        
                        echo "<img src=".$inspectFile['img']." alt='ha'>";
                        echo "<p>".$inspectFile['name']."</p>";
                        echo "<p id='price'>$".$inspectFile['price']."</p>";
                        echo "<p>".$inspectFile['info']."</p>";
                        echo "<input type='hidden' name='hidden_id' value=".$inspectFile['id'].">";
                        echo "<input type='text' name='count' value='1' id='count'>";
                        echo "<input type='hidden' name='hidden_name' value=".$inspectFile['name'].">";
                        echo "<input type='hidden' name='hidden_price' value=".$inspectFile['price'].">";
                        echo "<input type='hidden' name='hidden_img' value=".$inspectFile['img'].">";
                        echo "<input type='submit' value='Add to Cart' name='add' id='addtocart'>";
                        
                        echo "</form>";
                        echo "</div>";
                        
                    }
                    

                    
                        echo "</div>";
                        
                        echo "<div id='listData'>";

                        for($i = 0; $i < mysqli_num_rows($result);$i++){
                            $fileload = mysqli_fetch_array($result);
                            echo "<div class='container' id=".$fileload['id'].">";
                            echo "<img src=".$fileload['img']." height = 100; width = 100 alt='ha'>";
                            echo "<p>".$fileload['name']."</p>";
                            echo "<p >$ ".$fileload['price']."</p>";
                            echo "</div>";     
                        }
                        echo "</div>";
                    
                    echo "</div>";
                }
                    
        ?>
        </div>
        

        
        
    </div>
        
        <!-- <p id="header">electroperedachi</p> -->
        <!-- <a href="reg.php" class="regbut">Registration</a>
        <a href="log.php" class="regbut">Log In</a> -->
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
    <script>
        inspect();
    </script>  
</body>
</html>