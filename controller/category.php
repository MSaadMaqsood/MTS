<?php 

    require_once '../database/crudOperation.php';

    class Category{
        public function checkCategory($name){
            try {
                if ($name == '') {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check!!!", "info", {button: false,});</script>';
                    return;
                }

                $flag = true;
                $selectData = new crudOperation();
            
                $selectQuery = $selectData->selectCategory('tbl_category', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                
                    if ($name != $row['name']) {
                        $flag = true;

                        $this->insertCategory($name);

                        break;
                    }
                    
                    $flag = false;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "A category with same name already exist!!!", "warning", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot add the category", "error", {button: false,});</script>';
            }
        }

        public function insertCategory($name)
        {
            try {
                $insertData = new crudOperation();

                if ($insertData->insertCategory('tbl_category', $name) > 0) {
                    echo '<script>swal("Successful", "Category has been added!!!", "success", {button: false,});</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Category has not been added", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot add the category", "error", {button: false,});</script>';
            }
        }

        public function showCategoryTable(){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->selectCategory('tbl_category', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($row['id'] != 1) {
                        echo '
                            <tr>
                                <td hidden>'. $row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['dateTime'].'</td>
                                <td><a href="editCategory.php?id='. $row['id'].'"><i class="fas fa-pen" style="color: #e0a739;"></i></a></td>
                                <td><a href="deleteCategory.php?id='. $row['id'].'"><i class="fas fa-trash" style="color: #c82333;"></i></a></td>
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