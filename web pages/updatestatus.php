<html>
<body>
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
	$s1=$s2=$s3=0;
	$cid=$_GET['id'];
	$status=$_POST['status'];
	$sql="select * from assign_complaint WHERE cid='$cid'";
	$result=$conn->query($sql);
	$error1="CID is incorrect";
	if(isset($status))
	{
		$sql1="update assign_complaint set status='$status' where cid='$cid'";
		$sql2="update complaint_registration set status='$status' where cid='$cid'";
		$result1=mysqli_query($conn,$sql1);
		$result2=mysqli_query($conn,$sql2);
		if($status=='Redressed')
		{
			$sql3="insert into comleted_complaint values('$cid',curdate())";
			$result3=mysqli_query($conn,$sql3);
		}
		if($result1 and $result2)
		{
			$_SESSION['updatestatus_success']=1;
			header('Location:Member.php');
		}
		else
		{
			$_SESSION['updatestatus_error']=$error1;
			header('Location:updatestatus.php');
		}
	}
}
      ?>
</body>
</html>
