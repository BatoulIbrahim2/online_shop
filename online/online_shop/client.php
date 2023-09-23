<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
echo<<<_END
<h1>welcom to our website</h1> 


      
_END;

$username = $_SESSION['username'];
echo<<<_END
<table border="2" class="table-container left-side">
<tr><th>id</th><th>name</th><th>quantity</th><th>item_type</th><th>price</th><th>order now</th><th>image</th></tr>


_END;
$query = "SELECT items.id as id ,items.name, items.quantity, items.item_type,items.price,images.image  FROM items left join images on items.id = images.item_id group by items.id";
$result = mysqli_query($con, $query);
$r = mysqli_num_rows($result);
for ($i = 0; $i < $r; $i++) {
    $row = mysqli_fetch_assoc($result);
    echo"<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['item_type'] .
    "</td><td>" . $row['price'] . "</td>" . "<td><a href ='order.php?id=" . $row['id'] . "'><img src='ordericon.jpg' "
            . "hieght='20px' width='20px'></a></td><td><img class='order-img' src=".$row['image']." /></td>"
    . "</tr>";
}


echo<<<_END
<table border="2" class="table-container">
<tr><th>id</th><th>name</th><th>item_type</th><th>price</th></tr>


_END;
$query_my_items = "SELECT * FROM items left join orders on items.id = orders.item_id where orders.username = '$username'";
$result_my_items = mysqli_query($con, $query_my_items);
$r_my_items = mysqli_num_rows($result_my_items);
for ($i = 0; $i < $r_my_items; $i++) {
    $row = mysqli_fetch_assoc($result_my_items);
    echo"<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['item_type'] .
    "</td><td>" . $row['price'] . "</td>"
    . "</tr>";
}

echo"</table>";
echo"<button class='btn'><a href='logout.php'>logout</a></button>";}else{
   header('location:login.php');
}
?>
<html>
    <head>
        <style>
            body {
                text-align: center;
            }
        .table-container {
            border-spacing: 0;
            text-align: center;    
            outline: none;
            border: none;
            display: inline-flex;
        }
        .img-td {
            width: 200px;
            height: 200px;
        }
        th {
            text-transform: capitalize;
            border: unset;
            padding: 10px;
            border-bottom: 1px solid grey;
            color: #ffffff;
            background: #324960;
        }
        th:last-child {
            border-right: unset;
        }
        td {
            text-transform: capitalize;
            border: unset;
            border-bottom: 1px solid grey;
        }
        .order-img {
            width: 250px;
        }
        button {
            display: block;
        }
        .table-container.left-side {
            margin-right: 50px;
        }
        .btn {
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    border: 2px solid #324960;
    border-radius: 0.6em;
    color: #324960;
    cursor: pointer;
    display: flex;
    align-self: center;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1;
    margin: 20px;
    padding: 1.2em 2.8em;
    text-decoration: none;
    text-align: center;
    text-transform: uppercase;
    font-family: "Montserrat", sans-serif;
    font-weight: 700;
    margin: 20px auto;
}
.btn a{
    text-decoration: none;
    color: #324960;
}
    </style>
    </head>
    <body>
        <h1>Pliz take screenshoot for the table of you order and send whatsapp</h1>
        <a href="https://wa.me/message/KUKW4XGE7B5PD1">contact us via whatsapp</a>
        <?php
        echo "welcome ". $_SESSION['username'];
        ?>
    </body>
</html>

