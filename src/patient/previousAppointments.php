<?php

session_start();
if(!isset($_SESSION['useremail'])){
  echo "<div align='center' style='font-family : calibri; color:white; background:pink; padding:15px;'>Access Denied ! </div>";
} else{
    if(isset($_SESSION['useremail'])||isset($_COOKIE['dpp'])) {
      $email = $_SESSION['useremail'];
      // echo $email;
      include('../../includes/conn.php');
      $query = "SELECT * FROM patient WHERE email ='".$email."'";
      $rec = mysqli_query($con,$query);
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
          <a class="nav-link" href="./patient.php">Home
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
          <li class="breadcrumb-item active">Previous Appointments</li>
        </ol>
    </nav>

    <?php
		include('../../includes/conn.php');
		$q1 = "select * from appointments where status='Completed'";
		$r = mysqli_query($con,$q1);
		while($row = mysqli_fetch_assoc($r)){
			$aid = $row['id'];
			$pid = $row['pat_id'];
			$docid = $row['doc_id'];
			$name = $row['pname'];
			$ad = $row['a_date'];
			$apt = $row['a_time'];
			$s = $row['status'];
			$tid = $row['tid'];
			$rpath = $row['pre_reprt'];

			$q2 = "SELECT name,phone_number FROM doctor where did='$docid' ";
			$r1 = mysqli_query($con,$q2);
			while($rw = mysqli_fetch_assoc($r1)){
        $docname = $rw['name'];
        $dpno = $rw['phone_number'];
			}

			$dt  = date("d-M-Y", strtotime($ad));
		    $tt  = date("h:i A", strtotime($apt));


			if($id == $pid ){

			?>

      <div class="" style="padding-bottom:20px;">
        <!-- Card -->
        <div class="card">
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <h4 class="card-title">Appointment ID: <?php echo $aid;?></h4>
            <div class="row">
              <div class="col-sm-6">
                <p>Appointment Date: <?php echo $dt;?></p>
                <p>Appointment Time: <?php echo $tt;?></p>
                <p>Transaction ID: <?php echo $tid;?></p>
              </div>
              <div class="col-sm-6">
                <p>Doctor's Name: Dr. <?php echo $docname;?></p>
                <p>Doctor's Phone: <?php echo $dpno;?></p>
                <p>Patient's Name: <?php echo $newname;?></p>  
              </div>   
            </div>
          </div>
        </div>
        <!-- Card --> 
      </div>
			<?php
		}
		}


		?>

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
  <!-- Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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