<?php
session_start();
if(!isset($_SESSION['useremail'])){
	echo "Access denied";
}
else{
	include('../../includes/conn.php');
	$t= $_SESSION['useremail'];
	$q = "SELECT * FROM admin where email = '$t' ";
	$r = mysqli_query($con,$q);
	while($row = mysqli_fetch_assoc($r)){
		$name = $row['name'];
		$type = $row['type'];
	}
	if(@$type == "admin"){
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Book My Doctor | Admin Dashboard</title>
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
          <a class="nav-link" href="./adminpanel.php">Home
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

  <!-- Main -->
  <div class="container">
    <nav aria-label="breadcrumb" style="padding-top:20px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Site Statistics</li>
        </ol>
    </nav>
    <?php
      include('../../includes/conn.php');
      $doccnt = mysqli_query($con,"SELECT COUNT(*) as cnt FROM doctor");
      $res = mysqli_fetch_array($doccnt);
      $doc = $res ['cnt'];

      $docvr = mysqli_query($con,"SELECT COUNT(*) as cnt FROM doctor WHERE status='success'");
      $res = mysqli_fetch_array($docvr);
      $docv = $res ['cnt'];

      $docunv = mysqli_query($con,"SELECT COUNT(*) as cnt FROM doctor WHERE status='fail'");
      $res = mysqli_fetch_array($docunv);
      $docuv = $res ['cnt'];

      $patcnt = mysqli_query($con,"SELECT COUNT(*) as cnt FROM patient");
      $res = mysqli_fetch_array($patcnt);
      $pat = $res ['cnt'];

      $total = $doc + $pat;
    ?>
    <div class="" style="padding-bottom:20px;">
      <!-- Card -->
      <div class="card">
      <!-- Card content -->
        <div class="card-body">
        <!-- Title -->
          <h4 class="card-title">User Statistics</h4>
          <div class="row">
            <div class="col-sm-6">
              <p>Total Doctors Registered: <?php echo $doc;?></p>
              <p>Verified Doctors Registered: <?php echo $docv;?></p>
              <p>Unverified Doctor Registered: <?php echo $docuv;?></p> 
            </div>
            <div class="col-sm-6">
              <p>Total Patient's Registered: <?php echo $pat;?></p>
              <p>Total Users: <?php echo $total;?></p>  
            </div> 
          </div>
        </div>
      </div>
      <!-- Card --> 
    </div>
    <?php
      include('../../includes/conn.php');
      $totalp = mysqli_query($con,"SELECT COUNT(*) as cnt FROM appointments where status='pending'");
      $res = mysqli_fetch_array($totalp);
      $pen = $res ['cnt'];
      
      $totalca = mysqli_query($con,"SELECT COUNT(*) as cnt FROM appointments where status='Completed'");
      $res = mysqli_fetch_array($totalca);
      $com = $res ['cnt'];
      
      $totalcan = mysqli_query($con,"SELECT COUNT(*) as cnt FROM appointments where status='Canceled'");
      $res = mysqli_fetch_array($totalcan);
      $can = $res ['cnt'];
      
      $totalap = mysqli_query($con,"SELECT COUNT(*) as cnt FROM appointments");
      $res = mysqli_fetch_array($totalap);
      $ap = $res ['cnt'];
    ?>

    <div class="" style="padding-bottom:20px;">
      <!-- Card -->
      <div class="card">
      <!-- Card content -->
        <div class="card-body">
        <!-- Title -->
          <h4 class="card-title">Appointment Statistics</h4>
          <div class="row">
            <div class="col-sm-6">
              <p>Total Pending Appointments: <?php echo $pen;?></p>
              <p>Verified Completed Appointments: <?php echo $com;?></p>
            </div>
            <div class="col-sm-6">
            <p>Total Cancelled Appointments: <?php echo $can;?></p> 
              <p>Total Appointments: <?php echo $ap;?></p>
            </div> 
          </div>
        </div>
      </div>
      <!-- Card --> 
    </div>
  </div>
  <!-- /Main -->

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark pt-4 fixed-bottom">
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
  }}
?>