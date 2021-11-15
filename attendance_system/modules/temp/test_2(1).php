<?php	
if(isset($_POST['sname']) && isset($_POST['sub_name']) && isset($_POST['p_val']) && isset($_POST['t_val']))
{
	$sname=$_POST['sname'];
	//echo "Sname : ".$sname."<br>";
	
	$sub_name=$_POST['sub_name'];
	//echo "Sub_name : ".$sub_name."<br>";
	
	$p_val=$_POST['p_val'];
	//echo "p_val : ".$p_val."<br>";
	
	$t_val=$_POST['t_val'];
	//echo "t_val : ".$t_val."<br>";
	
	if(!empty($sname) && !empty($sub_name) && !empty($p_val) && !empty($t_val))
	{
		include "../db_connect.php";
		$query_select= "SELECT `sname`,`".$sub_name."_p`,`".$sub_name."_t` from `student` where `sname` = '".$sname."';";
		//echo "Query : ".$query_select."<br><br>";
		
		if($query_run_select=mysqli_query($con,$query_select))
		{
			$query_num_rows_select=mysqli_num_rows($query_run_select);
			if($query_num_rows_select==0)
			{
				echo "<script>alert('Subject not found. Please contact your administrator.');</script>";
				echo "<script>window.location='index.php';</script>";
			}
			else if($query_num_rows_select==1)
			{
				$row = $query_run_select->fetch_assoc();
				$subp=$p_val+$row[$sub_name.'_p'];
				$subt=$t_val+$row[$sub_name.'_t'];
				//echo "Subp : ".$subp."<br>";
				//echo "Subt : ".$subt."<br>";
				
				$query_update= "UPDATE `student` SET `".$sub_name."_p` = ".$subp.",`".$sub_name."_t` = ".$subt." where `sname`= '".$sname."';";
				//echo "Query : ".$query_update."<br><br>";
				if($query_run_update=mysqli_query($con,$query_update))
				{
					echo "<script>alert('Data Updated.');</script>";
					echo "<script>window.location='professor.php';</script>";
				}
				else
				{	
					echo "<script>alert('SQL UPDATE Error.');</script>";
					header("Location: 404.php");
				}
			}
			else
			{
				echo "<script>alert('Multiple records found. Please contact your administrator.');</script>";
				header("Location: 404.php");
			}
		}
		else
		{	
			echo "<script>alert('SQL SELECT Error.');</script>";
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

