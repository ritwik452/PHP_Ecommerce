<?php
require_once('include/header.php');
require_once('include/side_navbar.php');
// include('include/top_navbar.php');
require_once('config/connection.php');
?>


<div class="content-wrapper">

            
          
 <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form action="add_category.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">

                           <div class="form-group">
                             <label for="">Category Name</label>
                             <input type="text" name= "cat_name" class="form-control">
                          </div>
                          
                        <div class="form-group">
                              <label for="aimg">Category Image</label>
                              <input type="file" name="c_img" id="c_img">
                          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="category_save" value="save">
      </div>
</form>

    </div>
  </div>
</div>


<!-- <div class="content-wrapper"> -->
<section class="content mt-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3>
              ADD CATEGORY
              <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
            </ol>
           -->
              <a href="logout.php" class="btn btn-primary float-right"> logout</a>
              <a href="#"data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary float-right">ADD</a>
              
            </h3>
          </div>
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>SL.NO</th>
                                        <th>Name</th>
                                        <th>Category image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php
                                        $sql="SELECT * FROM category WHERE status='1'";
                                        $result=mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                          $i=1;
                                          while($row=mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                              <td><?php echo $i ?></td>
                                              <td><?php echo $row['cat_name']; ?></td>
                                              <td> <img src="<?php echo '../'.$row['c_img']; ?>" width="75" height="75"></td>
                                           
                                            <!-- <td><a href="update.php?id=<?php echo $row['cat_id'];?>" class="btn btn-success">Update</a></td>
                                            <td> -->
                                    <td>
                                      <form name="upd-frm_<?php echo $row['cat_id']; ?>" method="post" action="category_update.php">
                                        <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
                                        <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                    </form>
                                   </td>
                                          <td>
                                            <form name="del-frm_<?php echo $row['cat_id']; ?>" method="post" action="category_delete.php">
                                             <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
                                             <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                          </form>
                                          </td>
                                            <!-- <td><a href="delete.php?id=<?php echo $row['cat_id'];?>" class="btn btn-danger">Delete</a></td> -->
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
</section>
</div>






<?php include('include/script.php');?>

<script>

</script>

<?php include('include/footer.php');?>
