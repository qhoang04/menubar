<h4>Chi tiết sản phẩm</h4>
<?php 
    $sql_chitiet = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc AND sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) {

?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sp">
        <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
    </div>
    <form method="POST" action="#"> 
        <div class="chitiet_sp">
            <h3 style="margin: 0;">Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p>Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.') ?> vnd</p>
            <p>Số lượng sản phẩm: <?php echo ($row_chitiet['giasp']) ?></p>
            <p>Danh mục sản phẩm: <?php echo $row_chitiet["tendanhmuc"]?></p>
            <p><input type="submit" class="themgiohang_btn" value="Thêm giỏ hàng"></p>
        </div>
    </form>
</div>
<?php 
    }
?>