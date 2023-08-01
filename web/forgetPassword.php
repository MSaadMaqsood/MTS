<?php 

    try {
        if (isset($_POST['genrateBtn'])) {
            $email = $_POST['email'];

            $forgetPassword = new ForgetPassword();
            $forgetPassword->generateCode($email);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot generate a verification code", "error", {button: false,});</script>';
    }

?>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6">
                        <h6 class="checkout__title">Account Email</h6>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-6">
                        <button type="submit" class="site-btn" name="genrateBtn">Generate Code</button>
                    </div>

                </div>
            </form>
        
        </div>
    </div>
</section>