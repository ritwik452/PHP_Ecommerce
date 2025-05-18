<?php 
require_once('config/connection.php');
$aname=$_POST['aname'];
$aemail=$_POST['aemail'];
$apwd=$_POST['apwd'];
$aid=$_POST['aid'];


$upd="UPDATE admin SET aname='$aname',aemail='$aemail',apwd='$apwd' WHERE aid=$aid";
$res=mysqli_query($conn,$upd) or die(mysqli_error($conn));
if ($res==1) {
   header('location:regist.php?msg=update success');
}else {
    header('location:regist.php?msg=update unsuccess');
}
?>
