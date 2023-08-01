<?php 

    require_once '../controller/dashboard.php';

    try {
        date_default_timezone_set('Asia/Karachi');
        $date = date('y-m-d');
        $pDate =  date('Y-m-d', strtotime($date.' - 1 day'));
        $month = explode('-', $date);

        $admin_crud = new CrudOperation();

        $result = $admin_crud->generateGraph('tbl_order', $month[1]);

        $data=[];
        $label=[];

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row['t_amount'];
            $label[] = $row['dateTime'];
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot show the progress!!!", "error", {button: false,});</script>';
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
                    <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">TODAY'S PROGRESS</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill-wave"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Earning</span>
                                        <span class="info-box-number">
                                            <small>RS</small>
                                            <?php 
                                                $result = $admin_crud->sumEarning('tbl_order', $date);

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['earning'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-cart-shopping"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Order</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrder('tbl_order', $date);

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['bill'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-12">
                                <div class="card card-info">
                                    <button class="card-body btn btn-info">
                                        <h1 class="card-title"><strong>ORDER STATUS</strong></h1>
                                    </button>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-check"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Complete</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $date, 'complete');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-play"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Process</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $date, 'processing');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status']
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-pause"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $date, 'pending');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">YESTERDAY PROGRESS</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">
                        <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill-wave"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Earning</span>
                                        <span class="info-box-number">
                                            <small>RS</small>
                                            <?php 
                                                $result = $admin_crud->sumEarning('tbl_order', $pDate);

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['earning'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-cart-shopping"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Order</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrder('tbl_order', $pDate);

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['bill'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-12">
                                <div class="card card-info">
                                    <button class="card-body btn btn-info">
                                        <h1 class="card-title"><strong>ORDER STATUS</strong></h1>
                                    </button>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-check"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Complete</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $pDate, 'complete');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-play"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Process</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $pDate, 'processing');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status']
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-pause"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending</span>
                                        <span class="info-box-number">
                                            <?php 
                                                $result = $admin_crud->countOrderStatus('tbl_order', $pDate, 'pending');

                                                $row = mysqli_fetch_assoc($result);

                                                echo $row['status'];
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">MINI SALES REPORT</h3>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
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

<script>
  const labels = <?php echo json_encode($label);?>

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: color => {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgba(" + r + "," + g + "," + b + ", 0.5)";
        },
      borderColor: color => {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgba(" + r + "," + g + "," + b + ", 0.5)";
        },
      data: <?php echo json_encode($data);?>
    }]
  };

  const config = {
    type: 'doughnut',
    data: data,
    options: {
        plugins: {
            legend: {
                display: false,
            }
        }
    }
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>