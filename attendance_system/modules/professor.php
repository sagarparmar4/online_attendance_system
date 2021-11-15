
<?php
session_start();
//&& basename(__FILE__)!="index.php"
if(isset($_SESSION['username'])==FALSE)
{
	echo "<script>alert('Please Login');</script>";
	die("<script>window.location='index.php';</script>");
}
	include "db_connect.php";
?>

<!DOCTYPE html>

<html lang="en" class="full-height">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<title>Home</title>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../assets/css/mdb.min.css" rel="stylesheet">
	<!-- Custom Design Bootstrap -->
	<link href="../assets/css/style.css" rel="stylesheet">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Template styles -->
	<style>
		/* TEMPLATE STYLES */
		.flex-center {
			color: #fff;
		}
		
		.intro-1 {
			background: url("https://mdbootstrap.com/img/Photos/Horizontal/Work/full page/img%20(2).jpg")no-repeat center center;
			background-size: cover;
		}
		
		.navbar .btn-group .dropdown-menu a:hover {
			color: #000 !important;
		}
		
		.navbar .btn-group .dropdown-menu a:active {
			color: #fff !important;
		}
	</style>	

</head>
<body>

	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Online Attendance System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<form class="form-inline">
					<a class="navbar-brand" href="logout">Logout</a>
				</form>
		</div>
	</nav>
	<!--/.Navbar-->
	<!--Intro Section-->
	<div class="container">
		<div class="divider-new pt-5">
			<h2 class="h2-responsive wow fadeIn">Welcome Professor</h2>
		</div>
		<!--Section: Best features-->
		<section id="best-features">
			<div class="row pt-3">
				<!--First columnn-->
				<div class="col-lg-3 mb-r">
					<!--Card-->
					<div class="card wow fadeIn">
						<!--Card image-->
						<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20(25).jpg" alt="Card image cap">
						<!--Card content-->
						<div class="card-body">
							<!--Title-->
							<h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddProf">Attendance<a></h4>
								<hr>
								<!--Text-->
								<p class="card-text">If you want to View attendance Click on this link above.</p>
						</div>
					</div>
					<!--/.Card-->
				</div>
				<!--Modal: Login Form-->
				<div class="modal fade" id="AddProf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog cascading-modal" role="document">
						<!--Content-->
						<div class="modal-content">
							<!--Header-->
							<div class="modal-header light-blue darken-3 white-text">
								<h4 class="title"><i class="fa fa-user"></i>  Attendance</h4>
								<button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!--Body-->
							<div class="modal-body">
								<!-- Form register -->
								<form>
									<!-- <p class="h5 text-center mb-4">Sign up</p> -->
<?php
	$s_value=$_SESSION['username'];

	$query= "SELECT * from `student`";
	if($query_run=mysqli_query($con,$query))
	{
		$attend_p=0;
		$attend_t=0;
		$rows_count=mysqli_num_rows($query_run);

		
		while($row = $query_run->fetch_assoc()) 
		{	
			$row_array[] = $row;
		}
		$maxWidth = max( array_map( 'count',  $row_array ) );
		$maxWidth=intval(($maxWidth-10)/2);
//		echo "MaxWidth : ".$maxWidth."<br><br>";
		?>
		<table class="table">
		<?php
		for($i=0;$i<$rows_count;$i++)
		{
			$sum_p=0;
			$sum_t=0;
			//echo "<b>Student ".($i+1)."<br></b>";
			?>
			<thead>
				
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
				?><td><?php echo "Lectures Present : ".$row_array[$i][$subject_p]."<br>Lectures Conducted : ".$row_array[$i][$subject_t]."<br>Percentage : ".$percentStatus."%"; ?></td>
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
		<tr><th><br></th></tr>
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

									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
								</form>
								<!-- Form register -->
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<div class="options text-center text-md-right mt-1">
									<!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
									<!-- <p>Forgot <a href="#">Password?</a></p> -->
								</div>
									<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!--/.Content-->
					</div>
				</div>
				<!--Modal: Login Form-->
				<!--Second columnn-->
				<div class="col-lg-3 mb-r">
					<!--Card-->
					<div class="card wow fadeIn" data-wow-delay="0.2s">
						<!--Card image-->
						<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20(14).jpg" alt="Card image cap">
						<!--Card content-->
						<div class="card-body">
							<!--Title-->
							<h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddPar">Defaulter</a></h4>
							<hr>
							<!--Text-->
							<p class="card-text">If you want to View Defaulter Click on this link above.</p>
						</div>
					</div>
					<!--/.Card-->
				</div>
				<!--Modal: Login Form-->
				<div class="modal fade" id="AddPar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog cascading-modal" role="document">
						<!--Content-->
						<div class="modal-content">
							<!--Header-->
							<div class="modal-header light-blue darken-3 white-text">
								<h4 class="title"><i class="fa fa-user"></i>Defaulter list</h4>
								<button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!--Body-->
							<div class="modal-body">
								<!-- Form register -->
								<form style="padding-left: 5%;padding-right: 5%;">
									<table class="table">
										<?php
	
	$s_value=$_SESSION['username'];
	
	$query= "SELECT * from `student`";
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
		$maxWidth=intval(($maxWidth-10)/2);
		//echo "MaxWidth : ".$maxWidth."<br><br>";
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
			echo "Student Name : ".ucwords($row_array[$i]['sname'])."<br>";
			echo "Lectures Present : ".$sum_p."<br>";
			echo "Lectures Conducted : ".$sum_t."<br>";
			$percentStatus=round((($sum_p/$sum_t)*100),2);
			echo "Percentage : ".$percentStatus."<br>";
			if($percentStatus<75)
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


?>
									</table>
								</form>
								<!-- Form register -->
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<div class="options text-center text-md-right mt-1">
									<!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
									<!-- <p>Forgot <a href="#">Password?</a></p> -->
								</div>
								<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!--/.Content-->
					</div>
				</div>
				<!--Modal: Login Form-->
				<!--Second columnn-->
				<!--Third columnn-->
				<div class="col-lg-3 mb-r">
					<!--Card-->
					<div class="card wow fadeIn" data-wow-delay="0.4s">
						<!--Card image-->
						<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20(21).jpg" alt="Card image cap">
						<!--Card content-->
						<div class="card-body">
							<!--Title-->
							<h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddStud">Notice</a></h4>
							<hr>
							<!--Text-->
							<p class="card-text">If you want to View notice Click on this link above.</p>
						</div>
					</div>
					<!--/.Card-->
				</div>
				<!--Modal: Login Form-->
				<div class="modal fade" id="AddStud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog cascading-modal" role="document">
						<!--Content-->
						<div class="modal-content">
							<!--Header-->
							<div class="modal-header light-blue darken-3 white-text">
								<h4 class="title"><i class="fa fa-user"></i> Notice</h4>
								<button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!--Body-->
							<div class="modal-body">
								<div style="padding-left: 5%;padding-right: 5%;">
									<!-- <p class="h5 text-center mb-4">Sign up</p> -->	
									<table class="table">
										<tbody>
								<?php 
									
									$query_sql= "SELECT * from notice";
									
									if($query_run=mysqli_query($con,$query_sql))
									{
										$query_num_rows=mysqli_num_rows($query_run);
										if($query_num_rows==0)
										{
											?>
											<tr>
												<th scope="row">No Notices.</th>
											</tr>
											<?php
										}
										else if($query_num_rows>=1)
										{
											//Display N Notices
											$count_notice=1;
											while($row = $query_run->fetch_assoc()) 
											{	
												?>
												<tr>
												<th scope="row">
												<?php
													echo $count_notice."	".ucwords($row['topic']);
													$count_notice++;
												?>
												</th>
												</tr>
											<?php
											}										
										}
										else
										{
											echo "<script>alert('Internal Error. Try again later');</script>";
											header("Location: 404.php");
										}
									}
									else
									{	
										header("Location: 404.php");
									}
								?>
								<!-- Form register -->
							
										</tbody>
									</table>
								</div>
								<!-- Form register -->
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<div class="options text-center text-md-right mt-1">
									<!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
									<!-- <p>Forgot <a href="#">Password?</a></p> -->
								</div>
								<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!--/.Content-->
					</div>
				</div>
				<!--Modal: Login Form-->
				<!--Third columnn-->
				<!--Forth columnn-->
				<div class="col-lg-3 mb-r">
					<!--Card-->
					<div class="card wow fadeIn" data-wow-delay="0.6s">
						<!--Card image-->
						<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20(37).jpg" alt="Card image cap">
						<!--Card content-->
						<div class="card-body">
							<!--Title-->
							<h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddNot">Timetable</a></h4>
							<hr>
							<!--Text-->
							<p class="card-text">If you want to View TimeTable Click on this link above.</p>
						</div>
					</div>
					<!--/.Card-->
				</div>
				<!--Modal: Login Form-->

				<!--Modal: Login Form-->
				<div class="modal fade" id="AddNot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog cascading-modal" role="document">
						<!--Content-->
						<div class="modal-content">
							<!--Header-->
							<div class="modal-header light-blue darken-3 white-text">
								<h4 class="title"><i class="fa fa-user"></i> Record Attendance</h4>
								<button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!--Body-->
							<div class="modal-body">
								<!-- Form register -->
								<form style="padding-left: 5%;padding-right: 5%;">
									<!-- <p class="h5 text-center mb-4">Sign up</p> -->
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Username</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Larry</td>
												<td>the Bird</td>
												<td>@twitter</td>
											</tr>
										</tbody>
									</table>
								</form>
								<!-- Form register -->
							</div>
							<!--Footer-->
							<div class="modal-footer">
								<div class="options text-center text-md-right mt-1">
									<!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
									<!-- <p>Forgot <a href="#">Password?</a></p> -->
								</div>
								<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!--/.Content-->
					</div>
				</div>
				<!--Modal: Login Form-->
				<!--Fourth columnn-->
			</div>
		</section>
		<!--/Section: Best features-->
	</div>
	<!--/ Main container-->
	
	<!--Footer-->
	<footer class="page-footer center-on-small-only elegant-color-dark">
		<!--Footer Links-->
		<div class="container-fluid">
			<div class="row">
				<!--First column-->
				<div class="col-lg-3 col-md-6 ml-auto">
					<h5 class="titles font-bold mt-3 mb-4">ABOUT MATERIAL DESIGN</h5>
					<p>Material Design (codenamed Quantum Paper) is a design language developed by Google. </p>
					<p>Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
				</div>
				<!--/.First column-->
				<hr class="w-100 clearfix d-sm-none">
				<!--Second column-->
				<div class="col-lg-2 col-md-6 ml-auto">
					<h5 class="title font-bold mt-3 mb-4">Our Projects</h5>
					<ul>
						<li><a href="#!">Jeffs Bike Shop</a></li>
						<li><a href="#!">Main Street Restaurant</a></li>
						<li><a href="#!">Connect Groceries</a></li>
						<li><a href="#!">White-To-Black Coffe Shop</a></li>
					</ul>
				</div>
				<!--/.Second column-->
				<hr class="w-100 clearfix d-sm-none">
				<!--Third column-->
				<div class="col-lg-2 col-md-6 ml-auto">
					<h5 class="title font-bold mt-3 mb-4">Useful Resources</h5>
					<ul>
						<li><a href="#!">2016 Advertising Report</a></li>
						<li><a href="#!">Best NY Agencies</a></li>
						<li><a href="#!">Trends for 2017</a></li>
						<li><a href="#!">World Advertisement Report</a></li>
					</ul>
				</div>
				<!--/.Third column-->
				<hr class="w-100 clearfix d-sm-none">
				<!--Fourth column-->
				<div class="col-lg-2 col-md-6 ml-auto">
					<h5 class="title font-bold mt-3 mb-4">Find us on</h5>
					<ul>
						<li><a href="#!">Facebook</a></li>
						<li><a href="#!">Twitter</a></li>
						<li><a href="#!">LinkedIn</a></li>
						<li><a href="#!">Behance</a></li>
					</ul>
				</div>
				<!--/.Fourth column-->
			</div>
		</div>
		<!--/.Footer Links-->
		<hr>
		<!--Call to action-->
		<div class="call-to-action">
			<h4 class="mb-5">Material Design for Bootstrap</h4>
			<ul>
				<li>
					<h5>Get our UI KIT for free</h5></li>
					<li><a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-info" rel="nofollow">Sign up!</a></li>
					<li><a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-default" rel="nofollow">Learn more</a></li>
				</ul>
		</div>
		<!--/.Call to action-->
		<!--Copyright-->
		<div class="footer-copyright">
			<div class="container-fluid">
				© 2015 Copyright: <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>
			</div>
		</div>
		<!--/.Copyright-->
	</footer>
	<!--/.Footer-->
	<!-- SCRIPTS -->

	<!-- JQuery -->
	<script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
	<!-- Bootstrap dropdown -->
	<script type="text/javascript" src="../assets/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="../assets/js/mdb.min.js"></script>
	<!--Google Maps-->
	<script src="https://maps.google.com/maps/api/js"></script>
	
	<!-- Animations init-->
	<script>
		new WOW().init();
	</script>
</body>
</html>