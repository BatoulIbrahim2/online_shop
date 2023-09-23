<?php
session_start();
if($_SESSION['logged']==true){

require_once 'connection.php';
$id = $_GET["id"];
echo $id;
    
 $item_query = "select * from items where id = '$id'";
 
 $result=  mysqli_query($con, $item_query);
 $row = mysqli_fetch_assoc($result);
 $itemId = $row['id'];
 $quantity = $row['quantity'];
 
 if($quantity > 0){
    $userName = $_SESSION['username'];
    $sql_add_query = "INSERT INTO orders(item_id,quantity, username) VALUES('$itemId','1','$userName')";

        if(mysqli_query($con, $sql_add_query) === FALSE){
            die("Could not add the new order"); 
            echo 'could not add new order';
        }
        else{
            $sql = "update items set quantity = quantity - 1 where id = '$id'";
            mysqli_query($con, $sql);
           header('location:client.php');
        }
 }else{
     header('location:client.php');
 }
}else{
   header('location:login.php');
}



?>
<?php
        echo "welcom prof:". $_SESSION['username'];
        ?>