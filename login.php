<?php
$conn=new mysqli('localhost','root','','n2n');
if($conn->connect_error)
{
	die("Connection Error".$conn->connect_error);
}
if(!isset($_POST['sbt']))
{
	die("Security Error");
}
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$stmt=$conn->prepare("SELECT * FROM user WHERE email=? AND pass=?");
$stmt->bind_param("ss",$uname,$pass);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		if($row['role']=="user")
	        header('Location:editor.html');
		else 
			header('Location:admin.php');
	}
}
else
{
	echo '<script type="text/javascript">alert("Invalid User");
	       window.location="login.html"</script>';
}
?>