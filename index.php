<?php
include 'menu.php';
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
$show_men=function($m) use ($menu){
//function show_men($m, $type){
    echo "<ul>";
    function filt($menu)
    {
        return in_array("top", $menu["menu_type"]);
    }; //функция замыкания closure.php
    $filt=array_filter($m, "filt");
//функция usort ksort
    foreach ($filt as $massiv) {
// if ($massiv["menu_type"]==$type) {
        echo '<li><a href="' . $massiv["link"] . '", class="title">' . $massiv["title"] . '</a></li>' . "\n";
// }
    }
    echo "</ul>";
};
//show_men($menu, "top");
$show_men($menu);

/*
function show_men($m) use ($menu){
     echo "<ul>";
      function filter($menu)
       {
         return in_array("top", $menu["menu_type"]);
       }
       $filt=array_filter($m, "filter");
       print_r($filt);
    foreach ($filt as $massiv) {
        echo '<li><a href="' . $massiv["link"] . '", class="title">' . $massiv["title"] . '</a></li>' . "\n";
    }
     echo "</ul>";
};
show_men($menu);
*/
?>





