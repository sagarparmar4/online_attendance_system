<html>
<body>
<pre>
<?php
	session_start();
	$s_value=$_SESSION['username'];
	echo "Session Value : ".$s_value;
	
	include "../db_connect.php";
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
		?>
		<table border=1 class="table">
		<?php
		for($i=0;$i<$rows_count;$i++)
		{
			$sum_p=0;
			$sum_t=0;
			//echo "<b>Student ".($i+1)."<br></b>";
			?>
			<thead>
				<tr><th><br></th></tr>
				<tr>
					<th>Name</th>
					<?php
					for($k=1;$k<=$maxWidth;$k++)
					{
						if ($row_array[$i]['sub'.$k.'_t'] == 0) continue;
					?>
					<th>Subject <?php echo $k; ?></th>
					<th>Defaulter</th>
					<?php } ?>
					
				</tr>
			</thead>
			<tbody>
			<tr>
			<td><?php echo $row_array[$i]['sname']; ?></td>
			<?php
			for($j=1;$j<=$maxWidth;$j++)
			{
				
				$subject_p='sub'.$j.'_p';
				$subject_t='sub'.$j.'_t';
				if ($row_array[$i][$subject_t] == 0) continue;
				//echo "Lectures Present : ".$row_array[$i][$subject_p]."<br>";
				//echo "Lectures Conducted : ".$row_array[$i][$subject_t]."<br>";
				
				$ratio=($row_array[$i][$subject_t]==0) ? 0 : ($row_array[$i][$subject_p]/$row_array[$i][$subject_t]);
				$percentStatus=round(($ratio*100),2);
				//echo "Percentage : ".$percentStatus."<br>";
				?><td><?php echo $row_array[$i][$subject_p]."/".$row_array[$i][$subject_t]."-".$percentStatus."%"; ?></td>
				<td>
				<?php
				if($percentStatus<=75)
					echo "Yes";
				else
					echo "No";
				?>
				</td>
				<?php
			}
			?>
			</tr>
			<?php
			/*echo "Student ".($i+1)."<br>";
			echo "Lectures Present : ".$sum_p."<br>";
			echo "Lectures Conducted : ".$sum_t."<br>";
			$percentStatus=round((($sum_p/$sum_t)*100),2);
			echo "Percentage : ".$percentStatus."<br>";
			if($percentStatus<=75)
				echo "Status : Defaulter<br>";
			else
				echo "Status : Not Defaulter<br>";
			echo "<br>";
			*/
		}
		?>
			</tbody>
			</table>
		<?php
	}
	else
	{
		echo "<script>alert('SQL ERROR.');</script>";
		//header("Location: index.php");
	}
?>
</pre>
</body>
</html>

