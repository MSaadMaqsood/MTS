<?php 

    require_once 'database/crudOperation.php';

    class WebProduct{
        public function showProduct(){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->selectProduct('tbl_product', 'id');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $discount = ($row['salePrice'] * $row['discount'])/100;
                    $discount = $row['salePrice'] - $discount;

                    if ($row['id'] != 1) {
                        if ($row['stock'] > 0) {
                            echo '
                                <form method="post" class="col-lg-3 col-md-6 col-sm-6">
                                    <input name="id" value="'.$row['id'].'" hidden>
                                    <input name="image" value="'.$row['image'].'" hidden>
                                    <input name="title" value="'.$row['title'].'" hidden>
                                    <input name="brand" value="'.$row['brand'].'" hidden>
                                    <input name="salePrice"'; if ($row['discount'] > 0) {
                                        echo 'value="'.$discount.'"';
                                    } else{
                                        echo 'value="'.$row['salePrice'].'"';
                                    }
                                    echo 'hidden>
                                    <input name="stock" value="'.$row['stock'].'" hidden>
                                    <input name="qty" value="1" hidden>
                                    <div class="product__item">
                                        <a href="shop-details.php?id='.$row['id'].'&brand='.$row['brand'].'">
                                        <div class="product__item__pic set-bg" data-setbg="image/product/'.$row['image'].'">';
                                            if ($row['discount'] > 0) {
                                                echo '<span class="label">Discount</span>';
                                            }
                            echo '      </div>
                                        <div class="product__item__text">
                                            <h6>'.$row['title'].'</h6>
                                            <a class="add-cart"><button type="submit" class="btn btn-danger" name="addToCart"> + Add To Cart </button></a>
                                            <div class="rating">';
                                            if ($row['rating'] == 0) {
                                                echo '
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 1) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 2) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 3) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 4) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 5) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }
                            echo '          </div>';
                                            if ($row['discount'] > 0) {
                                                echo '<del>Rs. '.$row['salePrice'].'</del>';
                                                echo '<h5>Rs. '.$discount.'</h5>';
                                            } else {
                                                echo '<h5>Rs. '.$row['salePrice'].'</h5>';
                                            }    
                            echo '      </div>
                                        </a>
                                    </div>
                                </form>
                            ';
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot show products!!!", "error", {button: false,});</script>';
            }
        }

        public function showRelatedProduct($id, $brand){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->select4Product('tbl_product', $brand);

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $discount = ($row['salePrice'] * $row['discount'])/100;
                    $discount = $row['salePrice'] - $discount;

                    if ($row['id'] != 1) {
                        if ($row['stock'] > 0) {
                            if ($row['id'] != $id) {
                            echo '
                                <form method="post" class="col-lg-3 col-md-6 col-sm-6">
                                    <input name="id" value="'.$row['id'].'" hidden>
                                    <input name="image" value="'.$row['image'].'" hidden>
                                    <input name="title" value="'.$row['title'].'" hidden>
                                    <input name="brand" value="'.$row['brand'].'" hidden>
                                    <input name="salePrice"'; if ($row['discount'] > 0) {
                                        echo 'value="'.$discount.'"';
                                    } else{
                                        echo 'value="'.$row['salePrice'].'"';
                                    }
                                    echo 'hidden>
                                    <input name="stock" value="'.$row['stock'].'" hidden>
                                    <input name="qty" value="1" hidden>
                                    <div class="product__item">
                                        <a href="shop-details.php?id='.$row['id'].'&brand='.$row['brand'].'">
                                        <div class="product__item__pic set-bg" data-setbg="image/product/'.$row['image'].'">';
                                            if ($row['discount'] > 0) {
                                                echo '<span class="label">Discount</span>';
                                            }
                            echo '      </div>
                                        <div class="product__item__text">
                                            <h6>'.$row['title'].'</h6>
                                            <a class="add-cart"><button type="submit" class="btn btn-danger" name="addToCart"> + Add To Cart </button></a>
                                            <div class="rating">';
                                            if ($row['rating'] == 0) {
                                                echo '
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 1) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 2) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 3) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 4) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                ';
                                            } elseif ($row['rating'] == 5) {
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }
                            echo '          </div>';
                                            if ($row['discount'] > 0) {
                                                echo '<del>Rs. '.$row['salePrice'].'</del>';
                                                echo '<h5>Rs. '.$discount.'</h5>';
                                            } else {
                                                echo '<h5>Rs. '.$row['salePrice'].'</h5>';
                                            }    
                            echo '      </div>
                                        </a>
                                    </div>
                                </form>
                            ';
                            }
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot show products!!!", "error", {button: false,});</script>';
            }
        }

        public function showProductCategory($id){  
            $selectData = new crudOperation();

            $selectQuery = $selectData->selectProduct('tbl_product', 'id');
                        
            while ($row = mysqli_fetch_assoc($selectQuery)) {
                $discount = ($row['salePrice'] * $row['discount'])/100;
                $discount = $row['salePrice'] - $discount;

                if ($row['id'] != 1) {
                    if ($row['stock'] > 0) {
                        if ($row['c_id'] == $id) {
                        echo '
                            <form method="post" class="col-lg-3 col-md-6 col-sm-6">
                                <input name="id" value="'.$row['id'].'" hidden>
                                <input name="image" value="'.$row['image'].'" hidden>
                                <input name="title" value="'.$row['title'].'" hidden>
                                <input name="brand" value="'.$row['brand'].'" hidden>
                                <input name="salePrice"'; if ($row['discount'] > 0) {
                                    echo 'value="'.$discount.'"';
                                } else{
                                    echo 'value="'.$row['salePrice'].'"';
                                }
                                echo 'hidden>
                                <input name="stock" value="'.$row['stock'].'" hidden>
                                <input name="qty" value="1" hidden>
                                <div class="product__item">
                                    <a href="shop-details.php?id='.$row['id'].'&brand='.$row['brand'].'">
                                    <div class="product__item__pic set-bg" data-setbg="image/product/'.$row['image'].'">';
                                        if ($row['discount'] > 0) {
                                            echo '<span class="label">Discount</span>';
                                        }
                        echo '      </div>
                                    <div class="product__item__text">
                                        <h6>'.$row['title'].'</h6>
                                        <a class="add-cart"><button type="submit" class="btn btn-danger" name="addToCart"> + Add To Cart </button></a>
                                        <div class="rating">';
                                        if ($row['rating'] == 0) {
                                            echo '
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            ';
                                        } elseif ($row['rating'] == 1) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            ';
                                        } elseif ($row['rating'] == 2) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            ';
                                        } elseif ($row['rating'] == 3) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            ';
                                        } elseif ($row['rating'] == 4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            ';
                                        } elseif ($row['rating'] == 5) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            ';
                                        }
                        echo '          </div>';
                                        if ($row['discount'] > 0) {
                                            echo '<del>Rs. '.$row['salePrice'].'</del>';
                                            echo '<h5>Rs. '.$discount.'</h5>';
                                        } else {
                                            echo '<h5>Rs. '.$row['salePrice'].'</h5>';
                                        }    
                        echo '      </div>
                                    </a>
                                </div>
                            </form>
                        ';
                        }
                    }
                }
            }
        }

        public function show12Product(){
            try {
                $selectData = new crudOperation();

                $selectQuery = $selectData->select12Product('tbl_product');

                while ($row = mysqli_fetch_assoc($selectQuery)) {
                    $discount = ($row['salePrice'] * $row['discount'])/100;
                    $discount = $row['salePrice'] - $discount;

                    if ($row['id'] != 1) {
                        if ($row['stock'] > 0) {
                            if ($row['newArrival'] == 'Yes') {
                                echo '
                                <form method="post" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                                    <input name="id" value="'.$row['id'].'" hidden>
                                    <input name="image" value="'.$row['image'].'" hidden>
                                    <input name="title" value="'.$row['title'].'" hidden>
                                    <input name="brand" value="'.$row['brand'].'" hidden>
                                    <input name="salePrice"'; if ($row['discount'] > 0) {
                                        echo 'value="'.$discount.'"';
                                    } else{
                                        echo 'value="'.$row['salePrice'].'"';
                                    }
                                    echo 'hidden>
                                    <input name="stock" value="'.$row['stock'].'" hidden>
                                    <input name="qty" value="1" hidden>
                                    <div class="product__item">
                                        <a href="shop-details.php?id='.$row['id'].'&brand='.$row['brand'].'">
                                        <div class="product__item__pic set-bg" data-setbg="image/product/'.$row['image'].'">';
                                            if ($row['discount'] > 0) {
                                                echo '<span class="label">Discount</span>';
                                            }
                                echo '  </div>
                                        <div class="product__item__text">
                                            <h6>'.$row['title'].'</h6>
                                            <a class="add-cart"><button type="submit" class="btn btn-danger" name="addToCart"> + Add To Cart </button></a>
                                            <div class="rating">';
                                                if ($row['rating'] == 0) {
                                                    echo '
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 1) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 2) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 3) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 4) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 5) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    ';
                                                }
                                echo '      </div>';
                                            if ($row['discount'] > 0) {
                                                echo '<del>Rs. '.$row['salePrice'].'</del>';
                                                echo '<h5>Rs. '.$discount.'</h5>';
                                            } else {
                                                echo '<h5>Rs. '.$row['salePrice'].'</h5>';
                                            }
                                echo '  </div>
                                        </a>
                                    </div>
                                </form>
                                ';
                            }
                            if ($row['hotSale'] == 'Yes') {
                                echo '
                                <form method="post" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                                    <input name="id" value="'.$row['id'].'" hidden>
                                    <input name="image" value="'.$row['image'].'" hidden>
                                    <input name="title" value="'.$row['title'].'" hidden>
                                    <input name="brand" value="'.$row['brand'].'" hidden>
                                    <input name="salePrice"'; if ($row['discount'] > 0) {
                                        echo 'value="'.$discount.'"';
                                    } else{
                                        echo 'value="'.$row['salePrice'].'"';
                                    }
                                    echo 'hidden>
                                    <input name="stock" value="'.$row['stock'].'" hidden>
                                    <input name="qty" value="1" hidden>
                                    <div class="product__item">
                                        <a href="shop-details.php?id='.$row['id'].'&brand='.$row['brand'].'">
                                        <div class="product__item__pic set-bg" data-setbg="image/product/'.$row['image'].'">';
                                            if ($row['discount'] > 0) {
                                                echo '<span class="label">Discount</span>';
                                            }
                                echo '  </div>
                                        <div class="product__item__text">
                                            <h6>'.$row['title'].'</h6>
                                            <a class="add-cart"><button type="submit" class="btn btn-danger" name="addToCart"> + Add To Cart </button></a>
                                            <div class="rating">';
                                                if ($row['rating'] == 0) {
                                                    echo '
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 1) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 2) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 3) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 4) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    ';
                                                } elseif ($row['rating'] == 5) {
                                                    echo '
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    ';
                                                }
                                echo '      </div>';
                                            if ($row['discount'] > 0) {
                                                echo '<del>Rs. '.$row['salePrice'].'</del>';
                                                echo '<h5>Rs. '.$discount.'</h5>';
                                            } else {
                                                echo '<h5>Rs. '.$row['salePrice'].'</h5>';
                                            }
                                echo '  </div>
                                        </a>
                                    </div>
                                </form>
                                ';
                            }
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo '<script>swal("Sorry", "Something went wrong, Cannnot show products!!!", "error", {button: false,});</script>';
            }
        }
    }
?>