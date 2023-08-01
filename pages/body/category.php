<?php 

    require_once '../controller/category.php';

    try {
        if (isset($_POST['btn_add'])) {
            $name = $_POST['name'];
    
            $admin = new Category();
            $admin->checkCategory($name);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot register the Category!!!", "error", {button: false,});</script>';
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
                    <li class="breadcrumb-item active">Category Form</li>
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
                <div class="col-lg-5">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">CATEGORY FORM</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="btn_add"><i class="nav-icon fa-solid fa-circle-plus"></i> Add Category </button>
                            </div>
                        </form>
                    </div>
                        <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-7">
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
                                            <th>CATEGORY</th>
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