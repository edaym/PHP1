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

include_once 'menu.php';
include_once 'functions.php';


/*
function filt($m)
{
    return in_array("top", $m["menu_type"]);
};
*/


#вывод меню, под меню, с сортировкой и active=true
/*
function show_menu($menu, $tmpl=['ul', 'li', 'a']){
    list($ul, $li, $a)=$tmpl;
    echo '<div align="center">', "<$ul class='main-nav'>\n";
    $filt=array_filter($menu, function ($menu_point)
    {
        if ($menu_point["active"]==true){
            return in_array("top", $menu_point["menu_type"]);
        }
    }
    );

    uasort($filt, function ($a, $b)
    {   if ($a["position"] == $b["position"]) {
        return 0;
    }
        return ($a["position"]>$b["position"]) ? 1 : -1;
    }
    );

    foreach ($filt as $massiv) {
        echo "<$li class='item'>", "\n", "<$a href='" . $massiv["link"] . "'class='title'>" . $massiv["title"] . '</$a>',"\n",'</$li>' . "\n";
        echo "<$ul class='sub-menu'>\n";
        if (isset($massiv["children"])){
            show_menu ($massiv["children"]);
        }
        echo "</$ul>\n";
    }
    echo "</$ul>";
};

//array_filter($menu, "filt");
show_menu($menu);
*/
?>

<html>
<link rel="stylesheet" href="style.css">
<div class="topmenu">
    <?php show_menu($menu, "top"); ?>
</div>

<div class="leftmenu">
    <?php show_menu($menu, "left"); ?>
</div>

<div class="bottommenu">
    <?php show_menu($menu, "bottom"); ?>
</div>
</html>



