<?php 

    require_once '../controller/delete.php';

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $user = new Delete();

            $user->removeProduct($id);
        }
    } catch (\Throwable $th) {
        echo '<script>swal("Sorry", "Something went wrong, Cannnot remove the product!!!", "error", {button: false,});</script>';
    }

?>