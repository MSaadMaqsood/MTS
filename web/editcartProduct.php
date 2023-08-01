<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6">
                        <h6 class="checkout__title">Product Details</h6>

                        <?php 
                        
                            try {
                                $id = 0;

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            if ($key == $id) {
                                                echo '
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="checkout__input">
                                                            <p>Name</p>
                                                            <input type="text" value="'.$_SESSION['cart'][$id]['title'].'" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="checkout__input">
                                                            <p>Price</p>
                                                            <input type="text" value="'.$_SESSION['cart'][$id]['price'].'" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="checkout__input">
                                                            <p>Quantity</p>
                                                            <input type="text" value="'.$_SESSION['cart'][$id]['qty'].'" name="qty">
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                    }
                                }

                                if (isset($_POST['editBtn'])) {
                                    $qty = $_POST['qty'];

                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            if ($key == $id) {
                                                $_SESSION['cart'][$id]['qty'] = $qty;

                                                break;
                                            }
                                        }

                                        echo '<script>window.location.href="shopping-cart.php";</script>';
                                    }
                                }
                            } catch (\Throwable $th) {
                                echo '<script>swal("Sorry", "Something went wrong, Fail to edit the cart quantity!!!", "error", {button: false,});</script>';
                            }
                        
                        ?>
                    </div>
                
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="btn btn-warning" name="editBtn">Edit</button>
                        <a href="shopping-cart.php" class="btn btn-danger">Cancel</a>
                    </div>

                </div>
            </form>
        
        </div>
    </div>
</section>