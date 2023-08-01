<?php

    session_start();

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            foreach ($_SESSION['cart'] as $key => $value) {
                if ($key == $id) {
                    $date = new DateTime();


                    unset($_SESSION['cart'][$key]);
                    echo '<script>swal("Successful", "Product has been removed!!!", "success", {button: false,});</script>';
                    echo '<script>window.location.href="shopping-cart.php"</script>';
                }   
            }
        }
    } catch (\Throwable $th) {
        echo '<script>alert("Some thing went wrong!!!");</script>';
    }

?>