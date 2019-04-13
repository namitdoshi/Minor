<?php
session_start();
if(isset($_POST['loginButton'])){
$useremail = $_POST['useremail'];	
$userpass =  $_POST['userpass'];
include('includes/conn.php');

$q1 = "SELECT * FROM doctor where email = '$useremail'";
$q2 = "SELECT * FROM patient where email = '$useremail'";
$q3 = "SELECT * FROM admin where email = '$useremail'";

$r = mysqli_query($con, $q1);
$rr = mysqli_query($con, $q2);
$ad = mysqli_query($con, $q3);

if(mysqli_num_rows($r)>0){
	while($row = mysqli_fetch_assoc($r)){
		$dbname = $row['name'];
		$dbemail = $row['email'];
		$dbpass = $row['password'];
		$type = $row['type'];
	}
	if($useremail == $dbemail && $userpass == $dbpass){
		$_SESSION['useremail'] =$useremail;
		$_SESSION['userpass'] = $userpass;
		if($_POST['remember'] == 'on' ){
					$expire = time()+86400;
					setcookie('dpp', $_POST['useremail'], $expire);
				}
		header("location:./src/doctor/doctor.php");
	}
	else
	{
		echo "<script>";
	echo "alert('Wrong Doctor Email or Password')";
	echo "</script>";
	}
	
}elseif(mysqli_num_rows($rr)>0){
	while($row = mysqli_fetch_assoc($rr)){
		$dbid = 	@$row['id'];
		$dbname = $row['name'];
		$dbemail = $row['email'];
		$dbpass = $row['password'];
		$type = $row['type'];
	}
	if($useremail == $dbemail && $userpass == $dbpass){
		$_SESSION['useremail'] =$useremail;
		$_SESSION['userpass'] = $userpass;
		$_SESSION['status'] = "Success";
		if($_POST['remember'] == 'on' ){
					$expire = time()+86400;
					setcookie('dpp', $_POST['useremail'], $expire);
        }

		header("location:./src/patient/patient.php");
	}
	else{
		echo "<script>";
	echo "alert('Wrong Patient Email or Password')";
	echo "</script>";
	}
}
elseif(mysqli_num_rows($ad)>0){
	while($row = mysqli_fetch_assoc($ad)){
		$dbname = $row['name'];
		$dbemail = $row['email'];
		$dbpass = $row['password'];
		}
		if($useremail == $dbemail && $userpass == $dbpass){
			$_SESSION['useremail'] = $useremail;
			$_SESSION['userpass'] = $userpass;
			$_SESSION['status'] = "Success";
			if($_POST['remember'] == 'on' ){
					$expire = time()+86400;
					setcookie('dpp', $_POST['useremail'], $expire);
				}
			header("location:adminpanel.php");
			
		}else{
			echo "<script>";
		echo "alert('Wrong Patient Email or Password')";
		echo "</script>";
		}
		
}



else{
	echo "<script>";
	echo "alert('Account not exist')";
	echo "</script>";
}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Book My Doctor</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">
  <!-- Meri CSS -->
  <link href="./assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>

  <!--Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar mdb-color darken-4">
    <a class="navbar-brand" href="#">Book My Doctor <i class="fas fa-user-md"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto smooth-scroll list-unstyled">
        <li class="nav-item active">
          <a class="nav-link" href="#home">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Signup
          </a>
          <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="./src/patient/patientSignup.html">Patient</a>
            <a class="dropdown-item" href="./src/doctor/docSignup.html">Doctor </a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="#login">Login</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->
    <header id="home">
      <!-- Full Page Intro -->
      <div class="view" style="background-image: url('./assets/img/3.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

          <!-- Content -->
          <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

              <!--Grid column-->
              <div class="col-md-6 mb-4 white-text text-center text-md-left">

                <h1 class="display-4 font-weight-bold">Book Appointment on the go</h1>

                <hr class="hr-light">

                <p>
                  <strong>Best & free platform to do so</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid placeat sunt nesciunt</strong>
                </p>

                <a href="./src/patient/patientSignup.html" class="btn btn-indigo btn-lg">Patient Signup
                <i class="fas fa-diagnoses"></i>
                </a>
                <a href="./src/doctor/docSignup.html" class="btn btn-indigo btn-lg">Doctor Signup
                  <i class="fas fa-stethoscope"></i>
                </a>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6 col-xl-5 mb-4">

                <!--Card-->
                <div class="card" id="login">

                  <!--Card content-->
                  <div class="card-body">

                    <!-- Form -->
                    <form name="" method="POST">
                      <!-- Heading -->
                      <h3 class="white-text text-center">
                        <strong>Login</strong>
                      </h3>
                      <hr>

                      <div class="md-form">
                        <i class="fas fa-envelope prefix white-text"></i>
                        <input type="text" id="email" name="useremail" class="form-control" style="color: #fff;" required>
                        <label for="email" style="color: #fff;">Your email</label>
                      </div>
                      <div class="md-form">
                        <i class="fas fa-lock prefix white-text"></i>
                        <input type="password" id="pass" class="form-control" name="userpass" style="color: #fff;" required>
                        <label for="pass" style="color: #fff;">Your password</label>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-indigo" name="loginButton">Login <i class="fas fa-arrow-circle-right"></i></button>
                        <hr>
                      </div>

                    </form>
                    <!-- Form -->

                  </div>

                </div>
                <!--/.Card-->

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->
      </div>
      <!-- Full Page Intro -->
  </header>
<!-- Main navigation -->
<!--Main Layout-->
<main>
  <div class="container">
    <!--Grid row-->
    <div class="row py-5">
    </div>
    <!--Grid row-->
  </div>
</main>
<!--Main Layout-->

<main>
  <div class="container">
    <hr class="my-5">

    <!--Section: Main features & Quick Start-->
    <section id="about">

      <h3 class="h3 text-center mb-5">About BMD</h3>

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 px-4">

          <!--First row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Bootstrap 4</h5>
              <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
            </div>
          </div>
          <!--/First row-->

          <div style="height:30px"></div>

          <!--Second row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Detailed documentation</h5>
              <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help you to implement your ideas
                easily.
              </p>
            </div>
          </div>
          <!--/Second row-->

          <div style="height:30px"></div>

          <!--Third row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Lots of tutorials</h5>
              <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                how to use MDB as well as other technologies.</p>
            </div>
          </div>
          <!--/Third row-->

        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12">
          <!--First row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Lots of tutorials</h5>
              <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                how to use MDB as well as other technologies.</p>
            </div>
          </div>
          <!--/First row-->

          <!--Second row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Lots of tutorials</h5>
              <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                how to use MDB as well as other technologies.</p>
            </div>
          </div>
          <!--/Second row-->

          <!--Third row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-angle-right fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Lots of tutorials</h5>
              <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                how to use MDB as well as other technologies.</p>
            </div>
          </div>
          <!--/Third row-->
        </div>
      </div>
        <!--/Grid column-->

      </div>
      <!--/Grid row-->

    </section>
    <!--Section: Main features & Quick Start-->

    <hr class="my-5">

  </div>
</main>

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="container">
      <!-- Call to action -->
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <h5 class="mb-1">Register for free</h5>
        </li>
        <li class="list-inline-item">
          <a href="./src/patient/patientSignup.html" class="btn btn-outline-white btn-rounded">Sign up!</a>
        </li>
      </ul>
      <!-- Call to action -->
    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright - All rights reserved
      <a href="#"></a>
    </div>
    <!-- Copyright -->
    </footer>
  <!-- Footer -->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script> 
  <!-- Mer khudki JS -->
  <script src="./js/main.js"></script>
</body>

</html>