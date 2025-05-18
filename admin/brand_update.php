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
                            <h3 class="card-title">Update Brand</h3>
                            <a href="brand.php"class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                                                
                                        $br_id=$_POST['br_id'];
                                        $query="SELECT * FROM brand WHERE br_id='$br_id' ";
                                        $result=mysqli_query($conn,$query);
                                        $row=mysqli_fetch_assoc($result);
      
                                    ?>
                                    <form action="brand_updatecode.php" method="post">
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <label for="">BRAND NAME</label>
                                    <input type="text" name="br_name" value= "<?php echo $row['br_name']?>"class="form-control" placeholder="Enter Name">
                                    </div>
                                    <input type="hidden" name="br_id" value="<?php echo $row['br_id']?>">
                                    </div>
                                    </div>
                                                        
                                  <div class="modal-footer">
                                   <input type="submit" name="ok" value="Update Brand" class="btn btn-primary">
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