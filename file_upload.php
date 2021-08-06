<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>

<form action="https://<bucketname>.s3.amazonaws.com" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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

 // Instantiate an Amazon S3 client.
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'eu-west-3',
            'credentials' => [
                'key'    => "hidden",
                'secret' => "hidden",
            ],
        ]);
        try {
            $result = $s3->putObject([
                'Bucket' => 'bucapp',
                'Key'    => $file_name,
                'SourceFile' => $temp_file_location
            ]);
            var_dump($result);
        } catch (Aws\S3\Exception\S3Exception $e) {
            echo "There was an error uploading the file.\n";
        }
		;

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
