<section class="shop-details">
    
    <div class="product__details__pic">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="index.php">Home</a>
                        <a href="shop.php">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>

                <?php 
                
                    try {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $selectData = new CrudOperation();

                            $selectQuery = $selectData->searchProduct('tbl_product', $id);

                            while ($row = mysqli_fetch_assoc($selectQuery)) {
                                $discount = ($row['salePrice'] * $row['discount'])/100;
                                $discount = $row['salePrice'] - $discount;

                ?>
                
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <?php echo '<img src="image/product/'.$row['image'].'" alt="">' ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    
    <div class="product__details__content">
        <div class="container">
            
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <?php echo '<h4>'.$row['title'].'</h4>' ?>
                        <div class="rating">
                            <?php 
                            
                            if ($row['rating'] == 0) {
                                echo '
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                ';
                            } elseif ($row['rating'] == 1) {
                                echo '
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                ';
                            } elseif ($row['rating'] == 2) {
                                echo '
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                ';
                            } elseif ($row['rating'] == 3) {
                                echo '
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                ';
                            } elseif ($row['rating'] == 4) {
                                echo '
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                ';
                            } elseif ($row['rating'] == 5) {
                                echo '
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                ';
                            }
                            
                            ?>
                        </div>
                        <?php
                            if ($row['discount'] > 0) {
                                echo '<h3>RS. '.$discount.' <span>'.$row['salePrice'].'</span></h3>';
                            } else {
                                echo '<h3>RS. '.$row['salePrice'].'</h3>';
                            }

                            echo '<p>'.$row['description'].'</p>'
                        ?>
                        <form method="post" class="product__details__cart__option">
                            <?php 
                                echo '
                                    <input name="id" value="'.$row['id'].'" hidden>
                                    <input name="image" value="'.$row['image'].'" hidden>
                                    <input name="title" value="'.$row['title'].'" hidden>
                                    <input name="brand" value="'.$row['brand'].'" hidden>
                                    <input name="salePrice"'; if ($row['discount'] > 0) {
                                        echo 'value="'.$discount.'"';
                                    } else{
                                        echo 'value="'.$row['salePrice'].'"';
                                    }
                                    echo 'hidden>
                                    <input name="stock" value="'.$row['stock'].'" hidden>
                                ';
                            ?>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="qty" value="1">
                                </div>
                            </div>
                            <button type="submit" class="primary-btn" name="addToCart">add to cart</button>
                        </form>
                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <ul>
                                <li><span>Category:</span> <?php echo $row['name']?></li>
                                <li><span>Brand:</span> <?php echo $row['brand']?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                        }
                    }
                } catch (\Throwable $th) {
                    echo '<script>swal("Sorry", "Something went wrong, Cannnot show product details!!!", "error", {button: false,});</script>';
                }
            ?>

        </div>
    </div>
</section>