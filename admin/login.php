<?php
require_once('config/connection.php');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    *,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  font-weight: 400;
  color: #666666;
  background: #eaeff4;
}

.wrapper {
  margin: 0 auto;
  width: 100%;
  max-width: 1140px;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.container {
  position: relative;
  width: 100%;
  max-width: 600px;
  height: auto;
  display: flex;
  background: #ffffff;
  box-shadow: 0 0 5px #999999;
}

.credit {
  position: relative;
  margin: 25px auto 0 auto;
  width: 100%;
  text-align: center;
  color: #666666;
  font-size: 16px;
  font-weight: 400;
}

.credit a {
  color: #222222;
  font-size: 16px;
  font-weight: 600;
}

.col-left,
.col-right {
  padding: 30px;
  display: flex;
}

.col-left {
  width: 60%;
  -webkit-clip-path: polygon(0 0, 0% 100%, 100% 0);
  clip-path: polygon(0 0, 0% 100%, 100% 0);
  background: #44c7f5;
}

.col-right {
  padding: 60px 30px;
  width: 50%;
  margin-left: -10%;
}

@media(max-width: 575.98px) {
  .container {
    flex-direction: column;
    box-shadow: none;
  }

  .col-left,
  .col-right {
    width: 100%;
    margin: 0;
    -webkit-clip-path: none;
    clip-path: none;
  }

  .col-right {
    padding: 30px;
  }
}

.login-text {
  position: relative;
  width: 100%;
  color: #ffffff;
}

.login-text h2 {
  margin: 0 0 15px 0;
  font-size: 30px;
  font-weight: 700;
}

.login-text p {
  margin: 0 0 20px 0;
  font-size: 16px;
  font-weight: 500;
  line-height: 22px;
}

.login-text .btn {
  display: inline-block;
  padding: 7px 20px;
  font-size: 16px;
  letter-spacing: 1px;
  text-decoration: none;
  border-radius: 30px;
  color: #ffffff;
  outline: none;
  border: 1px solid #ffffff;
  box-shadow: inset 0 0 0 0 #ffffff;
  transition: .3s;
  -webkit-transition: .3s;
}

.login-text .btn:hover {
  color: #44c7f5;
  box-shadow: inset 150px 0 0 0 #ffffff;
}

.login-form {
  position: relative;
  width: 100%;
}

.login-form h2 {
  margin: 0 0 15px 0;
  font-size: 22px;
  font-weight: 700;
}

.login-form p {
  margin: 0 0 10px 0;
  text-align: left;
  color: #666666;
  font-size: 15px;
}

.login-form p:last-child {
  margin: 0;
  padding-top: 3px;
}

.login-form p a {
  color: #44c7f5;
  font-size: 14px;
  text-decoration: none;
}

.login-form label {
  display: block;
  width: 100%;
  margin-bottom: 2px;
  letter-spacing: .5px;
}

.login-form p:last-child label {
  width: 60%;
  float: left;
}

.login-form label span {
  color: #ff574e;
  padding-left: 2px;
}

.login-form input {
  display: block;
  width: 100%;
  height: 35px;
  padding: 0 10px;
  outline: none;
  border: 1px solid #cccccc;
  border-radius: 30px;
}

.login-form input:focus {
  border-color: #ff574e;
}

.login-form button,
.login-form input[type=submit] {
  display: inline-block;
  width: 100%;
  margin-top: 5px;
  color: #44c7f5;
  font-size: 16px;
  letter-spacing: 1px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #44c7f5;
  border-radius: 30px;
  box-shadow: inset 0 0 0 0 #44c7f5;
  transition: .3s;
  -webkit-transition: .3s;
}

.login-form button:hover,
.login-form input[type=submit]:hover {
  color: #ffffff;
  box-shadow: inset 250px 0 0 0 #44c7f5;
}
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2>Administration Login</h2>
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <form name="frm" method="post">
          
            <label>Email<span>*</span></label>
            <input type="email" name="aemail" id="aemail" class="form-control" placeholder="Enter Your Email" required>
          </p>
          <p>
            <label>Password<span>*</span></label>
            <input type="password" name="apwd" id="apwd" class="form-control" placeholder=" Enter Password" required>
          </p>
          <p>
            <input type="submit" name="ok" value="Sing In" />
            <button class="logout-btn">Logout</button>

          </p>
          <?php
            if(isset($_POST['ok'])){
                $aemail=$_POST['aemail'];
                $apwd=$_POST['apwd'];
                $src="SELECT * FROM admin WHERE aemail='$aemail' AND apwd='$apwd'";
                try{
                    $rs=mysqli_query($conn, $src);
                    if(mysqli_num_rows($rs)>0){
                        $rec=mysqli_fetch_assoc($rs);
                        $_SESSION['a_info']=$rec;
                        ?>
                        <script>
                        window.location="index.php ?msg=admin login successfully";
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
        </form>
      </div>
    </div>
  </div>

</div>

<?php include('include/script.php');?>
</body>
</html>
