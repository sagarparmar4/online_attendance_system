<html>
	<body>
		<?php	include "../db_connect.php";	?>
		<form action="test_2.php" method="post">
			<?php 
					$query= "SELECT * from `student` where utype=4"; 
					if($query_run=mysqli_query($con,$query))
					{
						$rows_count=mysqli_num_rows($query_run)-10;
						?> 
						<select name="sname"> 
						<?php
						while($row = $query_run->fetch_assoc()) 
						{	
							$row_array[] = $row;
							?>
							<option value="<?php echo $row["sname"];?>">
								<?php echo $row["sname"];?>
							</option>
							<?php
						}
						?>
						</select>
						
						<br>
						
						<select name="sub_name"> 
						<?php
						
						$rows_count=mysqli_num_rows($query_run);
						
						$maxWidth = max( array_map( 'count',  $row_array ) );
						$maxWidth=intval(($maxWidth-10)/2);
						
						for($i=1;$i<=$maxWidth;$i++)
						{
							?>
							<option value="<?php echo 'sub'.$i;?>">
								<?php echo 'Subject '.$i;?>
							</option>
							<?php
						}	
						?>
						</select>
						<?php
					}
				?>
				<br>
				<label>Lectures Present</label>
				<input type="number" min='0' name="p_val">
				
				<label>Lectures Conducted</label>
				<input type="number" min='0' name="t_val">
				
			<button>Submit</button>
		</form>
	</body>
</html>