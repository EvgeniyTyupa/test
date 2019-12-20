<?php
    include_once("connectdb.php");
    if(isset($_COOKIE['inspect'])){
        $inspect = $_COOKIE['inspect'];
    }
    if(isset($_POST['add'])){
        echo "<script>window.location='shop.php'</script>";
        if(isset($_SESSION['cart'])){   
            $item_array_id = array_column($_SESSION['cart'], 'item_id');
            if(!in_array($_GET['id'],$item_array_id)){
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'item_id' => $_POST['hidden_id'],
                    'item_img' => $_POST['hidden_img'],
                    'item_name' => $_POST['hidden_name'],
                    'item_price' => $_POST['hidden_price'],
                    'item_count' => $_POST['count']
                );
                $_SESSION['cart'][$count] = $item_array;
                echo "<script>window.location='shopcart.php'</script>";
            }
            else{
                
                for($i = 0; $i < count($_SESSION['cart']); $i++){
                    if($_SESSION['cart'][$i]['item_id'] == $_GET['id']){
                        $item_array = array(
                            'item_id' => $_POST['hidden_id'],
                            'item_img' => $_POST['hidden_img'],
                            'item_name' => $_POST['hidden_name'],
                            'item_price' => $_POST['hidden_price'],
                            'item_count' => $_POST['count'] + $_SESSION['cart'][$i]['item_count']
                        );
                        $_SESSION['cart'][$i] = $item_array;
                    }
                   
                }
                echo "<script>window.location='shopcart.php'</script>";
            } 
        }
        else{

            $item_array = array(
                'item_id' => $_POST['hidden_id'],
                'item_img' => $_POST['hidden_img'],
                'item_name' => $_POST['hidden_name'],
                'item_price' => $_POST['hidden_price'],
                'item_count' => $_POST['count']
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='delete'){
            foreach($_SESSION['cart'] as $keys => $value){
                if($value['item_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$keys]);
                    echo "<script>window.location='shopcart.php'</script>";
                }
            }
        }
    }
    if(isset($_POST['buy'])){
        if(isset($_SESSION['logged_user'])){
            if(isset($_SESSION['cart'])){
                $result = $mysqli->query("select id from users where login = '".$_SESSION['logged_user']."'");
                $userId = mysqli_fetch_array($result);
                $userId = $userId['id'];
                $dateTime = date_default_timezone_set('Europe/Kiev');
                $dateTime = date('Y-m-d', time());
                $orderName = $userId;
                foreach($_SESSION['cart'] as $key => $value){
                    $itemId = $value['item_id'];
                    $orderName = $orderName.$itemId;
                }
                $result = $mysqli->query("select orderName from orders where orderName = '$orderName'");
                if(mysqli_num_rows($result)>0){
                    $orderName += 1;
                }
                foreach($_SESSION['cart'] as $key => $value){
                    $itemId = $value['item_id'];
                    $itemCount = $value['item_count']; 
                    $result = $mysqli->query("insert into orders (userId, itemId, itemCount, createAt, orderName) values ('$userId', '$itemId', '$itemCount', '$dateTime', '$orderName')");
                }
                if($result){
                    unset($_SESSION['cart']);
                    echo "<script>alert('Item's are submited!');</script>";
                }
            }
        }
    }
    
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>electroperedachi</title>
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
            <div class="context">
                <div id="inspectData">
                    <?php
                    if(!empty($_SESSION['cart'])){
                        if(isset($inspect)){
                            $zapros = $mysqli->query("select * from ".$db_table." where id = '$inspect'");
                            $inspectFile = mysqli_fetch_array($zapros);
                            
                            echo "<div id='inspectContainer'>";
                            echo "<img src=".$inspectFile['img']." alt='ha'>";
                            echo "<p>".$inspectFile['name']."</p>";
                            echo "<p id='price'>$".$inspectFile['price']."</p>";
                            echo "<p>".$inspectFile['info']."</p>";
                            echo "</div>";
                            
                        }
                    }
                    else{
                        echo "<div id='inspectContainer'>";
                        echo "</div>";
                    }
                        
                    ?>
                </div>
                <div id="shopData">
                    <table>
                        <tr >
                            <th width="8%">Item</th> 
                            <th width="10%">Name</th>  
                            <th width="10%">Count</th>
                            <th width="13%">Details Price</th>
                            <th width="10%">Total Price</th>
                            <th width="15%">Action</th>  
                        </tr>
                        <?php
                        if(!empty($_SESSION['cart'])){
                            $total = 0;
                            foreach($_SESSION['cart'] as $keys => $value){
                                if(isset($value['item_count'])){ 
                                ?>
                        <tr class="row" id="<?=$value['item_id'];?>">
                            <td><img src="<?=$value['item_img'];?>" class="cartimg"></td>
                            <td><?php echo $value['item_name'];?></td>
                            <td><?php echo $value['item_count'];?></td>
                            <td>$<?php echo $value['item_price'];?></td>
                            <td>$<?php echo number_format(($value['item_count'] * $value['item_price']))?></td>
                            <td><a href="shopcart.php?action=delete&id=<?=$value['item_id'];?>">
                                    <span>Remove</span>
                                </a>
                            </td>
                        </tr>
                        <?php
                            $total = $total +($value['item_count'] * $value['item_price']);
                                }
                            }
                        ?>
                        
                        <tr id="total">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <th>$ <?php echo number_format($total, 2);?></th>
                            <td>
                                <form action="shopcart.php" method="POST">
                                    <input type="submit" value="Buy" name="buy">
                                </form>
                            </td>
                        </tr>
                        <?php     
                                            
                            }
                            else{
                                echo "<tr id='emptytext'><td>";
                                echo "Cart is Empty.";
                                echo "</td></tr>";
                            }
                        ?>
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
<script>
    inspectcart();
</script>  
</body>
</html>

<?php
    function isLogin(){
        $isLog = false;
        if(isset($_SESSION['logged_user'])){
            $isLog = true;
            return $isLog;
        }
    }
    function parseDate($date){
        $dateArr = str_split($date);
        $str = "";
        foreach($dateArr as $word){
            if($word != "-"){
                $str.$word;
            }
        }
        return $str;
    }
?>