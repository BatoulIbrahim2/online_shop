<?php
                session_start();
                if($_SESSION['logged']==true){
                require_once 'connection.php';
    
                
                echo<<<_END
                <table border="2" class="table-container">
                <tr><th>name</th><th>quantity</th><th>item_type</th><th>price $</th><th>delete</th><th>image</th></tr>

_END;
                $query="SELECT items.id as id ,items.name, items.quantity, items.item_type,items.price,images.image  FROM items left join images on items.id = images.item_id group by items.id";
                $result=  mysqli_query($con, $query);
                $r= mysqli_num_rows($result);
                for($i=0;$i<$r;$i++)
                {
                $row=mysqli_fetch_assoc($result);
                echo"<tr><td>".$row['name']."</td><td>".$row['quantity']."</td><td>".$row['item_type']."</td><td>".$row['price']."</td>"
                     . "<td><a href ='delete.php?id=".$row['id']."'><img src='trash-icon-grey.png' hieght='20px' width='20px'></a></td><td class='img-td' ><img src=".$row['image']." /></td>"
                        . "</tr>";

            }
            

            echo"</table>";


                echo"<button class='btn'><a href='logout.php'>logout</a></button>";}else{
   header('location:login.php');
}
        




?><!DOCTYPE html>
<html>
  
<head>
    <style>
        .table-container {
            border-spacing: 0;
            text-align: center;    
            outline: none;
            border: none;
        }
        .img-td,
        .img-td img{
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
    </style>
</head>
  
<body>
    <center>
        <h1>welcome to our website</h1>
        <h2>
            
        </h2>
    </center>
</body>
  
</html>
    



