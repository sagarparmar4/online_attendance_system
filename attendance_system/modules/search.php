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

  <title>Material Design Bootstrap</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="../assets/css/mdb.min.css" rel="stylesheet">

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


  table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after {
   padding: 5px;
 }
 .dataTables_wrapper .mdb-select {
  border: none;
}
.dataTables_wrapper .mdb-select.form-control {
  padding-top: 0;
  margin-top: -1rem;
  margin-left: 0.7rem;
  margin-right: 0.7rem;
  width: 100px;
}
.dataTables_length label {
  display: flex;
  justify-content: left;
}
.dataTables_filter label {
  margin-bottom: 0;
}
.dataTables_filter label input.form-control {
  margin-top: -0.6rem;
  padding-bottom: 0;
}
table.dataTable {
  margin-bottom: 3rem!important;
}
div.dataTables_wrapper div.dataTables_info {
  padding-top: 0;
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
               <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                      </ul> -->
                      <form class="form-inline">
                      <a class="navbar-brand" href="logout.php">Logout</a>
                      </form>
                    </div>
                  </div>
                </nav>
                <!--/.Navbar-->

                <!--Intro Section-->
                



                <!-- Main container-->
                <div class="container">
                  <div class="divider-new pt-5">
                    <h2 class="h2-responsive wow fadeIn">Search</h2>
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
                            <h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddProf">Professor<a></h4>
                              <hr>
                              <!--Text-->
                              <p class="card-text">If you want to Add Professor Click on this link above.</p>
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
                                <h4 class="title"><i class="fa fa-user"></i> Add Professor</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!--Body-->
                              <div class="modal-body">

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
                        <!--First columnn-->

                        <!--Second columnn-->
                        <div class="col-lg-3 mb-r">
                          <!--Card-->
                          <div class="card wow fadeIn" data-wow-delay="0.2s">

                            <!--Card image-->
                            <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20(14).jpg" alt="Card image cap">

                            <!--Card content-->
                            <div class="card-body">
                              <!--Title-->
                              <h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddPar">Parent</a></h4>
                              <hr>
                              <!--Text-->
                              <p class="card-text">If you want to Add Parent Click on this link above.</p>
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
                                <h4 class="title"><i class="fa fa-user"></i> Add Parent</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!--Body-->
                              <div class="modal-body">

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
                              <h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddStud">Student</a></h4>
                              <hr>
                              <!--Text-->
                              <p class="card-text">If you want to Add Student Click on this link above.</p>
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
                                <h4 class="title"><i class="fa fa-user"></i> Add Student</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!--Body-->
                              <div class="modal-body">

									<table class="table">
										<tbody>
								<?php 
									
									$query_sql= "SELECT * from student";
									
									if($query_run=mysqli_query($con,$query_sql))
									{
										$query_num_rows=mysqli_num_rows($query_run);
										if($query_num_rows==0)
										{
											?>
											<tr>
												<th scope="row">No Students.</th>
											</tr>
											<?php
										}
										else if($query_num_rows>=1)
										{
											//Display N Notices
											$count_std=1;
											while($row = $query_run->fetch_assoc()) 
											{	
												?>
												<tr>
												<th scope="row">
												<?php
													echo $count_std.".".ucwords($row['sname']);
													//ucwords($row['<column_name']);
													$count_std++;
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
                              <h4 class="card-title text-center"><a href="#" data-toggle="modal" data-target="#AddNot">Notices</a></h4>
                              <hr>
                              <!--Text-->
                              <p class="card-text">If you want to Add Notices Click on this link above.</p>
                            </div>

                          </div>
                          <!--/.Card-->
                        </div>
                        <!--Modal: Login Form-->
                        <div class="modal fade" id="AddNot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog cascading-modal" role="document">
                            <!--Content-->
                            <div class="modal-content">
                              <!--Header-->
                              <div class="modal-header light-blue darken-3 white-text">
                                <h4 class="title"><i class="fa fa-user"></i> Add Notices</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!--Body-->
                              <div class="modal-body">

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
													echo $count_notice.".".ucwords($row['topic']);
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