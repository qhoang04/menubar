<?php 
    session_start();
    include('../../admincp/connect/connect.php');
    //thêm số lượng
    //giảm số lượng

    //thêm sản phẩm vào giohang
    if (isset($_POST['themgiohang'])) {
        // session_destroy();
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        if ($row) {
            $new_product=array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']));

            //check Session gio hang ton tai
            if (isset($_SESSION['cart'])) {
                $found = false;
                foreach($_SESSION['cart'] as $cart_item) {
                    //Neu trung sanpham
                    if($cart_item['id'] == $id) {
                        $product[]=array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong+1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                        $found = true;
                    }
                    else {
                        //Neu khac san pham
                        $product[]=array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                    }
                }
                if ($found == false) {
                    $_SESSION['cart'] = array_merge($product, $new_product);
                }
                else {
                    $_SESSION['cart'] = $product;
                }
            }
            else {
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //xóa sản phẩm

?>