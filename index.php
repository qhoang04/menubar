<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Multi-level Navbar</title>
</head>
<?php include("function.php") ?>
<body>
  <div class="navbar" onclick="on_offMenu(event)">
    <?php
      echo buildMenu($conn); 
    ?>
  </div>
</body>
<script>
  function on_offMenu(event) {
    event.stopPropagation();
    var submenu = event.target.nextElementSibling;
    if (submenu) {
      event.target.classList.toggle('active');
      if (submenu.style.display === 'block') {
        submenu.style.display = 'none';
      } else {
        submenu.style.display = 'block';
      }
    }
  }
</script>
</html>