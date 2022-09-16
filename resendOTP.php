<?php 
require_once('DBconnect.php');
$nid = $_GET['nid'];
$email=$_GET['email'];
$sql = "SELECT otp from otp
            WHERE nid = '$nid'
            and email ='$email'";
$query= mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>4){
        $sql="DELETE FROM `otp` WHERE email='$email' and nid='$nid'";
      $query= mysqli_query($conn, $sql);
      $sql="DELETE FROM `users` WHERE email='$email' and nid='$nid'";
      $query= mysqli_query($conn, $sql);
      echo "<script>alert('Account bound to $nid is removed. Sign up again')</script>";
        ?><script>
        window.location.href = '<?php echo "signup.php";?>'
      </script><?php 
}else{
    $otp = rand(100000,999999);
    $sql1 = "INSERT INTO otp VALUES ('$email','$otp','$nid')";
    $r = mysqli_query($conn, $sql1);
    if($r){
        $sql2="select phone_number from external_db where nid='$nid'";
        $q = mysqli_query($conn, $sql2);
        $phone= mysqli_fetch_row($q)[0];
        echo "<script>alert('OTP sent to $phone is: $otp')</script>";
            ?><script>
            window.location.href = '<?php echo "submitOTP.php?nid=$nid&email=$email";?>'
        </script><?php 
    }
}
?>