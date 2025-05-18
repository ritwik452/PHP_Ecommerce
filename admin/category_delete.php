<?php
require_once('config/connection.php');
try{
    $cat_id=$_POST['cat_id'];
    $del="UPDATE category SET status='0' WHERE cat_id=$cat_id";
    mysqli_query($conn, $del);
    header('location:category.php?msg=User details delete successfully');
    //echo 'Delete successfully';
}catch(Exception $e){
    //echo $e->getMessage();
    header('location:category.php?err=User details not delete successfully');
}

?>