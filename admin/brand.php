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
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form action="addbrand.php" method="POST">
      <div class="modal-body">

        <div class="form-group">
          <label for="">Brand Name</label>
          <input type="text" name= "br_name" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="brand_save" value="save">
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
              ADD BRAND
              

              <a href="#"data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary float-right">ADD</a>
            </h3>
            
          </div>
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>SL.NO</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php
                                        $sql="SELECT * FROM brand WHERE status ='1'";
                                        $result=mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                          $i=1;
                                          while($row=mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                              <td><?php echo $i ?></td>
                                              <td><?php echo $row['br_name']; ?></td>
                                           
                                            <!-- <td><a href="update.php?id=<?php echo $row['br_id'];?>" class="btn btn-success">Update</a></td>
                                            <td> -->
                                    <td>
                                      <form name="upd-frm_<?php echo $row['br_id']; ?>" method="post" action="brand_update.php">
                                        <input type="hidden" name="br_id" value="<?php echo $row['br_id'] ?>">
                                        <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                    </form>
                                   </td>
                                          <td>
                                            <form name="del-frm_<?php echo $row['br_id']; ?>" method="post" action="brand_delete.php">
                                             <input type="hidden" name="br_id" value="<?php echo $row['br_id'] ?>">
                                             <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                          </form>
                                          </td>
                                        
                                            </tr>
                                            <?php
                                            $i++;
                                          }
                                        }else{
                                          ?>
                                          <tr>
                                            <td>No Brand Found</td>
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
