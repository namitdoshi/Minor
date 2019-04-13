<?php
session_start();
if(isset($_SESSION['useremail'])||isset($_COOKIE['dpp'])) {
	// echo "string";
if(!isset($_SESSION['useremail'])){
	echo "<div align='center' style='font-family : calibri; color:white; background:#D20D0D; padding:15px;'>Access Denied ! </div>";
} 
else {
	// echo "string";
$email = $_SESSION['useremail'];
include('../../includes/conn.php');
$query = "SELECT * FROM doctor WHERE email ='".$email."'";
$rec = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($rec)){
	$id = $row['did'];
	$newname=$row['name'];
	$age= $row['age'];
	$sts = $row['status'];
	$sex = $row['gender'];
	$email = $row['email'];
	$type = $row['type'];
	$add = $row['address'];
	$ph = $row['phone_number'];
	$gender= $row['gender'];
	$adhar = $row['adrid'];
	$docid = $row['docid'];
	$st = $row['availability'];
	// echo "$id $newname $age $sts $adhar <br>";
	// echo "$type";
}

// echo "test 3";
if(@$type == "doc") {
	// echo "test 4";
	if($sts == "fail") {
		echo "<div align='center' style='font-family : calibri; color:white; background:#D20D0D; padding:15px;'>
		Your Account is under review it may take up to 3 or 4 days to verify !</div>";
  }
  elseif($sts == "success") {
		// echo "<br>";
		// echo "3";

	?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Book My Doctor | Doctor's Dashboard</title>
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
          <a href="#doc-main" class="btn btn-outline-white btn-lg">Get Started</a>
        </div>
      <!-- Content -->
    </section>
    <!--Section: Jumbotron-->

    <div id="doc-main" class="row" style="padding-top: 20px;">
      
      <!-- Card 1 -->
      <div class="col-sm-4" style="padding-bottom:20px;">
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title">
              <a>Current Status: <em><?php
	            if($st == "") {
		            echo "<span style='color:red'>Set your status first</span>";
	            }else {
                echo $st;
              }?></em>
              </a>
            </h4>
            <!-- Text -->
            <form method="POST" action="./updateStatus.php">
              <p class="card-text">
                <input type="hidden" name="getupid" value="<?php echo $id;?>"/>
                <input type="radio" name="update" value="Available"> Available
                <input type="radio" name="update" value="Not Available"> <span style="color:red;">Not Available</span>&nbsp;
              </p>	
              <!-- Button -->
              <button href="#" name='updt' class="btn btn-indigo"><i class="fa fa-edit"></i></button>
            </form>
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
            <h4 class="card-title"><a>Today's Schedule</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./scheduledAppointments.php" class="btn btn-indigo"><i class="fas fa-list-ul"></i></a>
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
            <h4 class="card-title"><a>Completed Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./completedAppointments.php" class="btn btn-indigo"><i class="fas fa-check"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 3 -->

      <!-- Card 4 -->
      <div class="col-sm-4" style="padding-bottom:20px;">  
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Cancelled Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./cancelledAppointments.php" class="btn btn-indigo"><i class="fas fa-times"></i></a>
          </div>
        </div>
      </div>
      <!-- /Card 4 -->

      <!-- Card 5 -->
      <div class="col-sm-4" style="padding-bottom:20px;">  
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title"><a>Missed Appointments</a></h4>
            <!-- Text -->
            <p class="card-text">Some text to be inserted by prem</p>
            <!-- Button -->
            <a href="./missedAppointments.php" class="btn btn-indigo"><i class="fas fa-redo-alt"></i></i></a>
          </div>
        </div>
      </div>
      <!-- Card 5 -->
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
  else {echo "some error occured, please check your internet connection";}
}
}
}
?>