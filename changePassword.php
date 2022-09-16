<?php
session_start();
require_once('DBconnect.php');
if(!empty($_SESSION['id']) && $_SESSION['id']>=10){
  $id=$_SESSION['id'];
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $frow = mysqli_fetch_array($result);
  $name = $frow['fname'];
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Vaccination System</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <!--Search Bar-->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/search.css" rel="stylesheet" />

  </head>

  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
      <div class="container">
        <a class="navbar-brand" href="uhomepage.php">
          <p><img src="images/injection.png"> Vaccination System</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="uhomepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uDashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

<br><br><br><br>
<?php
if(count($_POST)>0) {
    $sql1 = "SELECT * FROM users WHERE id ='$id'";
    $check = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result) ==1){
      $frow = mysqli_fetch_array($check);
      $hash = $frow['password'];
      $v=password_verify($_POST['oldPass'],$hash);
      $pass1 = $_POST['pass1'];
      $pass2 = $_POST['pass2'];
      if($v && $pass1 == $pass2){
        $hash = password_hash($pass1,PASSWORD_DEFAULT);
        $sql2 = 'UPDATE users 
            SET password = "'.$hash.'" 
            WHERE id='.$id.'';
        $change= mysqli_query($conn, $sql2);
        echo "<script>alert('Updated Password')</script>";
        ?><script>
        window.location.href = "userSettings.php"
      </script><?php
      }else{
        echo "<script>alert('Passwords do not match')</script>";
        ?><script>
        window.location.href = "changePassword.php"
      </script><?php
      }
    }
}
?>



<!-- Start your project here-->

<div id="preview" class="preview" style="padding-top: 250px;">
    <div style="display: none;"></div>
    <div>
        <div data-draggable="true" style="position: relative;">
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">

                    <div class="card mx-4 mx-md-5 text-left shadow-5-strong"
                        style=" margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px); ">

                        <div class="card-body px-4 py-5 px-md-5">
                          <form method="post" action="changePassword.php" style="width: 23rem;">
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change Password</h3>

                            <div class="form-outline mb-4">
                              <input type="password" name="oldPass" id="text" class="form-control form-control-lg" />
                              <label class="form-label" for="form2Example28" required>Old Password</label>
                            </div>

                            <div class="form-outline mb-4">
                              <input type="password" name="pass1" id="text" class="form-control form-control-lg" />
                              <label class="form-label" for="form2Example28" required>New Password</label>
                            </div>
                            <div class="form-outline mb-4">
                              <input type="password" name="pass2" id="text" class="form-control form-control-lg" />
                              <label class="form-label" for="form2Example28" required>Confirm Password</label>
                            </div>
                            <div class="pt-1 mb-4">
                              <button type="submit" name="submit" class="btn btn-warning" type="button">Update</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </section>
            </section>
            <!---->
        </div>
    </div>
</div>
</br>
</br>
</br>
<!-- End your project here-->




    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Search Bar-->
    <script src="js/search.js"></script>

  </body>

</html>

<style>
  /* Color of the links BEFORE scroll */
  .navbar-scroll .nav-link,
  .navbar-scroll .navbar-toggler-icon,
  .navbar-scroll .navbar-brand {
    color: #262626;
  }

  /* Color of the navbar BEFORE scroll */
  .navbar-scroll {
    background-color: #fdca3d;
  }

  /* Color of the links AFTER scroll */
  .navbar-scrolled .nav-link,
  .navbar-scrolled .navbar-toggler-icon,
  .navbar-scroll .navbar-brand {
    color: #262626;
  }

  /* Color of the navbar AFTER scroll */
  .navbar-scrolled {
    background-color: #fff;
  }

  /* An optional height of the navbar AFTER scroll */
  .navbar.navbar-scroll.navbar-scrolled {
    padding-top: auto;
    padding-bottom: auto;
  }

  .navbar-brand {
    font-size: 30px;
    height: 3.5rem;
  }
</style>
<?php
	}
	else{
		header("Location: accessDenied.php");
	}
?>