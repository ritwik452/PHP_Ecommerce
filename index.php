<?php
ob_start();
require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');

?>

<?php
if(isset($_POST["add_to_cart"])){
    if(isset($_COOKIE["shopping_cart"]))
    {
     $cookie_data = stripslashes($_COOKIE['shopping_cart']);
   
     $cart_data = json_decode($cookie_data, true);
    }
    else
    {
     $cart_data = array();
    }
   
    $item_id_list = array_column($cart_data, 'item_id');
   
    if(in_array($_POST["hidden_id"], $item_id_list))
    {
     foreach($cart_data as $keys => $values)
     {
      if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
      {
       $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
      }
     }
    }
    else
    {
     $item_array = array(
      'item_id'   => $_POST["hidden_id"],
      'item_name'   => $_POST["hidden_name"],
      'item_price'  => $_POST["hidden_price"],
      'item_quantity'  => $_POST["quantity"]
     );
     $cart_data[] = $item_array;
    }
   
    // print_r($cart_data);
    $item_data = json_encode($cart_data);
    // print_r($item_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));

   }
   ob_end_flush();
?>

<!-- Main Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="./img/ebanner2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./img/ebanner3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./img/ebanner1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./img/ebanner4.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

<!-- Products Section (Smartphones-1) -->
<div class="category">
<div class="container">
    <h2>Best Deals on Products</h2>
    <div class="row">
    <?php

        $sql="SELECT * FROM item WHERE status='1'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
        $i=1;
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <div class="col-3">
            <div class="card">
                <img src="<?php echo $row['i_img'] ?>" class="card-img-top" alt="<?php echo ucwords(strtolower($row['i_title'])) ?>" >
                <div class="card-body">
                    <h6 class="card-text"><?php echo ucwords(strtolower($row['i_title'])) ?></h6>
                    <h6 class="card-text">₹<?php echo $row['i_price']?></h6>
                    <form name="<?php echo $row['i_title'] ?>" method="post">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="hidden_id" value="<?php echo $row['i_id'] ?>">
                        <input type="hidden" name="hidden_name" value="<?php echo $row['i_title'] ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row['i_price'] ?>">
                        <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary">
										
                    </form>
                </div>
            </div>
        </div>
        <?php       

    }
}
?>
</div>
</div>
</div>





<?php
include('include/footer.php');
?>