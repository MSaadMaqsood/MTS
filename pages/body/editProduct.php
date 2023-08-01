<?php 

    require_once '../controller/edit.php';

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $searchData = new crudOperation();
    
            $selectQuery = $searchData->searchProduct('tbl_product', $id);
        }
        if (isset($_POST['btn_update'])) {
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
    
            $admin = new Edit();
            $admin->updateProduct($id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $filename, $temp_name, $folder);
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
                    <li class="breadcrumb-item active">Edit Product Detail's</li>
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
                <?php
                    try {
                        while($row = mysqli_fetch_array($selectQuery)){
                ?>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">EDIT PRODUCT FORM</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" value="<?php echo $row['title']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Category</label>
                                        <select class="custom-select rounded-0" id="exampleSelectBorder" name="category">
                                            <option selected value="<?php echo $row['c_id']?>"><?php echo $row['name']?></option>
                                            
                                            <?php 
                                        
                                            try {
                                                $productCategory = new CrudOperation();

                                                $selectQuery1 = $productCategory->selectCategory('tbl_category', 'id');
    
                                                while ($row1 = mysqli_fetch_assoc($selectQuery1)) {
                                            ?>
                                                    <option value=".<?php echo $row['id']?>."><?php echo $row1['name']?></option>
                                            <?php
                                                }
                                                } catch (\Throwable $th) {
                                                    echo '<script>swal("Sorry", "Something went wrong, Cannnot edit the product!!!", "error", {button: false,});</script>';
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Brand</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Brand Name" name="brand" value="<?php echo $row['brand']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Distributor</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Distributor Name" name="distributor" value="<?php echo $row['distributor']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter Description" name="description" rows="6"><?php echo $row['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload image</label>
                                        <input type="file" name="image" value="<?php echo $row['image']?>">
                                        <br><br>
                                        <img src="../image/product/<?php echo $row['image']?>" alt="Product Image" style="width: 15%; height: 15%">
                                    </div>
                                </div>
                            </div>
                                <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-7">
                            <div class="card card-warning">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Purchase Price</label>
                                        <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Sales Price" name="purchasePrice" value="<?php echo $row['purchasePrice']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sale Price</label>
                                        <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Sales Price" name="salePrice" value="<?php echo $row['salePrice']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stock</label>
                                        <input type="number" min="1" class="form-control" id="exampleInputPassword1" placeholder="Stock" name="stock" value="<?php echo $row['stock']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Discount</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputPassword1" placeholder="Discount" name="discount" value="<?php echo $row['discount']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Rating</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputPassword1" placeholder="Between 1 to 5" name="rating" value="<?php echo $row['rating']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Show in New Arrival</label>
                                        <select class="custom-select rounded-0" id="exampleSelectBorder" name="na">
                                            <option selected><?php echo $row['newArrival']?></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Show in Hot Sale</label>
                                        <select class="custom-select rounded-0" id="exampleSelectBorder" name="hs">
                                            <option selected><?php echo $row['hotSale']?></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning" name="btn_update"><i class="nav-icon fa-solid fa-upload"></i> Update</button>
                                    <a href="productList.php" class="btn btn-danger float-right"><i class="nav-icon fa-solid fa-circle-xmark"></i> Cancel</a>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->

                <?php
                        }
                    } catch (\Throwable $th) {
                        echo '<script>swal("Sorry", "Something went wrong, Cannnot create the table body!!!", "error", {button: false,});</script>';
                    }
                ?>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->