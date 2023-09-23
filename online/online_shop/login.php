
<?php


if (isset($_POST['username'],$_POST['password']))
{
require_once 'connection.php';
extract($_POST);
$query="SELECT * FROM users WHERE username='$username' and password='$password'";

$result=mysqli_query($con,$query);
$r=mysqli_num_rows($result);
if($r>0){
    $row=  mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['logged']=TRUE;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    if($row['type']=='owner'){
        header('location:owner.php');
        
    }else if($row['type']=='client'){
        header('location:client.php');
    }
    
}else {
    header('location:login.php');
}
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

.form_wrap .input_grp{
	display: flex;
	justify-content: space-between;
}

.form_wrap .input_grp  input[type="text"]{
	width: 165px;
}

.form_wrap  input[type="text"],
.form_wrap  input[type="password"]{
	width: 100%;
	border-radius: 3px;
	border: 1px solid #9597a6;
	padding: 10px;
	outline: none;
}

.form_wrap  input[type="text"]:focus{
	border-color: #ebd0ce;
}

.form_wrap .input_wrap a {
    color: #fff;
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
</style>
    </head>
    <body>
        <div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Login
		</div>

		<form method="POST" action="login.php">
			<div class="form_wrap">
				<div class="input_grp">
					<div class="input_wrap">
						<label for="username">User Name</label>
						<input type="text" id="username" name="username">
					</div>
                                    <div class="input_wrap">
					<label for="password">Password</label>
					<input type="password" id="password" name="password">
				</div>
				</div>
				
				<div class="input_wrap">
					<input type="submit" value="login" class="submit_btn">
				</div>
                                <div class="input_wrap">
					<a href="registration.php">create new account?</a>
				</div>
			</div>
		</form>
	</div>
             <script>    
           document.getElementById("username").submit = chkPasswords; 
document.getElementById("password").onblur= chkPasswords;
document.getElementById("username").onblur = chkusername; 
document.getElementById("password").submit= chkusername;

function chkPasswords() { 
  var us = document.getElementById("username");

  
  
  if (us.value == "") {
    alert("You did not enter a username \n" +
          "Please enter one now");
    us.focus();
    return false;
  }
else{
    return true;
}}
function chkusername() { 
  
  var pas = document.getElementById("password");
  
  
 if (pas.value == "") {
    alert("You did not enter a password \n" +
          "Please enter one now");
    pas.focus();
    return false;}

else{
    return true;
}}
</script> 
</div>
        
        <form action="login.php" method="post">
            username:<input type="text"   name="username"><br/>
            password:<input type="password" name="password"><br/>
            <input type="submit" value="login">
            <a href="registration.php">create new account?</a>
           
        </form>
    </body>
</html>



