<?php
require_once('config/connection.php');

?>
<?php

if (isset($_POST['ok'])) {
    $aname=$_POST['aname'];
    $aemail=$_POST['aemail'];
    $apwd=$_POST['apwd'];
    $sql="INSERT INTO admin (aname,aemail,apwd) VALUES('$aname','$aemail','$apwd')";
    // try {
    //     $result=mysqli_query($conn,$sql);
    //     echo "User Registration Successful";
    //     header("locaton:regist.php");
    // } catch (Exception $th) {
    //     echo $th->getMessage();
    // }
    $result=mysqli_query($conn,$sql);
  if ($result) {
    $_SESSION ['status']="registrations successful";
    header("Location:regist.php");
  }
  else {
    $_SESSION ['status']="registration failed";
    header("Location:regist.php");
}

 }

?>