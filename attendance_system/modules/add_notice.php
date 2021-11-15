<?php
$target_file = "uploads/".basename($_FILES["fileToUpload"]["name"]);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

//extract topic 
if (isset($_POST["topic"])) //..................cat
{
	$topic=strtolower(str_replace(' ', '_', $_POST["topic"]));;
	//echo "<br><br>topic	:	".$topic;
	$loc=$topic.'.'.end($temp);
	$newfilename = "uploads/".$loc;
	//echo "<br><br>newfilename	:	".$newfilename;
}

// Check if file already exists
if(file_exists($newfilename)) {
	echo "<script>alert('Sorry, file already exists.');</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "<script>alert('Only PDF Files can be uploaded.');</script>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    if (!(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename))) {
		echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
}


include "db_connect.php";
$date=date("Y-m-d");
$sql = "INSERT INTO notice (date, topic, location) VALUES ('$date', '$topic', '$loc')";

if ($con->query($sql) === TRUE && $uploadOk == 1) 
{
	echo "<script type='text/javascript'>
				alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.');
				window.location.href = 'insert.php';
		  </script>";
} 
else 
{
    echo "<script>window.location.href = 'insert.php'</script>";
}

?>
