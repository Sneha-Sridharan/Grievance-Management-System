<?php
	session_start();
	if(isset($_SESSION['assign_complaint_success']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Complaint assigned successfully")}</script>';
		unset($_SESSION['assign_complaint_success']);
	}
	if(isset($_SESSION['assign_complaint_error']))
	{	
		echo '<script type="text/javascript">window.onload = function(){alert("Error while assigning the complaint.")}</script>';
		unset($_SESSION['assign_complaint_error']);
	}
	if(isset($_SESSION['reset_pwd_admin_success']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("Password changed successfully!")}</script>';
		unset($_SESSION['reset_pwd_admin_success']);
	}
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
    
    <!-------------SIDEBAR----------->
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
              <a href="reset_pwd_admin_member.php">RESET PASSWORD</a>
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
        <h2 class="mb-4" style="text-align: center;">COMPLAINTS HISTORY</h2>
        <table id='t01'>
          <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Information</th>
              <th>Reg. date</th>
			</tr>
          </thead>
          <tbody>
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
				$sql="select * from complaint_registration where status='Pending' order by regdate";
				$result=$conn->query($sql);
				while($row = $result->fetch_assoc()) {
					$id=$row['cid'];
					echo "<tr class='clickable-row' data-href='assign-complaint.php?id=$id' data-toggle='tooltip' data-placement='bottom' title='Click to assign complaint'>";
					echo "<td>".$row['cid']."</td>";
					$sql1="select * from complaint_category where cid='$id'";
					$result1=$conn->query($sql1);
					$row1 = $result1->fetch_assoc();
					echo "<td>".$row1['category']."</td>";
					echo "<td>".$row1['info']."</td>";
					echo "<td>".date("d.m.Y", strtotime($row['regdate']))."</td>";
					echo "</tr>";
				}
			?>
          </tbody>
        </table>
		<br><h4 class="mb-4" style="margin-left: 115px;font-size:15px;color:#f8b739">Click on a complaint to assign it</h4>
        </section>
      </div>
		</div>

    <!------------JAVASCRIPT------------>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script>jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});</script>
  </body>
</html>