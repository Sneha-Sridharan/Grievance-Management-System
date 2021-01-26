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
		$memid=$_SESSION['username'];
		#$memid="14Y123";
		$old_pwd=$_POST['old_pwd'];
		$new_pwd=$_POST['new_pwd'];
		$confirm_pwd=$_POST['confirm_pwd'];
		if($old_pwd===$new_pwd)
		{
			$_SESSION['same_pwd_admin']=1;
			header('location:reset_pwd_admin.php');
		}
		else if($new_pwd===$confirm_pwd)
		{
			$sql1="select * from admin_member where memid='$memid' and password='$old_pwd'";
			$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result1)===1)
			{
				$sql2="update admin_member set password='$new_pwd' where memid='$memid'";
				$result2=mysqli_query($conn,$sql2);
				if($result2)
				{
					$_SESSION['reset_pwd_admin_success']=1;
					header('location:admin-view-unassigned.php');
				}
			}
			else
			{
				$_SESSION['reset_pwd_admin_error2']=1;
				header('location:reset_pwd_admin.php');
			}
		}
		else
		{
			$_SESSION['reset_pwd_admin_error1']=1;
			header('location:reset_pwd_admin.php');
		}
	}
	$conn->close();
?>