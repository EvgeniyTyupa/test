<?php
    include("connectdb.php");
    
    if($isAdmin == 1){
        @$name = $_REQUEST['name'];
        @$price = $_REQUEST['price'];
        @$info = $_REQUEST['info'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
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
                        <form action="adminka.php" method="POST" enctype="multipart/form-data" id="addToDbForm">
                            <div class="field">
                                <label>Name: </label>
                                <input placeholder="Item name" required name="name">
                            </div>
                            <div class="field">
                                <label>Price: </label>
                                <input placeholder="$50" required name="price" value="<?=@$price?>">
                            </div>
                            <div class="field">
                                <label>Info: </label>
                                <input placeholder="info" required name="info" value="<?=@$info?>">
                            </div>
                            <div class="field">
                                <label>Img: </label>
                                <input type="file" name="path" require id="imgfile">
                            </div>
                            <div id="inputGo">
                            <input type="submit" value="Add to Data Base" id="addtodbBut" style="margin-top:120px">       
                            </div>
                            
                        </form>
                        <?php

                            if(isset($_FILES) && count($_FILES)>0){
                                $file = "images/".$_FILES['path']['name'];
                                $result = $mysqli->query("select * from products where name = '".$name."'");
                                if(mysqli_num_rows($result) > 0){
                                    echo "<p>Already have an item with that name!</p>";
                                }
                                else{
                                    if(move_uploaded_file($_FILES['path']['tmp_name'],$file)){
                                        $result = $mysqli->query("insert into products (name, img, price, info) values ('$name', '$file', '$price', '$info')");
                                        echo "<script>window.location='adminka.php'</script>";
                                    }
                                    else{
                                        echo "error!";
                                    }
                                } 
                            }
                        ?>
                        <button name="delete" value="Delete" onclick="send();" id="addtodbBut">Delete</button>
                    </div>
                    <div id="inspectPhoto">
                        <p>Photo</p>
                    </div>
                    <div id="adminPanel">
                        <div id="shopListBut">
                            <a href="adminka_order_list.php">View Order List</a>
                        </div>
                        <div >
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

                <div id="dataList">
                    <table>
                        <thead>
                            <th></th>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Info</th>
                        </thead>
                        <tbody>
                            <?php
                            for($i = 0; $i < mysqli_num_rows($zapros);$i++){
                                $item = mysqli_fetch_array($zapros);
                            ?>
                            <tr class="row">
                                <td width=2%>
                                    <label class="containerChecbox">
                                        <input type="checkbox" value="<?=$item['id']?>" name="view">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td width=5%><?php echo $item['id'];?></td>
                                <td width=10%><img src='<?=$item['img']?>' alt='item_img' width=100px></td>
                                <td width=25%><?php echo $item['name'];?></td>
                                <td width=10%>$<?php echo $item['price'];?></td>
                                <td>
                                    <div width=200px>
                                        <p id='infoTd'>
                                            <?php echo $item['info'];?>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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
