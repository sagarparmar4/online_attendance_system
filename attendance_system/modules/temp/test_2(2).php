<?php	
if(isset($_POST['sname']) && isset($_POST['sub_name']) && isset($_POST['p_val']) && isset($_POST['t_val']))
{
	$sname=$_POST['sname'];
	echo "Sname : ".$sname."<br>";
	
	$sub_name=$_POST['sub_name'];
	echo "Sub_name : ".$sub_name."<br>";
	
	$p_val=$_POST['p_val'];
	echo "p_val : ".$p_val."<br>";
	
	$t_val=$_POST['t_val'];
	echo "t_val : ".$t_val."<br>";
	
	if(!empty($sname) && !empty($sub_name) && !empty($p_val) && !empty($t_val))
	{
		include "../db_connect.php";
		$query= "UPDATE `student` SET `".$sub_name."_p` = ".$p_val.",`".$sub_name."_t` = ".$t_val." where `sname`= '".$sname."';";
		//echo "<br><br>".$query;
		if($query_run=mysqli_query($con,$query))
		{
			echo "<script>alert('Data Updated.');</script>";
			echo "<script>window.location='professor.php';</script>";
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

