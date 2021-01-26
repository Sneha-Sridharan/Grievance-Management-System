<?php
	session_start();
	if(isset($_SESSION['add_complaints_student_success']))
	{	
		echo '<script type="text/javascript">window.onload=function(){alert("Complaint registered successfully!")}</script>';
		unset($_SESSION['add_complaints_student_success']);
	}
	if(isset($_SESSION['view_complaints_student_error']))
	{	
	echo '<script type="text/javascript">window.onload=function(){alert("Error while viewing the complaint!")}</script>';
		unset($_SESSION['view_complaints_student_error']);
	}
	if(isset($_SESSION['same_pwd_student']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("Password changed successfully!")}</script>';
		unset($_SESSION['same_pwd_student']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>STUDENT COMPLAINTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
				<?php 
					$name=$_SESSION['username'];
					echo "<h5 style='text-align: center; color:#f8b739;'>STUDENT - ".$name."</h5>";
				?>
				<h5 style="text-align: center; color:#f8b739;"></h5>
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
              <a href="#">View complaints</a>
            </li>
	          <li>
	              <a href="add-complaints-student.php">Add complaints</a>
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
	        	<p>
						  This is a platform to address your grievances in relation to <i class="icon-heart" aria-hidden="true"></i> <a href="http://www.psgtech.edu/" target="_blank">PSG College of Technology </a>only.
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <section id="nav-bar">
          <nav id="thenav" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="list-unstyled components mb-5">
              <li class="active">
              <a href="#">VIEW</a>
              </li>
              <li>
              <a href="add-complaints-student.php">ADD</a>
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
        <section id="main">
        <h2 class="mb-4" style="text-align: center;">COMPLAINTS HISTORY</h2>
        <table>
          <thead>
            <tr>
              <th>ID
              <th>Category
              <th>Information
              <th>Status
              <th>Reg. Date
          </thead>
          <tbody>
				<?php 
					$servername="localhost";
					$username="root";
					$password="";
					$dbname="grievances";
					$conn=new mysqli($servername,$username,$password,$dbname);
					if(!$conn)
					{
						die('Could not connect: ' . mysql_error());
					}
					$rollno=$_SESSION['username'];
					$sql1="select * from student_complaint where rollno='$rollno' ORDER BY cid DESC";
					$result1=mysqli_query($conn,$sql1);
					if($result1)
					{
						while($row1=$result1->fetch_assoc()) 
						{
							$cid=$row1['cid'];
							$sql2="select * from complaint_registration where cid='$cid'";
							$result2=mysqli_query($conn,$sql2);
							if($result2)
							{
								$row2=$result2->fetch_assoc();
								$sql3="select * from complaint_category where cid='$cid'";
								$result3=mysqli_query($conn,$sql3);
								$row3=$result3->fetch_assoc();
								echo "<tr>";
								echo "<td>".$row1['cid']."</td>";
								echo "<td>".$row3['category']."</td>";
								echo "<td>".$row3['info']."</td>";
								echo "<td>".$row2['status']."</td>";
								echo "<td>".date("d.m.Y", strtotime($row2['regdate']))."</td>";
								echo "</tr>";
							}
							else
							{
								$_SESSION['view_complaints_student_error']=$error;
								header('location:view-complaints-student-error');
							}
							
						}
						
					}
					else
					{
						$_SESSION['view_complaints_student_error']=$error;
						header('location:view-complaints-student-error');
					}
					
				?>		
          </tbody>
        </table>
        <br>
        </section>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>