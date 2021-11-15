<?php
	function defalt()
	{
	
	$s_value=$_SESSION['username'];
	
	
	include "db_connect.php";
	$query= "SELECT * from `student` where `pname` ='".$s_value."'";
	if($query_run=mysqli_query($con,$query))
	{
		$attend_p=0;
		$attend_t=0;
		$rows_count=mysqli_num_rows($query_run);
		echo "<br><br>";
		
		while($row = $query_run->fetch_assoc()) 
		{	
			$row_array[] = $row;
		}
		$maxWidth = max( array_map( 'count',  $row_array ) );
		$maxWidth=intval(($maxWidth-6)/2);
		echo "MaxWidth : ".$maxWidth."<br><br>";
		for($i=0;$i<$rows_count;$i++)
		{
			$sum_p=0;
			$sum_t=0;
			for($j=1;$j<=$maxWidth;$j++)
			{
				$subject_p='sub'.$j.'_p';
				$subject_t='sub'.$j.'_t';
				$sum_p=$sum_p+$row_array[$i][$subject_p];
				$sum_t=$sum_t+$row_array[$i][$subject_t];
			}
			echo "Student ".($i+1)."<br>";
			echo "Lectures Present : ".$sum_p."<br>";
			echo "Lectures Conducted : ".$sum_t."<br>";
			$percentStatus=round((($sum_p/$sum_t)*100),2);
			echo "Percentage : ".$percentStatus."<br>";
			if($percentStatus<=75)
				echo "Status : Defaulter<br>";
			else
				echo "Status : Not Defaulter<br>";
			echo "<br>";
		}
	}
	else
	{
		echo "<script>alert('SQL ERROR.');</script>";
		//header("Location: index.php");
	}

}
?>