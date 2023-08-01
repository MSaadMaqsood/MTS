<?php 

    require_once '../controller/category.php';
    require_once '../controller/edit.php';

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $searchData = new crudOperation();
    
            $selectQuery = $searchData->searchCategory('tbl_category', $id);
        }
        if (isset($_POST['btn_update_record'])) {
            $name = $_POST['name'];
    
            $user = new Edit();
            $user->updateCategory($id, $name);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot edit the Category!!!", "error", {button: false,});</script>';
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
                    <li class="breadcrumb-item active">Edit Category</li>
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">EDIT CATEGORY FORM</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                <?php
                                    try {
                                        while($row = mysqli_fetch_array($selectQuery)){
                                ?>
                                            <input type="" class="form-control" id="exampleInputPassword1" placeholder="Name" name="id" value="<?php echo $row['id']?>" hidden>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Name</label>
                                                <input type="" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" value="<?php echo $row['name']?>">
                                            </div>

                                <?php
                                        }
                                    } catch (\Throwable $th) {
                                        echo '<script>swal("Failed", "Your category has not been updated!!!", "error", {button: false,});</script>';
                                    }
                                ?>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning" name="btn_update_record"><i class="nav-icon fa-solid fa-upload"></i> Update</button>
                                <a href="category.php" class="btn btn-danger float-right"><i class="nav-icon fa-solid fa-circle-xmark"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                        <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">TABLE</h3>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <form method="POST">
                                    <!-- SidebarSearch Form -->
                                    <div class="form-inline float-right">
                                        <div class="input-group">
                                            <input class="form-control" id="myInput" type="search" placeholder="Search" name="search_item">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body" style="height: 325px; overflow: scroll;">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>DATE & TIME</th>
                                            <th><i class="fas fa-pen"></i></th>
                                            <th><i class="fas fa-trash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php 

                                            try {
                                                $Category = new Category();

                                                $Category->showCategoryTable();
                                            } catch (\Throwable $th) {
                                                echo '<script>swal("Sorry", "Something went wrong, Cannnot create the table body!!!", "error", {button: false,});</script>';
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->