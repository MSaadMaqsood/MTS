<?php

    try {
        if (isset($_POST['verifyBtn'])) {
            $code = $_POST['code'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $forgetPassword = new ForgetPassword();
            $forgetPassword->changePassword($code, $email, $password);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Unable to change your account password", "error", {button: false,});</script>';
    }

?>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6">
                        <h6 class="checkout__title">Verification</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Code<span>*</span></p>
                                    <input type="text" name="code" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>New Password<span>*</span></p>
                                    <input type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="site-btn" name="verifyBtn">Verify</button>
                    </div>

                </div>
            </form>
        
        </div>
    </div>
</section>