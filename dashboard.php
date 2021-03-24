<?php
include('DB/db.php');

session_start();
if(!isset($_SESSION['user_id'])){
header("location: index.php");
}else{

	$user_id = $_SESSION['user_id'];

	$me = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$user_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$name = ucfirst($row['name']);
	}

    //$lessons = mysqli_query($db, "SELECT * FROM `lesson` ORDER BY `id` ASC LIMIT 6");
$calls = mysqli_query($db, "SELECT * FROM `calls` WHERE `receiver_id` = '$user_id' ORDER BY `call_id` DESC ");


?>







<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php include('template/header.php')?>


       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      
          </div>





 <div class="card shadow mb-4" id="table">
 
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Calls</h6>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover table-stripped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Date && Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody> 
                    <?php

                          $no = 1;
                    foreach ($calls as $call) {
                    
        ?>

 <tr>
                      <td><?php echo $no;?></td>
                       <td><?php echo $call['caller_name'];?></td>
                        <td><?php echo $call['caller_phone_number'];?></td>
                        <td><?php echo date('H:i A, Y-M-d', strtotime($call['date_time'])); ?></td>
                         <td>
                           <a href="locate.php?locator=<?php echo $call['call_id'];?>" class="btn btn-info">view caller location</a>
                         </td>

                    </tr>

                    <?php

                    $no++;
                    }

                    ?>
               

                  </tboy>
                  
                </table>
              </div>
            
         


            </div>
     
          </div>


         




         















        </div>
        <!-- /.container-fluid -->

        <?php include('template/footer.php')?>
        </div>



  </div>






  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){















  });
</script>

</body>
</html>































<?php


}

?>
