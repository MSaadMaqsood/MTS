<header class="header">
    <!--- Top Header --->

    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <?php
                                if (isset($_SESSION['role'])) {
                                    $role = $_SESSION['role'];

                                    if ($role == 'admin') {
                                        echo '<a href="pages/help.php">My Account</a>';
                                    } elseif ($role == 'user') {
                                        echo '<a href="customer/orderStatus.php">My Account</a>';
                                    }
                                }
                            ?>
                            <?php
                                if (isset($_SESSION['role'])) {
                                    echo '<a href="destroy.php">Logout</a>';
                                } else {
                                    echo '<a href="login.php">Sign in</a>';
                                }
                            ?>
                            <a href="#">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--- Top Header End --->

    <!--- Lower Header --->

    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="index.php"><img src="img/logo.png" alt="" style="height: 60px; margin-top: -50px; margin-bottom: -50px;"></a>
                </div>
            </div>

            <div class="col-lg-7 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="about.php">About Us</a></li>
                        <li><a href="#">Shop</a>
                            <ul class="dropdown">
                                <li><a href="shop.php">All Categories</a></li>
                                <?php $catgory = new WebCategory(); $catgory->showCategory(); ?>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-2 col-md-3">
                <div class="header__nav__option">
                    <!-- Search Bar And Wishlist -->

                    <!-- <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a> -->
                    <!-- <a href="#"><img src="img/icon/heart.png" alt=""></a> -->
                    
                    <!-- Search Bar And Wishlist  -->

                    <a href="shopping-cart.php"><img src="img/icon/cart.png" alt=""><span><?php $order = new WebOrder(); echo $order->cartCount();?></span></a>
                    <div class="price">RS.<?php echo $order->calculateTotal(); ?></div>
                </div>
            </div>

        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>

    <!--- Lower Header End --->
</header>