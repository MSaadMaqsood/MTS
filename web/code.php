<section class="checkout spad">
    <div class="container">
        <div class="col-lg-12 col-md-6">
            <?php echo'<h6 class="checkout__title" style="text-align: center">
            Your verification code is: '.$_SESSION['code'].'</h6>'?>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="verification.php" class="site-btn" style="color: #fff;">Proceed</a>
        </div>
    </div>
</section>