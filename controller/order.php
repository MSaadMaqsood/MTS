<?php 

    require_once '../database/crudOperation.php';

    class Order
    {
        public function showOrderTable()
        {
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->showOrder('tbl_order', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($row['id'] != 1) {
                        if ($row['status'] == "pending") {
                            echo '
                                <tr>
                                    <td><a href="showInvoice.php?invoice='.$row['id'].'&status=print">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['dateTime'].'</td>
                                    <td><div class="badge badge-warning">Pending</div></td>
                                    <td><a href="?order='.$row['id'].'&status=processing&cs='.$row['cus_id'].'" class="btn btn-info"><i class="fa-solid fa-play"></i></a></td>
                                    <td><a href="?order='.$row['id'].'&status=remove&cs='.$row['cus_id'].'" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a></td>
                                </tr>
                            ';
                        }
                        if ($row['status'] == "processing") {
                            echo '
                                <tr>
                                    <td><a href="showInvoice.php?invoice='.$row['id'].'&status=print">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['dateTime'].'</td>
                                    <td><div class="badge badge-info">Processing</div></td>
                                    <td><a href="?order='.$row['id'].'&status=complete&cs='.$row['cus_id'].'" class="btn btn-success"><i class="fa-solid fa-check"></i></a></td>
                                    <td><a href="?order='.$row['id'].'&status=remove&cs='.$row['cus_id'].'" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a></td>
                                </tr>
                            ';
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot create the order table!!!", "error", {button: false,});</script>';
            }
        }

        public function changeStatus($id, $status)
        {
            try {
                $updateData = new crudOperation();

                if ($updateData->updateStatus('tbl_order', $id, $status) > 0) {
                    echo '<script>window.location.href="orderStatus.php"</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Something went wrong, Cannot change the order status!!!", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot change the order status!!!", "error", {button: false,});</script>';
            }
        }

        public function removeOrder($id, $cus_id, $destination){
            try {
                $deleteData = new crudOperation();

                if ($deleteData->deleteOrderDetail('tbl_order_detail', $id)) {
                    if ($deleteData->deleteOrder('tbl_order', $id)) {
                        if ($deleteData->deleteCustomer('tbl_customer', $cus_id)) {
                                if ($destination == "status") {
                                    echo '<script>window.location.href="orderStatus.php"</script>';
                                }
                                else {
                                    echo '<script>window.location.href="orderList.php"</script>';
                                }
                            }
                        }
                    }
                else {
                    echo '<script>swal("Sorry", "Something went wrong, Cannot delete the order!!!", "error", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot delete the order!!!", "error", {button: false,});</script>';
            }
        }

        public function showOnlyCompleteOrderTable()
        {
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->showOrder('tbl_order', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($row['id'] != 1) {
                        if ($row['status'] == "complete") {
                            echo '
                                <tr>
                                    <td><a href="showInvoice.php?invoice='.$row['id'].'&status=show">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['dateTime'].'</td>
                                    <td><div class="badge badge-success">Complete</div></td>
                                    <td><a href="?order='.$row['id'].'&cs='.$row['cus_id'].'" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            ';
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot create the order table!!!", "error", {button: false,});</script>';
            }
        }

        public function showCustomerOrderTable()
        {
            try {
                $id = $_SESSION['id'];
                $name = ''; $phone = ''; $address = ''; $nearBy = ''; $city = ''; $state = ''; $code = '';

                $selectData = new crudOperation();

                $selectQuery = $selectData->searchCustomer('tbl_detail', $id);

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $nearBy = $row['nearBy'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $code = $row['code'];
                }

                $selectQuery = $selectData->selectCustomerID('tbl_customer', $name, $phone, $address, $nearBy, $city, $state, $code);
                
                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $id = $row['id'];

                    $selectQuery = $selectData->showCustomerOrder('tbl_order', $id, 'id');

                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                        if ($row['id'] != 1) {
                            if ($row['status'] == "pending") {
                                echo '
                                    <tr>
                                        <td><a href="showInvoice.php?invoice='.$row['id'].'&status=print">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['phone'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td>'.$row['dateTime'].'</td>
                                        <td><div class="badge badge-warning">Pending</div></td>
                                    </tr>
                                ';
                            }
                            if ($row['status'] == "processing") {
                                echo '
                                    <tr>
                                        <td><a href="showInvoice.php?invoice='.$row['id'].'&status=print">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['phone'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td>'.$row['dateTime'].'</td>
                                        <td><div class="badge badge-info">Processing</div></td>
                                    </tr>
                                ';
                            }
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot create the order table!!!", "error", {button: false,});</script>';
            }
        }

        public function showCustomerOnlyCompleteOrderTable()
        {
            try {
                $id = $_SESSION['id'];
                $name = ''; $phone = ''; $address = ''; $nearBy = ''; $city = ''; $state = ''; $code = '';

                $selectData = new crudOperation();

                $selectQuery = $selectData->searchCustomer('tbl_detail', $id);

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $nearBy = $row['nearBy'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $code = $row['code'];
                }

                $selectQuery = $selectData->selectCustomerID('tbl_customer', $name, $phone, $address, $nearBy, $city, $state, $code);
                
                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $id = $row['id'];

                    $selectQuery = $selectData->showCustomerOrder('tbl_order', $id, 'id');

                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                        if ($row['id'] != 1) {
                            if ($row['status'] == "complete") {
                                echo '
                                    <tr>
                                        <td><a href="showInvoice.php?invoice='.$row['id'].'&status=show">MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT).'</a></td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['phone'].'</td>
                                        <td>'.$row['address'].'</td>
                                        <td>'.$row['dateTime'].'</td>
                                        <td><div class="badge badge-success">Complete</div></td>
                                    </tr>
                                ';
                            }
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot create the order table!!!", "error", {button: false,});</script>';
            }
        }
    }

?>