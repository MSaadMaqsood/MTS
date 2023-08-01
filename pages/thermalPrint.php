<?php 

    require_once '../fpdf184/fpdf.php';
    require_once '../database/crudOperation.php';

    try {
        if (isset($_GET['invoice'])) {
            $id = $_GET['invoice'];

            $invoice = new crudOperation();

            $pdf = new FPDF('P', 'mm', array(80, 200));

            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 8, 'Fashion On MTS-Fashion-Trading', 1, 1, 'C');

            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(60, 5, 'Contact Number : 0315-0271712 | 0322-2925853', 0, 1, 'C');
            $pdf->Cell(60, 5, 'SHOP No. U2-222, MILLINIUM MALL', 0, 1, 'C');

            $pdf->Line(7,28,72,28);
            $pdf->Ln();

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(60, 0, 'ORDER INVOICE', 0, 1, 'C');

            $selectQuery = $invoice->selectOrderForShowInvoice('tbl_order', $id);

            while ($row = mysqli_fetch_assoc($selectQuery)) {
                $id = $row['id'];

                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(9.5, 20, 'Order ID : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(30, 20, 'MTS-'.str_pad($row['id'], "4", "0", STR_PAD_LEFT), 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(20, -10, 'Customer Name : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(30, -10, $row['name'], 0, 1, 'C');
                
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(19.5, 20, 'Contact Number : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(30, 20, $row['phone'], 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(9.5, -9, 'Address : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(50, -10, $row['address'], 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(9.5, 20, 'Near By : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(30, 20, $row['nearBy'], 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(4.5, -9, 'City : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(32, -9, $row['city'], 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(12.5, 20, 'Postcode : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(30, 20, $row['code'], 0, 1, 'C');

                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(16.5, 0, 'Date & Time : ', 0, 0, 'C');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(35, 0, $row['dateTime'], 0, 1, 'C');

                $pdf->Cell(35, 10, '', 0, 1, 'C');

                $pdf->SetX(6);
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(34, 5, 'Title', 1, 0, 'C');
                $pdf->Cell(11, 5, 'Price', 1, 0, 'C');
                $pdf->Cell(11, 5, 'Qty', 1, 0, 'C');
                $pdf->Cell(12, 5, 'Total', 1, 0, 'C');

                $selectQuery1 = $invoice->selectOrderDetailForShowInvoice('tbl_order_detail', $id);

                $t_qty = 0;

                while ($row1 = mysqli_fetch_assoc($selectQuery1)) {
                    $discount = ($row1['salePrice'] * $row1['discount'])/100;
                    $discount = $row1['salePrice'] - $discount;

                    $t_qty = $t_qty + $row1['qty'];
                    $pdf->Ln();
                    $pdf->SetX(6);
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->Cell(34, 5, $row1['title'], 1, 0, 'C');
                    if ($row1['discount'] > 0) {
                        $pdf->Cell(11, 5, $discount, 1, 0, 'C');
                    } else {
                        $pdf->Cell(11, 5, $row1['salePrice'], 1, 0, 'C');
                    }
                    $pdf->Cell(11, 5, $row1['qty'], 1, 0, 'C');
                    $pdf->Cell(12, 5, $row1['total'], 1, 0, 'C');
                }

                $pdf->Ln();$pdf->Ln();

                $pdf->SetX(9);
                $pdf->Cell(20, 5, '', 0, 0, 'L');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(25, 5, 'No. of items', 1, 0, 'L');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(20, 5, $row['item'], 1, 1, 'C');

                $pdf->SetX(9);
                $pdf->Cell(20, 5, '', 0, 0, 'L');
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(25, 5, 'Order Amount', 1, 0, 'L');
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(20, 5, $row['amount'], 1, 1, 'C');
            }

            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(60, 25, 'POWERED BY: Syed Owais Noor', 0, 1, 'C');
            $pdf->Cell(60, -8.5, 'Contact Number: (+92)3170295857', 0, 1, 'C');
            $pdf->Cell(60, 0, 'Email: syedowaisnoor.devex@gmail.com', 0, 1, 'C');

            $pdf->Output();
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Fail create your invoice!!!", "error", {button: false,});</script>'; 
    }

?>