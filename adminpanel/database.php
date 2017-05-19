<?php


$db=mysqli_connect('localhost', 'bwwazfts', 'w3Tc2Vq0w7', 'bwwazfts_test');

if (mysqli_connect_errno()) {
    echo "Ошибка в подключении к БД (" . mysqli_connect_errno() . "): " . mysqli_connect_error();
    exit();
}