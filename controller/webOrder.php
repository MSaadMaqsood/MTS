<?php 

    require_once 'database/crudOperation.php';

    class WebOrder
    {
        private $total = 0;
        private $o_id = '';

        public function getTotal(){
            try {
                return $this->total;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot get the value", "error", {button: false,});</script>';
            }
        }

        public function setTotal($value){
            try {
                $this->total = $value;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set the value", "error", {button: false,});</script>';
            }
        }

        public function getO_ID(){
            try {
                return $this->o_id;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot get the value", "error", {button: false,});</script>';
            }
        }

        public function setO_ID($value){
            try {
                $this->o_id = $value;
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot set the value", "error", {button: false,});</script>';
            }
        }

        public function addToCart($id, $image, $title, $brand, $price, $qty, $stock) {
            try {
                if (isset($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'id');

                    if (in_array($id, $product_id)) {
                        $id = array_search($id, $_SESSION['cart'], true);
                        $this->editCart($id, $qty);
                    }
                    else {
                        $count = count($_SESSION['cart']);
                        
                        $product_array = array(
                            'id' => $id,
                            'image' => $image,
                            'title' => $title,
                            'brand' => $brand,
                            'price' => $price,
                            'qty' => $qty,
                            'stock' => $stock,
                        );

                        $_SESSION['cart'][$count] = $product_array;
                    }
                }
                else {
                    $product_array = array(
                        'id' => $id,
                        'image' => $image,
                        'title' => $title,
                        'brand' => $brand,
                        'price' => $price,
                        'qty' => $qty,
                        'stock' => $stock,
                    );
    
                    $_SESSION['cart'][0] = $product_array;
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot add item to cart", "error", {button: false,});</script>';
            }
        }

        public function cartCount(){
            try {
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    return $count;
                }
                else {
                    return 0;
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannot count the cart item", "error", {button: false,});</script>';
            }
        }

        public function editCart($id, $qty){
            try {
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if ($key == $id) {
                            $qty = $qty + $_SESSION['cart'][$id]['qty'];
                            $_SESSION['cart'][$id]['qty'] = $qty;

                            break;
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Fail to edit the cart quantity", "error", {button: false,});</script>';
            }
        }

        public function calculateTotal()
        {
            try {
                if (isset($_SESSION['cart'])) {
                    if ($this->cartCount() == 0) {
                        return 0;
                    }
                    else{
                        $result = 0;

                        foreach ($_SESSION['cart'] as $key => $value) {
                            $cartTotal = 0;

                            $cartTotal = (int)$value['price'] * (int)$value['qty'];

                            $result = $result + $cartTotal;
                        }

                        return $result;
                    }
                }
                else {
                    return 0;
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot create the cart", "error", {button: false,});</script>';
            }
        }

        public function showCart()
        {
            try {
                if (isset($_SESSION['cart'])) {
                    if ($this->cartCount() == 0) {
                        echo '
                            <tr>
                                <center><h1><strong>CART IS EMPTY</strong></h1></center>
                            </tr>
                        ';
                    }
                    else{
                        $result = 0;

                        foreach ($_SESSION['cart'] as $key => $value) {
                            echo '
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="image/product/'.$value['image'].'" alt="" style="height: 100px;">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <a href="shop-details.php?id='.$value['id'].'&brand='.$value['brand'].'"><h6>'.$value['title'].'</h6></a>
                                            <h5>RS. '.$value['price'].'</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity text-center">
                                            '.$value['qty'].'
                                        </div>
                                    </td>
                            ';

                                $cartTotal = (int)$value['price'] * (int)$value['qty'];

                            echo '
                                    <td class="cart__price">RS. '.$cartTotal.'</td>
                                    <td class="cart__close"><a href="editCartProduct.php?id='.$key.'"><i class="fa fa-edit"></i></a></td>
                                    <td class="cart__close"><a href="removeProduct.php?id='.$key.'"><i class="fa fa-close"></i></a></td>
                                </tr>
                            ';

                            $value['stock'] = (int)$value['stock'] - (int)$value['qty'];

                            $result = $result + $cartTotal;
                        }

                        $this->setTotal($result);
                    }
                }
                else {
                    echo '
                        <tr>
                            <center><h1><strong>CART IS EMPTY</strong></h1></center>
                        </tr>
                    ';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot create the cart", "error", {button: false,});</script>';
            }
        }

        
        public function showCheckOutCart()
        {
            try {
                if (isset($_SESSION['cart'])) {
                    $count = 0;
                    
                    if ($this->cartCount() == 0) {
                        echo '
                            <li>CART IS EMPTY</li>
                        ';
                    }
                    else{
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $cartTotal = (int)$value['price'] * (int)$value['qty'];
                            $count = $count + 1;

                            echo '
                                <li>'.$count.'. '.$value['title'].' <span>RS. '.$cartTotal.'</span></li>
                            ';
                        }
                    }
                }
                else {
                    echo '
                        <li>CART IS EMPTY</li>
                    ';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot create the cart", "error", {button: false,});</script>';
            }
        }

        public function confirmOrder($name, $phone, $address, $nearBy, $city, $state, $code, $item, $total, $status)
        {
            try {
                $insertData = new crudOperation();

                if ($insertData->insertCustomerDetail('tbl_customer', $name, $phone, $address, $nearBy, $city, $state, $code) >= 0) {
                    date_default_timezone_set('Asia/Karachi');
                    $date = date("Y-m-d");

                    $selectQuery = $insertData->selectCustomer('tbl_customer', $name, $phone, $address, $nearBy, $city, $state, $code, $date);

                    while ($row = mysqli_fetch_assoc($selectQuery)) {
                        $this->setO_ID($row['id']);
                    }

                    if ($insertData->insertOrder('tbl_order', $this->getO_ID(), $item, $total, $status) >= 0) {
                        date_default_timezone_set('Asia/Karachi');
                        $date = date("Y-m-d");
    
                        $selectQuery = $insertData->selectOrder('tbl_order', $this->getO_ID(), $item, $total, $status, $date);
    
                        while ($row = mysqli_fetch_assoc($selectQuery)) {
                            $this->setO_ID($row['id']);
                        }

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {

                                $value['stock'] = (int)$value['stock'] - (int)$value['qty'];

                                if ($insertData->updateStock('tbl_product', $value['id'], $value['stock']) > 0) {
                                    $total = (int)$value['price'] * (int)$value['qty'];

                                    $insertData->insertOrderDetail('tbl_order_detail', $this->getO_ID(), $value['id'], $value['qty'], $total);
                                }
                            }
                        }

                        unset($_SESSION['cart']);

                        echo '<script>window.location.href="index.php"</script>';
                    }
                }
                else {
                    echo '<script>swal("Sorry", "Something went wrong, Cannnot save the cart data", "error", {button: false,});</script>';
                }

            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot save the cart data", "error", {button: false,});</script>';
            }
        }
    }

?>