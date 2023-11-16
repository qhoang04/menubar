<?php 
    $sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmuc_sp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<h3>Liệt kê danh mục sản phẩm</h3>
<table style="width: 100%; border-collapse: collapse;" border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmuc_sp)) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc']?></td>
        <td>
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
        </td>
    </tr>
    <?php }
    ?>
</table>