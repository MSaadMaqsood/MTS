<?php 

    require_once 'checkSession.php';
    require_once 'head.php';

    try {
        session_destroy();

        header('location:../index.php');
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot Login!!!", "error", {button: false,});</script>';
    }

?>