<?php 

    require_once 'database/crudOperation.php';
    require_once 'session.php';

    class Auth {
        private $userid = '';
        private $email = '';
        private $role = '';

        public function setID($id) {
            try {
                $this->userid = $id;
                $_SESSION['id'] = $id;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set the value", "error", {button: false,});</script>';
            }
        }

        public function setEmail($email) {
            try {
                $this->email = $email;
                $_SESSION['email'] = $email;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set the value", "error", {button: false,});</script>';
            }
        }

        public function setRole($role) {
            try {
                $this->role = $role;
                $_SESSION['role'] = $role;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set the value", "error", {button: false,});</script>';
            }
        }
        
        protected function setSession() {
            $setSession = new SESSION();

            $setSession->assignValues($this->userid, $this->email, $this->role);
        }
    }

    class SignUp extends Auth {
        public function checkValidation($email, $password, $fullName, $phone, $address, $nearBy, $city, $state, $code) {
            try {
                $flag = true;

                if ($email == '') {
                    $flag = false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>swal("Alert", "Invalid email format", "info", {button: false,});</script>';
                    return;
                }

                if ($password == '') {
                    $flag = false;
                } elseif (strlen($password) < 8 || strlen($password) > 12) {
                    echo '<script>swal("Alert", "Password must be of 8 to 12 characters long", "info", {button: false,});</script>';
                    return;
                }

                if ($fullName == '') {
                    $flag = false;
                } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$fullName)) {
                    echo '<script>swal("Alert", "Invalid Full Name", "info", {button: false,});</script>';
                    return;
                }

                if ($phone == '') {
                    $flag = false;
                } elseif (strlen($phone) != 11) {
                    echo '<script>swal("Alert", "Invalid phone number", "info", {button: false,});</script>';
                    return;
                }

                if ($address == '' || $city == '' || $state == '' || $code == '') {
                    $flag = false;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check", "info", {button: false,});</script>';
                    return;
                }

                $selectData = new crudOperation();
            
                $selectQuery = $selectData->selectUser('tbl_user', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    if ($email == $row['email']) {
                        echo '<script>swal("Alert", "An account with these detail already exist", "info", {button: false,});</script>';
                        $flag = false;
                        break;
                    }
                }

                if ($flag != false) {
                    $this->insertUser($email, $password, $fullName, $phone, $address, $nearBy, $city, $state, $code);
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot Sign Up", "error", {button: false,});</script>';
            }
        }

        public function insertUser($email, $password, $fullName, $phone, $address, $nearBy, $city, $state, $code) {
            try {
                $insertData = new crudOperation();
                $role = 'user';

                $hash_password = password_hash($password, PASSWORD_DEFAULT);

                if ($insertData->insertUser('tbl_user', $email, $hash_password, $role) > 0) {
                    $selectQuery = $insertData->selectUser('tbl_user', 'id');

                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                        if ($email == $row['email'] && password_verify($password, $row['password'])) {
                            $this->setID($row['id']);
                            $this->setEmail($row['email']);
                            $this->setRole($row['role']);
                            $this->setSession();

                            if ($insertData->insertDetail('tbl_detail', $row['id'], $fullName, $phone, $address, $nearBy, $city, $state, $code) > 0) {
                                echo '<script>swal("Successfull", "Your account has been created!!!", "success", {button: false,});</script>';
                                
                                echo '<script>window.location.href="index.php";</script>';

                                break;
                            }
                            else {
                                echo '<script>swal("Sorry", "Something went wrong, Please try again after few minutes", "error", {button: false,});</script>';
                                break;
                            }
                        }
                    }
                }
                else {
                    echo '<script>swal("Sorry", "Something went wrong, Please try again after few minutes", "error", {button: false,});</script>';
                    return;
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot create an account", "error", {button: false,});</script>';
            }
        }
    }

    class Login extends Auth {
        public function checkValidation($email, $password) {
            try {
                $flag = true;

                if ($email == '') {
                    $flag = false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>swal("Alert", "Invalid email format", "info", {button: false,});</script>';
                    return;
                }

                if ($password == '') {
                    $flag = false;
                } elseif (strlen($password) < 8 || strlen($password) > 12) {
                    echo '<script>swal("Alert", "Password must be of 8 to 12 characters long", "info", {button: false,});</script>';
                    return;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check", "info", {button: false,});</script>';
                    return;
                }

                $selectData = new crudOperation();
            
                $selectQuery = $selectData->selectUser('tbl_user', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                
                    if ($email == $row['email'] && password_verify($password, $row['password'])) {
                        if ($row['role'] == "admin") {
                            $this->setID($row['id']);
                            $this->setEmail($row['email']);
                            $this->setRole($row['role']);
                            $this->setSession();

                            echo '<script>swal("Successfull", "Welcome Admin, Let start our day!!!", "success", {button: false,});</script>';

                            date_default_timezone_set('Asia/Karachi');
                            $date = date('y-m-d');

                            if ($date <= "23-08-1") {
                                echo '<script>window.location.href="pages/help.php";</script>';
                            }
                            else {
                                echo '<script>window.location.href="pages/dashboard.php";</script>';
                            }

                            $flag = true;

                            break;
                        }
                        elseif ($row['role'] == "user") {
                            $this->setID($row['id']);
                            $this->setEmail($row['email']);
                            $this->setRole($row['role']);
                            $this->setSession();

                            echo '<script>swal("Successfull", "Welcome, Let start shopping!!!", "success", {button: false,});</script>';

                            $flag = true;


                            echo '<script>window.location.href="customer/orderStatus.php";</script>';

                            break;
                        }
                    }
                    else {
                        $flag = false;
                    }
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You have enter wrong email or password", "info", {button: false,});</script>';
                    return;
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot Login", "error", {button: false,});</script>';
            }
        }
    }

    class ForgetPassword {
        public function generateCode($email) {
            try {
                $flag = false;

                if ($email == '') {
                    $flag = false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>swal("Alert", "Invalid email format", "info", {button: false,});</script>';
                    return;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check", "info", {button: false,});</script>';
                    return;
                }

                $verification = rand(10, 90)*10 + rand(100, 200)*1 + rand(0, 9)*100;

                $selectData = new crudOperation();
                
                $selectQuery = $selectData->selectUser('tbl_user', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {

                    if ($email == $row['email']) {
                        $_SESSION['code'] = $verification;

                        echo '<script>window.location.href="code.php";</script>';

                        break;
                    }

                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Unable generate a code", "error", {button: false,});</script>';
            }
        }

        public function changePassword($code, $email, $newPassword) {
            try {
                $flag = true;
                $emailFlag = true;
                $passwordFlag = true;
                
                if ($email == '') {
                    $flag = false;
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>swal("Alert", "Invalid email format", "info", {button: false,});</script>';
                    return;
                }

                if ($newPassword == '') {
                    $flag = false;
                } elseif (strlen($newPassword) < 8 || strlen($newPassword) > 12) {
                    echo '<script>swal("Alert", "Password must be of 8 to 12 characters long", "info", {button: false,});</script>';
                    return;
                }

                if ($flag == false) {
                    echo '<script>swal("Alert", "You forget to enter a field. Please Check", "info", {button: false,});</script>';
                    return;
                }

                $verificationCode = $_SESSION['code'];

                if ($code == $verificationCode) {
                    $selectData = new crudOperation();
                
                    $selectQuery = $selectData->selectUser('tbl_user', 'id');

                    while ($row = mysqli_fetch_assoc($selectQuery)) {

                        if ($email == $row['email']) {
                            if (password_verify($newPassword, $row['password'])) {
                                $passwordFlag = false;
                                
                                break;
                            } else {
                                $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);

                                if ($selectData->updatePassword('tbl_user', $row['id'], $hash_password) > 0) {
                                    $emailFlag = true;

                                    echo '<script>swal("Successfull", "Your password has been changed!!!", "success", {button: false,});</script>';

                                    echo '<script>window.location.href="login.php";</script>';

                                    break;
                                }
                                else {
                                    echo '<script>swal("Sorry", "Something went wrong, Your password has not been changed", "error", {button: false,});</script>';

                                    break;
                                }
                            }
                        }

                        $emailFlag = false;
                    }

                    if ($emailFlag == false) {
                        echo '<script>swal("Alert", "You have enter wrong a email", "info", {button: false,});</script>';
                        return;
                    }

                    if ($passwordFlag == false) {
                        echo '<script>swal("Alert", "Please enter a new password", "info", {button: false,});</script>';
                        return;
                    }
                } else {
                    echo '<script>swal("Alert", "Please enter the correct verification code", "info", {button: false,});</script>';
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Unable change your account password", "error", {button: false,});</script>';
            }
        }
    }
    
?>