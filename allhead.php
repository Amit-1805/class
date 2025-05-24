
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cloud Classrooms</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/ 5shiv/3.7.0/ 5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>/* Light blue themed body and navigation */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f8ff;
    overflow-x: hidden;
}

/* Navbar Styles with light blue theme and bottom margin */
.navbar {
    background-color:rgba(150, 237, 252, 0.83);
    border: none;
    margin-bottom: 10px;
    transition: all 0.3s ease-in-out;
    
}

.navbar-brand {
    color: #fff !important;
    font-size: 24px;
    font-weight: bold;
}

.navbar-nav li a {
    color: #fff !important;
    font-size: 16px;
}

/* Hover effect for navbar links */
.navbar-nav li a:hover {
    color: black !important;  /* Ensure text color changes */
    background-color:rgb(124, 209, 238) !important;
    transition: background-color 0.3s ease;
    text-decoration:underline;
    
}



/* Dropdown Menu Customization */
.dropdown-menu {
    background-color: #b0e0e6;
    border-radius: 5px;
}

.dropdown-menu li a {
    color: #000 !important;
}

.dropdown-menu li a:hover {
    background-color: #87cefa !important;
}

/* Button Animations */
.navbar-toggle {
    border: 1px solid #fff;
}

.navbar-toggle .icon-bar {
    background-color: #fff;
}

/* Animate Navbar on Scroll */
.navbar.navbar-fixed-top {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Additional Media Query for Small Screens */
@media(max-width: 767px) {
    .navbar-brand {
        font-size: 20px;
    }

    .navbar-nav li a {
        font-size: 14px;
    }
}
</style>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body style="overflow-x: hidden;">
<header>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">Cloud Classrooms</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   
					
                    <li>
                        <a href="index">Home</a>
                    </li>


                     <li>
                        <a href="takeassessment">Take Assessment</a>
                    </li>
                    <li>
                        <a href="viewresult">Result</a>
                    </li>
  					<li>
                        <a href="postquerypublic">Post Qurey</a>
                    </li>
                    <li>
                        <a href="about">About</a>
                    </li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="studentlogin">Student Login</a>
                            </li>
                            <li>
                                <a href="facultylogin">Faculty Login</a>
                            </li>
                            <li>
                                <a href="adminlogin">Admin Login</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="registrationform">Registration</a>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>