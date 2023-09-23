<?php
session_start();
if($_SESSION['logged']==true){

require_once 'connection.php';
if ( isset($_POST['name']) &&   isset($_POST['quantity']) && isset($_POST['item_type']) && isset($_POST['price'])  )
{  
    $name= $_POST['name'];
    $quantity = $_POST['quantity'];
    $item_type = $_POST['item_type'];
    $price = $_POST['price'];
    $sql_add_query = "INSERT INTO items(name,quantity,item_type,price) VALUES('$name','$quantity','$item_type','$price')";
    mysqli_query($con, $sql_add_query);
      
     $id = mysqli_insert_id($con);
     
if (isset($_FILES['imageUpload'])) {
    // Get the file details
    $file_name = $_FILES['imageUpload']['name'];
    $file_tmp_name = $_FILES['imageUpload']['tmp_name'];
    $file_size = $_FILES['imageUpload']['size'];
    $file_error = $_FILES['imageUpload']['error'];
    $file_type = $_FILES['imageUpload']['type'];

    // Get the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    // Allowed file extensions
    $allowed_extensions = array("jpg", "jpeg", "png");

    // Check if the file extension is allowed
    if (in_array($file_ext, $allowed_extensions)) {
        // Check if there was an error uploading the file
        if ($file_error === 0) {
            // Check if the file size is less than the maximum allowed
            if ($file_size <= 1000000) {
                // Generate a unique file name`
                $file_name_new = uniqid('', true) . "." . $file_ext;
                
                // Set the destination for the uploaded file
                $file_destination = 'uploads/' . $file_name_new;

                // Move the uploaded file to the destination
                if (move_uploaded_file($file_tmp_name, $file_destination)) {
                    // Insert the file name and other details into the database
                    $sql_add_query = $sql_add_query = "INSERT INTO images(image, item_id) VALUES('$file_destination','$id')";
                    mysqli_query($con, $sql_add_query);
                }
            }
        }
    }
}

    
    
}
}else{
   header('location:login.php');
}




?>
<html>
    <head>
        <style>
            
        
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	list-style: none;
	font-family: 'Montserrat', sans-serif;
}

body{
	background: #84889c;
}
 
.wrapper{
	min-height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

.registration_form{
	background: #545871;
	padding: 25px;
	border-radius: 5px;
	width: 400px;
}

.registration_form .title{
	text-align: center;
	font-size: 20px;
	text-transform: uppercase;
	color: #ebd0ce;
	letter-spacing: 5px;
	font-weight: 700;
}

.form_wrap{
	margin-top: 35px;
}

.form_wrap .input_wrap{
	margin-bottom: 15px;
}

.form_wrap .input_wrap:last-child{
	margin-bottom: 0;
}

.form_wrap .input_wrap label{
	display: block;
	margin-bottom: 3px;
	color: #9597a6;
}

.form_wrap  input[type="text"],
.form_wrap  input[type="number"]{
	width: 100%;
	border-radius: 3px;
	border: 1px solid #9597a6;
	padding: 10px;
	outline: none;
}

.form_wrap  input[type="text"]:focus,
.form_wrap  input[type="number"]{
	border-color: #ebd0ce;
}

.form_wrap ul{
	background: #fff;
	padding: 8px 10px;
	border-radius: 3px;
	display: flex;
	justify-content: center;
}

.form_wrap ul li:first-child{
	margin-right: 15px;
}

.form_wrap ul .radio_wrap{
	position: relative;
	margin-bottom: 0;
}

.form_wrap ul .radio_wrap .input_radio{
	position: absolute;
	top: 0;
	right: 0;
	opacity: 0;
}

.form_wrap ul .radio_wrap span{
	display: inline-block;
	font-size: 14px;
	padding: 3px 20px;
	border-radius: 3px;
	color: #545871;
}

.form_wrap .input_radio:checked ~ span{
	background: #ebd0ce;
}

.form_wrap .submit_btn{
	width: 100%;
	background: #ebd0ce;
	padding: 10px;
	border: 0;
	border-radius: 3px;
	text-transform: uppercase;
	letter-spacing: 3px;
	cursor: pointer;
}

.form_wrap .submit_btn:hover{
	background: #ffd5d2;
}
.file-upload{
    display:block;
    text-align:center;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12px;
    margin-bottom: 20px;
}
 .file-upload .file-select{
    display:block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor:pointer;
    height:40px;
    line-height:40px;
    text-align:left;
    background:#FFFFFF;
    overflow:hidden;
    position:relative;
}
 .file-upload .file-select .file-select-button{
    background:#dce4ec;
    padding:0 10px;
    display:inline-block;
    height:40px;
    line-height:40px;
}
 .file-upload .file-select .file-select-name{
    line-height:40px;
    display:inline-block;
    padding:0 10px;
}
 .file-upload .file-select:hover{
    border-color:#34495e;
    transition:all .2s ease-in-out;
    -moz-transition:all .2s ease-in-out;
    -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s ease-in-out;
}
 .file-upload .file-select:hover .file-select-button{
    background:#34495e;
    color:#FFFFFF;
    transition:all .2s ease-in-out;
    -moz-transition:all .2s ease-in-out;
    -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s ease-in-out;
}
 .file-upload.active .file-select{
    border-color:#3fa46a;
    transition:all .2s ease-in-out;
    -moz-transition:all .2s ease-in-out;
    -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s ease-in-out;
}
 .file-upload.active .file-select .file-select-button{
    background:#3fa46a;
    color:#FFFFFF;
    transition:all .2s ease-in-out;
    -moz-transition:all .2s ease-in-out;
    -webkit-transition:all .2s ease-in-out;
    -o-transition:all .2s ease-in-out;
}
 .file-upload .file-select input[type=file]{
    z-index:100;
    cursor:pointer;
    position:absolute;
    height:100%;
    width:100%;
    top:0;
    left:0;
    opacity:0;
    filter:alpha(opacity=0);
}
 .file-upload .file-select.file-select-disabled{
    opacity:0.65;
}
 .file-upload .file-select.file-select-disabled:hover{
    cursor:default;
    display:block;
    border: 2px solid #dce4ec;
    color: #34495e;
    cursor:pointer;
    height:40px;
    line-height:40px;
    margin-top:5px;
    text-align:left;
    background:#FFFFFF;
    overflow:hidden;
    position:relative;
}
 .file-upload .file-select.file-select-disabled:hover .file-select-button{
    background:#dce4ec;
    color:#666666;
    padding:0 10px;
    display:inline-block;
    height:40px;
    line-height:40px;
}
 .file-upload .file-select.file-select-disabled:hover .file-select-name{
    line-height:40px;
    display:inline-block;
    padding:0 10px;
}

</style>
<script>
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Insert a new item
		</div>

		<form method="POST" action="owner.php" enctype='multipart/form-data'>
			<div class="form_wrap">
				<div class="input_grp">
					<div class="input_wrap">
						<label for="name">Name</label>
                                                <input type="text" id="name" name="name">
					</div>
				</div>
                                <div class="input_wrap">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity">
                                </div>
                                <div class="input_wrap">
					<label for="item_type">Type</label>
					<input type="text" id="item_type" name="item_type">
				</div>
				<div class="input_wrap">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price">
                                </div>
                                
                                <div class="file-upload">
                                    <div class="file-select">
                                      <div class="file-select-button" id="fileName">Choose File</div>
                                      <div class="file-select-name" id="noFile">No file chosen...</div> 
                                      <input type="file" name="imageUpload" id="chooseFile" accept="image/png,image/jpg, image/jpeg" multiple="multiple">
                                    </div>
                                </div>
				<div class="input_wrap">
					<input type="submit" value="Add" class="submit_btn">
                                        <td><a href="show_all_items.php">SHOW ALL ITEMS</a></td> 
				</div>
			</div>
                    

                    
		</form>
	</div>
</div>
        <?php
        echo "welcom prof:". $_SESSION['username'];
        ?>

       <form class="s" method="POST" action="owner.php" enctype='multipart/form-data'>
            <p>Insert a new item</p>
            <table>
                
                    <tr><td>name:</td><td><input type="text" name="name"/></td></tr> 
                   <tr> <td>quantity:</td><td><input type="number" name="quantity"/></td></tr> 
                <tr><td>item_type:</td><td><input type="text" name="item_type"/></td></tr>
                <tr><td>price:</td><td><input type="number" name="price"/></td> </tr>
                <input name="image" type="file" accept="image/png, image/jpeg" multiple="multiple"></input>
                <tr><td></td><td><input type="submit" value="ADD"/></td></tr>
                <tr><td><a href="show_all_items.php">SHOW ALL ITEMS</a></td></tr>
                
                

            </table>
        </form>
        
    
    </body>
</html>

