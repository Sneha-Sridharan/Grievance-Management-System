<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="grievances";
	unset($_SESSION['assign_complaint_success']);
	unset($_SESSION['assign_complaint_error']);
	$conn=new mysqli($servername,$username,$password,$dbname);
	if (!$conn)
	{
		die('Could not connect: ' . mysql_error());
	}
	if(isset($_POST['submit']))
	{
		$cid=$_GET['id'];
		$number = count($_POST['mytext']);  
		for($i = 0; $i < $number; $i++)
		{
			$comment = mysqli_real_escape_string($conn, $_POST['mytext'][$i]);
			if (empty(trim($comment))) continue;
			$sql1 = "INSERT INTO comments VALUES('$cid', '$comment')";
			$result1=mysqli_query($conn, $sql1);
		}
		if($result1)
		{
			$_SESSION['add_comment_success']=1;
			header('Location:admin-view-assigned.php');
		}
		else
		{
			$_SESSION['add_comment_error'] = 1;
			header("Location:admin-view-assigned.php");
		}
	}
?>