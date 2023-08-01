<!DOCTYPE html>
<html lang="en">

    <?php require_once 'web/common/head.php';?>

    <body class="hold-transition sidebar-mini">
            
            <?php
            
                require_once 'web/header/index.php';

                try {
                    if (!isset($_SESSION['email'])) {
                        require_once 'web/common/preloader.php';
                    }
                } catch (\Throwable $th) {
                    echo '<script>alert("Some thing went wrong!!!");</script>';
                }

                require_once 'web/common/canvaMenu.php';
            
                require_once 'web/index.php';

                require_once 'web/common/footer.php';

                require_once 'web/common/js.php';
            
            ?>
    </body>
</html>
