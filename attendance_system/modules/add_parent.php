<?php
if(isset($_POST['p_name']) && isset($_POST['p_pwd']))
{
	//Fetch Data
	$p_name=$_POST['p_name'];
	$p_pwd=$_POST['p_pwd'];
	//Insert Data
	if(!empty($p_name) && !empty($p_pwd))
	{
		include "db_connect.php";
		$query_sql = "INSERT INTO users (uname, passwd, utype) VALUES ('".$p_name."','".$p_pwd."', 2)";
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
		header("Location: index.php");
	}
}
else
{	
	header("Location: 404.php");
}
?>