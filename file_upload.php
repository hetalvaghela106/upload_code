<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>

<form action="file_upload.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>


</form>
<?php
  header("Content-Type: text/html; charset=utf-8");

 if(isset($_POST['Submit1']))
{ 
$file_tmp = $_FILES['file']['tmp_name'];

$filepath = "img/" . $_FILES["file"]["name"];

$up=move_uploaded_file($file_tmp, $filepath);
  copy($file_tmp, $filepath);


if($up) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
} 
?>

</body>
</html
