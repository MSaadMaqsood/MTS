<?php 

    session_start();

    class SESSION
    {
        public function assignValues($id, $email, $role)
        {
            try {
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set sessions!!!", "error", {button: false,});</script>';
            }
        }
    }

?>