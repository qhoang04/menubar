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
          if ($menuItem['more'] === "1") {
            $menuHTML .= '<li><a href="'. $menuItem['link']. '">'. $menuItem['menu_name']. '   <i class="fa-solid fa-angle-right"></i> </a>';
          }
          else {
            $menuHTML .= '<li><a href="'. $menuItem['link']. '">'. $menuItem['menu_name']. '</a>';
          }
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