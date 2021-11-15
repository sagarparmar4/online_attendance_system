<?php
if(isset($_POST['p_name']))
{
	//Fetch Data
	$p_name=$_POST['p_name'];
	//Insert Data
	if(!empty($p_name))
	{
		include "db_connect.php";
		$query_sql = "DELETE from users where uname='".$p_name."' AND utype='2'";
		//echo "<br><br>".$query_sql."<br><br>";
		if($query_run=mysqli_query($con,$query_sql))
		//if($con->query($query_sql) === TRUE)
		{
			echo "<script type='text/javascript'>
					alert('Record Added Deleted.');
					window.location.href = 'delete.php';
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
		header("Location: delete.php");
	}
}
else
{	
	header("Location: 404.php");
}
?>