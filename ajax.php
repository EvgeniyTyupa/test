<?php
    include("connectdb.php");
    if(isset($_REQUEST['jsonString']))
    {
        $arr = $_REQUEST['jsonString'];
        $id = json_decode($arr);
        echo $id;
    }
    if(isset($_REQUEST['jsonStringArr'])){
        $array = $_REQUEST['jsonStringArr'];
        $myarr = json_decode($array);
        for($i = 0; $i < count($myarr); $i++){

            $result = $mysqli->query("select id from products where id = ".$myarr[$i].";");
            if(mysqli_num_rows($result) > 0){
                $result = $mysqli->query("delete from products where id = ".$myarr[$i].";");
            }
            else{
                echo "no one picture choose";
            }
        }
    }
    if(isset($_REQUEST['jsonStr'])){
        
        $arr_tmp = [];
        $array = $_REQUEST['jsonStr'];
        $myarr = json_decode($array);
        var_dump($myarr);
        for($i = 0; $i < count($myarr); $i++){
            $result = $mysqli->query("select id from orders where id = ".$myarr[$i].";");
            if(mysqli_num_rows($result) > 0){
                $itemId = mysqli_fetch_array($result);
                $itemId = $itemId['id'];
                $result = $mysqli->query("select orderName from orders where id = ".$itemId."");
                $orderNum = mysqli_fetch_array($result);
                $orderNum = $orderNum['orderName'];
                $result = $mysqli->query("select id from orders where orderName = ".$orderNum."");
                $arr = mysqli_fetch_all($result);
                foreach($arr as $arr_it){
                    $str = $arr_it[0];
                    array_push($arr_tmp, $str);
                }
                foreach($arr_tmp as $arr_item){
                    $result = $mysqli->query("delete from orders where id = ".$arr_item."");
                }
            }
            else{
                echo "no one item choose";
            }
        }
    }
    
?>