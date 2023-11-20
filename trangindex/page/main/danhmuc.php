<?php 
    $sql_product = "SELECT * FROM danhmuc,sanpham WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc AND sanpham.id_danhmuc = '$_GET[id]' ORDER BY sanpham.id_sanpham DESC";
    $query_product = mysqli_query($mysqli, $sql_product);
    $row_title = mysqli_fetch_array($query_product);
?>

<h4>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h4>
<ul class="product_list">
    <?php 
        while($row_product = mysqli_fetch_array($query_product)) {
    ?>
    <li>
        <a href="">
            <img src="admincp/quanlysp/uploads/<?php echo $row_product['hinhanh']?>">
            <p class="title_product">Tên sản phẩm: <?php echo $row_product['tensanpham']?></p>
            <p class="price_product">Giá: <?php echo number_format($row_product['giasp'])?> vnđ</p>
        </a>
    </li>
    <?php 
        }
    ?>
</ul>