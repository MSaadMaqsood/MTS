<?php 

    require_once '../database/crudOperation.php';

    class Product{
        public function checkProduct($name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image, $file, $folder){
            try {
                $flag = true;

                if ($rating > 5) {
                    $rating = 5;
                }

                $selectData = new crudOperation();
            
                $selectQuery = $selectData->selectProduct('tbl_product', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                
                    if ($name != $row['name'] && $image != $row['image']) {
                        $flag = true;

                        $this->insertProduct($name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image, $file, $folder);

                        break;
                    }

                    $flag = false;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "A product with same data already exist!!!", "warning", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot add the product!!!", "error", {button: false,});</script>';
            }
        }

        public function insertProduct($name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image, $file, $folder)
        {
            try {
                $insertData = new crudOperation();

                if (move_uploaded_file($file, $folder))  {
                    if ($insertData->insertProduct('tbl_product', $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image) > 0) {
                        echo '<script>swal("Successful", "Product has been added!!!", "success", {button: false,});</script>';
                    }
                    else {
                        echo '<script>swal("Failed", "Product has not been added!!!", "error", {button: false,});</script>';
                    }   
                }else{
                    echo '<script>swal("Failed", "Product has not been added!!!", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot add the product!!!", "error", {button: false,});</script>';
            }
        }

        public function showCompleteProductTable(){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->selectProduct('tbl_product', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($row['id'] != 1) {
                        echo '
                            <tr>
                                <td hidden>'. $row['id'].'</td>
                                <td>'.$row['title'].'</td>
                                <td>'.$row['brand'].'</td>
                                <td>'.$row['purchasePrice'].'</td>
                                <td>'.$row['salePrice'].'</td>
                                <td>'.$row['discount'].'</td>
                                <td>'.$row['stock'].'</td>
                                <td><img src="../image/product/'.$row['image'].'" alt="Product Image" style="width: 100%; height: 100%"></td>
                                <td>'.$row['dateTime'].'</td>
                                <td><a href="editProduct.php?id='. $row['id'].'"><i class="fas fa-pen" style="color: #e0a739;"></i></a></td>
                                <td><a href="deleteProduct.php?id='. $row['id'].'"><i class="fas fa-trash" style="color: #c82333;"></i></a></td>
                            </tr>
                        ';
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot create the table!!!", "error", {button: false,});</script>';
            }
        }
    }
    
?>