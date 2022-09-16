<?php
session_start();
require_once('DBconnect.php');
$id = $_SESSION['id'];
$access = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '$id'");
if(!empty($_SESSION['id']) && mysqli_num_rows($access) != 0){
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
        <a class="navbar-brand" href="ahomepage.php">
          <p><img src="images/injection.png"> Vaccination System</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="ahomepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aDashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <button onclick="location.href='aDashboard.php'" type="button" class="btn btn-dark ms-3"><- Go Back</button>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->






<!-- Start your project here-->

<?php
$vname = $_GET['vname'];
if (!empty($vname)){
  $query = mysqli_query($conn, "DELETE FROM vaccine_price WHERE vac_name = '$vname'");
  if($query) {
    echo "<script>alert('VACCINE DELETED')</script>";
    ?>
      <script>
        window.location.href = "searchVaccine.php"
      </script>
    <?php
  }
  else {
    echo "<script>alert('ERROR: FAILED TO DELETE VACCINE')</script>";
    ?>
      <script>
        window.location.href = "searchVaccine.php"
      </script>
    <?php
  }
}

?>

<div class="s130">
    <form method="post" action="searchVaccine.php">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                        </path>
                    </svg>
                    
                </div>
                
                <input type="text" name="name" id="search" placeholder="Enter Vaccine Name" />
            </div>
            
            <div class="input-field second-wrap">
                <button type="submit" name="save" class="btn-search">SEARCH</button>
                
            </div>
            
        </div>
        
        
    </form>
    </br>


<?php

if(count($_POST)>0) {
  if(!empty($_POST['name'])) {
    $name = $_POST['name'];
    $result = mysqli_query($conn, "SELECT * FROM vaccine_price where vac_name LIKE '%".$name."%'");
  }
  else {
    $result = mysqli_query($conn, "SELECT * FROM vaccine_price");;
  }
}
else {
  $result = mysqli_query($conn, "SELECT * FROM vaccine_price");
}


if(mysqli_num_rows($result) != 0) {


?>
</div>
<div class=container>
<a style="float: right;" class="btn   btn-warning btn-lg py-3 px-5 mb-2 me-2" href="addVaccine.php"
          role="button" aria-controls="#picker-editor">Add Vaccine</a>
    <table class="table">
        <thead style="background-color: #fdca3d">
            <tr>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Price</th>
                <th colspan="2" class="text-center" scope="col">Selection</th>
            </tr>
        </thead>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>


        <tbody>
            <tr style="vertical-align: middle;">
                <th scope="row"><?php echo "$row[0]"?></th>
                <td><?php echo "$row[1]"?></td>
                <td class="text-center">
                    <a href='<?php echo "editVaccine.php?vname=$row[0]"?>'><span class="btn btn-warning">EDIT</span></a>
                </td>
                <td class="text-center">
                    <a href='<?php echo "searchVaccine.php?vname=$row[0]"?>'><span class="btn btn-danger">DELETE</span></a>
                </td>
            
            </tr>
            
        </tbody>
        <?php
        }
        ?>
    </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
}
else{
  echo "<script>alert('Vaccine not found')</script>";
  ?>
    <script>
      window.location.href = "searchVaccine.php"
    </script>
  <?php
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