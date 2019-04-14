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
          <li class="breadcrumb-item active">Manage Doctors</li>
        </ol>
    </nav>

    <?php
    $sql = "SELECT * FROM patient";
    $r1= mysqli_query($con,$sql);
    while($row = $r1->fetch_array())
    {
      $adr = $row['adharno'];
    ?>
    <tr >
    <?php 
    
    // $dir = "patient/".$adr."/img/";
    // $open = opendir($dir);
    
    // while(($files = readdir($open)) != FALSE){
    //   if($files!="."&&$files!=".."&&$files !="Thumbs.db"){
    //     echo "<tr><center><td style='padding:5px' align='center'>
    //     <img class='imgs2' width='50px' title='$adr' src='$dir/$files'></td></center>";
      
    //   }
    // }
    
    
    ?>

    <div class="" style="padding-bottom:20px;">
      <!-- Card -->
      <div class="card">
        <!-- Card content -->
        <div class="card-body">
          <!-- Title -->
          <h4 class="card-title">Patient ID: <?php echo $row['pid']; ?></h4>
          <div class="row">
            <div class="col-sm-6">
              <p>Name: <?php echo $row['name']; ?></p>
              <p>Email: <?php echo $row['email']; ?></p>
            </div>
            <div class="col-sm-6">
              <p>Contact Number: <?php echo $row['phone']; ?></p> 
              <p>Aadhar ID: <?php echo $row['adharno']; ?></p>
            </div> 
            <a class="btn btn-indigo" href="./deletePatient.php?pid=<?php echo $row['pid'];?>"  onclick="return confirm('Are you sure you want to delete the selected account?')"><i class="far fa-trash-alt"></i> Delete Account</a>  
          </div>
        </div>
      </div>
      <!-- Card --> 
    </div>  
    <?php
    }
    ?>
    </table>
  <?php
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