<?php 

    require_once '../controller/order.php';

    $admin = new Order();

    try {
        if (isset($_GET['order'])) {
            $id = $_GET['order'];
            $customer = $_GET['cs'];

            $admin->removeOrder($id, $customer, "remove");
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot change the order status!!!", "error", {button: false,});</script>';
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
                    <li class="breadcrumb-item active">Order List</li>
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
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
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
                            <div class="card-body" style="height: 390px; overflow: scroll;">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th  width="12%">ORDER NO.</th>
                                            <th  width="16%">CUSTOMER NAME</th>
                                            <th  width="12%">PHONE</th>
                                            <th  width="12%">ADDRESS</th>
                                            <th  width="12%">DATE & Time</th>
                                            <th  width="12%">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php 

                                            try {
                                                $admin->showCustomerOnlyCompleteOrderTable();
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