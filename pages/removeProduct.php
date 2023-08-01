<?php

    require_once 'checkSession.php';

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key == $id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo '<script>window.location.href="addOrder.php#order_table"</script>';
                }   
            }
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot remove product from the cart!!!", "error", {button: false,});</script>';
    }

?>