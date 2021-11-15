<?php
if(isset($_POST['p_name']))
{
	$topic=strtolower(str_replace(' ', '_', $_POST["p_name"]));;
	if(!empty($topic))
	{
		include "db_connect.php";
		$query_sql = "SELECT * from notice where topic='".$topic."'";
		if($query_run=mysqli_query($con,$query_sql))
		{
			$data_row=mysqli_fetch_assoc($query_run);			
			$loc=$data_row["location"];		//filename.extension
			$dir = "uploads/";		//directory
			$dirHandle = opendir($dir);
			while($file = readdir($dirHandle)) 
			{
				if($file==$loc) 
				{
					unlink($dir.'/'.$file);
				}
				/*else
				{
					
				}*/
			}
		}
		else
		{	
			echo "<script>alert('SQL Error.');</script>";
			header("Location: 404.php");
		}
		
		
		
		$query_sql = "DELETE from notice where topic='".$topic."'";
		if($query_run=mysqli_query($con,$query_sql))
		{
			echo "<script type='text/javascript'>
					alert('File Deleted Successfully.');
					window.location.href = 'delete.php';
				  </script>";
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