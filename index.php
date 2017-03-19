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

function numbers($array){
    foreach ($array as $k => $v) {
        echo "$ array $k => $v.\n";
        numbers($array[$k+1]);
    }
}
echo numbers($menu);



/*
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
        foreach ($massiv["children"] as $arr=>$child) {
            echo '<li class="item">', "\n", '<a href="' . $child["link"] . '"class="title">' . $child["title"].'</a>',"\n",'</li>' . "\n";
            //show_menu($massiv["children"]);
            //show_menu($massiv[$arr+1][$child]);
        }
        echo "</ul>\n";
       //show_menu($filt[$massiv]["children"]);
    }
    echo "</ul>";
};
show_menu($menu);

*/



/*
function filt($m)
{
    return in_array("top", $m["menu_type"]);
};
*/



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

?>




