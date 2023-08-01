<?php 

    require_once '../controller/product.php';

    try {
        if (isset($_POST['btn_add'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $brand = $_POST['brand'];
            $distributor = $_POST['distributor'];
            $description = $_POST['description'];
            $purchasePrice = $_POST['purchasePrice'];
            $salePrice = $_POST['salePrice'];
            $stock = $_POST['stock'];
            $discount = $_POST['discount'];
            $rating = $_POST['rating'];
            $na = $_POST['na'];
            $hs = $_POST['hs'];
            $filename = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $folder = "../image/product/".$filename;
    
            $admin = new Product();
            $admin->checkProduct($name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $filename, $temp_name, $folder);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot add the product!!!", "error", {button: false,});</script>';
    }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">PRODUCT FORM</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="productList.php" class="btn btn-info"><i class="nav-icon fas fa-arrow-left"></i> Back to Product List</a>
                                <br><br>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Category</label>
                                    <select class="custom-select rounded-0" id="exampleSelectBorder" name="category" required>
                                        <option disabled selected>Select</option>
                                        <option>None</option>
                                        
                                        <?php 
                                        
                                            try {
                                                $productCategory = new CrudOperation();

                                                $selectQuery = $productCategory->selectCategory('tbl_category', 'id');
    
                                                while ($row = mysqli_fetch_assoc($selectQuery)) {
                                        ?>
                                                        <option value=".<?php echo $row['id']?>."><?php echo $row['name']?></option>
                                        <?php
                                                }
                                            } catch (\Throwable $th) {
                                                echo '<script>swal("Sorry", "Something went wrong, Cannnot add the product!!!", "error", {button: false,});</script>';
                                            }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Brand</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Brand Name" name="brand" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Distributor</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Distributor Name" name="distributor" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter Description" name="description" rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                            <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-7">
                        <div class="card card-info">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Purchase Price</label>
                                    <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Purchase Price" name="purchasePrice" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sale Price</label>
                                    <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Sale Price" name="salePrice" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Stock</label>
                                    <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Stock" name="stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discount</label>
                                    <input type="number" min="0" class="form-control" id="exampleInputPassword1" placeholder="Discount" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Rating</label>
                                    <input type="number" min="0" class="form-control" id="exampleInputPassword1" placeholder="Between 1 to 5" name="rating">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Show in New Arrival</label>
                                    <select class="custom-select rounded-0" id="exampleSelectBorder" name="na" required>
                                        <option disabled selected>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Show in Hot Sale</label>
                                    <select class="custom-select rounded-0" id="exampleSelectBorder" name="hs" required>
                                        <option disabled selected>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="btn_add"><i class="nav-icon fa-solid fa-circle-plus"></i>  Add Product</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->