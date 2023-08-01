<?php 

    require_once 'dbconnection.php';

    class CrudOperation
    {
        private function getDB(){
            try {
                $db = new DBConnection();
                return $db;
            } catch (\Throwable $th) {
                echo '<script>swal("Connectivity Error", "Fail to connect with database", "error", {button: false,});</script>';
            }
        }
        
        public function selectUser($table, $short){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select * from $table order by $short");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertUser($table, $email, $password, $role){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(), "insert into $table (email,password,role) values ('$email', '$password', '$role')");

                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertDetail($table, $authID, $fullName, $phone, $address, $nearBy, $city, $state, $code){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(), "insert into $table (authID,name,phone,address,nearBy,city,state,code) values ('$authID', '$fullName', '$phone', '$address', '$nearBy', '$city', '$state', '$code')");

                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updatePassword($table, $id, $password){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set password='$password' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateEmail($table, $id, $email){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set email='$email' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectCategory($table, $short){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select * from $table order by $short");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertCategory($table, $name){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(),"insert into $table (name) values ('$name')");

                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function searchCategory($table, $id){
            try {
                $searchQuery = mysqli_query($this->getDB()->connection(),"select * from $table where id='$id'");

                return $searchQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateCategory($table, $id, $name){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set name='$name' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function deleteCategory($table, $id){
            try {
                $deleteQuery = mysqli_query($this->getDB()->connection(), "delete from $table where id='$id'");

                return $deleteQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectProduct($table, $short){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id order by $short");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertProduct($table, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(),"insert into $table (title,c_id,brand,distributor,description,image,purchasePrice,salePrice,stock,discount,rating,newArrival,hotSale) values ('$name', '$category', '$brand', '$distributor', '$description', '$image', '$purchasePrice', '$salePrice', '$stock', '$discount', '$rating', '$na', '$hs')");

                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function searchProduct($table, $id){
            try {
                $searchQuery = mysqli_query($this->getDB()->connection(),"select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id where $table.id='$id'");

                return $searchQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateProduct($table, $id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs, $image){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set title='$name', c_id='$category', brand='$brand', distributor='$distributor' , description='$description', image='$image', purchasePrice='$purchasePrice', salePrice='$salePrice', stock='$stock', discount='$discount', rating='$rating', newArrival='$na' , hotSale='$hs' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateProductWithoutImage($table, $id, $name, $category, $brand, $distributor, $description, $purchasePrice, $salePrice, $stock, $discount, $rating, $na, $hs){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set title='$name', c_id='$category', brand='$brand', distributor='$distributor' , description='$description', purchasePrice='$purchasePrice', salePrice='$salePrice', stock='$stock', discount='$discount', rating='$rating', newArrival='$na' , hotSale='$hs' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function deleteProduct($table, $id){
            try {
                $deleteQuery = mysqli_query($this->getDB()->connection(), "delete from $table where id='$id'");

                return $deleteQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function showOrder($table, $short){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_customer`.name, `tbl_customer`.phone, `tbl_customer`.address from $table inner join `tbl_customer` on $table.id = `tbl_customer`.id order by '$short'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateStatus($table, $id, $status){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set status='$status' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function deleteOrder($table, $id){
            try {
                $deleteQuery = mysqli_query($this->getDB()->connection(), "delete from $table where id='$id'");

                return $deleteQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function deleteOrderDetail($table, $id){
            try {
                $deleteQuery = mysqli_query($this->getDB()->connection(), "delete from $table where o_id='$id'");

                return $deleteQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function deleteCustomer($table, $id){
            try {
                $deleteQuery = mysqli_query($this->getDB()->connection(), "delete from $table where id='$id'");

                return $deleteQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectOrderForShowInvoice($table, $id){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_customer`.name, `tbl_customer`.phone, `tbl_customer`.address, `tbl_customer`.nearBy, `tbl_customer`.city, `tbl_customer`.state, `tbl_customer`.code from $table inner join `tbl_customer` on $table.cus_id = `tbl_customer`.id where $table.id='$id'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectOrderDetailForShowInvoice($table, $id){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_product`.title, `tbl_product`.brand, `tbl_product`.salePrice, `tbl_product`.discount from $table inner join `tbl_product` on $table.p_id = `tbl_product`.id where o_id='$id'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateSalesGraphOfDate($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select dateTime, sum(amount) AS t_amount from $table where DATE(dateTime) BETWEEN '$start' AND '$end' GROUP BY dateTime");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateSalesGraphOfMonth($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select MONTH(dateTime) AS month, sum(amount) AS t_amount from $table where MONTH(dateTime) BETWEEN '$start' AND '$end' GROUP BY MONTH(dateTime)");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateSalesGraphOfYear($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select YEAR(dateTime) AS year, sum(amount) AS t_amount from $table where YEAR(dateTime) BETWEEN '$start' AND '$end' GROUP BY YEAR(dateTime)");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateProductGraphOfDate($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select b_id, sum(qty) AS t_amount, `tbl_book`.title from $table inner join `tbl_book` on $table.b_id = `tbl_book`.id where DATE($table.dateTime) BETWEEN '$start' AND '$end' GROUP BY b_id");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateProductGraphOfMonth($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select b_id, sum(qty) AS t_amount, `tbl_book`.title from $table inner join `tbl_book` on $table.b_id = `tbl_book`.id where MONTH($table.dateTime) BETWEEN '$start' AND '$end' GROUP BY b_id");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateProductGraphOfYear($table, $start, $end){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select b_id, sum(qty) AS t_amount, `tbl_book`.title from $table inner join `tbl_book` on $table.b_id = `tbl_book`.id where YEAR($table.dateTime) BETWEEN '$start' AND '$end' GROUP BY b_id");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function generateGraph($table, $month){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select dateTime, sum(amount) AS t_amount from $table where MONTH(dateTime) BETWEEN '$month' AND '$month' GROUP BY dateTime");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function sumEarning($table, $date){
            try {
                $sum = mysqli_query($this->getDB()->connection(), "select SUM(amount) AS earning from $table where dateTime LIKE '%$date%'");

                return $sum;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function countOrder($table, $date){
            try {
                $count = mysqli_query($this->getDB()->connection(), "select COUNT(id) AS bill from $table where dateTime LIKE '%$date%'");

                return $count;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function countOrderStatus($table, $date, $status){
            try {
                $count = mysqli_query($this->getDB()->connection(), "select COUNT(status) AS status from $table where dateTime LIKE '%$date%' AND status LIKE '%$status%'");

                return $count;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function select12Product($table){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id order by RAND() limit 12");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function select4Product($table, $brand){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id where $table.brand LIKE '$brand' order by RAND() limit 4");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertCustomerDetail($table, $name, $phone, $address, $nearBy, $city, $state, $code){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(),"insert into $table (name,phone,address,nearBy,city,state,code) values ('$name','$phone','$address','$nearBy','$city','$state','$code')");
                
                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectCustomer($table, $name, $phone, $address, $nearBy, $city, $state, $code, $date){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select id from $table where name='$name' AND phone LIKE '%$phone%' AND address LIKE '%$address%' AND nearBy LIKE '%$nearBy%' AND city LIKE '%$city%' AND state LIKE '%$state%' AND code LIKE '%$code%' AND dateTime LIKE '%$date%'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectCustomerDetail($table, $id){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select * from $table where authId='$id'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertOrder($table, $id, $item, $total, $status){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(),"insert into $table (cus_id,item,amount,status) values ('$id','$item','$total','$status')");
                
                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectOrder($table, $id, $item, $total, $status, $date){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select id from $table where cus_id='$id' AND item LIKE '%$item%' AND amount LIKE '%$total%' AND status LIKE '%$status%' AND dateTime LIKE '%$date%'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function updateStock($table, $id, $stock){
            try {
                $updateQuery = mysqli_query($this->getDB()->connection(), "update $table set stock='$stock' where id='$id'");

                return $updateQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function insertOrderDetail($table, $o_id, $p_id, $qty, $total){
            try {
                $insertQuery = mysqli_query($this->getDB()->connection(),"insert into $table (o_id,p_id,qty,total) values ('$o_id','$p_id','$qty','$total')");
                
                return $insertQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectBook($table, $id){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id where $table.id='$id'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectBookByCategory($table, $c_id, $name){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id where c_id='$c_id' AND title LIKE '%$name%'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectCategoryBook($table, $c_id){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_category`.name from $table inner join `tbl_category` on $table.c_id = `tbl_category`.id where c_id='$c_id'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function searchCustomer($table, $id){
            try {
                $searchQuery = mysqli_query($this->getDB()->connection(),"select * from $table where authID='$id'");

                return $searchQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function selectCustomerID($table, $name, $phone, $address, $nearBy, $city, $state, $code){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select id from $table where name='$name' AND phone LIKE '%$phone%' AND address LIKE '%$address%' AND nearBy LIKE '%$nearBy%' AND city LIKE '%$city%' AND state LIKE '%$state%' AND code LIKE '%$code%'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }

        public function showCustomerOrder($table, $id, $short){
            try {
                $selectQuery = mysqli_query($this->getDB()->connection(), "select $table.*, `tbl_customer`.name, `tbl_customer`.phone, `tbl_customer`.address from $table inner join `tbl_customer` on $table.id = `tbl_customer`.id where $table.id LIKE '%$id%' order by '$short'");

                return $selectQuery;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Fail to execute the query", "error", {button: false,});</script>';
            }
        }
    }  
?>