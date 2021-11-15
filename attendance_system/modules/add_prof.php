<?php
if(isset($_POST['t_name']) && isset($_POST['t_pwd']))
{
	//Fetch Data
	$t_name=$_POST['t_name'];
	$t_pwd=$_POST['t_pwd'];
	//Insert Data
	if(!empty($t_name) && !empty($t_pwd))
	{
		include "db_connect.php";
		$query_sql = "INSERT INTO users (uname, passwd, utype) VALUES ('".$t_name."','".$t_pwd."', 3)";
		//echo "<br><br>".$query_sql."<br><br>";
		if($query_run=mysqli_query($con,$query_sql))
		//if($con->query($query_sql) === TRUE)
		{
			echo "<script type='text/javascript'>
					alert('Record Added Successfully.');
					window.location.href = 'insert.php';
				  </script>";
			/*
			echo "<script>alert('Record Added Successfully.');</script>";
			header("Location: insert.php");*/
		}
		else
		{	
			echo "<script>alert('SQL Error.');</script>";
			header("Location: 404.php");
		}
	}
	else
	{
		echo "<script>alert('Enter valid data.');</script>";
		header("Location: insert.php");
	}
}
else
{	
	header("Location: 404.php");
}
?>