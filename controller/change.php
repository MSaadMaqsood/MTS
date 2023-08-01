<?php 

    require_once '../database/crudOperation.php';

    class Change{
        public function checkValidation($email, $password, $confirm){
            try {
                $flag = true;

                if ($email == '') {
                    $flag = false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>swal("Alert", "Invalid email format!!!", "info", {button: false,});</script>';
                    return;
                }

                if ($password == '') {
                    $flag = false;
                } elseif (strlen($password) < 8 || strlen($password) > 12) {
                    echo '<script>swal("Alert", "Password must be of 8 to 12 characters long!!!", "info", {button: false,});</script>';
                    return;
                }

                if ($confirm == '') {
                    $flag = false;
                } elseif (strlen($password) < 8 || strlen($password) > 12) {
                    echo '<script>swal("Alert", "Password must be of 8 to 12 characters long!!!", "info", {button: false,});</script>';
                    return;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check!!!", "info", {button: false,});</script>';
                    return;
                }

                $selectData = new crudOperation();
            
                $selectQuery = $selectData->selectUser('tbl_user', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                
                    if ($email == $row['email'] || password_verify($confirm,$row['password'])) {
                        if ($password == $confirm) {
                            $flag = false;

                            $hash = password_hash($password, PASSWORD_DEFAULT);

                            $this->change_Password($row['id'], $hash);

                            break;
                        }
                        elseif ($email == $password) {
                            $flag = false;

                            $this->change_Email($row['id'], $email);

                            break;
                        }
                        else {
                            $flag = true;
                        }
                    }
                    else {
                        $flag = true;
                    }
                }

                if ($flag == true) {
                    echo '<script>swal("Alert", "No such account OR confirm password/email doesn\'t match!!!", "warning", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot change your password/email!!!", "error", {button: false,});</script>';
            }
        }

        public function change_Password($id, $password)
        {
            try {
                $updateData = new crudOperation();

                if ($updateData->updatePassword('tbl_user', $id, $password) > 0) {
                    echo '<script>swal("Successful", "Your password has been changed!!!", "success", {button: false,});</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Your password has not been changed!!!", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot change your password!!!", "error", {button: false,});</script>';
            }
        }

        public function change_Email($id, $email)
        {
            try {
                $updateData = new crudOperation();

                if ($updateData->updateEmail('tbl_user', $id, $email) > 0) {
                    echo '<script>swal("Successful", "Your email has been changed!!!", "success", {button: false,});</script>';
                }
                else {
                    echo '<script>swal("Sorry", "Your email has not been changed!!!", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot change your email!!!", "error", {button: false,});</script>';
            }
        }
    }
    
?>