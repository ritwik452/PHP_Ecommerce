<?php 
require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');
?>
     <div class="container">
    <h2>Your Profile</h2>
    <?php
        $cus_id=$_SESSION['c_info']['cus_id'];
        // echo $cus_id;
        // print_r($_SESSION['c_info']);
        $query="SELECT * FROM customer WHERE cus_id=$cus_id" ;
        $rs=mysqli_query($conn, $query);
        $rec=mysqli_fetch_assoc($rs);
    ?>
    <div class="col-6">
        <form class="mt-3" method="post" name="reg-frm" id="reg-frm">
            <div class="mb-3">
                <label for="c_fname" class="form-label"> Enter First Name </label> <span class="text-danger" id="invalid-c_fname"></span>
                <input value="<?php echo $rec['c_fname'] ?>" type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Enter Name">
            </div>

            <div class="mb-3">
                <label for="c_lname" class="form-label"> Enter Last Name </label> <span class="text-danger" id="invalid-c_lname"></span>
                <input type="text" class="form-control" id="c_lname" name="c_lname" value= <?php echo $rec['c_lname'] ?> placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="c_mobile" class="form-label">Mobile Number</label> <span class="text-danger" id="invalid-c_mobile"></span>
                <input type="text" class="form-control" id="c_mobile" name="c_mobile" value= <?php echo $rec['c_mobile'] ?> placeholder="Mobile Number">
            </div>
        <input name="ok" type="submit" id="reg" value="Save Changes" class="btn btn-primary w-100">
     </form>
        <?php
        if (isset($_SESSION['update_success'])) {
            echo '<div class="alert alert-success">'.$_SESSION['update_success'].'</div>';
            unset($_SESSION['update_success']);
        }
        ?>
            <?php
                 if(isset($_POST['ok']))
                 {
                    $c_fname=$_POST['c_fname'];
                    $c_lname=$_POST['c_lname'];
                    $c_mobile=$_POST['c_mobile'];

                    $query="UPDATE customer SET c_fname='$c_fname',c_lname='$c_lname',c_mobile='$c_mobile' WHERE cus_id=$cus_id";
                    $data=mysqli_query($conn,$query);
                    if($data)
                    {
                        $_SESSION['c_info']['c_fname'] = $c_fname;
                        $_SESSION['c_info']['c_lname'] = $c_lname; 
                        $_SESSION['c_info']['c_mobile'] = $c_mobile;

                        $_SESSION['update_success'] = "Your profile was updated successfully.";
                        ?>
                        <script>
                            window.location='profile.php';
                        </script>
                        <?php
                    }else{
                        echo " Your Profile Not Update Successfully";
                    }
                }
                    
                ?>

        </div>
        </div>
        
       

        <?php
include('include/footer.php');
?>
        
        