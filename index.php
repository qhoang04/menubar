<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Multi-level Navbar</title>
</head>
<?php include("function.php") ?>
<script>
  function on_offMenu(event) {
    event.stopPropagation();
    var submenu = event.target.nextElementSibling;
    if (submenu) {
      event.target.classList.toggle('active');
      submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
    }
  }
</script>
<body>
  <div class="navbar" onclick="on_offMenu(event)">
  <p class="dmsp"><i class="listicon"></i>Danh mục sản phẩm</p>
    <?php
      echo buildMenu($conn); 
    ?>
  </div>
</body>
</html>