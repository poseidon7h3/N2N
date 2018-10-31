<?php
require 'conn.php';
if(isset($_POST['sbt']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$mob=$_POST['mob'];
	$sql="INSERT INTO user(name,email,pass,mobile) VALUES('$name','$email','$password','$mob')";
	if($conn->query($sql)===TRUE)
	{
		echo '<script type="text/javascript">alert("Thankyou, You Are successfully Signed Up. Please Login Now.");
		      window.location="login.html"</script>';
	}
	else
		 echo 'Error in insertion'.$conn->error;
}
?>