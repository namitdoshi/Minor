<?php
// echo 'namit';
session_start();
if(!isset($_SESSION['useremail'])){
  echo "<div align='center' style='font-family : calibri; color:white; background:pink; padding:15px;'>Access Denied ! </div>";
  echo '<script type="text/javascript">'; 
  echo 'alert("You must login to continue.");'; 
  echo 'window.location.href = "../../index.php";';
  echo '</script>';	
} else{
    if(isset($_SESSION['useremail'])||isset($_COOKIE['dpp'])) {
      $email = $_SESSION['useremail'];
      include('../../includes/conn.php');
      $query = "SELECT * FROM patient WHERE email ='".$email."'";
      $rec = mysqli_query($con,$query);
      // echo 'namit';
      while($row = mysqli_fetch_assoc($rec)) {
        $id = $row['pid'];
        $newname=$row['name'];
        $age= $row['age'];
        $sex = $row['gender'];
        $email = $row['email'];
        $type = $row['type'];
        $add = $row['address'];
        $ph = $row['phone'];
        $gender= $row['gender'];
        $adhar = $row['adharno'];
      }
    }
  }
  if(@$type == "pat") {
    // echo 'nam';

	?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Book My Doctor | Patient Dashboard</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">
  <!-- Meri CSS -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>

  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark mdb-color darken-4">
    <a class="navbar-brand" href="#">Book My Doctor <i class="fas fa-user-md"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto smooth-scroll list-unstyled">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="../logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->

  <!-- main -->
  <div style="padding-bottom: 20px;"></div>
  <div class="container">

    <!--Section: Jumbotron-->
    <section class="card wow fadeIn" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
      <!-- Content -->
        <div class="card-body text-white text-center py-5 px-5 my-5">
          <h1 class="mb-4">
            <strong><?php echo "Welcome $newname";?></strong>
          </h1>
          <a href="#pat-main" class="btn btn-outline-white btn-lg">Get Started</a>
        </div>
      <!-- Content -->
    </section>
    <!--Section: Jumbotron-->

    <div id="pat-main" class="row" style="padding-top: 20px;">
      <!-- Card 1 -->
      <div class="col-sm-4" style="padding-bottom:20px;">
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Book Appointment</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./bookAppointment.php" class="btn btn-indigo"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 1-->
      <!-- Card 2 -->
      <div class="col-sm-4" style="padding-bottom:20px;">
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Make Payment</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./makePayment.php" class="btn btn-indigo"><i class="fab fa-amazon-pay"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 2-->
      <!-- Card 3 -->
      <div class="col-sm-4" style="padding-bottom:20px;">
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Today's Appointment</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./todaysAppointment.php" class="btn btn-indigo"><i class="fas fa-calendar-day"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 3-->
      <!-- Card 4 -->
      <div class="col-sm-4" style="padding-bottom:20px;">
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Upcoming Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./upcomingAppointments.php" class="btn btn-indigo"><i class="fas fa-fast-forward"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 4-->
        
      <!-- Card 5 -->
      <div class="col-sm-4" style="padding-bottom:20px;">  
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Previous Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./previousAppointments.php" class="btn btn-indigo"><i class="fas fa-history"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 5-->
      <!-- Card 6 -->
      <div class="col-sm-4" style="padding-bottom:20px;">  
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Missed Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./missedAppointments.php" class="btn btn-indigo"><i class="fas fa-history"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 6-->
    </div>
  </div>
  <div class="invisible">
    <p>lkehjdliwejlk</p>
    <p>dsadsadsa</p>
  </div>

  
  <!-- /main -->
  
  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark pt-4">
  <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright - All rights reserved
      <a href="#"></a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- /Footer -->

  <script src="../../assets/js/main.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>
</body>
</html>

<?php 
  }
?>