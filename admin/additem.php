<?php
require_once('config/connection.php');
?>

<?php

if (isset($_POST['ok'])) {
    $i_title=$_POST['i_title'];
    $i_price=$_POST['i_price'];
    $i_s_desc=$_POST['i_s_desc'];
    $i_desc=$_POST['i_desc'];
    $fname=$_FILES['ff']['name'];

    
    $cat_id=$_POST['cat_id'];
    $br_id=$_POST['br_id'];
    
    $fpath="item_img/".microtime(true)."_".$fname;
    if(move_uploaded_file($_FILES['ff']['tmp_name'], "../".$fpath)){
        $sql="INSERT INTO item (i_title,i_price,i_s_desc,i_desc, i_img, cat_id, br_id) VALUES('$i_title','$i_price','$i_s_desc','$i_desc','$fpath', $cat_id, $br_id)";
        $result=mysqli_query($conn,$sql);
      if ($result) {
        $_SESSION ['status']="Item add successful";
        header("Location:item.php");
      }else {
        $_SESSION ['status']="Item not add successfully";
        header("Location:item.php");
      }
    }else{
      $_SESSION ['status']="Please try again later";
      header("Location:item.php");
    }

 }

?>