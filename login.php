
<?php
require_once('config/connection.php');
?>
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
<title></title>
</head>
<body>
    <div class="container">
        <h2>Login Page</h2>
        <div class="col-6">
    

<form name="frm" method="post">
          
            <label>Email<span>*</span></label>
            <input type="email" name="c_email" id="c_email" class="form-control" placeholder="Enter Your Email" required>
          </p>
          <p>
            <label>Password<span>*</span></label>
            <input type="password" name="c_pwd" id="c_pwd" class="form-control" placeholder=" Enter Password" required>
          </p>
          <p>
            <input type="submit" name="ok" value="Sing In" />
            
          </p>
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
        </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>