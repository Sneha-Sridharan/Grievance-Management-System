<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-----------STYLESHEETS AND FONTS------------------>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <h5 style="text-align: center; color:#f8b739;">Admin - <?php echo $_SESSION["username"];?></h5>
			<ul class="list-unstyled components mb-5">
	          <li class="active">
            <a href="#">View & assign complaints</a>
            </li>
	          <li>
	          <a href="admin-view-assigned.php">View assigned complaints</a>
	          </li>
	          <li>
            <a href="admin-view-completed.php">View completed complaints</a>
	          </li>
			  <li>
              <a href="reset_pwd_admin.php">Reset Password</a>
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
              <a href="#">VIEW & ASSIGN</a>
              </li>
              <li>
              <a href="admin-view-assigned.php">VIEW ASSIGNED</a>
              </li>
              <li>
              <a href="admin-view-completed.php">VIEW COMPLETED</a>
              </li>
			  <li>
              <a href="reset_pwd_admin.php">RESET PASSWORD</a>
              </li>
              <li>
              <a href="logout.php">LOGOUT</a>
              </li>
            </ul>
            </div>
          </nav>
        </section>
		<section id="main">
		<form class="reg-form" method="POST" action="assign-complaint-test.php?id=<?php echo $_GET['id']?>">
            <h2 class="reg-form-title" style="text-align: center;"><b>ASSIGN COMPLAINT</b></h2>
            <label for="memberid" style="display: block;">
              Member Name
            </label>
            <select id="memberid" name="memberid" required>
                <div class="dropdown-content">
            <option disabled selected value> -- Select a member -- </option>
			<?php
				session_start();
				$servername="localhost";
				$username="root";
				$password="";
				$dbname="grievances";
				$conn=new mysqli($servername,$username,$password,$dbname);
				if (!$conn)
				{
					die('Could not connect: ' . mysql_error());
				}
				$sql="select memid,name from admin_member where role='Member'";
				$result=$conn->query($sql);
				while($row = $result->fetch_assoc()) {
					$id=$row['memid'];
					$name=$row['name'];
					echo "<option value='$id'>".$id." - ".$name."</option>";
				}
			?>
            </div>
            </select>
            <label for="info" style="display: block;">
                Comments
            </label>
            <div class="input_fields_wrap">
			<div><input type="text" name="mytext[]"><button class="add_field_button">+</button></div>
			</div>
            <input type="submit" name="submit" value="Assign" id="submitbtn">
          </form>
        </section>
      </div>  
	  </div>
    <!------------JAVASCRIPT------------>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script>
	$(document).ready(function() {
	var max_fields      = 3; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	 })
   });
   </script>
  </body>
</html>