<?php 
    include("../../connect/connect.php");
    $tensanpham = $_POST["tendanhmuc"];
    $masp = $_POST["masp"];
    $giasp = $_POST["giasp"];
    $soluong = $_POST["soluong"];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST["tomtat"];
    $noidung = $_POST["noidung"];
    $tinhtrang = $_POST["tinhtrang"];

    


    if (isset($_POST["themsanpham"])) {
        $sql_them = "INSERT INTO sanpham (tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang ) VALUE ('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header("Location:../../index.php?action=quanlysanpham&query=them");
    }
    else if (isset($_POST["suasanpham"])) {
        $sql_update = "UPDATE danhmuc SET tendanhmuc = '".$tenloaisp."', thutu = '".$thutu."' WHERE id_danhmuc= '$_GET[iddanhmuc]'";
        mysqli_query($mysqli, $sql_update);
        header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
    }
    else {
        $id = $_GET['iddanhmuc'];
        $sql_xoa =  "DELETE FROM danhmuc WHERE id_danhmuc ='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
    }
?>