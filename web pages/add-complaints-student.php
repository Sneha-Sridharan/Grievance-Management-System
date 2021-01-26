<?php
	session_start();
	if(isset($_SESSION['add_complaints_student_error']))
	{	
		echo '<script type="text/javascript">window.onload=function(){alert("Error while adding the complaint! Please fill the form again")}</script>';
		unset($_SESSION['add_complaints_student_error']);
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
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      
    <!-------------SIDEBAR----------------->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
				<?php 
					$name=$_SESSION['username'];
					echo "<h5 style='text-align: center; color:#f8b739;'>STUDENT - ".$name."</h5>";
				?>
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	            <ul class="list-unstyled components mb-5">
	            <li>
                <a href="view-complaints-student.php">View complaints</a>
                </li>
	            <li class="active">
	            <a href="#">Add complaints</a>
	            </li>
	            <li>
                <a href="delete-complaints-student.php">Delete complaints</a>
	            </li>
				<li>
				<a href="reset_pwd_student.php">Reset Password</a>
				</li>
	            <li>
                <a href="logout.php">Log out</a>
	            </li>
                </ul>     
	            <div class="footer">
			    This is a platform to address your grievances in relation to <i class="icon-heart" aria-hidden="true"></i> <a href="http://www.psgtech.edu/" target="_blank">PSG College of Technology </a>only.
	            </div>
            </nav> 

    <!------- PAGE CONTENT --------------->
    <div id="content" class="p-4 p-md-5">
    
    <!---------TOP NAVBAR---------->
        <section id="nav-bar">
          <nav id="thenav" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="list-unstyled components mb-5">
              <li>
              <a href="view-complaints-student.php">VIEW</a>
              </li>
              <li class="active">
              <a href="#">ADD</a>
              </li>
              <li>
              <a href="delete-complaints-student.php">DELETE</a>
              </li>
			  <li>
				<a href="reset_pwd_student.php">RESET PASSWORD</a>
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
        <form class="reg-form" method="POST" action="add-complaints-student-test.php">
            <h2 class="reg-form-title" style="text-align: center;"><b>COMPLAINTS REGISTRATION</b></h2>
       
            <label for="category" style="display: block;">
              Category
            </label>
            <select id="category" name="category" required>
                <div class="dropdown-content">
            <option disabled selected value> -- Select a category -- </option>
              <option value="Campus">Campus</option>
              <option value="Classroom">Classroom</option>
              <option value="Canteen">Canteen</option>
              <option value="Hostel">Hostel</option>
              <option value="Sanitation">Sanitation</option>
              <option value="Lab">Laboratory</option>
              <option value="Faculty">Faculty</option>
              <option value="Library">Library</option>
            </div>
            </select>
            <label for="info" style="display: block;">
                Complaint
            </label>
            <textarea name="info" id="info" placeholder=" Enter your complaint here " required></textarea><br>
            <input type="submit" name="submit" value="Register" id="submitbtn">
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