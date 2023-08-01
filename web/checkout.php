<?php $order = new WebOrder(); ?>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">

                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Billing Details</h6>

                        <?php

                            try {
                                if (isset($_SESSION['id'])) {
                                    $id = $_SESSION['id'];
                                 
                                    $selectData = new CrudOperation();
    
                                    $selectQuery = $selectData->selectCustomerDetail('tbl_detail', $id);

                                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                                        echo '
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Full Name</p>
                                                    <input type="text" value="'.$row['name'].'" name="name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Phone</p>
                                                    <input type="text" value="'.$row['phone'].'" name="phone" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout__input">
                                            <p>Address<span>*</span></p>
                                            <input type="text" placeholder="Street Address" class="checkout__input__add" value="'.$row['address'].'" name="address" required>
                                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)" value="'.$row['nearBy'].'" name="nearBy">
                                        </div>
                                        <div class="checkout__input">
                                            <p>City<span>*</span></p>
                                            <input type="text" value="'.$row['city'].'" name="city" required>
                                        </div>
                                        <div class="checkout__input">
                                            <p>State<span>*</span></p>
                                            <input type="text" value="'.$row['state'].'" name="state" required>
                                        </div>
                                        <div class="checkout__input">
                                            <p>Postcode<span>*</span></p>
                                            <input type="text" value="'.$row['code'].'" name="code" required>
                                        </div>
                                        ';
                                    }
                                }
                            } catch (\Throwable $th) {
                                echo '<script>swal("Sorry", "Something went wrong, Cannot show billing details", "error", {button: false,});</script>';
                            }

                        ?>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <?php $order->showCheckOutCart(); ?>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Total <span>RS. <?php echo $order->calculateTotal(); ?></span></li>
                            </ul>
                            <p>
                                Thanks for shopping I enjoy your company and item selection alot.
                                Hope you will visit me again.
                            </p>
                            <p>
                                Thank You!!!
                            </p>
                            <p>    
                                Regards,
                            </p>
                            <p>
                                Your loving website
                            </p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Easypaisa
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn" name="checkout">PLACE ORDER</button>
                        </div>
                    </div>
                
                </div>
            </form>
        </div>
    </div>
</section>