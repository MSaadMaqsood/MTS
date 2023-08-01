<?php 

    require_once '../database/crudOperation.php';

    try {
        $admin = new CrudOperation();

        if (isset($_POST['btn_filter_day'])) {
            $start = $_POST['start'];
            $end = $_POST['end'];

            $result = $admin->generateProductGraphOfDate('tbl_order_detail', $start, $end);

            $data=[];
            $label=[];

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row['t_amount'];
                $label[] = $row['title'];
            }
            
        }
        if (isset($_POST['btn_filter_month'])) {
            $start = $_POST['start'];
            $end = $_POST['end'];

            $start = explode('-', $start);
            $end = explode('-', $end);

            $result = $admin->generateProductGraphOfMonth('tbl_order_detail', $start[1], $end[1]);

            $data=[];
            $label=[];

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row['t_amount'];
                $label[] = $row['title'];
            }
        }
        if (isset($_POST['btn_filter_year'])) {
            $start = $_POST['start'];
            $end = $_POST['end'];

            $start = explode('-', $start);
            $end = explode('-', $end);

            $result = $admin->generateProductGraphOfYear('tbl_order_detail', $start[0], $end[0]);

            $data=[];
            $label=[];

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row['t_amount'];
                $label[] = $row['title'];
            }
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot generate the report!!!", "error", {button: false,});</script>';
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
                    <li class="breadcrumb-item active">Books Report</li>
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
                <div class="col-lg-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">BOOKS REPORT</h3>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button disabled class="btn btn-dark">
                                                        <i class="fa-solid fa-calendar"></i>
                                                    </button>
                                                </div>
                                                <input type="date" class="form-control" name="start">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button disabled class="btn btn-dark">
                                                        <i class="fa-solid fa-calendar"></i>
                                                    </button>
                                                </div>
                                                <input type="date" class="form-control" name="end">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success" name="btn_filter_month"><i class="nav-icon fa-solid fa-filter"></i> Filter Monthly</button>
                                            <button type="submit" class="btn btn-success" name="btn_filter_year"><i class="nav-icon fa-solid fa-filter"></i> Filter Yearly</button>
                                            <button type="submit" class="btn btn-success float-right" name="btn_filter_day"><i class="nav-icon fa-solid fa-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body chart">
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
  const labels = <?php echo json_encode($label); ?>

  const data = {
    labels: labels,
    datasets: [{
      label: 'Earning',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($data); ?>
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>