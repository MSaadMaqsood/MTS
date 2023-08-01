<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="index.php">Home</a>
                        <?php 
                            try {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    
                                    $category = new WebCategory(); 
                                
                                    $category->showBreadCrumb($id);
                                }
                            } catch (\Throwable $th) {
                                echo '<script>swal("Sorry", "Something went wrong, Cannnot show category!!!", "error", {button: false,});</script>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>