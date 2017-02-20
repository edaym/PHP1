<?php


include 'menu.php';
function show_menu($m, $type){

    foreach ($m as $massiv) {

        if ($massiv["menu_type"]==[$type]) {
            echo '<a href="' . $massiv["link"] . '", class="title">' . $massiv["title"] . '</a>' . "\n";
        }
    }
}
show_menu($menu, "top");
show_menu($menu, "left");
show_menu($menu, "bottom");

function filter_type($menu) {
        return in_array ("top", $menu["menu_type"]);
};
$filt=array_filter($menu, "filter_type");
print_r($filt);

?>





