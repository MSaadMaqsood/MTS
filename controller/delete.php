<?php 

    require_once '../database/crudOperation.php';

    class Delete
    {
        public function removeCategory($id){
            try {
                $deleteData = new crudOperation();

                if ($deleteData->deleteCategory('tbl_category', $id)) {
                    echo '<script>window.location.href="category.php"</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Category has not been removed!!!", "error", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot remove the category!!!", "error", {button: false,});</script>';
            }
        }

        public function removeProduct($id){
            try {
                $deleteData = new crudOperation();

                if ($deleteData->deleteProduct('tbl_product', $id)) {
                    echo '<script>window.location.href="productList.php"</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Product has not been removed!!!", "error", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot remove the product!!!", "error", {button: false,});</script>';
            }
        }
    }
    

?>