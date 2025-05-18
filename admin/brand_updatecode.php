<?php 
require_once('config/connection.php'); 
$br_name=$_POST['br_name'];
$br_id=$_POST['br_id'];


$upd="UPDATE brand SET br_name='$br_name' WHERE br_id='$br_id' ";
$res=mysqli_query($conn,$upd) or die(mysqli_error($conn));
if ($res==1) {
   header('location:brand.php?msg=update success');
}else {
    header('location:brand.php?msg=update unsuccess');
}
?>