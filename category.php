<?php 

require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');

?>

  <!-- ... Top-nav ....-->
    
  
   <!-- ............electroinic-main-work.......... -->
   <div class="product-all-item">
    <div class="container-fluid">
      <div class="row">
        <!-- ...................left-side................ -->
        <div class="col-xl-3 col-lg-3 left">
          <div class="menu">
            <ul class="list-group">  
            <?php
                  $all=0;
                    $sql="SELECT * FROM category WHERE status='1' ORDER BY cat_name";
                    $cat_rs=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($cat_rs)>0) {
                        $i=1;
                        while($row=mysqli_fetch_assoc($cat_rs)){
                          $item=mysqli_query($conn, "SELECT i_id FROM `item` WHERE cat_id=".$row['cat_id']);
                          $all+=mysqli_num_rows($item);
                            ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <!-- <i class="fa-regular fa-circle"> </i> <?php echo ucwords(strtolower($row['cat_name']))?> -->
                  <form action="category.php" method="post" name="cat_frm<?php echo $i  ?>">
                  <input type="hidden" name="cat_id" value="<?php echo $row['cat_id']?>">
                  <i class="fa-regular fa-circle"> </i> <button type="submit" class="btn"><?php echo ucwords(strtolower( $row['cat_name'])) ?></button>
                  </form>
                  <span class="badge bg-primary rounded-pill"><?php echo mysqli_num_rows($item); ?></span>
              </li>
                            <?php       

                        }
                    }
                    ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  <i class="fa-regular fa-circle"></i> All
                  <span class="badge bg-primary rounded-pill"><?php echo $all ?></span>
              </li>

           </ul>

          </div>
        </div>
        <!-- ...................right-side................ -->
        <div class="col-xl-9 col-lg-9 right">
          <div class="container">
            <div class="row">
             
            <?php
            if(!isset($_POST['cat_id'])){
              $query="SELECT * FROM item";
            }else{
              $cat_id=$_POST['cat_id'];
              $query="SELECT * FROM item WHERE cat_id=$cat_id";
            }
            $rs=mysqli_query($conn,$query);
            if (mysqli_num_rows($rs)>0) {
              while($rec=mysqli_fetch_assoc($rs)){
               ?>
   
                <div class="col-lg-4">
                <div class="product">
                  <a href="#" class="wish"><i class="fa-regular fa-heart" title="ADD TO WISH LIST" id="dfy"></i></a>
                  <img src="<?php echo $rec['i_img'] ?>" title="<?php echo $rec['i_title'] ?>" alt="<?php echo $rec['i_title'] ?>" class="im g-fluid">
                  <h5><?php echo $rec['i_title'] ?></h5>
                  <p class="description"><?php echo substr($rec ['i_s_desc'], 0, 65) ?></p>                    
                  <div class="star-icons">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                  </div>
                  <p class="price">₹<?php  echo $rec['i_price']  ?></p>
                 <a href="cart.php"> <button class="quantity" onclick="addcart('Roar ProPlus Bluetooth V 5.2 Wireless', './img/elect1.jpg', '1125','1500','25')">Add to Cart</button></a>
                  <button  class="btn btn-danger" onclick="buyNow('ThankYou', '1125')">Buy Now</button>
                </div>
              </div>



               <?php
              }
            }
            else{
              echo "no item found";
            }

            ?>
              <!-- ................card-end........... -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php require_once('include/footer.php')?>