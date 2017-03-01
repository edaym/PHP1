<?php

//$menu=["title"=>"Главная","link"=>"Главная","active"=>"true","menu_type"=>"top","position"=>"top"];
//echo $menu ["title"];

//$menu=[
 //   "point1"=>["title"=>"Главная","link"=>"Главная","active"=>"true","menu_type"=>"top","position"=>"top"],
 //   "point2"=>["title"=>"О нас","link"=>"http://vk.com","active"=>"true","menu_type"=>"top","position"=>"top"],
//];
//echo $menu ["point1"]["title"];


/** @var  $menu */
$menu = array(
    array("title" => "Главная", "link" => "http://vk.com", "year" => 1954),
    array("title" => "О нас", "link" => "http://vk.com", "year" => 1987),
    array("title" => "Новости", "link" => "http://vk.com", "year" => 1973)
);

echo $menu[0]["title"], $menu[1]["title"]. "<br />"; 
echo $menu[1]["title"] . "<br />";
echo $menu[2]["title"] . "<br />";
**/

$menu = array(
    $point1=array("title" => "Главная", "link" => "http://vk.com", "active" => "true", "menu_type" => "top", "position" => "1"),
    $point2=array("title" => "О нас", "link" => "http://vk.com", "active" => "true",  "menu_type" => "top", "position" => "0"),
    $point3=array("title" => "Новости", "link" => "http://vk.com", "active" => "true", "menu_type" => "top", "position" => "3")
);
/**
for ($i=0; $i<count($menu); $i++)
    for ($j=0; $j<count($point1); $j++)
    echo "$menu[$i][$j]". "<br />";
**/
for ($i=0; $i<count($menu); $i++)
    echo"{$menu[$i]['title']} link: {$menu[$i]['link']}<br />";


//вывод значения по ключу title
//echo $menu["point1"]["title"],"<br />";

/**
! вывод всех значений по ключу title
foreach ($menu as $point=>$massiv) {
echo $massiv["title"],"\t";
}
 */

/**

function show_meny($m){
foreach ($m as $point=>$massiv){
foreach ($massiv["title"] as $key => $value) {
echo $massiv, $value, "<br />\n";
}
}
}
show_meny($menu);
 */

/**
вывод всех массивов и ключей подмассивов
foreach ($menu as $point=>$massiv){
foreach ($massiv as $key=> $value){
echo "[$point][$key] = $value<br />\n";
}
}
 * */


//echo '<a href="'.$item['point1']['link'].'>'.$item['point1']['title'].'</a>';
/**
function showMenu($items)
{
echo '<ul>';
foreach($items AS $item)
{
echo_menu_item($item);
}
echo '</ul>';
}
 */

/**
for ($i=0; $i<count($menu); $i++)
for ($j=0; $j<count($point1); $j++)
echo"{$menu[$i][$j]['title']} link: {$menu[$i]['link']}<br />";
 **/

/**
function show_menu()
{
for ($i=0; $i<count($menu); $i++) {
echo "{$menu[$i]['title']} link: {$menu[$i]['link']}<br />";
}
};
echo show_menu();

 **/

echo "Вложенный массив, который содержится в первом элементе:<br />";
print_r( $menu[0] );
?>

