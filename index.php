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



echo "\n";

function factorial($num)
{
    if ($num < 0)
    {
        return 0;
    }
    if ($num == 0)
    {
        return 1;
    }
    return $num*factorial ($num-1);
}
echo factorial(3); // выведет 6

echo "\n";

function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}
echo recursion(4);




include 'menu.php';

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);
function numbers($array){
    foreach ($array as $k => $v) {
        echo "$ array $k => $v.\n";
        numbers($array[$k+1]);
    }
}
echo numbers($menu);




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






?>




