<?php
require_once('include/header.php');
require_once('include/side_navbar.php');
// include('include/top_navbar.php');
require_once('config/connection.php');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Modal -->
<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="add.php" method="post">
       <div class="modal-body">
        <div class="form-group">
            <label for="aname">NAME</label>
            <input type="text" name="aname" id="aname" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="aemail">EMAIL</label>
            <input type="email" name="aemail" id="aemail" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="apwd">PASSWORD</label>
            <input type="password" name="apwd" id="apwd"  class="form-control" placeholder="Enter Password">
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
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
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
                                    <h3 class="card-title">Resister Admin</h3>
                                    <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
            </ol>
          
                                    <a href="" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">ADD</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">  
                                   
                             <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>SL.NO</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php
                                        $sql="SELECT * FROM admin";
                                        $result=mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                          while($row=mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                              <td><?php echo $row['aid']; ?></td>
                                              <td><?php echo $row['aname']; ?></td>
                                              <td><?php echo $row['aemail']; ?></td>
                                              <td><?php echo $row['apwd']; ?></td>
                                           
                                            <!-- <td><a href="update.php?id=<?php echo $row['aid'];?>" class="btn btn-success">Update</a></td>
                                            <td> -->
                                            <td>
                                    <form name="upd-frm_<?php echo $row['aid']; ?>" method="post" action="update.php">
                                        <input type="hidden" name="aid" value="<?php echo $row['aid'] ?>">
                                        <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                    </form>
                            
                                </td>
                                <td>
                                            <form name="del-frm_<?php echo $row['aid']; ?>" method="post" action="delete.php">
                                             <input type="hidden" name="aid" value="<?php echo $row['aid'] ?>">
                                             <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                          </form>
                                          </td>
                                            <!-- <td><a href="delete.php?id=<?php echo $row['aid'];?>" class="btn btn-danger">Delete</a></td> -->
                                            </tr>
                                            <?php
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
