<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Multi-level Navbar</title>
</head>
<?php 
  include("connectdb.php");

  function buildMenu($conn, $level = NULL) {
    $sql = "select * from menu_items";
    $result = $conn -> query($sql);
    $menuHTML = "<ul>";

    if ($result -> num_rows > 0) {
      $menuItems = $result -> fetch_all(MYSQLI_ASSOC);
      foreach ($menuItems as $menuItem) {
        if ($menuItem['level'] == $level) {
          $menuHTML .= '<li><a href="'. $menuItem['link']. '">'. $menuItem['menu_name']. '</a>';

          $submenu = buildMenu($conn, $menuItem['id']);
          if (!empty($submenu)) {
            $menuHTML .= '<div class="submenu">'. $submenu. '</div>';
          }
          $menuHTML .= '</li>';
        }
      }
    }
    $menuHTML .= "</ul>";
    return $menuHTML;
  }
?>
<body>
  <div class="navbar">
    <?php
      echo buildMenu($conn); 
    ?>
  </div>
</body>
</html>
