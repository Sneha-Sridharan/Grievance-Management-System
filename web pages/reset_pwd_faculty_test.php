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
		$empno=$_SESSION['username'];
		#$empno="16Z124";
		$old_pwd=$_POST['old_pwd'];
		$new_pwd=$_POST['new_pwd'];
		$confirm_pwd=$_POST['confirm_pwd'];
		if($old_pwd===$new_pwd)
		{
			$_SESSION['same_pwd_faculty']=1;
			header('location:reset_pwd_faculty.php');
		}
		else if($new_pwd===$confirm_pwd)
		{
			$sql1="select * from faculty where empno='$empno' and password='$old_pwd'";
			$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result1)===1)
			{
				$sql2="update faculty set password='$new_pwd' where empno='$empno'";
				$result2=mysqli_query($conn,$sql2);
				if($result2)
				{
					$_SESSION['reset_pwd_faculty_success']=1;
					header('location:view-complaints-faculty.php');
				}
			}
			else
			{
				$_SESSION['reset_pwd_faculty_error2']=1;
				header('location:reset_pwd_faculty.php');
			}
		}
		else
		{
			$_SESSION['reset_pwd_faculty_error1']=1;
			header('location:reset_pwd_faculty.php');
		}
	}
	$conn->close();
?>