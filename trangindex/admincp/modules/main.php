<div class="clear">

</div>
<div class="main">
    <?php 
        if (isset($_GET['action']) && $_GET['query']) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }
        else {
            $tam = '';
            $query = '';
        }
        if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
            include('modules/quanlydanhmucsp/them.php');
            include('modules/quanlydanhmucsp/lietke.php');
        }
        else if ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
            include('modules/quanlydanhmucsp/sua.php');
        }
        else if ($tam == 'quanlysp' && $query == 'them') {
            include('modules/quanlysp/them.php');
            include('modules/quanlysp/lietke.php');
        }
        else if ($tam == 'quanlysp' && $query == 'sua') {
            include('modules/quanlysp/sua.php');
        }
        else {
            include('modules/dashboard.php');
        }
    ?>
</div>