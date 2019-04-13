<?php
session_start();
if(isset($_SESSION['useremail'])||isset($_COOKIE['dpp'])) {
if(!isset($_SESSION['useremail'])){
	echo "<div align='center' style='font-family : calibri; color:white; background:#D20D0D; padding:15px;'>Access Denied ! </div>";
} 
else {
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
}

if(@$type == "doc") {
	
	if($sts == "fail") {
		echo "<div align='center' style='font-family : calibri; color:white; background:#D20D0D; padding:15px;'>
		Your Account is under review it may take up to 3 or 4 days to verify !</div>";
  }
  elseif($sts == "success") {

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
          <a class="nav-link" href="./doctor.php">Home
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
        <li class="breadcrumb-item active">Scheduled Appointments</li>
      </ol>
    </nav>
    <?php
  // echo 'nam1';
		$qq1 = "SELECT * FROM appointments where a_date>CURRENT_DATE AND status='pending' ";
    $rrr = mysqli_query($con,$qq1);
    // echo 'nam2';
		while($rows = mysqli_fetch_assoc($rrr)){
      $ttid = $rows['tid'];
      echo $ttid;
		}
    if(@$ttid !=""){?>
    <!-- <th width="15%" style="font-size:13px;text-align:center; color:white; background:#E90303;">Trans. ID</th> -->
		<?php } ?>
		</tr>
    <?php
    // echo 'n';
		include('../../includes/conn.php');

    $q1 = "SELECT * FROM appointments where a_date>=CURRENT_DATE AND status='pending' ";
    $r = mysqli_query($con,$q1);
    // echo ', 2';
		while($row = mysqli_fetch_assoc($r)){
			$aid = $row['id'];
			$pid = $row['pat_id'];
			$docid = $row['doc_id'];
			$name = $row['pname'];
      $ad= $row['a_date'];
      $phone = $row['phone'];
			$apt = $row['a_time'];
			$s = $row['status'];
			$tid = $row['tid'];
			$rpath = $row['pre_reprt'];
		  $dt = date("d-M-Y", strtotime($ad));
      $tt  = date("h:i A", strtotime($apt));
      
      // echo '1';
      // echo $id;
      // echo $docid;
      if($id == $docid ){
        // echo 'nam'; 
        echo $tid;
        if($tid == ""){
          echo "<div class='alert alert-info'><b>No Upcoming Appointments are Pending</b></div>";
        }
    else{
        // echo 'nam43';
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
                  <p>Appointment Date: <?php echo $dt ;?></p>
                  <p>Appointment Time: <?php echo $tt;?></p>
                  <p>Transaction ID: <?php echo $tid;?></p>
                </div>
              <div class="col-sm-6">
                <p>Patient's Name: <?php echo $name;?></p>  
                <p>Patient's Phone: <?php echo $phone;?></p>
              </div>
              <!-- Button -->
              <a href="./complete.php?aid=<?php echo $row['id'];?>" onclick="return confirm('Appointment Completed?')" class="btn btn-indigo">Mark as Completed <i class="fas fa-check-double"></i></a> 
            </div>
          </div>
        <!-- Card -->
        <?php
    }
      }
      }
    }
  
      ?>
  
  </div>
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
  else {echo "some error occured, please check your internet connection";}
}
}

?>