
<?php
require_once('config/connection.php');
?>
<?php
if (isset($_POST['brand_save' ])) {
    $br_name=$_POST['br_name'];
    $br_query="INSERT INTO brand (br_name) values('$br_name')";
    $br_result=mysqli_query($conn,$br_query);
    if ($br_result) {
      $_SESSION['status']="brand insert successful";
      header("Location:brand.php");
  
    }
    else {
      
      $_SESSION['status']="brand insert failed";
      header("Location:brand.php");
    }
  }
?>