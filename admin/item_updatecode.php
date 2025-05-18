<?php 
require_once('config/connection.php'); 
$i_title=$_POST['i_title'];
$i_price=$_POST['i_price'];
$i_s_desc=$_POST['i_s_desc'];
$i_desc=$_POST['i_desc'];
$i_img=$_POST['i_img'];
$i_id=$_POST['i_id'];




$upd="UPDATE item SET i_title='$i_title',i_price='$i_price',i_s_desc='$i_s_desc',i_desc='$i_desc',i_img='$i_img' WHERE i_id=$i_id";
$res=mysqli_query($conn,$upd) or die(mysqli_error($conn));
if ($res==1) {
   header('location:item.php?msg=update success');
}else {
    header('location:item.php?msg=update unsuccess');
}
?>
