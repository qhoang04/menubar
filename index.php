<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* CSS cho menu và submenu */
    .navbar {
      font-family: Arial, sans-serif;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      display: inline-block;
      position: relative;
      margin-right: 10px;
    }

    a {
      text-decoration: none;
      color: black;
      padding: 10px;
      display: block;
    }

    a:hover {
      background-color: #f0f0f0;
    }

    /* Thêm kiểu dáng cho submenu */
    <?php
      for ($i = 1; $i <= 10; $i++) {
        echo ".submenu$i {
          background-color: #f9f9f9;
          border: 1px solid #ccc;
          padding: 10px;
          position: absolute;
          display: none;
          top: 0;
          left: -150%; /* Hiển thị bên trái */
        }";

        echo "li:hover .submenu$i {
          display: block;
        }";
      }
    ?>
  </style>
  <title>Multi-level Navbar</title>
</head>

<?php 
  include("connectdb.php");

  function buildMenu($conn, $level = NULL, $depth = 1) {
    $sql = "SELECT * FROM menu_items";
    $result = $conn->query($sql);
    $menuHTML = "<ul>";

    if ($result->num_rows > 0) {
      $menuItems = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($menuItems as $menuItem) {
        if ($menuItem['level'] == $level) {
          $submenuClass = "submenu" . $depth; // Tên class submenu với số tầng
          $menuHTML .= '<li><a href="' . $menuItem['link'] . '">' . $menuItem['menu_name'] . '</a>';
          $submenu = buildMenu($conn, $menuItem['id'], $depth + 1);
          if (!empty($submenu)) {
            $menuHTML .= '<div class="' . $submenuClass . '">' . $submenu . '</div>';
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
