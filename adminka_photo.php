<?php
    include("connectdb.php");
    
    if($isAdmin == 1){
        
        if(isset($_POST['addphoto'])){
            @$name = $_REQUEST['name'];
            @$date = $_REQUEST['dateTime'];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="stylesheet" type="text/css" href="adminka.css">
    <link rel="stylesheet" type="text/css" href="input.css">
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
            <div class="context">
                <?php
                    $zapros = $mysqli->query("select * from products");
                ?>
                <div id="inspectData">
                    <div id="inspectContainer">
                        <form action="adminka_photo.php" method="POST" enctype="multipart/form-data" id="addToDbForm">
                            <h3>New Album</h3>
                            <div class="field">
                                <label>Name: </label>
                                <input placeholder="Album name" required name="name">
                            </div>
                            <div class="field">
                                <label>Date: </label>
                                <input type="date" required name="dateTime">
                            </div>
                            <div class="field">
                                <label>Img: </label>
                                <input type="file" name="path[]" require id="imgfile" accept="image/jpeg,image/png" multiple>
                            </div>
                            <div id="inputGo">
                                <input type="submit" value="Add to Data Base" id="addtodbBut" style="margin-top:120px" name="addphoto">       
                            </div>
                            
                        </form>
                        <?php
                            if(isset($_FILES) && count($_FILES)>0){
                                $albumName = $name."_".$date;
                                // logReq("!2!");
                                // logReq(join(";",$_FILES['path']['name']));
                                if(is_dir($albumName)){
                                    echo "<p>Album already exsist!</p>";
                                }
                                else{
                                    
                                    mkdir("images/photo/".$albumName."", 0777);
                                    for($i = 0; $i < count($_FILES['path']['name']);$i++){
                                        $file = "images/photo/".$albumName."/".$_FILES['path']['name'][$i];
                                        
                                        if(move_uploaded_file($_FILES['path']['tmp_name'][$i],$file)){
                                            if($i == 0){
                                                $result = $mysqli->query("insert into photos (name, img, date, isHeader) values ('$name','$file', '$date', '1')");
                                            }
                                            else{
                                                $result = $mysqli->query("insert into photos (name, img, date, isHeader) values ('$name','$file', '$date', '0')");
                                            }
                                            echo "<script>window.location='adminka_photo.php'</script>";
                                        }
                                        else{
                                            echo "error!";
                                        }
                                    }
                                }
                                
                                
                            }
                        ?>
                        <button name="delete" value="Delete" onclick="send();" id="addtodbBut">Delete</button>
                    </div>
                    <div id="adminPanel">
                        <div id="shopListBut">
                            <a href="adminka_order_list.php">View Order List</a>
                        </div>
                        <div>
                            <h3>Add new:</h3>
                        </div>
                        <div id="adminKeys">
                            <div class="adminKeyContainer">
                                <a href="adminka.php">shop</a>
                            </div>
                            <div class="adminKeyContainer">
                                <a href="adminka_photo.php">photo</a>
                            </div>
                            <div class="adminKeyContainer">
                                <a href="adminka_music.php">music</a>
                            </div>
                            <div class="adminKeyContainer">
                                <a href="adminka_event.php">event</a>
                            </div>
                        </div>       
                    </div>    
                </div>

                <div id="listData">
                    <?php
                        $arrPhotoName = [];
                        $result = $mysqli->query("select name from photos");
                        $names = mysqli_fetch_all($result);
                        
                        for($i = 0;$i < count($names);$i++){
                            array_push($arrPhotoName, $names[$i][0]);
                        }
                        $arr = array_unique($arrPhotoName);
                        foreach($arr as $photo){
                            $result = $mysqli->query("select img, date from photos where isHeader = 1 and name = '".$photo."'");
                            $img = mysqli_fetch_array($result);
                            $partyTime = $img['date'];
                            $img = $img['img'];
                            for($i = 0; $i < strlen($partyTime); $i++){
                                if($partyTime[$i] == "-"){
                                    $partyTime[$i] = "/";
                                }
                            }
                            ?>

                                <div>
                                    <a href="">
                                        <img src="<?=$img?>" alt="album" width=200px>
                                        <p>electroperedachi <?=$partyTime?></p>
                                    </a>
                                    
                                </div>



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
<?php
        }
    else{
        echo "<script>window.location='log.php'</script>";
    }   
?>
