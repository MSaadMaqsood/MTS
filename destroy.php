<?php 

    session_start();

    try {
        session_destroy();

        header('location:index.php');
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot logout", "error", {button: false,});</script>';
    }

?>