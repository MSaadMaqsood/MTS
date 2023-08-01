<?php require_once 'navBar.php'; ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>MTS | </b>Customer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <br>
        
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link  active">
                        <i class="nav-icon fa fa-solid fa-cart-shopping"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../customer/orderStatus.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-ellipsis-vertical"></i>
                                <p>Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../customer/orderList.php" class="nav-link">
                                <i class="nav-icon fa fa-rectangle-list"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-arrows-rotate"></i>
                    <p>
                        Change
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../customer/changePassword.php" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../customer/changeEmail.php" class="nav-link">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>Email</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../customer/help.php" class="nav-link">
                        <?php 
                            date_default_timezone_set('Asia/Karachi');
                            $date = date('y-m-d');

                            if ($date <= "23-04-25") {
                        ?>
                                <i class="nav-icon fa-solid fa-circle-question"></i>
                                <p>Guide</p>
                                <span class="right badge badge-danger">Important</span>
                        <?php
                            }
                            else {
                        ?>
                                <i class="nav-icon fa-solid fa-circle-question"></i>
                                <p>Help</p>
                        <?php
                            }
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../customer/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>