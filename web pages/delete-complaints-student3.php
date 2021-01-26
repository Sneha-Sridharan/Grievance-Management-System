<?php
	session_start();
	if(isset($_SESSION['delete_complaints_student_success']))
	{
		echo $_SESSION['delete_complaints_student_success'];
		unset($_SESSION['delete_complaints_student_success']);
	}
	if(isset($_SESSION['view_complaints_student_error']))
	{	
		echo '<script type="text/javascript">alert("Error while deleting the complaint! Please fill the form again")</script>';
		unset($_SESSION['view_complaints_student_error']);
	}
	if(isset($_SESSION['delete_complaints_student_error3']))
	{	
		echo "<script type='text/javascript'>alert('Error3 while deleting the complaint! Please fill the form again')</script>";
		unset($_SESSION['delete_complaints_student_error3']);
	}
	if(isset($_SESSION['delete_complaints_student_error2']))
	{	
		echo '<script type="text/javascript">alert("Error2 while deleting the complaint! Please fill the form again")</script>';
		unset($_SESSION['delete_complaints_student_error2']);
	}
	if(isset($_SESSION['delete_complaints_student_error1']))
	{	
		echo '<script type="text/javascript">alert("Error1 while deleting the complaint! Please fill the form again")</script>';
		unset($_SESSION['delete_complaints_student_error1']);
	}
	if(isset($_SESSION['delete_complaints_student_error']))
	{	
		echo '<script type="text/javascript">alert("Error while deleting the complaint! Please fill the form again")</script>';
		unset($_SESSION['delete_complaints_student_error']);
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
          <h5 style="text-align: center; color:#f8b739;">Student</h5>
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn0.iconfinder.com/data/icons/yellow-colored-set-3/512/man-512.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li>
            <a href="view-complaints-student.php">View complaints</a>
            </li>
	          <li>
	          <a href="add-complaints-student.php">Add complaints</a>
	          </li>
	          <li class="active">
            <a href="#">Delete complaints</a>
	          </li>
	          <li>
            <a href="#">Log out</a>
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
              <a href="view-complaints-student.php">VIEW</a>
              </li>
              <li>
              <a href="add-complaints-student.php">ADD</a>
              </li>
              <li class="active">
              <a href="#">DELETE</a>
              </li>
              <li>
              <a href="#">LOG OUT</a>
              </li>
            </ul>
            </div>
          </nav>
        </section>

        <!-------------DELETE COMPLAINTS TABLE----------->
        <section id="main">
        <h2 class="mb-4" style="text-align: center;">DELETE COMPLAINTS</h2>
        <table>
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
					$servername="localhost";
					$username="root";
					$password="";
					$dbname="grievances";
					$conn=new mysqli($servername,$username,$password,$dbname);
					if(!$conn)
					{
						die('Could not connect: ' . mysql_error());
					}
					$rollno='18z245';
					#$rollno=$_SESSION['username'];
					$count=0;
					$sql1="select * from student_complaint where rollno='$rollno'";
					$result1=mysqli_query($conn,$sql1);
						while($row1=$result1->fetch_assoc()) 
						{
							$cid=$row1['cid'];
							$sql2="select * from complaint_category where cid='$cid'";
							$result2=mysqli_query($conn,$sql2);
								$row2=$result2->fetch_assoc();
								$sql3="select * from complaint_registration where cid='$cid'";
							$result3=mysqli_query($conn,$sql3);
								$row3=$result3->fetch_assoc();
								$status=$row3['status'];
								if($status=='Pending')
								{
									echo "<tr>";
									echo "<td>".$row1['cid']."</td>";
									echo "<td>".$row2['category']."</td>";
									echo "<td>".$row2['info']."</td>";
									echo "<td>".$row3['status']."</td>";
									echo "<td>".$row3['regdate']."</td>";
									echo "<td><button class='delete-prompt' id=$cid><i class='fas fa-trash-alt'></i></button></td>";
									#echo "<td><button class='btn btn-danger deletebtn' data-toggle='modal' data-target='#delete'><i class='fas fa-trash-alt'></i></button></td>";
									echo "</tr>";
								}
								else
								{
									echo "<tr class='disabled'>";
									echo "<td>".$row1['cid']."</td>";
									echo "<td>".$row2['category']."</td>";
									echo "<td>".$row2['info']."</td>";
									echo "<td>".$row3['status']."</td>";
									echo "<td>".$row3['regdate']."</td>";
									echo "<td></td>";
									echo "</tr>";
								}
								
								
						}
				?>
          </tbody>
        </table>
        </section>
      </div>
        </div>
        
<!-- CONFIRM MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  				<button type='submit' name='delete' class='btn btn-danger delete-confirm'>Yes</button>
                
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
			</form>
        </div>
     </div>
</div>




    <!------------JAVASCRIPT------------>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script>
        $(document).ready(function () {
            //start of the document ready function
            //delcaring global variable to hold primary key value.
            var pryEmpId;
            $('.delete-prompt').click(function () {
                cId = $(this).attr('id');
                $('#myModal').modal('show');
            });

            $('.delete-confirm').click(function () {
                if (cId != '') {
                    $.ajax({
                        url: 'delete-complaints-student-test.php"',
                        data: { 'id': cId },
                        type: 'get',
                        success: function (data) {
                            if (data) {
                                //now re-using the boostrap modal popup to show success message.
                                //dynamically we will change background colour 
                                if ($('.modal-header').hasClass('alert-danger')) {
                                    $('.modal-header').removeClass('alert-danger').addClass('alert-success');
                                    //hide ok button as it is not necessary
                                    $('.delete-confirm').css('display', 'none');
                                }
                                $('.success-message').html('Record deleted successfully');
                            }
                        }, error: function (err) {
                            if (!$('.modal-header').hasClass('alert-danger')) {
                                $('.modal-header').removeClass('alert-success').addClass('alert-danger');
                                $('.delete-confirm').css('display', 'none');
                            }
                            $('.success-message').html(err.statusText);
                        }
                    });
                }
            });

            //function to reset bootstrap modal popups
            $("#myModal").on("hidden.bs.modal", function () {
                $(".modal-header").removeClass(' ').addClass('alert-danger');
                $('.delete-confirm').css('display', 'inline-block');
                $('.success-message').html('').html('Are you sure you wish to delete this record ?');
            });

            //end of the docuement ready function
        });
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
  </body>
</html> 
