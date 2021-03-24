
<?php
session_start();
if(isset($_SESSION['user_id'])){
header("location: dashboard.php");
}else

  


?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Caller Locator - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h2>Caller Locator System</h2>
                      
                    <h4 class="h5 text-gray-900 mb-2">Registration!</h4>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control form-control-user" id="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                  <input type="number" class="form-control form-control-user" id="phone_number" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Password Again</label>
                      <input type="password" class="form-control form-control-user" id="password_again" placeholder="Password Again">
                    </div>
              <!--       <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <a href="Javascript:void(0);" class="btn btn-success btn-user btn-block " id="register_btn">
                      Register
                    </a>

                    <div class="text-center mb-2">
                      <p>Already Have an account? <a href="index.php">Login</a></p>
                    </div>
            
                  </form>
                 
                
                </div>
              </div>
            </div>
          </div>
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

function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }


      $('#register_btn').click(function(event){

event.preventDefault();
        var name = $('#name').val();
        var password = $('#password').val();
        var password_again = $('#password_again').val();
        var phone_number = $('#phone_number').val();
        
        
//alert(phone_number);
        if (name == '') {
alert('Name Field is required');
        }else if (phone_number == '') {
alert('Phone Number Field is required');
        }else if (password == '') {
alert('Password Field is required');
        }else if (password_again == '') {
alert('Password Again Field is required');
        }else if (password != password_again) {
alert('Password Not Match');
        }else{


          if (confirm('Are you sure')) {


         $.ajax({        
        url:"ajaxprocess/register.php",
        method:"POST",
        data:{name:name,password:password,phone_number:phone_number},
        success:function(data){

    //console.log(data);

    if (data == 'success') {

      window.location.href = 'dashboard.php';

    }else{

      alert(data);
    }

          }
        
         })

          }

        }



      });




    });


  </script>




</body>

</html>