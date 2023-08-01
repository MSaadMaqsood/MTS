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
                    <?php 
                        date_default_timezone_set('Asia/Karachi');
                        $date = date('y-m-d');

                        if ($date <= "22-06-26") {
                    ?>
                            <li class="breadcrumb-item active">Guide Section</li>
                    <?php
                        }
                        else {
                    ?>
                            <li class="breadcrumb-item active">Help Section</li>
                    <?php
                        }
                    ?>
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
                            <h3 class="card-title">SHORTCUT TABLE</h3>
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
                            <div class="card-body" style="height: 400px; overflow: scroll;">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th width="12%">Button</th>
                                            <th>Description</th>
                                            <th>Shortcut</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>Order Status</td>
                                            <td>This button will land you on a page where you can see the status of your order means that the order is in pending or it's in proccessing and etc.</td>
                                            <td><strong>ALT + s</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Order List</td>
                                            <td>This button will land you on another page where you can see all the information related to customer orders.</td>
                                            <td><strong>ALT + b</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>This button will land you on a page where you can change your current password.</td>
                                            <td><strong>ALT + z</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>This button will land you on a page where you can change your current email.</td>
                                            <td><strong>ALT + x</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Help</td>
                                            <td>This button will land you on a page where you can get help related to the shortcuts of our POS System.</td>
                                            <td><strong>ALT + h</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Logout</td>
                                            <td>This button will land you on the main page/login page of our point of sales.</td>
                                            <td><strong>ALT + .</strong></td>
                                        </tr>
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