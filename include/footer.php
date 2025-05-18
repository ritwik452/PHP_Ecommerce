
<!--...... footer ........-->
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

<!-- ........down-footer ..... -->
<section>
    <div class="down-footer">
        <div class="container">
        <h3>© 2024. ClikShop Ltd. all Rights Reserved</h3>
        </div>
    </div>
    <div class="clear"></div>
</section>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery.validate.js"></script>


    <script>

$(document).ready(function(){
    jQuery.validator.addMethod("nameonly", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z]+$/);
},"Only alphabets Allowed.");

jQuery.validator.addMethod("mobile_no", function(value, element) {
    return this.optional(element) || value == value.match(/^\d{10}$/);
},"Please enter valid mobile number.");

jQuery.validator.setDefaults({
    errorPlacement: function(error, element) {
        error.appendTo('#invalid-' + element.attr('id'));
      }
});
    $('#reg-frm').validate({
        rules:{
            c_fname:{
                required:true,
                nameonly:true
            },
            c_lname:{
                required:true,
                nameonly:true
            },
            c_email:{
                required:true,
                email:true
            },
            c_pwd:{
                required:true,
            },
            c_mobile:{
                required:true,
                mobile_no:true
            }


        },
        messages:{
            c_fname:{
                required:"Please Enter first Your Name"
            },
            c_lname:{
                required:"please enter your last name"
            },
            c_email:{
                required:"please enter email"
            }, 
            c_pwd:{
                required:"enter password"
            },
            c_mobile:{
                required:"please enter valid mobile number"
            }
        }
    });
});



</script>


</body>
</html>