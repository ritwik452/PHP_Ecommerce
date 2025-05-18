<?php 

require_once('include/header.php');
require_once('include/navbar.php');
require_once('config/connection.php');
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site || cart</title>
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- own js -->
    <!-- payment js link -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>
<body class="protected">
 
<!-- ... Top-nav ....-->
<section>
    <div class="top-nav sticky-top head">
        <div class="container">
            <div id="greeting"></div>
            <h3>0208 058 2932   ||  Customerservices@ClikShop.Co.in</h3>
        </div>
    </div>
</section>
    
<!-- Navbar -->

    
<!-- Nav bar products -->
<nav class="navbar-offer navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav container">
                    <?php
                      $query="SELECT * FROM category WHERE STATUS='1' ORDER BY cat_name";
                      $data=mysqli_query($conn,$query);
                      $result=mysqli_num_rows($data);
                      if($result>0){
                        while($row=mysqli_fetch_assoc($data)){
                         ?>
                             <li class="nav-combo">
                             <img src="<?php echo $row['c_img'] ?>" alt="<?php echo $row['cat_name']; ?>" style="width: 50px; height: 50px;">

                                <a class="nav-link" href="grocery.html"><?php echo $row['cat_name']?></a>
                            </li>

                          <?php
                        }
                      }
                        
                  ?>
       
</nav>
    <section class="cart">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8 col-sm-12">
                <!-- pincode..... -->
                <div class="pincode-container mb-1">
                  <p>Saved Address</p>
                    <button type="button" class=" btn btn-link" data-bs-toggle="modal" data-bs-target="#deliveryModal">
                        Enter Delivery Pincode
                    </button>
                </div>
                <!-- modal start -->
               <div class="modal fade" id="deliveryModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"> 
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fas fa-map-marker-alt modal-icon"></i>Select Delivery Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div> 
                            <!-- Modal body -->
                             <div class="modal-body">
                                <div class="form-group">
                                    <input type="radio" id="address1" name="address" checked>
                                    <label for="address1">Rinki Mondal, 742133 <span class="badge">HOME</span></label>
                                    <p class="address-info text-muted">Baldanga babu para, MSD, Beldanga</p>
        
                                    <input type="radio" id="address1" name="address" checked>
                                    <label for="address1">Sudipta Ghosh, 742133 <span class="badge">HOME</span></label>
                                    <p class="address-info text-muted">Baldanga Ghosh para, MSD, Beldanga</p>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="pincode text-bold">Use pincode to check delivery info</label>
                                    <div class="pincode-group">
                                        <input type="text" id="pincode" class="form-control" placeholder="Enter pincode">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <div class="location-link">
                                    <a href="https://www.google.com/maps/"><i class="fas fa-location-arrow icon"></i> Use my current location</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Cart Items -->
<!-- <script>
let totamount = 0;
let totPrice = 0;
let totNum = 0;
let packagingFee = 0; // Flat packaging fee
let DeleveryCharge = 0;
let totDiscount = 0; // Variable to store the total discount in percentage
let wlist = JSON.parse(localStorage.getItem('quantity'));
let nofItem = wlist ? wlist.length : 0;

if (nofItem > 0) {
    DeleveryCharge = 40;
    for (let i = 0; i < nofItem; i++) {
        let itemQuantity = parseInt(wlist[i].quantity);
        let itemPrice = parseInt(wlist[i].o) * itemQuantity;
        let itemDiscountPercentage = parseFloat(wlist[i].dis); // Discount as a percentage
        let itemDiscountAmount = itemPrice * (itemDiscountPercentage / 100); // Calculate discount amount for each item

        packagingFee += itemQuantity * 22; // Calculate packaging fee based on item quantity
        totPrice += itemPrice;
        totDiscount += itemDiscountAmount;

        // Calculate final amount after discount
        let finalAmount = (totPrice - totDiscount) + (DeleveryCharge + packagingFee);
        
        // Round the values to avoid decimal points
        finalAmount = Math.floor(finalAmount);  // or Math.round(finalAmount);
        totamount = Math.floor(totamount + finalAmount);  // or Math.round(totamount + finalAmount);

        document.write(
            `<div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 main-img">
                            <img src="${wlist[i].img}" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">${wlist[i].title}</h5>
                            <p class="card-text">Seller: NGIVR RETAILS <img src="./img/logo.png" alt="Assured Icon"></p>
                            <p class="card-text">
                            <span class="text-muted"><del>₹${wlist[i].o}</del></span>                                    
                            <span class="price-product">₹${wlist[i].p}</span>
                            <span class="text-success"><i class="fa-solid fa-arrow-down"></i> ${wlist[i].dis}%</span>
                            </p>
                            <p class="card-text text-success">2 offers applied <i class="fa-solid fa-circle-info"></i></p>
                            <p class="card-text">+₹${itemQuantity * 22} Secured Packaging Fee</p>
                            <div class="form-group d-inline-block mr-2 ">
                              <input type="number" class="form-control" value="${wlist[i].quantity}" style="width: 50px; height: 35px;">
                            </div>
                            <button class="main-button">Save for Later</button>
                            <button class="main-button" onclick="remcart(${i})">Remove</button>
                        </div>
                        <div class="col-md-3 text-right">
                            <p class="card-text">Delivery in 2 days, Tue | <span class=" text-muted">₹40 Free</span></p>
                        </div>
                    </div>
                </div>
            </div>`
        );
        
        totNum += itemQuantity;
    }
} else {
    document.write(`<h4 class="text-danger text-center">No Items Found</h4>`);
}

 </script>            
</div>

<div class="col-md-4">
    <div class="price-details">
        <h5>Price Details</h5>
        <div class="d-flex justify-content-between">
            <p>Price (<script>document.write(totNum.toLocaleString())</script> items)</p>
            <p>₹<script>document.write(totPrice.toLocaleString())</script></p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Discount</p>
            <p class="text-success">-₹<script>document.write(totDiscount.toLocaleString())</script></p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Delivery Charges</p>
            <p class="text-secondary">+₹<script>document.write(DeleveryCharge.toLocaleString())</script> Only</p>
        </div>
        <div class="d-flex justify-content-between">
            <p>Secured Packaging Fee(*<script>document.write(totNum.toLocaleString())</script>)</p>
            <p class="text-secondary">+₹<script>document.write(packagingFee.toLocaleString())</script></p>
        </div>
        <hr>
        <div class="d-flex justify-content-between total-amount">
            <p>Total Amount</p>
            <p>₹<script>document.write(totamount.toLocaleString())</script></p>
        </div>
        <p class="text-success text-bold">You will save ₹<script>document.write(totDiscount.toLocaleString())</script> on this order</p>
        <button id="rzp-button" class="btn btn-primary btn-block">Place Order</button>
    </div>
</div>


</div>   
</div>
</section>

 ...... footer ........
<div class="footer-banner"></div>
<section class="foot">
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <h5><i class="fas fa-info-circle"></i> About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum.</p>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                  <h5><i class="fas fa-headset"></i> Customer Service</h5>
                    <ul class="list-unstyled">
                        <li><a href="contact.html"><i class="fas fa-envelope"></i> Contact Us</a></li>
                        <li><a href="orders.html"><i class="fas fa-undo"></i> Returns</a></li>
                        <li><a href="orders.html"><i class="fas fa-shipping-fast"></i> Shipping</a></li>
                        <li><a href="profile.html"><i class="fas fa-question-circle"></i> FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                  <h5><i class="fas fa-user-circle"></i> My Account</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fas fa-sign-in-alt"></i> Sign In</a></li>
                        <li><a href="cart.html"><i class="fas fa-shopping-cart"></i> View Cart</a></li>
                        <li><a href="wishlist.html"><i class="fas fa-heart"></i> My Wishlist</a></li>
                        <li><a href="orders.html"><i class="fas fa-truck"></i> Track My Order</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                  <h5><i class="fas fa-share-alt"></i> Connect</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</section>

 ........down-footer ..... -->
<section>
    <div class="down-footer">
        <div class="container">
        <h3>© 2024. ClikShop Ltd. all Rights Reserved</h3>
        </div>
    </div>
    <div class="clear"></div>
</section> 
  


<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</body>
</html>











<?php require_once('include/footer.php')?>