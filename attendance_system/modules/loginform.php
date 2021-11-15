<?php	
if(isset($_POST['login_id']) && isset($_POST['login_password']))
{
	$username=$_POST['login_id'];
	//echo $username;
	
	$passwd=$_POST['login_password'];
	//echo $passwd;
	
	if(!empty($username) && !empty($passwd))
	{
		include "db_connect.php";
		$query= "SELECT * from `student` where `uname` ='".$username."' and `passwd` = '".$passwd."'";
		if($query_run=mysqli_query($con,$query))
		{
			$query_num_rows=mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				echo "<script>alert('User not found. Please contact your administrator.');</script>";
				echo "<script>window.location='index.php';</script>";
			}
			else if($query_num_rows==1)
			{
				$user_id=mysqli_fetch_assoc($query_run);
				session_start();                          
				$_SESSION["username"] = $user_id["uname"];
				//echo $_SESSION["username"];  
				
				if($user_id["utype"]==1)
				{
					header("Location: admin.php");
				}
				if($user_id["utype"]==2)
				{
					header("Location: parent.php");
				}
				if($user_id["utype"]==3)
				{
					header("Location: professor.php");
				}
				if($user_id["utype"]==4)
				{
					header("Location: student.php");
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

