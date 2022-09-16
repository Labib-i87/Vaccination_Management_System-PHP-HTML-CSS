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
            <button onclick="location.href='searchUser.php'" type="button" class="btn btn-dark ms-3"><- Go Back</button>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->






<!-- Start your project here-->
<br><br><br><br><br>




<?php

$uid = $_GET['uid'];
$result = mysqli_query($conn, "SELECT VH.comb_id, U.nid, H.name, I.vac_name, I.date, VH.fpayment, VH.fvaccine FROM vaccine_history VH, users U, inventory I, hospital H WHERE 
                                U.id = VH.id AND VH.comb_id= I.comb_id AND I.h_id = H.h_id AND U.id = '$uid'");



if(mysqli_num_rows($result) != 0) {


?>

<div class=container>
    <table class="table">
        <thead style="background-color: #fdca3d">
            <tr>
                <th scope="col">Comb ID</th>
                <th scope="col">User NID</th>
                <th scope="col">Hospital Name</th>
                <th scope="col">Vaccine Name</th>
                <th scope="col">Date</th>
                <th scope="col" style="text-align:center">Payment Status</th>
                <th scope="col" style="text-align:center">Vaccination Status</th>
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
                <td><?php echo "$row[2]"?></td>
                <td><?php echo "$row[3]"?></td>
                <td><?php echo "$row[4]"?></td>

                <?php if($row[5] == "Paid") { ?>
                    <td style="text-align:center"><span class="btn btn-outline-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>&emsp;&ensp;<?php echo "$row[5]"?>&emsp;&ensp;
                      </span></td>
                <?php }
                else {?>
                    <td style="text-align:center"><span class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>&emsp;<?php echo "$row[5]"?>
                      </span></td>
                <?php }
                ?>

                <?php if($row[6] == "Vaccinated") { ?>
                  <td style="text-align:center"><span class="btn btn-outline-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>&emsp;&ensp;<?php echo "$row[6]"?>&emsp;&ensp;
                      </span></td>
                <?php }
                else {?>
                    <td style="text-align:center"><span class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>&emsp;<?php echo "$row[6]"?>
                      </span></td>
                <?php }
                ?>

                <td class="text-center">
                    <a href='<?php echo "editUser.php?cid=$row[0]&uid=$uid"?>'><span class="btn btn-warning">Edit</span></a>
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
    echo "<script>alert('No User history')</script>";
    ?>
    <script>
        window.location.href = "searchUser.php"
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