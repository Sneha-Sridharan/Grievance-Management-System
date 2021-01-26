<?php
session_start();
if(isset($_SESSION['admin-login-error']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Invalid Username or Password")}</script>';
		unset($_SESSION['admin_login_error']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>ADMIN LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-----------STYLESHEETS AND FONTS------------------>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <style>
.column {
  width: 50%;
  padding: 60px;
  margin: 0px 0px 0px 250px;
  background-color:rgba(220,220,220,0.9);
}
input{
  width: 100%;
  padding: 10px;
  margin: 5px 0 22px 0;
  border: none;
  font-family: "Poppins", Arial, sans-serif;
  background: #ffffff;
  font-size:18px;
}
span{
  font-size:20px;
  color:red;
}
input[type="submit"]{
    border-radius: 20px;
    height:70px;
    border: 0;
    width:200px;
    background-color:#f8b739;
	color:white;
    margin-left:130px;
    font-size:22px;
	font-family: "Poppins", Arial, sans-serif;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.38);
}
form{
font-family: "Poppins", Arial, sans-serif;
font-size:20px;
}
</style>
  <body>

    <!-------------SIDEBAR----------->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
          <h5 style="text-align: center; color:#f8b739;">Login</h5>
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li>
            <a href="Studentlogin.php">Student Login</a>
            </li>
	          <li>
	          <a href="Facultylogin.php">Faculty Login</a>
	          </li>
	          <li class="active">
            <a href="#">Admin Login</a>
	          </li>
            <li >
            <a href="Memberlogin.php">Member Login</a>
	          </li>
          </ul>
	        <div class="footer">
					This is a platform to address your grievances in relation to <i class="icon-heart" aria-hidden="true"></i> <a href="http://www.psgtech.edu/" target="_blank">PSG College of Technology </a>only.
	        </div>
	      </div>
    	</nav>

        <!---------------PAGE CONTENT-------------->
      <div id="content" class="p-4 p-md-5">

        <!-------------COMPLAINTS HISTORY TABLE----------->
          <div class="column">
    <h1 style="text-align:center;">ADMIN LOGIN</h1><br>
    <form method="POST" action="Adminlogintest.php">
  Username
    <input type="text" name="username" required>
   Password
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="submit" value="LOGIN">
    </form>
  </div>

     <!------------JAVASCRIPT------------>
     <script src="js/jquery.min.js"></script>
     <script src="js/popper.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/main.js"></script>

  </body>
</html>
<?php
    unset($_SESSION['error']);
?>
