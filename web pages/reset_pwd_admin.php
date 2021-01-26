<?php
	session_start();
	if(isset($_SESSION['same_pwd_admin']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("New password cannot be same as the old password!")}</script>';
		unset($_SESSION['same_pwd_admin']);
	}
	if(isset($_SESSION['reset_pwd_admin_error1']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("New password and confirm new password did not match!")}</script>';
		unset($_SESSION['reset_pwd_admin_error1']);
	}
	if(isset($_SESSION['reset_pwd_admin_error2']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("Incorrect old password!")}</script>';
		unset($_SESSION['reset_pwd_admin_error2']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>STUDENT COMPLAINTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-----------STYLESHEETS AND FONTS----------->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
      
    <!-------------SIDEBAR----------------->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <h5 style="text-align: center; color:#f8b739;">Admin - <?php echo $_SESSION["username"];?></h5>
			<ul class="list-unstyled components mb-5">
	          <li>
            <a href="admin-view-unassigned.php">View & assign complaints</a>
            </li>
	          <li>
	          <a href="admin-view-assigned.php">View assigned complaints</a>
	          </li>
	          <li>
            <a href="admin-view-completed.php">View completed complaints</a>
	          </li>
			  <li class="active">
              <a href="#">Reset Password</a>
              </li>
	          <li>
            <a href="logout.php">Log out</a>
	          </li>
          </ul>     
	        <div class="footer">
					This is a platform to address your grievances in relation to <i class="icon-heart" aria-hidden="true"></i> <a href="http://www.psgtech.edu/" target="_blank">PSG College of Technology </a>only.
	        </div>
	      </div>
    	</nav>

        <!---------------PAGE CONTENT-------------->
      <div id="content" class="p-4 p-md-5">

        <!-----------TOP NAVBAR----------------->
        <section id="nav-bar">
          <nav id="thenav" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="list-unstyled components mb-5">
              <li>
              <a href="admin-view-unassigned.php">VIEW & ASSIGN</a>
              </li>
              <li>
              <a href="admin-view-assigned.php">VIEW ASSIGNED</a>
              </li>
              <li>
              <a href="admin-view-completed.php">VIEW COMPLETED</a>
              </li>
			  <li class="active">
              <a href="#">RESET PASSWORD</a>
              </li>
              <li>
              <a href="logout.php">LOG OUT</a>
              </li>
            </ul>
            </div>
          </nav>
        </section>

    <!----------COMPLAINT REGISTRATION FORM------------->
    <section id="main">
        <form class="reg-form" method="POST" action="reset_pwd_admin_test.php">
            <h2 class="reg-form-title" style="text-align: center;"><b>COMPLAINTS REGISTRATION</b></h2>
            <label for="old_pwd" style="display: block;">
              Enter old password
            </label>
			<input type="password" name="old_pwd" required><br>
            <label for="new_pwd" style="display: block;">
              Enter new password
            </label>
			<input type="password" name="new_pwd" required><br>
            <label for="confirm_pwd" style="display: block;">
              Confirm new password
            </label>
            <input type="password" name="confirm_pwd" required><br>
            <input type="submit" name="submit" id="submitbtn">
          </form>
    </section>
    </div>
    </div>
    
    <!-----------JAVASCRIPT---------->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>