<?php
$array=array();
var_dump($array);
array_push($array, 'aa');
array_push($array, 3);
var_dump($array);
//var_dump($array_pop($array));
var_dump($array_shift($array));
var_dump(in_array('AA', $array));
