<?php
$conn=new mysqli('localhost','root','','n2n');
if($conn->connect_error)
{
	die("Error in connection".$conn->connect_error);
}
?>