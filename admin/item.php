<?php

require_once('include/header.php');
require_once('include/side_navbar.php');
// include('include/top_navbar.php');
require_once('config/connection.php');

$category=mysqli_query($conn, "SELECT * FROM category WHERE status='1' ORDER BY cat_name") or die(mysqli_error($conn));
$brand=mysqli_query($conn, "SELECT * FROM brand WHERE status='1' ORDER BY br_name") or die(mysqli_error($conn));


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Modal -->
<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                <form action="additem.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="i_title">Title</label>
                        <input type="text" name="i_title" id="i_title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="i_price">Price</label>
                        <input type="text" name="i_price" id="i_price" class="form-control" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="i_s_desc">Descriptions</label>
                        <textarea name="i_s_desc" id="i_s_desc"  class="form-control" placeholder="Enter Descriptions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="i_desc">Short Descriptions</label>
                        <textarea type="password" name="i_desc" id="i_desc"  class="form-control" placeholder="Enter Short Descriptions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="aimg">Item Image</label>
                        <input type="file" name="ff">
                    </div>
                    <div class="form-group">
                        <label for="cat_id">Select category</label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            <option value="">-Select Category-</option>

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
                            <option value="">-Select Brand-</option>

                        <?php
                        while($br_rec=mysqli_fetch_assoc($brand)){
                            ?>
                            <option value="<?php echo $br_rec['br_id'] ?>"><?php echo $br_rec['br_name'] ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="ok" value="Save" class="btn btn-primary">
              </div>
            </form>



    </div>
  </div>
</div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Item</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <?php
           // if (isset($_SESSION['status'])) {
               //echo  " <h4>".$_SESSION['status']. "</h4>";
             // unset($_SESSION['status']);
            //}
            ?> 
                    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Item User</h3>
                                    
                                    <a href="" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">ADD</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">  
                                   
                             <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>SL.NO</th>
                                        <th>Brand</th>
                                        <th>Titel</th>
                                        <th>Price</th>
                                        <th>Descriptions</th>
                                        <th>Short Descriptions</th>
                                        <th>Item image</th>
                                        <th>Select category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php
                                        $sql="SELECT i.*, c.cat_name, br_name FROM item i INNER JOIN category c ON i.cat_id=c.cat_id INNER JOIN brand b ON i.br_id=b.br_id";
                                        $result=mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                          $i=1;
                                          while($row=mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                              <td><?php echo $i ?></td>
                                              <td><?php echo $row['br_name'] ?></td>
                                              <td><?php echo $row['i_title']; ?></td>
                                              <td><?php echo $row['i_price']; ?></td>
                                              <td><?php echo $row['i_s_desc']; ?></td>
                                              <td><?php echo $row['i_desc']; ?></td>
                                              
                                              <td> <img src="<?php echo '../'.$row['i_img']; ?>" width="75" height="75"></td>
                                              <td><?php echo $row['cat_name']; ?></td>
                                            <td>
                                              <form name="upd-frm_<?php echo $row['i_id']; ?>" method="post" action="item_update.php">
                                                  <input type="hidden" name="i_id" value="<?php echo $row['i_id'] ?>">
                                                  <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                              </form>
                                            </td>

                                          <td>
                                            <form name="del-frm_<?php echo $row['i_id']; ?>" method="post" action="item_delete.php">
                                             <input type="hidden" name="i_id" value="<?php echo $row['i_id'] ?>">
                                             <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                            </form>
                                          </td>
                                            <!-- <td><a href="delete.php?id=<?php echo $row['aid'];?>" class="btn btn-danger">Delete</a></td> -->
                                            </tr>
                                            <?php
                                            $i++;
                                          }
                                        }else{
                                          ?>
                                          <tr>
                                            <td>No Record Found</td>
                                          </tr>
                                          <?php
                                        }

                                        ?>
                                      </tbody>   
                            </table>
                                
                                    

                                
                                  
                                 
                                </div>               
                    </div>  
          </div>
     </div>
  </div>     
</div>






<?php include('include/script.php');?>

<script>

</script>

<?php include('include/footer.php');?>
