<?php


include 'menu.php';
function show_menu($m){

    foreach ($m as $point=>$massiv) {
        echo $massiv["title"],"\t";
    }
}
show_menu($menu);
?>

add function show_menu
