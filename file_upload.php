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
 // header("Content-Type: text/html; charset=utf-8");
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
 if(isset($_POST['Submit1']))
{ 
$file_tmp = $_FILES['file']['tmp_name'];
$file_name=$_FILES["file"]["name"];
$filepath = "img/" . $_FILES["file"]["name"];
 // Instantiate an Amazon S3 client.
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-1',
            'credentials' => [
                'key'    => "AKIAZU35UPY4HX3FWDHS",
                'secret' => "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",
            ],
        ]);
        try {
            $result = $s3->putObject([
                'Bucket' => 'phpupload1',
                'Key'    => $file_name,
                'SourceFile' => $file_tmp,
                 'ACL'       => 'public-read',

            ]);
            var_dump($result);
        } 
		catch (S3Exception $e) {
    // Catch an S3 specific exception.
    echo $e->getMessage();
}
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
