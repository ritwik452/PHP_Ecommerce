<?php
require_once('config/connection.php');
$sql="SELECT * FROM category WHERE status='1' ORDER BY cat_name";
$result=mysqli_query($conn,$sql);
?>
<!-- ... Top-nav ....-->
<section>

<div class="top-nav  head">
    <div class="container">
        <span id="greeting"></span>
        <h3>9775674623   || ritwikmandal2015@gmail.com</h3>
    </div>
</div>
</section>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <img src="./img/logo.png" class="navbar-logo" alt="LOGO" style="width: 100px;" >
    <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item item">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" />
                    <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                </div>
            </li>
            <li class="nav-item item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            
            <!-- Dropdown with Images -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-th-large"></i> Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $i=1;
                    while($crec=mysqli_fetch_assoc($result)){
                        ?>
                        <li>
                        <form action="category.php" method="post" name="cat_frm<?php echo $i ?>">
                            <a class="dropdown-item" href="javascript:void(0);" onclick="document.forms['cat_frm<?php echo $i ?>'].submit();">
                                <img src="<?php echo $crec['c_img'] ?>" alt="<?php echo $crec['cat_name']; ?>" style="width: 30px; height: 30px; margin-right: 10px;">
                                <?php echo ucwords(strtolower($crec['cat_name'])) ?>
                            </a>
                            <input type="hidden" name="cat_id" value="<?php echo $crec['cat_id']; ?>">
                        </form>
                        </li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
            </li>
            <?php
            if(empty($_SESSION['c_info'])){
                ?>
                <li class="nav-item item">
                    <a class="nav-link" href="signin.php"><i class=" fas fa-user"></i>Signin</a>
                </li>   
                <?php
            }elseif(isset($_SESSION['c_info'])){
                $cname=strtolower($_SESSION['c_info']['c_fname']);
                $lname=strtolower($_SESSION['c_info']['c_lname']);
            ?>
            <li class="nav-item dropdown item">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class=" fas fa-user"></i> <?php echo ucwords($cname)." ".ucwords($lname) ; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> My Profile</a></li>
                  <li><a class="dropdown-item" href="orders.html"><i class="fas fa-box"></i> Orders</a></li>
                  <li><a class="dropdown-item" href="wishlist.html"><i class="fas fa-heart"></i> Wishlist</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-gift"></i> Gift Cards</a></li>
                  <li><a class="dropdown-item" href="contact.html"><i class="fas fa-phone-square-alt"></i></i> Contact</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i> Notifications</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" id="logoutButton" href="logout.php" ><i class="fas fa-sign-out-alt"></i> Signout</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
            <li class="nav-item item">
                <a class="nav-link" href="cart.php"><i class="fas fa-cart-arrow-down"></i> Cart</a>
            </li>
            
        </ul>
    </div>
</div>



</nav>



