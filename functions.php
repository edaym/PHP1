
<?php
include 'menu.php';

//сортировка массива меню по возрастанию в поле position
/*function usortmenu($a, $b) {
    if ($a["position"]== $b["position"]){
        return 0;
    }
    return ($a["position"] < $b["position"]) ? -1 : 1;
};
usort($menu, "usortmenu");
print_r($menu);
*/
#сортировка массива меню по возрастанию с сохранением связи ключ-значение
/* function uasortmenu($a, $b) {
    if ($a["position"]== $b["position"]){
        return 0;
    }
    return ($a["position"] > $b["position"]) ? 1 : -1;
};
uasort($menu, "uasortmenu");
print_r($menu);
*/

function show_menu($menu, $menu_type, $tmpl=['ul', 'li', 'a']){
    list($ul, $li, $a)=$tmpl;
    echo "<$ul class='main-nav'>\n";
    $filt=array_filter($menu, function ($menu_point) use ($menu_type)
    {
        if ($menu_point["active"]==true){
            return in_array($menu_type, $menu_point["menu_type"]);
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
            show_menu ($massiv["children"], $menu_type);
        }
        echo "</$ul>\n";
    }
    echo "</$ul>";
};

?>