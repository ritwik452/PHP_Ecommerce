<?php

$message = '';
if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:shopingCart.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:shopingCart.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
							if(isset($_COOKIE["shopping_cart"])){
                    		?>
							<a href="shoping-cart.php?action=clear"><b>Clear Cart</b></a>
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
									<?php
									$total = 0;
										$cookie_data = stripslashes($_COOKIE['shopping_cart']);
										$cart_data = json_decode($cookie_data, true);
										foreach($cart_data as $keys => $values)
										{
									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												
											</div>
										</td>
										<td class="column-2"><?php echo $values["item_name"]; ?>
										<a href="shoping-cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
										</td>
										
										<td class="column-3">&#8377;<?php echo $values["item_price"]; ?></td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>
												<input class="mtext-104 cl3 txt-center num-product" type="number"
													name="num-product1" value="<?php echo $values["item_quantity"]; ?>">
												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5">&#8377; <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
									</tr>
									<?php
										$total = $total + ($values["item_quantity"] * $values["item_price"]);
										}
									}else
									{
										echo '
										<tr>
										<td colspan="5" align="center"><a href="index.php">Continue Shopping</a></td>
										</tr>';
									}
									?>									
								<!-- <tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-05.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2">Lightweight Jacket</td>
									<td class="column-3">$ 16.00</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
											<input class="mtext-104 cl3 txt-center num-product" type="number"
												name="num-product2" value="1">
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">$ 16.00</td>
								</tr> -->
							</table>
</body>
</html>