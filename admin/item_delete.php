<?php
require_once('config/connection.php');
$i_id=$_POST['i_id'];
try{
    $rs=mysqli_query($conn, "SELECT * FROM item WHERE i_id=$i_id");
    $rec=mysqli_fetch_assoc($rs);

    $del=mysqli_query($conn, "DELETE FROM item WHERE i_id=$i_id");
    if($del==1){
        unlink("../".$rec['fpath']);
        $_SESSION['msg']='Item Delete successfully';
        header('location:item.php');
    }
}catch(Exception $e){
    $err=$e->getMessage();
    $_SESSION['err']=$err;
    header('location:item.php');
}


?>