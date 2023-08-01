<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv='cache-control' content='no-cache'>
      <meta http-equiv='expires' content='0'>
      <meta http-equiv='pragma' content='no-cache'>
      
      <title>MTS | Invoice</title>

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
                                 $id = $_GET['invoice'];

                                 $invoice = new crudOperation();

                                 $selectQuery = $invoice->selectOrderForShowInvoice('tbl_order', $id);
                           
                                 while ($row = mysqli_fetch_assoc($selectQuery)) {
                        ?>
                                    <br><br>

                                    <h1 class="card-title" style="border-top: solid; border-bottom:solid;">Fashion On MTS-Fashion-Trading</h1>
                                    <h1 class="card-title float-right">ORDER INVOICE</h1>
                                    <br>
                                    <p class="card-text" style="font-size: 12px;"><strong>Contact Number : 0315-0271712 | 0322-2925853</strong></p>
                                    <p class="card-text" style="margin-top: -16px; font-size: 12px;"><strong>SHOP No. U2-222, MILLINIUM MALL</strong></p>

                                    <br><br>

                                    <div class="col-md-12">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <p class="card-text"><b>Order ID : </b> MTS-<?php echo str_pad($row['id'], "4", "0", STR_PAD_LEFT);?></p>
                                             <p class="card-text"><b>Customer Name : </b> <?php echo $row['name']?></p>
                                             <p class="card-text"><b>Address : </b> <?php echo $row['address']?></p>
                                             <p class="card-text"><b>City : </b> <?php echo $row['city']?></p>
                                             <p class="card-text"><b>Postcode : </b> <?php echo $row['code']?></p>
                                          </div>
                                          <div class="col-md-6">
                                             <p class="card-text"></p><br>
                                             <p class="card-text"><b>Contact Number : </b> <?php echo $row['phone']?></p>
                                             <p class="card-text"><b>Near By : </b> <?php echo $row['nearBy']?></p>
                                             <p class="card-text"><b>State : </b> <?php echo $row['state']?></p>
                                             <p class="card-text"><b>Date & time : </b> <?php echo $row['dateTime']?> </p>
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
                                             <th><center>TITLE</center></th>
                                             <th><center>BRAND</center></th>
                                             <th><center>PRICE</center></th>
                                             <th><center>QUANTITY</center></th>
                                             <th><center>TOTAL</center></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $selectQuery = $invoice->selectOrderDetailForShowInvoice('tbl_order_detail', $id);

                                          while ($row = mysqli_fetch_assoc($selectQuery)) {
                                             $discount = ($row['salePrice'] * $row['discount'])/100;
                                             $discount = $row['salePrice'] - $discount;

                                             echo '
                                                <tr>
                                                   <td><center>'.$row['title'].'</center></td>
                                                   <td><center>'.$row['brand'].'</center></td>';
                                                   if ($row['discount'] > 0) {
                                                      echo '<td><center>'.$discount.'</center></td>';
                                                   } else {
                                                      echo '<td><center>'.$row['salePrice'].'</center></td>';
                                                   }
                                             echo '<td><center>'.$row['qty'].'</center></td>
                                                   <td><center>'.$row['total'].'</center></td>
                                                </tr>
                                             ';
                                          }
                                       ?>
                                    </tbody>
                                 </table>

                                 <?php

                                    $selectQuery = $invoice->selectOrderForShowInvoice('tbl_order', $id);
                              
                                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                                 ?>
                                       <br>

                                       <div class="col-md-12 d-flex align-items-end flex-column">
                                          <div class="col-md-2 border"><p class="card-text"><b>No of item's : </b> <span class="float-right"><?php echo $row['item']; ?></span></p></div>
                                          <div class="col-md-2 border"><p class="card-text"><b>Order Amount : </b> <span class="float-right"><?php echo $row['amount']; ?></span></p></div>
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

                        <a href="orderStatus.php" class="btn btn-info btn-lg btn-block">BACK TO ORDER</a>
                        <?php 
                           if (isset($_GET['status'])) {
                              $status = $_GET['status'];

                              if ($status == "print") {
                        ?>
                                 <a href="?invoice=<?php echo $id; ?>&print=true" class="btn btn-info btn-lg btn-block">PRINT ORDER</a>
                                 <a href="thermalPrint.php?invoice=<?php echo $id; ?>" class="btn btn-info btn-lg btn-block">THERMAL ORDER</a>
                        <?php 
                                 }
                           }
                        ?>                 
                        <br><br>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <?php 
         if (isset($_GET['print'])) {
               $status = $_GET['print'];

               if ($status == true) {
      ?>
                  <script>
                     window.print();
                  </script>
      <?php 
               }
         }
      ?>

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
      </script>

   </body>
</html>