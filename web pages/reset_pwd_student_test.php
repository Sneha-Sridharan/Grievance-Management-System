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
		#$rollno="18z265";
		$old_pwd=$_POST['old_pwd'];
		$new_pwd=$_POST['new_pwd'];
		$confirm_pwd=$_POST['confirm_pwd'];
		if($old_pwd===$new_pwd)
		{
			$_SESSION['same_pwd_student']=1;
			header('location:reset_pwd_student.php');
		}
		else if($new_pwd===$confirm_pwd)
		{
			$sql1="select * from students where rollno='$rollno' and password='$old_pwd'";
			$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result1)===1)
			{
				$sql2="update students set password='$new_pwd' where rollno='$rollno'";
				$result2=mysqli_query($conn,$sql2);
				if($result2)
				{
					$_SESSION['reset_pwd_student_success']=1;
					header('location:view-complaints-student.php');
				}
			}
			else
			{
				$_SESSION['reset_pwd_student_error2']=1;
				header('location:reset_pwd_student.php');
			}
		}
		else
		{
			$_SESSION['reset_pwd_student_error1']=1;
			header('location:reset_pwd_student.php');
		}
	}
	$conn->close();
?>