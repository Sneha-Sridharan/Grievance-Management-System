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
	if(isset($_POST['delete']))
	{
		$cid=$_GET['id'];
			$sql1="delete from complaint_registration where cid='$cid'";
			$result1=mysqli_query($conn,$sql1);
			if($result1)
			{
				$sql2="delete from student_complaint where cid='$cid'";
				$result2=mysqli_query($conn,$sql2);
				if($result2)
				{
					$sql3="delete from complaint_category where cid='$cid'";
					$result3=mysqli_query($conn,$sql3);
					if($result3)
					{
						$_SESSION['delete_complaints_student_success']=1;
						header('location:delete-complaints-student3.php');
						#echo "hello inside if3";
					}
					else
					{
						$_SESSION['delete_complaints_student_error3']=$cid;
						header('location:delete-complaints-student3.php');
					}
				}
				else
				{
					$_SESSION['delete_complaints_student_error2']=1;
					header('location:delete-complaints-student3.php');
				}				
			}
			else
			{
				$_SESSION['delete_complaints_student_error1']=1;
				header('location:delete-complaints-student3.php');
			}
		
	}
	
	
	$conn->close();	
?>