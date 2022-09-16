<?php
require_once('DBconnect.php');

$nid = $_GET['nid'];
$email=$_GET['email'];
if(isset($_POST['otp'])){
    $otp =$_POST['otp'];
    $sql = "SELECT otp from otp
            WHERE nid = '$nid'
            and email ='$email'";
    $query= mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)==0){
      echo "<script>alert('No OTP associated with this account')</script>";
        ?><script>
        window.location.href = "submitOTP.php"
      </script><?php 
    }elseif(mysqli_num_rows($query)<=5){
      $row=mysqli_fetch_row($query);
        if($otp == $row[0]){
          $sql="UPDATE `users` SET `verified`='true' WHERE email='$email'";
          $query= mysqli_query($conn, $sql);
          $sql="DELETE FROM `otp` WHERE email='$email' and nid='$nid'";
          $query= mysqli_query($conn, $sql);
          echo "<script>alert('Sign Up Successful')</script>";
        ?><script>
        window.location.href = "login.php"
      </script><?php 
        }else{
          echo "<script>alert('OTP Does not match.')</script>";
        ?><script>
        window.location.href = '<?php echo "submitOTP.php?nid=$nid&email=$email";?>'
      </script><?php 
        }
    }
    else{
      $sql="DELETE FROM `otp` WHERE email='$email' and nid='$nid'";
      $query= mysqli_query($conn, $sql);
      $sql="DELETE FROM `users` WHERE email='$email' and nid='$nid'";
      $query= mysqli_query($conn, $sql);
      echo "<script>alert('Account bound to $nid is removed. Sign up again)</script>";
        ?><script>
        window.location.href = '<?php echo "submitOTP.php?nid=$nid&email=$email";?>'
      </script><?php 
      
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
    <title>Forgot Password</title>
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

              <form style="width: 23rem;" method = "POST" action='<?php echo "submitOTP.php?nid=$nid&email=$email";?>'>

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">OTP</h3>

                <div class="form-outline mb-4">
                  <input type="text" id="form2Example18" class="form-control form-control-lg" name='otp' placeholder="Enter your OTP" Required />
                  <label class="form-label" for="form2Example18">OTP</label>
                </div>

                <div class="pt-1 mb-4">
                  <button type="submit" class="btn btn-warning" type="button">Confirm</button>                
                </div>
                <p><a href='<?php echo"resendOTP.php?nid=$nid&email=$email"; ?>' class="link-warning">Resend OTP</a></p>
              </form>
            </div>
          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="images/login.png" alt="Login image" class="w-100 vh-100"
              style="object-fit: cover; object-position: left;">
          </div>
        </div>
      </div>
    </section>

  </body>

</html>