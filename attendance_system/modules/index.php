<!DOCTYPE html>
<html lang="en">
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
    <!-- Template styles -->
    <style rel="stylesheet">
    /* TEMPLATE STYLES */       
    html,
    body,
    .view {
        height: 100%;
    }
    /* Navigation*/        
    .navbar {
        background-color: transparent;
    }
    .scrolling-navbar {
        -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
        -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
        transition: background .5s ease-in-out, padding .5s ease-in-out;
    }       
    .top-nav-collapse {
        background-color: #1C2331;
    }       
    footer.page-footer {
        background-color: #1C2331;
        margin-top: -1px;
    }       
    @media only screen and (max-width: 768px) {
        .navbar {
            background-color: #1C2331;
        }
    }
    .navbar .btn-group .dropdown-menu a:hover {
        color: #000 !important;
    }
    .navbar .btn-group .dropdown-menu a:active {
        color: #fff !important; 
    }
    /*Call to action*/        
    .flex-center {
        color: #fff;
    }       
    .view {
        background: url("https://mdbootstrap.com/img/Photos/Others/img%20(50).jpg")no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
</head>
<body>
    <!--Mask-->
    <div class="view hm-black-light">
        <div class="full-bg-img flex-center">
            <ul class="animated fadeInUp">
                <li>
                    <h1 class="h1-responsive font-bold">Online Attendance System</h1>
                </li>
                <li>
                    <p>For Teachers, Parents and Students</p>
                </li>
                <li>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalLogin">
                        Sign in
                    </button>
                    
                </li>
            </ul>
        </div>
    </div>
    <!--/.Mask-->
    <!--Modal: Login Form-->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header light-blue darken-3 white-text">
                    <h4 class="title"><i class="fa fa-user"></i> Log in</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
					<form action="loginform.php" method="POST">
                    <div class="md-form form-sm">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" name="login_id" id="form30" class="form-control">
                        <label for="form30">Login Id</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="login_password" id="form31" class="form-control">
                        <label for="form31">Password</label>
                    </div>
                    <div class="text-center mt-2">
                        <button class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                    </div>
					</form>
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
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
</body>
</html>





















