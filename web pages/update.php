<?php
session_start();
if(isset($_SESSION['update_error']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Invalid Username or Password")}</script>';
		unset($_SESSION['update_error']);
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
		<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

    <!-------------SIDEBAR----------->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <h5 style="text-align: center; color:#f8b739;">
            <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="grievances";
            $conn=new mysqli($servername,$username,$password,$dbname);
            if (!$conn)
            {
            die('Could not connect: ' . mysql_error());
          }
              echo "Member - ".$_SESSION['username'];
             ?>
          </h5>
			<ul class="list-unstyled components mb-5">
	          <li class="active">
            <a href="Member.php">View complaints</a>
             </li>
			 <li>
              <a href="reset_pwd_member.php">Reset Password</a>
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
              <li class="active">
              <a href="Member.php">VIEW ASSIGNED COMPLAINTS</a>
              </li>
			  <li>
              <a href="reset_pwd_member.php">RESET PASSWORD</a>
              </li>
              <li>
              <a href="logout.php">LOG OUT</a>
              </li>
            </ul>
            </div>
          </nav>
        </section>

        <!-------------COMPLAINTS HISTORY TABLE----------->
        <section id="main">
    <form class="reg-form" method="POST" action="updatestatus.php?id=<?php echo $_GET['id']?>">
	<h2 class="reg-form-title" style="text-align: center;"><b>UPDATE STATUS</b></h2>
	<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="status1" name="status" value="In Progress" checked>
  <label class="custom-control-label" for="status1">IN PROGRESS</label>
</div>

<!-- Group of default radios - option 2 -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="status2" name="status" value="Redressed">
  <label class="custom-control-label" for="status2">REDRESSED</label>
</div>


    <br>
    <input type="submit" name="submit" value="submit" id="submitbtn">
    </form>
  </section>
  
     <!------------JAVASCRIPT------------>
     <script src="js/jquery.min.js"></script>
     <script src="js/popper.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/main.js"></script>

  </body>
</html>
