<?php 

    require_once '../controller/session.php';

    try {
        if ($_SESSION['email'] == '' && ($_SESSION['role'] == 'user' || $_SESSION['role'] == '')) {
            header('location:../index.php');
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Your authentication are incorrect!!!", "error", {button: false,});</script>';
    }

?>