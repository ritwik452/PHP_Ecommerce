<?php
require_once('include/header.php');
require_once('include/side_navbar.php');
// include('include/top_navbar.php');
require_once('config/connection.php');
?>
<?php                        
    $i_id=$_POST['i_id'];
    $query="SELECT i.*, c.cat_name, br_name FROM item i INNER JOIN category c ON i.cat_id=c.cat_id INNER JOIN brand b ON i.br_id=b.br_id WHERE i_id=$i_id";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
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
                            <h3 class="card-title">Update Item</h3>
                            <a href="item.php"class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                     <form action="item_updatecode.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="i_title">Title</label>
                                            <input type="text" name="i_title" id="i_title" class="form-control" value="<?php echo $row['i_title'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="i_price">Price</label>
                                            <input type="text" name="i_price" id="i_price" class="form-control" value="<?php echo $row['i_price'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="i_s_desc">descriptions</label>
                                            <textarea type="text" name="i_s_desc" id="i_s_desc"  class="form-control" value="<?php echo $row['i_s_desc'] ?>"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="i_desc">Desc</label>
                                            <textarea type="text " name="i_desc" id="i_desc"  class="form-control" value="<?php echo $row['i_desc'] ?>"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="apwd">Item Image</label>
                                            <input type="file" name="ff">
                                        </div>
                                        

                                       <div class="modal-footer">
                                   <input type="submit" name="ok" value="Update" class="btn btn-primary">
                                  </div>
                                </form>
                                        <!-- <div class="form-group">
                                            <label for="cat_id">Select category</label>
                                            <select name="cat_id" id="cat_id" class="form-control">
                                                <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                            <?php
                                            while($cat_rec=mysqli_fetch_assoc($category)){
                                                ?>
                                                <option value="<?php echo $cat_rec['cat_id'] ?>"><?php echo $cat_rec['cat_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>   

                                         <div class="form-group">
                                            <label for="br_id">Select Brand</label>
                                            <select name="br_id" id="br_id" class="form-control">
                                                <option value="<?php echo $row['br_id'] ?>"><?php echo $row['br_name'] ?></option>
                                            <?php
                                            while($br_rec=mysqli_fetch_assoc($brand)){
                                                ?>
                                                <option value="<?php echo $br_rec['br_id'] ?>"><?php echo $br_rec['br_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                       </select>
                                       </div> -->

                                      

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