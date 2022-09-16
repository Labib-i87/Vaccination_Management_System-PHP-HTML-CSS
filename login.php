<?php
session_start();
require_once('DBconnect.php');

if(isset($_POST['nid']) && isset($_POST['pass'])){
	$n = $_POST['nid'];
	$p = $_POST['pass'];
  if (strlen($n)>=10) {
    $sql = "SELECT * FROM users WHERE nid ='$n'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) ==1){
      $frow = mysqli_fetch_array($result);
      if($frow['verified']=='true'){ 
        $hash = $frow['password'];
        $v=password_verify($p,$hash);
        if($v){
          $_SESSION['id'] = $frow['id'];
          header("Location: uhomepage.php");
        }
        else{
          echo '<div>Your password is incorrect.</div>';
        }
      }else{
        $nid = $frow['nid'];
        $sql="SELECT 'e.phone_number', 'o.otp'
         from external_db e,users u, otp o
          WHERE 'e.nid'='u.nid' and 'e.nid'='o.nid' and 'u.email' = 'o.email' 'e.nid' ='$nid'";
        $result = mysqli_query($conn, $sql);
        $f= mysqli_fetch_array($result);
        $phone=$f['phone_number'];
        $otp = $f['otp'];
        echo "<script>alert('Verify OTP sent to $phone. OTP is $otp.')</script>";
        ?><script>
        window.location.href = "submitOTP.php"
      </script><?php
      }
    }else{
      echo "<script>alert('Incorrect NID.')</script>";
      }
  }else{
    $sql = "SELECT * FROM admin WHERE  admin_name='$n' and password = '$p'";
    $result = mysqli_query($conn, $sql);
    $frow = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) ==1){
      $_SESSION['id'] =  $frow['admin_id'];
      header("Location: ahomepage.php");
    }else{
      echo "<script>alert('Incorrect Login Credentials.')</script>";
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
    <title>Login</title>
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

              <form style="width: 23rem;" method = "POST">

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                <div class="form-outline mb-4">
                  <input type="text" id="form2Example18" class="form-control form-control-lg" name='nid' placeholder="Enter your NID Number" Required />
                  <label class="form-label" for="form2Example18">NID</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form2Example28" class="form-control form-control-lg" name='pass' placeholder="Enter your Password" Required/>
                  <label class="form-label" for="form2Example28">Password</label>
                </div>

                <div class="pt-1 mb-4">
                  <button type="submit" class="btn btn-warning" type="button">Login</button>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="forgotPassword.php">Forgot password?</a></p>
                <p>Don't have an account? <a href="signup.php" class="link-warning">Register here</a></p>

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