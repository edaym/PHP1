<?php

/*
function show_menu($m, $type){
echo "<ul>";
foreach ($m as $massiv) {

if ($massiv["menu_type"]==[$type]) {
echo '<li><a href="' . $massiv["link"] . '", class="title">' . $massiv["title"] . '</a></li>' . "\n";
}
}
echo "</ul>";
}

show_menu($menu, "top");
show_menu($menu, "left");
show_menu($menu, "bottom");
*/
/*
function filter_type($menu) {
return in_array ("top", $menu["menu_type"]);
};
$filt=array_filter($menu, "filter_type");
//print_r($filt);
*/

include 'menu.php';

function show_menu($m){
    echo "<ul class='main-nav'>\n";
    function filt($m)
    {
        return in_array("top", $m["menu_type"]);
    };
    $filt=array_filter($m, "filt");

    foreach ($filt as $massiv) {
        echo '<li class="item">', "\n", '<a href="' . $massiv["link"] . '"class="title">' . $massiv["title"] . '</a>',"\n",'</li>' . "\n";
        echo "<ul class='sub-menu'>\n";
        foreach ($massiv["children"] as $child) {
            echo '<li class="item">', "\n", '<a href="' . $child["link"] . '"class="title">' . $child["title"].'</a>',"\n",'</li>' . "\n";
        }
        echo "</ul>\n";
    }
    echo "</ul>";
};
show_menu($menu);



?>




