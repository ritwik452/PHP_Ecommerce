<?php 
require_once('config/connection.php');
?>
<?php

// $cat_name=$_POST['cat_name'];
// $cat_id=$_POST['cat_id'];
// $c_img=$_FILES['c_img']['name'];


// $upd="UPDATE category SET cat_name='$cat_name' c_img='$c_img' WHERE cat_id='$cat_id' ";
// $res=mysqli_query($conn,$upd) or die(mysqli_error($conn));
// if ($res==1) {
//    header('location:category.php?msg=update success');
// }else {
//     header('location:category.php?msg=update unsuccess');
// }

// if (isset($_POST['ok'])) {
//     $cat_id=$_POST['cat_id'];
//     $cat_name=$_POST['cat_name'];
//     $old_img=$_POST['old_img'];
//     $new_img=$_FILES['c_img']['name'];


// if ($new_img !='')
//  {
//     $upd_flname=$new_img;
   
// }
// else
// {
//     $upd_flname=$old_img;
// }

// if (file_exists("cat_img/".$_FILES['c_img']['name']))
// {
//    $filename=$_FILES['c_img']['name'];
//    $_SESSION['status']=$filename."Image already Exit";
//    header('location:category_update.php');

// }
// else{
  
//     $update_img_query="UPDATE category SET cat_name='$cat_name',c_img='$upd_flname' WHERE cat_id='$cat_id' ";   
// $res=mysqli_query($conn,$update_img_query);
// if ($res) {
//     if ($_FILES['c_img']['name'] !='') {
//         move_uploaded_file($_FILES['c_img']['tmp_name'], "cat_img/".$_FILES['c_img']['name']);
//         unlink("cat_img/". $old_img);
//     }
//     $_SESSION['status']="image update successfull";
//     header('location:category.php');
// }
// else{
//     $_SESSION['status']="image update not successfull";
//     header('location:category.php');
// }

// }

// }
$cat_name=$_POST['cat_name'];
$cat_id=$_POST['cat_id'];
$fname=$_FILES['c_img']['name'];

if(empty($fname)){
    try{
        $upd=mysqli_query($conn, "UPDATE category SET cat_name='$cat_name' WHERE cat_id=$cat_id");
        $_SESSION['status']='Update successfull';
        header('location:category.php');
    }catch(Exception $e){
        $_SESSION['status']='Update unsuccessfull';
        header('location:category.php');
    }
}else{
    $old_img=$_POST['old_img'];
    $c_img="cat_img/".microtime(true)."_".$fname;
    if(move_uploaded_file($_FILES['c_img']['tmp_name'], "../".$c_img)){
        $sql="UPDATE category SET cat_name='$cat_name', c_img='$c_img' WHERE cat_id=$cat_id";
        try{
            $rs=mysqli_query($conn,$sql);
            $_SESSION['msg']='File update successfully';
            unlink($oldfpath);
            header('location:category.php');
        }catch(Exception $e){
            $_SESSION['err']=$e->getMessage();
            header('location:category.php');
        }
    }else{
        $_SESSION['err']='File not update successfully';
        header('location:category.php');
    }
}

?>



