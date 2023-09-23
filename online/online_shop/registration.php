<?php

require_once 'connection.php';
if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone_nb']) && isset($_POST['type'])  )
{  
    $username= $_POST['username'];
    $password= $_POST['password'];
    $phone_nb= $_POST['phone_nb'];
    $type= $_POST['type'];
    
    
   
 $sql_add_query = "INSERT INTO users(username,password,phone_nb,type)VALUES('$username','$password','$phone_nb','$type')";
 $add= mysqli_query($con, $sql_add_query);
 if(mysqli_query($con, $sql_add_query) === FALSE) {
         die("Could not add the new register");


}else{
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

.form_wrap  input[type="text"]:focus,
.form_wrap  input[type="password"]{
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
</style>

    </head>
    <body>
        
        <div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Insert a new user
		</div>

		<form method="POST" action="registration.php">
			<div class="form_wrap">
				<div class="input_grp">
					<div class="input_wrap">
						<label for="username">User Name</label>
                                                <input type="text"  name="username" id="username" required>
					</div>
					<div class="input_wrap">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" required>
					</div>
				</div>
				<div class="input_wrap">
					<label for="phone">phone number</label>
                                        <input type="text" id="phone" name="phone_nb" required>
				</div>
                                <div class="input_wrap">
					<label for="email">Type</label>
					<input type="text" id="type" name="type" required>
				</div>
				<div class="input_wrap">
					<input type="submit" value="create" class="submit_btn">
                                           
				</div>

			</div>
		</form>
	</div>
                                        <script>    
 function validate(){
                var nam=document.getElementById("username").value;
                var pw=document.getElementById("password").value;
                var phone=document.getElementById("phone").value;
                var type=document.getElementById("type").value;
               
               
                if(nam.search(/^[A-Z]+\w**$/)==-1){
                    alert("name should start with capital letter");
                    return false;
                }
                 if(pw.match(/^(?=.{6})(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/)==null){
                     alert("password should  of at least 6 characters with capital, lowercase and number");
                 
                return false;}
            else{
                return true;
            }
        }
</script> 
</div>
       
        
    
    </body>
</html>


