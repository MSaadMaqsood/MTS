<?php

    require_once 'database/crudOperation.php';
    require_once 'controller/auth.php';
    require_once 'controller/webProduct.php';
    require_once 'controller/webOrder.php';
    require_once 'controller/webCategory.php';

    try {
		$order = new WebOrder();

		if (isset($_POST['addToCart'])) {
			$id = $_POST['id'];
			$image = $_POST['image'];
			$title = $_POST['title'];
			$brand = $_POST['brand'];
			$price = $_POST['salePrice'];
            $stock = $_POST['stock'];
			$qty = $_POST['qty'];

			$order->addToCart($id, $image, $title, $brand, $price, $qty, $stock);
		}

		if (isset($_POST['checkout'])) {
            if (isset($_SESSION['email'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $nearBy = $_POST['nearBy'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $code = $_POST['code'];

                $order = new WebOrder(); 
                
                $item = $order->cartCount();
                $total = $order->calculateTotal();
                $status = "pending";

                if ($total != 0) {
                    $order->confirmOrder($name, $phone, $address, $nearBy, $city, $state, $code, $item, $total, $status);
                } else {
                    echo '<script>swal("Sorry", "Cart is empty!!!", "error", {button: false,});</script>';
                }
            } else {
                echo '<script>alert("Please first login to your account or create one!!!");</script>';
            }
		}
	} catch (\Throwable $th) {
		echo '<script>swal("Sorry", "Something went wrong, Cannnot add the product!!!", "error", {button: false,});</script>';
	}

?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- FAVICONS ICON -->
	<link rel="icon" type="image/x-icon" href="img/icon/logoIcon.png"/>
    
    <!-- PAGE TITLE HERE -->
    <title>MTS Jillani Associate | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>