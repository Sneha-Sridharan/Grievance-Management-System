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
$uname=$_POST['username'];
$pwd=$_POST['password'];
$sql="select * from faculty WHERE empno = '$uname' and password = '$pwd'";
$result=$conn->query($sql);
$error="Either username or password is incorrect";
if(mysqli_num_rows($result)==1)
{
$_SESSION['username'] = $uname;
header('Location:view-complaints-faculty.php');
}
else
{
$_SESSION['faculty-login-error'] = $error;
header('Location:Facultylogin.php');
}
}
$conn->close();
?>
</body>
</html>
