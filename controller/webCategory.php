<?php 

    require_once 'database/crudOperation.php';

    class WebCategory{
        public function showCategory(){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->selectCategory('tbl_category', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($row['id'] != 1) {
                        echo '
                            <li><a href="category.php?id='.$row['id'].'">'.$row['name'].'</a></li>
                        ';
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot show categories!!!", "error", {button: false,});</script>';
            }
        }

        public function showBreadCrumb($id){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->searchCategory('tbl_category', $id);

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    echo '
                        <span>'.$row['name'].'</span>
                    ';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot show category!!!", "error", {button: false,});</script>';
            }
        }
    }
    
?>