<?php
session_start();
require_once('DBconnect.php');
if(!empty($_SESSION['id']) && $_SESSION['id']>=10){
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
          </ul>'
        </div>
      </div>
    </nav>
    <!-- Navbar -->






<!-- Start your project here-->

<?php
$id = $_SESSION['id'];
$comb_id = $_GET['selection'];
if (!empty($comb_id)){
  $sql = 'SELECT * FROM vaccine_history WHERE id = '.$id.' AND comb_id='.$comb_id.'';
  $check = mysqli_query($conn, $sql);
  if(mysqli_num_rows($check)==0){
    $sql1 = 'INSERT INTO vaccine_history VALUES ('.$id.','.$comb_id.', "Not Paid", "Not Vaccinated");';
    $query = mysqli_query($conn, $sql1);
    if($query) {
      $sql2='UPDATE inventory SET quantity = quantity-1  WHERE comb_id = '.$comb_id.'';
      $result=mysqli_query($conn, $sql2);
      echo "<script>alert('Payslip is being generated.')</script>";
        ?><script>
        window.location.href = "uDashboard.php"
      </script><?php
    }
    else {
      echo "<script>alert('Something went wrong.')</script>";
        ?><script>
        window.location.href = "getVaccine.php"
      </script><?php
    }
  }else{
    echo "<script>alert('Identical appointment already made.')</script>";
        ?><script>
        window.location.href = "getVaccine.php"
      </script><?php
  
 }
}

?>

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