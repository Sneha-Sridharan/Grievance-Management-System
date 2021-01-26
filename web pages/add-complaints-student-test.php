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
	if(isset($_POST['submit']))
	{
		$rollno=$_SESSION['username'];
		$category=$_POST['category'];
		$info=$_POST['info'];
		$date=date('Y-m-d');
		$success="Complaint registered successfully";
		$error="Invalid details";
		$sql1="insert into complaint_registration (status,regdate) values('Pending','$date')";
		$result1=mysqli_query($conn,$sql1);
		if($result1)
		{
			#$sql2="select * from complaint_registration ORDER BY cid DESC";
			#$result2=mysqli_query($conn,$sql2);
			$sql2="select MAX(cid) from complaint_registration";
			$result2=mysqli_query($conn,$sql2);
			if($result2)
			{
				$row=$result2->fetch_assoc();
				$cid=$row['MAX(cid)'];
				$sql3="insert into complaint_category values('$info','$category','$cid')";
				$result3=mysqli_query($conn,$sql3);
				if($result3)
				{
					$sql4="insert into student_complaint values('$cid','$rollno')";
					$result4=mysqli_query($conn,$sql4);
					if($result4)
					{
						$_SESSION['add_complaints_student_success']=$success;
						header('location:view-complaints-student.php');
					}
					else
					{
						$_SESSION['add_complaints_student_error']=$error;
						header('location:add-complaints-student.php');
					}
				}
				else
				{
					$_SESSION['add_complaints_student_error']=$error;
					header('location:add-complaints-student.php');
				}
			}
		}
		else
		{
			$_SESSION['add_complaints_student_error']=$error;
			header('location:add-complaints-student.php');
		}
		
	}
	$conn->close();
?>