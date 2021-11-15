<?php
if(isset($_POST['roll_no']) && isset($_POST['name'])&& isset($_POST['uname'])&& isset($_POST['passwd'])&& isset($_POST['year'])&& isset($_POST['depart'])&& isset($_POST['pname']))
{
	//Fetch Data
	$roll_no=$_POST['roll_no'];
	$sname=$_POST['name'];
	$uname=$_POST['uname'];
	$passwd=$_POST['passwd'];
	$pname=$_POST['pname'];
	$year=$_POST['year'];
	$depart=$_POST['depart'];
	
	
	//Insert Data
	if(!empty($roll_no) && !empty($sname)&& !empty($uname)&& !empty($passwd)&& !empty($pname)&& !empty($year)&& !empty($depart))
	{
		include "db_connect.php";
		$query_sql = "INSERT INTO `student`(`roll_no`, `sname`, `uname`, `passwd`, `utype`, `pname`, `year`, `department`) VALUES (".$roll_no.",'".$sname."','".$uname."','".$passwd."',4,'".$pname."',".$year.",'".$depart."')";
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
			header("Location: admin.php");
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
	echo "<script>alert('Data Not Set.');</script>";
	header("Location: insert.php");
}
?>