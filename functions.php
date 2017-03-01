<?php
include 'menu.php';
//сортировка массива меню по возрастанию в поле position
function usortmenu($a, $b) {
    if ($a["position"]== $b["position"]){
        return 0;
    }
    return ($a["position"] < $b["position"]) ? -1 : 1;
};
usort($menu, "usortmenu");
print_r($menu);

//сортировка массива меню по возрастанию с сохранением связи ключ-значение
function uasortmenu($a, $b) {
    if ($a["position"]== $b["position"]){
        return 0;
    }
    return ($a["position"] > $b["position"]) ? 1 : -1;
};
uasort($menu, "uasortmenu");
print_r($menu);






echo "\n";

$show_podmenu=function($m){
    foreach ($m as $array) {
        foreach ($array as $value){
            foreach($value as $key2=>$array2){
                echo $value[$key2]["title"];
            }
        }
    }
};
$show_podmenu($menu);


echo "\n";

function show_podmen($m){
    foreach ($m as $massiv) {
        foreach ($massiv["children"] as $child){
            echo $child["title"];
        }
    }
};

show_podmen($menu);
show_podmen($menu);





function show_me($m){
    echo "<ul class='main-nav'>\n";
    function filt($m)
    {
        return in_array("top", $m["menu_type"]);
    };
    $filt=array_filter($m, "filt");
// функция сортировки
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
show_me($menu);
?>