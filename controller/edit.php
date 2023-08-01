<?php 

    require_once '../database/crudOperation.php';

    class Edit{
        public function updateCategory($id, $name)
        {
            try {
                $updateData = new crudOperation();

                if ($updateData->updateCategory('tbl_category', $id, $name) > 0) {
                    echo '<script>swal("Successful", "Your category has been updated!!!", "success", {button: false,});</script>';

                    echo '<script>window.location.href="../pages/category.php"</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Your category has not been updated!!!", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot update the category!!!", "error", {button: false,});</script>';
            }
        }

        public function updateProduct($id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image, $file, $folder)
        {
            try {
                if ($rating > 5) {
                    $rating = 5;
                }

                $updateData = new crudOperation();

                $selectQuery = $updateData->selectProduct('tbl_product', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                
                    if ($image == "") {
                        if ($updateData->updateProductWithoutImage('tbl_product', $id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs) > 0) {
                            echo '<script>swal("Successful", "Your product has been updated!!!", "success", {button: false,});</script>';

                            echo '<script>window.location.href="../pages/productList.php"</script>';

                            break;
                        }
                        else {
                            echo '<script>swal("Sorry", "Your record has not been updated!!!", "error", {button: false,});</script>';

                            break;
                        }
                    }
                    elseif ($image != $row['image']) {
                        if (move_uploaded_file($file, $folder))  {
                            if ($updateData->updateProduct('tbl_product', $id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image) > 0) {
                                echo '<script>swal("Successful", "Your product has been updated!!!", "success", {button: false,});</script>';

                                echo '<script>window.location.href="../pages/productList.php"</script>';

                                break;
                            }
                            else {
                                echo '<script>swal("Sorry", "Your record has not been updated!!!", "error", {button: false,});</script>';

                                break;
                            }
                        }else{
                            echo '<script>swal("Sorry", "Your product has not been updated!!!", "error", {button: false,});</script>';

                            break;
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot update the product!!!", "error", {button: false,});</script>';
            }
        }
    }
    
?>