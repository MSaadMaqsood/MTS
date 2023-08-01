<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            <?php 
            
                try {
                    if (isset($_GET['brand'])) {
                        $brand = $_GET['brand'];

                        $product = new WebProduct();

                        $product->showRelatedProduct($id, $brand);
                    }
                } catch (\Throwable $th) {
                    echo '<script>swal("Sorry", "Something went wrong, Cannnot show related product!!!", "error", {button: false,});</script>';
                }
            
            ?>
        </div>
    </div>
</section>