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
	#$rollno='18z245';
	$cid=$_GET['cid'];
	#$cid=$_SESSION['del_cid'];
	$sql="select * from complaint_registration where cid='$cid' and status='Pending'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)===1)
	{
		$sql1="delete from complaint_category where cid='$cid'";
		$result1=mysqli_query($conn,$sql1);
		if($result1)
		{
			$sql2="delete from student_complaint where cid='$cid'";
			$result2=mysqli_query($conn,$sql2);
			if($result2)
			{
				$sql3="delete from complaint_registration where cid='$cid'";
				$result3=mysqli_query($conn,$sql3);
				if($result3)
				{
					$_SESSION['delete_complaints_student_success']=1;
					header('location:delete-complaints-student.php');
					#echo "hello inside if3";
				}
				else
				{
					$_SESSION['delete_complaints_student_error']=1;
					header('location:delete-complaints-student.php');
				}
			}
			else
			{
				$_SESSION['delete_complaints_student_error']=1;
				header('location:delete-complaints-student.php');
			}				
		}
		else
		{
			$_SESSION['delete_complaints_student_error']=1;
			header('location:delete-complaints-student.php');
		}	
	}
	else
	{
		$_SESSION['delete_complaints_student_error']=1;
		header('location:delete-complaints-student.php');
	}
	
	$conn->close();	
?>