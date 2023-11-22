<?php 
    $sql_product = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_product = mysqli_query($mysqli, $sql_product);
    
    //get ten danh muc
    $sql_category = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_category = mysqli_query($mysqli, $sql_category);
    $row_title = mysqli_fetch_array($query_category);
?>

<h4>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h4>
<ul class="product_list">
    <?php 
        while($row_product = mysqli_fetch_array($query_product)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham']?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_product['hinhanh']?>">
            <p class="title_product">Tên sản phẩm: <?php echo $row_product['tensanpham']?></p>
            <p class="price_product">Giá: <?php echo number_format($row_product['giasp'],0,',','.')?> vnđ</p>
        </a>
    </li>
    <?php 
        }
    ?>
</ul>