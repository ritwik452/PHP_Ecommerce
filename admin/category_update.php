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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update user</h3>
                            <a href="category.php"class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                                                
                                        $cat_id=$_POST['cat_id'];
                                        $query="SELECT * FROM category WHERE cat_id='$cat_id' ";
                                        $result=mysqli_query($conn,$query);
                                        $row=mysqli_fetch_assoc($result);
      
                                    ?>
                                    <form action="category_updatecode.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <label for="">CATEGORY NAME</label>
                                    <input type="text" name="cat_name" value= "<?php echo $row['cat_name']?>"class="form-control">
                                    <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
                                    <input type="hidden" name="old_img" value="<?php echo $row['c_img'] ?>">
                                    </div>
                                    <div class="form-group">
                                     <label for="aimg">Category Image</label>
                                     <input type="file" name="c_img" id="c_img">
                                      <img src="<?php echo '../'. $row['c_img']; ?>" alt="image" width="75" height="75">
                                    </div>
                                    </div>
                                    </div>
                                                        
                                  <div class="modal-footer">
                                   <input type="submit" name="ok" value="Update Category" class="btn btn-primary">
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