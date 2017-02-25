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

//сортировка массива меню по возрастаню с сохранением связи ключ-значение
function uasortmenu($a, $b) {
    if ($a["position"]== $b["position"]){
        return 0;
    }
    return ($a["position"] > $b["position"]) ? 1 : -1;
};
uasort($menu, "uasortmenu");
print_r($menu);
