<?php
session_start();
require_once('DBconnect.php');
$id = $_SESSION['id'];
$access = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '$id'");
if(!empty($_SESSION['id']) && mysqli_num_rows($access) != 0){
?>

<?php
$cid = $_GET['cid'];
$uid = $_GET['uid'];
$result = mysqli_query($conn, "SELECT U.id, U.nid, VH.comb_id, H.name, I.vac_name, I.date, VH.fpayment, VH.fvaccine FROM vaccine_history VH, users U, inventory I, hospital H WHERE 
                                U.id = VH.id AND VH.comb_id= I.comb_id AND I.h_id = H.h_id AND VH.comb_id = '$cid' AND VH.id = '$uid'");
$row = mysqli_fetch_array($result);


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
            <form method="post" action='<?php echo "viewUser.php?uid=$uid"?>'>
              <button type="submit" class="btn btn-dark ms-3"><- Go Back</button>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->






<!-- Start your project here-->

<div id="preview" class="preview" style="padding-top: 250px;">
    <div style="display: none;"></div>
    <div>
        <div data-draggable="true" style="position: relative;">
            <!---->
            <!---->
            <section draggable="false" class="container pt-5" data-v-271253ee="">
                <section class="mb-10">

                    <div class="card mx-4 mx-md-5 text-left shadow-5-strong"
                        style=" margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px); ">

                        <div class="card-body px-4 py-5 px-md-5">
                        <form method="GET" action="editUser.php" style="width: 23rem;">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit User Status</h3>

                            
                              <input hidden type="text" name="uid" id="text" value = "<?php echo "$row[0]" ?>" class="form-control form-control-lg" readonly />
                              
                            

                            <div class="form-outline mb-4">
                              <input type="text" name="nid" id="text" value = "<?php echo "$row[1]" ?>" class="form-control form-control-lg" readonly />
                              <label class="form-label" for="form2Example18">User NID</label>
                            </div>

                         
                              <input hidden type="text" name="cid" id="text" value = "<?php echo "$row[2]" ?>" class="form-control form-control-lg" readonly/>
                              
                           

                            <div class="form-outline mb-4">
                              <input type="text" name="hname" id="text" value = "<?php echo "$row[3]" ?>" class="form-control form-control-lg" readonly/>
                              <label class="form-label" for="form2Example28">Hosptial Name</label>
                            </div>

                            <div class="form-outline mb-4">
                              <input type="text" name="vname" id="text" value = "<?php echo "$row[4]" ?>" class="form-control form-control-lg" readonly/>
                              <label class="form-label" for="form2Example28">Vaccine Name</label>
                            </div>

                            <div class="form-outline mb-4">
                              <input type="text" name="date" id="text" value = "<?php echo "$row[5]" ?>" class="form-control form-control-lg" readonly/>
                              <label class="form-label" for="form2Example28">Date</label>
                            </div>

                            <table>
                                <tr>
                                <td class="px-4 py-2">
                                <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Payment Status: </label> <br>

                                <?php if($row[6] == "Paid") { ?>
                                    <input type="radio" name="fpayment" id="text" value = "Paid" checked/>  Paid <br>
                                <?php }
                                else {?>
                                    <input type="radio" name="fpayment" id="text" value = "Paid" /> Paid <br>
                                <?php }
                                ?>

                                <?php if($row[6] == "Not Paid") { ?>
                                    <input type="radio" name="fpayment" id="text" value = "Not Paid" checked/>  Not Paid <br>
                                <?php }
                                else {?>
                                    <input type="radio" name="fpayment" id="text" value = "Not Paid"/>  Not Paid <br>
                                <?php }
                                ?>
                                </td>

                                </div>


                                <td class="px-4 py-2">
                                <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Vaccination Status: </label><br>

                                <?php if($row[7] == "Vaccinated") { ?>
                                    <input type="radio" name="fvaccine" id="text" value = "Vaccinated" checked/>    Vaccinated <br>
                                <?php }
                                else {?>
                                    <input type="radio" name="fvaccine" id="text" value = "Vaccinated"/>    Vaccinated <br>
                                <?php }
                                ?>

                                <?php if($row[7] == "Not Vaccinated") { ?>  
                                    <input type="radio" name="fvaccine" id="text" value = "Not Vaccinated" checked/>    Not Vaccinated <br>
                                <?php }
                                else {?>
                                    <input type="radio" name="fvaccine" id="text" value = "Not Vaccinated"/>    Not Vaccinated <br>
                                <?php }
                                ?>

                                </div>
                                </td>
                                </tr>
                            </table>

                            <div class="pt-1 mb-4">
                              <button type="submit" name="submit" class="btn btn-success" type="button">Save Changes</button>
                            </div>
                            


                            </form>
                            <?php
                              if (isset($_GET['submit']) && isset($_GET['uid']) && isset($_GET['nid']) && isset($_GET['cid']) && isset($_GET['hname']) && isset($_GET['vname']) && isset($_GET['date']) && isset($_GET['fpayment']) && isset($_GET['fvaccine'])
                                  && !empty($_GET['uid']) && !empty($_GET['nid']) && !empty($_GET['cid']) && !empty($_GET['hname']) && !empty($_GET['vname']) && !empty($_GET['date']) && !empty($_GET['fpayment']) && !empty($_GET['fvaccine'])) {
                                $uid = $_GET['uid'];
                                $nid = $_GET['nid'];
                                $cid = $_GET['cid'];
                                $hname = $_GET['hname'];
                                $vname = $_GET['vname'];
                                $date = $_GET['date'];
                                $fpayment = $_GET['fpayment'];
                                $fvaccine = $_GET['fvaccine'];

                                $query = "UPDATE vaccine_history SET fpayment='$fpayment', fvaccine='$fvaccine' WHERE comb_id='$cid' AND id = '$uid'";
                                
                                $data = mysqli_query($conn, $query);
                                if($data) {
                                    echo "<script>alert('USER STATUS UPDATED')</script>";
                                    ?>
                                    <script>
                                      window.location.href = '<?php echo "viewUser.php?uid=$uid"?>'
                                    </script>
                                    <?php
                                }
                                
                              }
                              else if (isset($_GET['submit'])){
                                echo "<script>alert('CANNOT UPDATE USER STATUS')</script>";
                                ?>
                                <script>
                                  window.location.href = '<?php echo "viewUser.php?uid=$uid"?>'
                                </script>
                                <?php
                              }
                            ?>
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

  input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #fdca3d;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }
</style>

<?php
	}
	else{
		header("Location: accessDenied.php");
	}

?>

