<?php

    try {
        if (isset($_POST['createBtn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $nearBy = $_POST['nearBy'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $code = $_POST['code'];
    
            $signUp = new SignUp();
            $signUp->checkValidation($email, $password, $fullName, $phone, $address, $nearBy, $city, $state, $code);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot create your account", "error", {button: false,});</script>';
    }

?>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6">
                        <h6 class="checkout__title">Account Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Password<span>*</span></p>
                                    <input type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input type="text" name="fullName" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" required>
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="nearBy">
                        </div>
                        <div class="checkout__input">
                            <p>City<span>*</span></p>
                            <input type="text" name="city" required>
                        </div>
                        <div class="checkout__input">
                            <p>State<span>*</span></p>
                            <input type="text" name="state" required>
                        </div>
                        <div class="checkout__input">
                            <p>Postcode<span>*</span></p>
                            <input type="text" name="code" required>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="site-btn" name="createBtn">Create Account</button>
                    </div>

                </div>
            </form>
            
            <div class="container"></div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <a href="login.php" style="color: black;">Already have an account? <b>Login</b></a>
                    </div>
                </div>
            </div>    
        
        </div>
    </div>
</section>