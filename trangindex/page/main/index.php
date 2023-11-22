<?php 
    $sql_product = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc ORDER BY sanpham.id_sanpham DESC LIMIT 25";
    $query_product = mysqli_query($mysqli, $sql_product);
?>
<h4 style="text-align: center;">Sản phẩm mới nhất</h4>
<ul class="product_list">
    <?php 
        while($row = mysqli_fetch_array($query_product)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product">Tên sản phẩm: <?php echo $row['tensanpham']?></p>
            <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.')?> vnđ</p>
            <p style="text-align: center; color: #d1d1d1;"><?php echo $row['tendanhmuc'] ?></p>
        </a>
    </li>
    <?php 
        }
    ?>
</ul>