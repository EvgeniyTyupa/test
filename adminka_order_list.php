<?php
    include("connectdb.php");
    if($isAdmin == 1){
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
    <link rel="stylesheet" type="text/css" href="adminka.css">
    <link rel="stylesheet" type="text/css" href="input.css">
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
      <div id="accInfo">
            <div id="inspectData">
            
                <div id="adminPanel">
                    <div id="shopListBut">
                        <a href="adminka_order_view.php">View Order List</a>
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
        <div id="listData">
            <div id="orderMain">
                <div id="personalContent">
                    <h3>Orders: </h3>
                    <?php
                        $arr = [];
                        $arr_tmp = [];
                        $count = 1;
                        // $result = $mysqli->query("select id from users where login = '".$_SESSION['logged_user']."'");
                        // $userId = mysqli_fetch_array($result);
                        // $userId = $userId['id'];
                        $result = $mysqli->query("select orderName from orders");
                        if(mysqli_num_rows($result)> 0){
                            $arr = mysqli_fetch_all($result);
                            foreach($arr as $arr_it){
                                $str = $arr_it[0];
                                array_push($arr_tmp, $str);
                            }
                            for($i = 0; $i <= count($arr_tmp); $i++){
                                if(@$arr_tmp[$i] === @$arr_tmp[$i+1]){
                                    unset($arr_tmp[$i]);
                                }
                            }
                            ?>
                            <table>
                                <thead>
                                    <th style="border:0;"></th>
                                    <th width="10%">Number</th>
                                    <th width="30%">User</th>
                                    <th width="20%">Order</th>
                                    <th width="20%">Date</th>
                                </thead>
                                <tbody>
                            <?php
                            foreach($arr_tmp as $arr_item){
                           
                                $result = $mysqli->query("select createAt from orders where orderName = ".$arr_item."");
                                $dateTime = mysqli_fetch_array($result);
                                $dateTime = $dateTime['createAt'];

                                $resultUser = $mysqli->query("select userId from orders where orderName = ".$arr_item."");
                                $userName = mysqli_fetch_array($resultUser);
                                $userName = $userName['userId'];
                                $resultUser = $mysqli->query("select login from users where id = ".$userName."");
                                $userName = $userName = mysqli_fetch_array($resultUser);
                                $userName = $userName['login'];

                                $result = $mysqli->query("select id from orders where orderName = ".$arr_item."");
                                $itemId = mysqli_fetch_array($result);
                                $itemId = $itemId['id'];
                                
                                
                                echo "<tr>";
                                ?>
                                <td width=2%>
                                    <label class="containerChecbox">
                                        <input type="checkbox" value="<?=$itemId?>" name="view">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <?php
                                echo "<td>$count</td>";
                                echo "<td>$userName</td>";
                                echo "<td><a href='adminka_order_view.php?value=$arr_item' id='orderLink'>".$arr_item."</a></td>";
                                echo "<td>".$dateTime."</td>";
                                echo "</tr>";
                                $count++;
                            }  
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button name="delete" value="Delete" onclick="deleteOrder();" id="addtodbBut">Delete</button></td>
                            </tr>
                            <?php 
                        }
                        else{
                            echo "<tr>";
                            echo "<td>You have no orders yet.</td>";
                            echo "</tr>";
                        }   
                    ?>
                            </tbody>
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