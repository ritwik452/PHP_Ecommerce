<?php
require_once('config/connection.php');
try{
    $aid=$_POST['aid'];
    $del="DELETE FROM admin WHERE aid=$aid";
    mysqli_query($conn, $del);
    header('location:regist.php?msg=User details delete successfully');
    //echo 'Delete successfully';
}catch(Exception $e){
    //echo $e->getMessage();
    header('location:regist.php?err=User details not delete successfully');
}

?>