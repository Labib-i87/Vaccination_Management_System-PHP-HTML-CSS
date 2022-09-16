<?php
session_start();
require_once('DBconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $pass1 = $_POST["pass1"]; 
  $pass2 = $_POST["pass2"];
	$email = $_POST["email"];
  $nid = $_POST["nid"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $address = $_POST["address"];

  $sql1 = "Select * from external_db where nid='$nid'";
	$sql2 = "Select * from users where nid='$nid' OR email = '$email'";

  $result = mysqli_query($conn, $sql1);
  $num1 = mysqli_num_rows($result);
	$result = mysqli_query($conn, $sql2);
  $num2 = mysqli_num_rows($result);

	if($num2>0)
	{
  echo "<script>alert('NID or Email already taken.')</script>";
        ?><script>
        window.location.href = "signup.php"
      </script><?php 
	}elseif($num1==0) 
	{
    echo "<script>alert('NID does not exist. Try again.')</script>";
        ?><script>
        window.location.href = "signup.php"
      </script><?php 
	}else{
    if($pass1 == $pass2){
      $hash = password_hash($pass1,PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users`( `nid`, `email`, `password`, `fname`, `lname`, `address`) 
              VALUES ('$nid','$email','$hash','$fname','$lname','$address')";
      $result = mysqli_query($conn, $sql);
      $otp = rand(100000,999999);
      $sql1 = "INSERT INTO otp VALUES ('$email','$otp','$nid')";
      $r = mysqli_query($conn, $sql1);
      if($result && $r){
        $sql2="select phone_number from external_db where nid='$nid'";
        $q = mysqli_query($conn, $sql2);
        $phone= mysqli_fetch_row($q)[0];
        echo "<script>alert('OTP sent to $phone is: $otp')</script>";
        ?><script>
        window.location.href = '<?php echo "submitOTP.php?nid=$nid&email=$email";?>'
      </script><?php 
      }
    }
    else{
      echo "<script>alert('Passwords do not match.')</script>";
        ?><script>
        window.location.href = "signup.php"
      </script><?php
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>signup</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">
    <section class="vh-100">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 text-black">
            </br>
              <div class="px-5 ms-xl-4">
                <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                <span class="h1 fw-bold mb-0">Vaccination System</span>
              </div>
      
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                <form style="width: 23rem;" method="POST">
      
                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign Up</h3>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example18" class="form-control form-control-lg" name = 'nid' Required/>
                    <label class="form-label" for="form2Example18">NID</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example18" class="form-control form-control-lg" name = 'email' Required/>
                    <label class="form-label" for="form2Example18">Email</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example18" class="form-control form-control-lg" name = 'pass1' Required/>
                    <label class="form-label" for="form2Example18">Password</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example28" class="form-control form-control-lg" name = 'pass2' Required/>
                    <label class="form-label" for="form2Example28">Confirm Password</label>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" id="form3Examplev2" class="form-control form-control-lg" name = 'fname' />
                        <label class="form-label" for="form3Examplev2">First name</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" id="form3Examplev3" class="form-control form-control-lg" name = 'lname' />
                        <label class="form-label" for="form3Examplev3">Last name</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example18" class="form-control form-control-lg" name = 'address'/>
                    <label class="form-label" for="form2Example18">Address</label>
                  </div>
                  </div>
      
                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-warning">Sign Up</button>
                  </div>
      
                  <p>Have already an account? <a href="login.php" class="link-warning">Login here</a></p>
      
                </form>
      
              </div>
      
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="images/login.png"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
          </div>
        </div>
      </section>
    
  </body>
</html>