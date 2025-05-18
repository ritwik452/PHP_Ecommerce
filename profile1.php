<?php 
require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');
?>
    <div class="container">
    <h2>Customer Details</h2>
    <div class="col-6">
        <table class="table table-bordered table-striped">
<thead>
<tr>
    <th>Sl.No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Mobile</th>
</tr>

 </thead>
    <tbody>
<?php
$cus_id=$_SESSION['c_info']['cus_id'];
echo $cus_id;
print_r($_SESSION['c_info']);
$query="SELECT * FROM customer WHERE cus_id=$cus_id" ;
$rs=mysqli_query($conn, $query);
                    if(mysqli_num_rows($rs)){
                        $row=mysqli_fetch_assoc($rs);
                            

?>
<tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['c_fname']?></td>
    <td><?php echo $row['c_lname']?></td>
    <td><?php echo $row['c_email']?></td>
    <td><?php echo $row['c_pwd']?></td>
    <td><?php echo $row['c_mobile']?></td>
    
</tr>
<?php

 }

else

{

}
?>
    </tbody>

</table>

        </div>
        </div>

        
       

        <?php
include('include/footer.php');
?>
        
        