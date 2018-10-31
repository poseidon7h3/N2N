<?php
$conn=new mysqli('localhost','root','','n2n');
if($conn->connect_error)
{
	die("Connection Error".$conn->connect_error);
}
$headline=$_POST['headline'];
$news=$_POST['editor1'];
$path="newsfeed/category/images/";
$image=$path.basename($_FILES['fileToUpload']['name']);
$imagepath='images/'.basename($_FILES['fileToUpload']['name']);
$cat=$_POST['cat'];
$status="approved";
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$image))
{
	$stmt=$conn->prepare("INSERT INTO news(headline,main_news,category,image,status) VALUES(?,?,?,?,?)");
	$stmt->bind_param("sssss",$headline,$news,$cat,$imagepath,$status);
	if($stmt->execute())
	{
		echo '<script type="text/javascript">alert("News Has been Uploaded");
		      window.location="admin.php"</script>';
    }
	else
	{
		echo "insertion error".$conn->error;
    }
}
else
{
	echo "Error in uploading".$conn->error;
}
$conn->close();
?>
	