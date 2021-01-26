<?php
	session_start();
	if(isset($_SESSION['updatestatus_success']))
	{
		echo '<script type="text/javascript">window.onload = function(){alert("Status updated successfully")}</script>';
		unset($_SESSION['updatestatus_success']);
	}
	if(isset($_SESSION['updatestatus_error']))
	{
		echo '<script type="text/javascript">window.onload = function(){alert("Error while updating the status")}</script>';
		unset($_SESSION['updatestatus_error']);
	}
	if(isset($_SESSION['reset_pwd_member_success']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("Password changed successfully!")}</script>';
		unset($_SESSION['reset_pwd_member_success']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>MEMBER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-----------STYLESHEETS AND FONTS------------------>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css">
	<style>
	.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left:115px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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
            <a href="#">View complaints</a>
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
              <a href="#">VIEW ASSIGNED COMPLAINTS</a>
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
        <h2 class="mb-4" style="text-align: center;">COMPLAINTS HISTORY</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Information</th>
              <th>Reg. date</th>
              <th>Status</th>
              </tr>
          </thead>
          <?php

              // Create connection
              $conn = mysqli_connect($servername, $username, $password, $dbname);
              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "select * from assign_complaint where memid='$_SESSION[username]' AND status IN('Assigned','In Progress') ORDER BY assigndate";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result)>0)
               {
                // output data of each row
                while($row = mysqli_fetch_assoc($result))
                 {
                    $id=$row['cid'];
					echo "<tbody>";
					echo "<tr class='clickable-row' data-href='update.php?id=$id' data-toggle='tooltip' data-placement='bottom' title='Click to update status'>";
					echo "<td>$row[cid]</td>";
					$sql1="select * from complaint_category where cid='$id'";
					$result1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($result1);
					echo "<td>$row1[category]</td>";
					echo "<td>$row1[info]</td>";
					echo "<td>".date("d.m.Y", strtotime($row['assigndate']))."</td>";
					echo "<td>$row[status]</td>";
					$sql2="select * from comments where cid='$id'";
					$result2=mysqli_query($conn,$sql2);
					echo "</tr></tbody></table>";
					echo "<div class='dropdown'>";
					echo "<button style='margin-left:115px' class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Comments</button>";
					echo "<div class='dropdown-content' aria-labelledby='dropdownMenuButton'>";
					while($row2=mysqli_fetch_assoc($result2))
					{
						echo "<a class='dropdown-item' href='#'>$row2[comments]</a>";
					}
					echo "</div>";
					echo "</div><br><br></tbody></table>";
                 }
               }
               $conn->close();
              ?>
			</tbody>
        </table>
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
