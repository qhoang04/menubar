<?php
include_once("connection.php");
$query = "SELECT id, label, link, parent FROM menus ORDER BY  sort ASC, label";
$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
$menus = array(
    'items' => array(),
    'parents' => array()
);
while ($items = mysqli_fetch_assoc($result)) {
    $menus['items'][$items['id']] = $items;
    $menus['parents'][$items['parent']][] = $items['id'];

    //echo  $items;
}
function createMenu($parent, $menu)
{
    $html = "";
    if (isset($menu['parents'][$parent])) {
        foreach ($menu['parents'][$parent] as $itemId) {
            if (!isset($menu['parents'][$itemId])) {
                $html .= "<li > 
                         <a  href='" . $menu['items'][$itemId]['link'] . "'>" . $menu['items'][$itemId]['label'] . "</a> 
                     </li>";
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li> 
                  <a href='" . $menu['items'][$itemId]['link'] . "'>" . $menu['items'][$itemId]['label'] .  "</a>";
                $html .= '<ul>';
                $html .= createMenu($itemId, $menu);
                $html .= '</ul>';
                $html .= "</li>";
            }
        }
    }
    return $html;
}
