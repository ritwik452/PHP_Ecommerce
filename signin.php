<?php 
require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');
?>

<!-- Modal body -->
<!-- <script src="js/jquery-3.7.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="authModalLabel">ClikShop <img src="./img/logo.png" alt=""></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs" id="authTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
        </li>
        </ul>
        

        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab"></div>







        </div>
    </div>
    </div>
</div>
</div>


 -->
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Registrations</title>
        </head>
        <body>
    <div class="container">
    <h2>Customer SignIn</h2>
    <div class="col-6">
        <form class="mt-3" method="post" name="reg-frm" id="reg-frm">
            <div class="mb-3">
                <label for="c_email" class="form-label">Email address</label> <span class="text-danger" id="invalid-c_email"></span>
                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="c_pwd" class="form-label">Password</label> <span class="text-danger" id="invalid-c_pwd"></span>
                <input type="password" class="form-control" id="c_pwd" name="c_pwd" placeholder="Password">
            </div>

            <button name="ok" type="submit" id="reg" value="Signin" class="btn btn-primary w-100"><i class="fa-solid fa-arrow-right-to-bracket"></i> SignIn</button>
        </form>

            <?php
                  if(isset($_POST['ok'])){
                    $c_email=$_POST['c_email'];
                    $c_pwd=$_POST['c_pwd'];
                    $query="SELECT * FROM customer WHERE c_email='$c_email' AND c_pwd='$c_pwd'";
                    try{
                        
                        $rs=mysqli_query($conn, $query);
                        if(mysqli_num_rows($rs)){
                            $row=mysqli_fetch_assoc($rs);
                                $_SESSION['c_info']=$row;
                                // print_r($_SESSION['c_info']);
                             ?>
                            <script>
                             window.location="index.php?msg=login successfully";
                            </script>
                            <?php
                            // header('location:index.php');
                        }else{
                            ?>
                            <div class="alert alert-danger">
                                Invalid email or password
                            </div>
                            <?php
                        }
                    }catch(Exception $e){
                        echo $e;
                    }
                }  
            ?>
        Don't have an account? <a href="register.php">Click here</a>
        </div>
        </div>

        
        <?php
include('include/footer.php');
?>

        
        