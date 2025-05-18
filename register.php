<?php 
require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');
?>
    <div class="container">
    <h2>New Customer SignUp here</h2>
    <div class="col-6">
        <form class="mt-3" method="post" name="reg-frm" id="reg-frm">
            <div class="mb-3">
                <label for="c_fname" class="form-label"> Enter First Name </label> <span class="text-danger" id="invalid-c_fname"></span>
                <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Enter Name">
            </div>

            <div class="mb-3">
                <label for="c_lname" class="form-label"> Enter Last Name </label> <span class="text-danger" id="invalid-c_lname"></span>
                <input type="text" class="form-control" id="c_lname" name="c_lname" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="c_email" class="form-label">Email address</label> <span class="text-danger" id="invalid-c_email"></span>
                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="c_pwd" class="form-label">Password</label> <span class="text-danger" id="invalid-c_pwd"></span>
                <input type="password" class="form-control" id="c_pwd" name="c_pwd" placeholder="Password">
            </div>

            <div class="mb-3">
                <label for="c_mobile" class="form-label">Mobile Number</label> <span class="text-danger" id="invalid-c_mobile"></span>
                <input type="text" class="form-control" id="c_mobile" name="c_mobile" placeholder="Mobile Number">
            </div>
        <button name="ok" type="submit" id="reg" value="register" class="btn btn-primary w-100"><i class="fa-solid fa-user-plus"></i> SignUp</button>
     </form>

            <?php
                 if (isset($_POST['ok']))
                 {
                    $c_fname=$_POST['c_fname'];
                    $c_lname=$_POST['c_lname'];
                    $c_email=$_POST['c_email'];
                    $c_pwd=$_POST['c_pwd'];
                    $c_mobile=$_POST['c_mobile'];

                    $query="INSERT INTO customer ( c_fname,c_lname, c_email, c_pwd,c_mobile) VALUES('$c_fname','$c_lname','$c_email','$c_pwd','$c_mobile')";
                    $data=mysqli_query($conn,$query);
                    if($data)
                    {
                        ?>

                        <script>
                         window.location="signin.php?msg=SignUp successfully";
                        </script>
                        <?php
                        echo "successful";
                    }else{
                        echo "unsuccessful";
                    }
                }
                    
                ?>

        </div>
        </div>

        
       

        <?php
include('include/footer.php');
?>
        
        