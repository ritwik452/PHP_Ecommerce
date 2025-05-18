<?php
require_once('include/header.php');
require_once('include/side_navbar.php');
// include('include/top_navbar.php');
require_once('config/connection.php');
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update user</h3>
                            <a href="regist.php"class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                                                
                                        $aid=$_POST['aid'];
                                        $query="SELECT * FROM admin WHERE aid='$aid' ";
                                        $result=mysqli_query($conn,$query);
                                        $row=mysqli_fetch_assoc($result);
      
                                    ?>
                                    <form action="updatecode.php" method="post">
                                        <div class="modal-body">
                                        <div class="form-group">
                                    <label for="">NAME</label>
                                    <input type="text" name="aname" value= "<?php echo $row['aname']?>"class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                    <label for="">EMAIL</label>
                                    <input type="email" name="aemail" value= "<?php echo $row['aemail']?>" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                    <label for="">PASSWORD</label>

                                    <input type="password" name="apwd" value= "<?php echo $row['apwd']?>" class="form-control" placeholder="Enter password">
                                    <input type="hidden" name="aid" value="<?php echo $row['aid']?>">
                                    </div>
                                    </div>
                                                        
                                  <div class="modal-footer">
                                   <input type="submit" name="ok" value="Update" class="btn btn-primary">
                                  </div>
                             </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>







<?php include('include/script.php');?>
<?php include('include/footer.php');?>