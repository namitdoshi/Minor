<?php
// echo 'namit';
session_start();
if(!isset($_SESSION['useremail'])){
	echo "<div align='center' style='font-family : calibri; color:white; background:pink; padding:15px;'>Access Denied ! </div>";
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

  <div class="container" style="padding-top: 20px; padding-bottom: 20px">
   <!-- Card -->
    <div class="card mera-form">
    <!-- Card body -->
      <div class="card-body">
        <!-- form register -->
        <form>
            <p class="h4 text-center py-4">Book Appointment</p>
            <div class="md-form">
              <input type="hidden" name="pid" value="<?php echo $id;?>"/><br>
            </div>
            <!-- input name -->
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="patientName" name="name" class="form-control" value="<?php echo $newname;?>" onkeyup="letters1(this)" required>
                <label for="patientName" class="font-weight-light">Patient Name</label>
            </div>
            <!-- input number -->
            <div class="md-form">
                <i class="fas fa-phone prefix grey-text"></i>
                <input type="number" id="phoneNumber" name="phone" class="form-control" value="<?php echo $ph;?>" required>
                <label for="phoneNumber" class="font-weight-light">Phone number</label>
            </div>
            <!-- input age -->
            <div class="md-form">
                <i class="fas fa-baby prefix grey-text"></i>
                <input type="number" id="age" class="form-control" name="age" value="<?php echo $age;?>" required>
                <label for="age" class="font-weight-light">Patient Age</label>
            </div>
            <!-- input date -->
            <div class="md-form">
              <i class="fas fa-calendar-day prefix grey-text"></i>
              <input type="text" class="form-control" name="date" id="datepicker" required>
              <label class="font-weight-light" for="datepicker">Appointment Date</label>
            </div>
            <!-- Time -->
              <div class="md-form">
                <i class="far fa-clock prefix grey-text"></i>
                <input type="text" class="form-control" name="time" id="datetimepicker" required>
                <label for="datetimepicker">Appointment time</label>
              </div>
            <!-- /Time -->
            <!-- Doctor type -->
            <div class="md-form">
                <div class="container">
                    <select class="browser-default custom-select form-control" name="doccat" onchange="getId(this.value);" id="doc" required>
                      <option selected>Select Doctor Category</option>
                      <?php
                        include('../../includes/conn.php');
                        $qu = "SELECT DISTINCT specialist FROM doctor WHERE status='success'";
                        $res = mysqli_query($con,$qu);
                        while($row=mysqli_fetch_assoc($res)){
                      ?>
                      <option value="<?php echo $row['specialist'];?>" name='specialist'><?php echo $row['specialist']; ?></option>
                      <?php }?>
                    </select>
                  </div>
            </div>
          <!-- /Doctor type -->
            <!-- Doctor -->
            <div class="md-form">
              <!-- <i class="far fa-clock prefix grey-text"></i> -->
              <div class="container">
                <select class="browser-default custom-select form-control" name="docho2" id="doclist2" required>
                  <option selected>Select Doctor</option>
                  <!-- <option value="Dentist">Dentist</option>
                  <option value="Cardiologist">Cardiologist</option>
                  <option value="General Physician">General Physician</option> -->
                </select>
              </div>              
            </div>
          <!-- /Doctor -->                      
            <div class="text-center py-4 mt-3">
                <button class="btn btn-indigo" type="submit">Register</button>
            </div>
        </form>
        <!-- Material form register -->
      </div>
    <!-- Card body -->
    </div>
    <!-- Card --> 
  </div>

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
  
  <!-- <script>
    var temp = document.getElementById('doc').value;
    if(temp=='Dentist') {
      <?php

      ?>
    }
  </script> -->

  <script>
    function letters(input) {
      var regex = /[^ a-z]/gi;
      input.value = input.value.replace(regex, "");
    }

    function letters1(input) {
      var regex = /[^ a-z]/gi;
      input.value = input.value.replace(regex, "");
    }

    function getId(val){
      $.ajax({
      type: "POST",
      url : "getdata.php",
      data: "specialist="+val,
      success: function(data){
        $("#doclist").html(data);
      }
      });

    }

    function getIdd(val){
      $.ajax({
      type: "POST",
      url : "./getdata.php",
      data: "specialist="+val,
      success: function(data){
        $("#doclist2").html(data);
      }
      });

    }


      $( "#datepicker" ).datepicker({
      dateFormat: "yy-m-dd",
      minDate: 0,
      maxDate: 4,
    });


    $('#datetimepicker').datetimepicker({
      datepicker:false,
      format:'H:i',
        formatTime: 'h:i A',
      allowTimes:['09:00','09:15','9:30','9:45','10:00','10:15','10:30','10:45','11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45',
            '14:00','14:15','14:30','14:45','15:00','15:15','15:30','15:45','16:00','16:15','16:30','16:45','17:00','17:15','17:30','17:45','18:00'],
      step:5
    });
  </script>
</body>
</html>

<?php 
  }
?>