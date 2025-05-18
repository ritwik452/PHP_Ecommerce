<?php
require_once('config/connection.php');
try{
    $br_id=$_POST['br_id'];
    $del="UPDATE brand SET status='0' WHERE br_id=$br_id";
    mysqli_query($conn, $del);
    header('location:brand.php?msg=User details delete successfully');
    //echo 'Delete successfully';
}catch(Exception $e){
    //echo $e->getMessage();
    header('location:brand.php?err=User details not delete successfully');
}

?>