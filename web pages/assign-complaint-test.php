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
		$memid=$_POST['memberid'];
		$cid=$_GET['id'];
		$sql="INSERT INTO assign_complaint VALUES('$memid','Assigned',curdate(),'$cid')";
		$sql2="UPDATE complaint_registration SET status='Assigned' WHERE cid='$cid'";
		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		$number = count($_POST['mytext']);  
		for($i = 0; $i < $number; $i++)
		{
			$comment = mysqli_real_escape_string($conn, $_POST['mytext'][$i]);
			if (empty(trim($comment))) continue;
			$sql1 = "INSERT INTO comments VALUES('$cid', '$comment')";
			$result1=mysqli_query($conn, $sql1);
		}
		if($result && $result1)
		{
			$_SESSION['assign_complaint_success']=1;
			header('Location:admin-view-unassigned.php');
		}
		else
		{
			$_SESSION['assign_complaint_error'] = 1;
			header("Location:admin-view-unassigned.php");
		}
	}
?>