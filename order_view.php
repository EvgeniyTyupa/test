<?php
  include("connectdb.php");
  if($_SESSION['logged_user']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <link rel="stylesheet" type="text/css" href="office.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>electroperedachi | office</title>
</head>
<body>
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
      <div id="accInfo">
        <div id="inspectUser">
          <?php
            $zapros = $mysqli->query("select * from users where login = '".$_SESSION['logged_user']."'");
            $inspectUser = mysqli_fetch_array($zapros);
            echo "<div id='inspectContainerUser'>";
            echo "<form action='office.php' method='POST' enctype='multipart/form-data'>";
            if($inspectUser['user_img'] == ""){
              echo "<form action='office.php' method='POST' enctype='multipart/form-data'>";
              echo "<p id='upimg'>Upload image</p>";
              echo "<input type='file' name='userImagePath' style='display: none' id='userImagePath1'>";
              echo "<input type='submit' name='uploadImg' value='upload' id='btn'>";
              echo "</form>";
              @$file = "images/users/".$_FILES['userImagePath']['name'];
                if(move_uploaded_file(@$_FILES['userImagePath']['tmp_name'],$file)){
                    $result = $mysqli->query("update users set user_img='$file' where users.login = '".$_SESSION['logged_user']."'");
                    echo "<script>window.location='office.php'</script>";
                }
              
            }
            else{
                echo "<img src=".$inspectUser['user_img']." alt='user'>";
                echo "<form action='office.php' method='POST' enctype='multipart/form-data'>";
                echo "<p id='upimg'>Update</p>";
                echo "<input type='file' name='userImagePath' style='display: none' id='userImagePath1'>";
                echo "<input type='submit' name='uploadImg' value='upload'>";
                echo "</form>";
                @$file = "images/users/".$_FILES['userImagePath']['name'];
                if(move_uploaded_file(@$_FILES['userImagePath']['tmp_name'],$file)){
                    $result = $mysqli->query("update users set user_img='$file' where users.login = '".$_SESSION['logged_user']."'");
                    echo "<script>window.location='office.php'</script>";
                }
            }
            
            echo "<p>".$inspectUser['login']."</p>";
            echo "<p>".$inspectUser['email']."</p>";
            echo "<a href='logout.php' style='margin-top:50px;'>Log Out</a>";
            echo "</form>";
            $result = $mysqli->query("select is_admin from users where login='".$_SESSION['logged_user']."'");
            $isAdmin = mysqli_fetch_array($result);
            $isAdmin = $isAdmin['is_admin'];
            if($isAdmin == 1){
                echo "<a href='adminka.php' style='margin-top:50px; font-size: 20px'>Moderate</a>";
            }
            echo "</div>";
          ?>
        </div>  
        <div id="listData">
            <div id="orderMain">
                <div id="orderNav">
                    <div id="orderElement" style="margin-left:40px; font-weight:900;">
                        <a href="office.php" style="color: rgb(164, 124, 202);">Back</a>
                    </div>
                </div>
                <div id="personalContent">
                    <table width=100%>
                        <tr >
                            <th width="20%">Item</th> 
                            <th width="20%">Name</th>  
                            <th width="20%">Count</th>
                            <th width="20%">Details Price</th>
                            <th width="20%">Total Price</th>
                            <!-- <th width="15%">Action</th>   -->
                        </tr>
                        <?php
                            $arr = [];
                            $total = 0;
                            $orderValue = $_GET['value'];
                            $result = $mysqli->query("select itemId, itemCount from orders where orderName = ".$orderValue."");
                            $arr = mysqli_fetch_all($result);
                            foreach($arr as $key => $arr_it){
                                $itemId = $arr_it[0];
                                $itemCount = $arr_it[1];
                                $result = $mysqli->query("select * from products where id = ".$itemId."");
                                $item = mysqli_fetch_array($result);
                                ?>
                                <tr class="row" id="<?=$item['item_id'];?>">
                                    <td><img src="<?=$item['img'];?>" class="cartimg"></td>
                                    <td><?php echo $item['name'];?></td>
                                    <td><?php echo $itemCount?></td>
                                    <td>$<?php echo $item['price'];?></td>
                                    <td>$<?php echo number_format(($itemCount * $item['price']))?></td>
                                </tr>
                                <?php
                                    $total = $total +($itemCount * $item['price']);
                                        }
                                ?>
                                
                                <tr id="total">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <th>$ <?php echo number_format($total, 2);?></th>
                                    <td><td>
                                </tr>
                        
                    </table>
                </div>
            </div>

            

        </div>
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
<script>
    uploadBut();
</script>
</html>
<?php
  }
?>