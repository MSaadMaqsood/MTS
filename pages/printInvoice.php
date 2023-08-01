<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv='cache-control' content='no-cache'>
      <meta http-equiv='expires' content='0'>
      <meta http-equiv='pragma' content='no-cache'>
      
      <title>AL-SYED Store | Invoice</title>

      <!-- Favicon -->
      <link rel="icon" type="image/png" href="../dist/img/AdminLTELogo.png">

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="container-wrapper">
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <?php
                           require_once 'checkSession.php';
                           require_once '../database/crudOperation.php';

                           try {
                              if (isset($_GET['invoice'])) {
                                 $c_name = $_GET['invoice'];
                                 date_default_timezone_set('Asia/Karachi');
                                 $date = date('y-m-d');
                                 $o_id = "";

                                 $invoice = new crudOperation();

                                 $selectQuery = $invoice->selectOrderForInvoice('tbl_order', $c_name, 'pending', $date);
                           
                                 while ($row = mysqli_fetch_assoc($selectQuery)) {
                                    $o_id = $row['o_id'];
                        ?>
                                    <br><br>

                                    <h1 class="card-title" style="border-top: solid; border-bottom:solid;">AL-SYED Store</h1>
                                    <h1 class="card-title float-right">ORDER INVOICE</h1>
                                    <br>
                                    <p class="card-text" style="font-size: 12px;"><strong>Contact Number : XXXX-XXXXXXXX</strong></p>
                                    <p class="card-text" style="margin-top: -16px; font-size: 12px;"><strong>Plot No ? Sector No ? Landhi No 06 Karachi</strong></p>

                                    <br><br>

                                    <div class="col-md-12">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <p class="card-text"><b>Order ID : </b> AL-SYED-<?php echo str_pad($row['o_id'], "5", "0", STR_PAD_LEFT);?></p>
                                             <p class="card-text"><b>Customer Name : </b> <?php echo $row['c_name']?></p>
                                             <p class="card-text"><b>Date & time : </b> <?php echo $row['date_time']?> </p>
                                          </div>
                                          <div class="col-md-6">
                                             <?php 
                                                $selectQuery1 = $invoice->selectUser('tbl_user', 'userID');
                           
                                                while ($row1 = mysqli_fetch_assoc($selectQuery1)) {
                                                   if ($row1['userID'] == $row['c_id'] && $row1['userName'] == $row['c_name']) {
                                             ?>
                                                      <p class="card-text"></p><br>
                                                      <p class="card-text"><b>Mobile Number : </b> <?php echo $row1['mobileNo']?></p>
                                                      <p class="card-text"><b>Address : </b> <?php echo $row1['Address']?></p>
                                             <?php 
                                                      break;
                                                   }
                                                }
                                             ?>
                                          </div>
                                       </div>
                                    </div>

                        <?php 
                                 }
                        ?>

                                 <br><br><br><br>

                                 <table class="table table-striped table-bordered">
                                    <thead>
                                          <tr>
                                             <th><center>Product Name</center></th>
                                             <th><center>Main Category</center></th>
                                             <th><center>Sub Category</center></th>
                                             <th><center>Price</center></th>
                                             <th><center>Quantity</center></th>
                                             <th><center>Total</center></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $selectQuery = $invoice->selectOrderDetailForInvoice('tbl_order_detail', $o_id);

                                          $t_qty = 0;

                                          while ($row = mysqli_fetch_assoc($selectQuery)) {
                                             echo '
                                                <tr>
                                                   <td><center>'.$row['name'].'</center></td>
                                                   <td><center>'.$row['mcategory'].'</center></td>
                                                   <td><center>'.$row['scategory'].'</center></td>
                                                   <td><center>'.$row['price'].'</center></td>
                                                   <td><center>'.$row['qty'].'</center></td>
                                             ';

                                             $t_qty = $t_qty + $row['qty'];

                                             echo '
                                                   <td><center>'.$row['total'].'</center></td>
                                                </tr>
                                             ';
                                          }

                                          echo '
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>
                                          ';

                                          $selectQuery = $invoice->selectOrderForShowInvoice('tbl_order', $o_id);
                           
                                          while ($row = mysqli_fetch_assoc($selectQuery)) {
                                             echo '
                                                <tr>
                                                   <td><center>'.$row['item'].'</center></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td><center>'.$t_qty.'</center></td>
                                                   <td><center>'.$row['o_amount'].'</center></td>
                                                </tr>
                                             ';
                                          }
                                       ?>
                                    </tbody>
                                 </table>

                                 <?php

                                    $selectQuery = $invoice->selectOrderForShowInvoice('tbl_order', $o_id);
                              
                                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                                 ?>
                                       <br>

                                       <div class="col-md-12">
                                          <div class="row">
                                             <div class="col-md-2"></div>
                                             <div class="col-md-2"></div>
                                             <div class="col-md-2 border"><p class="card-text"><b>No of item's : </b> <span class="float-right"><?php echo $row['item']; ?></span></p></div>
                                             <div class="col-md-2 border">
                                                <?php $result = (int)$row['t_amount'] - (int)$row['o_amount']; ?>
                                                <p class="card-text"><b>Due Amount : </b> <span class="float-right"><?php echo $result; ?></span></p>
                                             </div>
                                             <div class="col-md-2 border"><p class="card-text"><b>Order Amount : </b> <span class="float-right"><?php echo $row['o_amount']; ?></span></p></div>
                                             <div class="col-md-2 border"><p class="card-text"><b>Total Amount : </b> <span class="float-right"><?php echo $row['t_amount']; ?></span></p></div>
                                          </div>
                                       </div>

                                       <br><br>

                                       <div class="col-md-12">
                                          <div class="row">
                                             <div class="col-md-3"></div>
                                             <div class="col-md-3"></div>
                                             <div class="col-md-3"></div>
                                             <div class="col-md-3">
                                                <p class="card-text"><b>Total Amount : </b> <span class="float-right"><?php echo $row['t_amount']; ?></span></p>
                                                <p class="card-text"><b>Receive Amount : </b> <span class="float-right"><?php echo $row['r_amount']; ?></span></p>
                                                <?php $result = (int)$row['t_amount'] - (int)$row['r_amount']; ?>
                                                <p class="card-text"><b>Remaining Balance : </b> <span class="float-right"><?php echo $result; ?></span></p>   
                                             </div>
                                          </div>
                                       </div>

                                       <br><br><br><br>

                                       <div class="col-md-12">
                                          <div class="row">
                                             <div class="col-md-4">
                                                <p class="card-content" style="font-size: 13px;">POWERED BY: Syed Owais Noor</p>
                                             </div>
                                             <div class="col-md-4">
                                                <p class="card-content center" style="font-size: 13px;">Email: syedowaisnoor.devex@gmail.com</p>
                                             </div>
                                             <div class="col-md-4">
                                                <p class="card-content float-right" style="font-size: 13px;">Contact Number: (+92)3170295857</p>
                                             </div>
                                          </div>
                                       </div>
                                 <?php 
                                    }
                                 ?>
                        <?php
                              }
                           } catch (\Throwable $th) {
                              echo '<script>swal("Sorry", "Something went wrong, Fail create your invoice!!!", "error", {button: false,});</script>';
                           }
                        ?>

                        <a href="addOrder.php#create_order" class="btn btn-info btn-lg btn-block">BACK TO CREATE ORDER</a>                 
                        <br><br>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
         //Dashboard shortcut js
         document.onkeydown = function KeyPress(e) {
            var evtobj = window.event? event : e
            if (evtobj.keyCode == 65 && evtobj.altKey) window.location.href="dashboard.php"; // ALT + a
            else if (evtobj.keyCode == 71 && evtobj.altKey) window.location.href="salesReport.php"; // ALT + g
            else if (evtobj.keyCode == 73 && evtobj.altKey) window.location.href="productReport.php"; // ALT + i
            else if (evtobj.keyCode == 74 && evtobj.altKey) window.location.href="purchaseReport.php"; // ALT + j
            else if (evtobj.keyCode == 82 && evtobj.altKey) window.location.href="registration.php"; // ALT + r
            else if (evtobj.keyCode == 85 && evtobj.altKey) window.location.href="userInfo.php"; // ALT + u
            else if (evtobj.keyCode == 67 && evtobj.altKey) window.location.href="category.php"; // ALT + c
            else if (evtobj.keyCode == 80 && evtobj.altKey) window.location.href="addProduct.php"; // ALT + p
            else if (evtobj.keyCode == 76 && evtobj.altKey) window.location.href="productList.php"; // ALT + l
            else if (evtobj.keyCode == 79 && evtobj.altKey) window.location.href="addOrder.php#create_order"; // ALT + o
            else if (evtobj.keyCode == 83 && evtobj.altKey) window.location.href="orderStatus.php"; // ALT + s
            else if (evtobj.keyCode == 66 && evtobj.altKey) window.location.href="orderList.php"; // ALT + b
            else if (evtobj.keyCode == 90 && evtobj.altKey) window.location.href="changePassword.php"; // ALT + z
            else if (evtobj.keyCode == 88 && evtobj.altKey) window.location.href="changeEmail.php"; // ALT + x
            else if (evtobj.keyCode == 72 && evtobj.altKey) window.location.href="help.php"; // ALT + h
            else if (evtobj.keyCode == 190 && evtobj.altKey) window.location.href="logout.php"; // ALT + .
         }

         window.print();
      </script>

   </body>
</html>