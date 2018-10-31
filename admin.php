<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Feed Editor</title>
		
		 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
	</head>
	<body>
	<br>
	<center><p><h1>Welcome Admin</h1></p><br></center>
	<form method="POST" action="adminnews.php" enctype="multipart/form-data">
    <select name="cat">
  <option value=""> -----------Select a Category----------- </option> 
  <option value="technology">Technology</option>
  <option value="sports">Sports</option>
  <option value="business">Business</option>
  <option value="fashion">Fashion</option>
  <option value="science">Science</option>
  <option value="health">Health</option>
  <option value="health">Entertainment</option>
  <option value="health">India</option>
</select><br><br>
Headline<br>
<input type="textarea" name="headline" placeholder="Headline Here">
<br><br>
		<textarea name="editor1"></textarea>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script><br><br>
		<b>Upload Image:<input type="file" name="fileToUpload">	<br><br>
		<input type="submit" value="Submit">
		</form>
		<br>
		<br>	 
		<h1><b>UNPUBLISHED NEWS<b></H1>
		<br>
		<table style="width:100%" border="1">
		
  <tr>
    <th>Title</th> 
    <th>Category</th> 
    <th>Review News</th>
	<th>Status</th>
  </tr>
  <?php
$conn=new mysqli('localhost','root','','n2n');
if($conn->connect_error)
{
	die("Connection Error".$conn->connect_error);
}
$sql="SELECT * FROM news WHERE status='pending'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
  echo '<tr>
    <td>'.$row['headline'].'</td>
    <td>'.$row['category'].'</td> 
    <td><a href="http://localhost/n2n/NewsFeed%20F/newsfeed/pages/single_page.php?id='.$row['id'].'"  target="_blank">Click Here</a></td>
	<td>'.$row['status'].'   <a href="approve.php?id='.$row['id'].'" class="btn btn-primary">Approve</a>   <a href="reject.php?id='.$row['id'].'" class="btn btn-primary">Reject</a></td>
  </tr>';
	}
}
?>
</table>
