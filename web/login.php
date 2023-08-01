<?php

    try {
        if (isset($_POST['loginBtn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $login = new Login();
            $login->checkValidation($email, $password);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot login to your account!!!", "error", {button: false,});</script>';
    }

?>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6">
                        <h6 class="checkout__title">Login Details</h6>
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
                    </div>
                
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="site-btn" name="loginBtn">Login</button>
                    </div>

                </div>
            </form>
            
            <div class="container"></div>

            <div class="row d-flex justify-content-left">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <li style="text-align: left; list-style: none; margin-top: 50px; margin-bottom: 50px;"><a href="forgetPassword.php" style="color: black;"><b>Forget Password???</b></a></li>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <li style="list-style: none;"><a href="createAccount.php" style="color: black;">Don't have an account? <b>Create one</b></a></li>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</section>