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
	$cid=$_GET['cid'];
	$sql="select * from complaint_registration where cid='$cid' and status='Pending'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===1)
	{
		$sql1="delete from complaint_category where cid='$cid'";
		$result1=mysqli_query($conn,$sql1);
		if($result1)
		{
			$sql2="delete from faculty_complaint where cid='$cid'";
			$result2=mysqli_query($conn,$sql2);
			if($result2)
			{
				$sql3="delete from complaint_registration where cid='$cid'";
				$result3=mysqli_query($conn,$sql3);
				if($result3)
				{
					$_SESSION['delete_complaints_faculty_success']=1;
					header('location:delete-complaints-faculty.php');
				}
				else
				{
					$_SESSION['delete_complaints_faculty_error']=1;
					header('location:delete-complaints-faculty.php');
				}
			}
			else
			{
				$_SESSION['delete_complaints_faculty_error']=1;
				header('location:delete-complaints-faculty.php');
			}				
		}
		else
		{
			$_SESSION['delete_complaints_faculty_error']=1;
			header('location:delete-complaints-faculty.php');
		}	
	}
	else
	{
		$_SESSION['delete_complaints_faculty_error']=1;
		header('location:delete-complaints-faculty.php');
	}
	
	$conn->close();	
?>