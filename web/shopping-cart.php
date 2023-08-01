<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <?php
                        $cart = new WebOrder();

                        if ($cart->cartCount() > 0) {
                        
                    ?>
                    <table>
                        <thead>
                            
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $cart->showCart();
                            ?>
                        </tbody>
                    </table>
                    <?php
                        } else {
                            $cart->showCart();
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>RS. <?php echo $cart->getTotal(); ?></span></li>
                    </ul>
                    <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>