<?php
	session_start();
	if(isset($_SESSION['delete_complaints_faculty_success']))
	{
		echo '<script type="text/javascript">window.onload=function(){alert("Complaint deleted successfully!")}</script>';
		unset($_SESSION['delete_complaints_faculty_success']);
	}
	if(isset($_SESSION['delete_complaints_faculty_error']))
	{	
	echo '<script type="text/javascript">window.onload=function(){alert("Error while deleting the complaint! Please fill the form again")}</script>';
		unset($_SESSION['delete_complaints_faculty_error']);
	}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>STUDENT COMPLAINTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-----------STYLESHEETS AND FONTS------------------>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <!-------------SIDEBAR----------->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
				<?php 
					$name=$_SESSION['username'];
					echo "<h5 style='text-align: center; color:#f8b739;'>FACULTY - ".$name."</h5>";
				?>
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li>
            <a href="view-complaints-faculty.php">View complaints</a>
            </li>
	          <li>
	          <a href="add-complaints-faculty.php">Add complaints</a>
	          </li>
	          <li class="active">
            <a href="#">Delete complaints</a>
	          </li>
			  <li>
              <a href="reset_pwd_faculty.php">Reset Password</a>
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
              <a href="view-complaints-faculty.php">VIEW</a>
              </li>
              <li>
              <a href="add-complaints-faculty.php">ADD</a>
              </li>
              <li class="active">
              <a href="#">DELETE</a>
              </li>
			  <li>
              <a href="reset_pwd_faculty.php">RESET PASSWORD</a>
              </li>
              <li>
              <a href="logout.php">LOG OUT</a>
              </li>
            </ul>
            </div>
          </nav>
        </section>

        <!-------------DELETE COMPLAINTS TABLE----------->
        <section id="main">
        <h2 class="mb-4" style="text-align: center;">DELETE COMPLAINTS</h2>
        <table id="deletetable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Information</th>
			  <th>Status</th>
              <th>Reg. date</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
				<?php 
					#session_start();
					$servername="localhost";
					$username="root";
					$password="";
					$dbname="grievances";
					$conn=new mysqli($servername,$username,$password,$dbname);
					if(!$conn)
					{
						die('Could not connect: ' . mysql_error());
					}
					$empno=$_SESSION['username'];
					$sql1="select * from faculty_complaint where empno='$empno'";
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
								$status=$row2['status'];
								$sql3="select * from complaint_category where cid='$cid'";
								$result3=mysqli_query($conn,$sql3);
								$row3=$result3->fetch_assoc();
								if($status=='Pending')
								{
									echo "<tr>";
									echo "<td>".$row1['cid']."</td>";
									echo "<td>".$row3['category']."</td>";
									echo "<td>".$row3['info']."</td>";
									echo "<td>".$row2['status']."</td>";
									echo "<td>".date("d.m.Y", strtotime($row2['regdate']))."</td>";
									echo "<td><button class='btnDelete' onclick='checkDelete($cid)' name='delete'><i class='fas fa-trash-alt'></i></button></td>";
									echo "</tr>";
								}
								else
								{
									echo "<tr class='disabled'>";
										echo "<td>".$row1['cid']."</td>";
										echo "<td>".$row3['category']."</td>";
										echo "<td>".$row3['info']."</td>";
										echo "<td>".$row2['status']."</td>";
										echo "<td>".date("d.m.Y", strtotime($row2['regdate']))."</td>";
										echo "<td></td>";
										echo "</tr>";
								}
							}
							else
							{
								$_SESSION['delete_complaints_faculty_error']=$error;
								header('location:delete-complaints-faculty.php');
							}
						}
						
					}
					else
					{
						$_SESSION['delete_complaints_faculty_error']=$error;
						header('location:delete-complaints-faculty.php');
					}
					
				?>
          </tbody>
        </table>
        </section>
      </div>
        </div>
        
<!-- CONFIRM MODAL -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h3 class="modal-title" id="myModalLabel">Warning!</h3>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<form action="delete-complaints-student-test.php" method="POST">
            <div class="modal-body">
				<input type="hidden" name="data-id" id="data-id">
                 <h4 style="font-size: medium;"> Are you sure you want to delete?</h4>

            </div>
            <div class="modal-footer">
  				<button type='submit' name='delete' class='btn btn-danger' id='btnDelteYes' >Yes</button>
                
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
			</form>
        </div>
     </div>
</div>-->




    <!------------JAVASCRIPT------------>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script>
		/*$(document).ready(function(){
			$('.deletebtn').on('click',function(){
				$('#myModal').modal('show');
				$tr=$(this).closest('tr');
				
				var data=$tr.children("td").map(function(){
					return $(this).text;
				}).get();
				
				console.log(data);
				
				$('#data-id').val(data[0]);
			});
		});*/
	</script>
    <script>
 /*$('button.deletebtn').on('click', function (e) 
 {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    $('#myModal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');
    $('[data-id=' + id + ']').remove();
    $('#myModal').modal('hide');
});*/
    </script>
	<script language="javascript">
		function checkDelete(cid)
		{
			if(confirm('Are you sure you want to delete?'))
			{
				
				window.location.href='delete-complaints-faculty-test.php?cid='+cid+'';
				return true;
			}
		}
	</script>
  </body>
</html> 
