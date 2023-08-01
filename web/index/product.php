<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            <?php 

                try {
                    $product = new WebProduct();

                    $product->show12Product();
                } catch (\Throwable $th) {
                    echo '<script>swal("Sorry", "Something went wrong, Cannnot load products!!!", "error", {button: false,});</script>';
                }

            ?>
        </div>
    </div>
</section>