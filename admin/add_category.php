
<?php
require_once('config/connection.php');
?>
<?php
if (isset($_POST['category_save' ])) {
    $cat_name=$_POST['cat_name'];
    $fname=$_FILES['c_img']['name'];
    $fpath="cat_img/".microtime(true)."_".$fname;

    if(move_uploaded_file($_FILES['c_img']['tmp_name'], "../".$fpath)) {
    $cat_query="INSERT INTO category (cat_name,c_img) values('$cat_name','$fpath')";
    $cat_result=mysqli_query($conn,$cat_query);
  
 
    if ( $cat_result) {
      $_SESSION['status']="category insert successful";
      header("Location:category.php");
  
    }
  }
  else {
      
      $_SESSION['status']="category insert failed";
      header("Location:category.php");
    }
   
  }
?>