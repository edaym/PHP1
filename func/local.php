<?php ## Локальные переменные.
  function silly()
  { 
    $i = mt_rand();    // записывает в $i случайное число
    echo "$i<br />";  // выводит его на экран
    // Эта $i не имеет к глобальной $i никакого отношения!
  }
  // Выводит в цикле 10 случайных чисел.
  for ($i = 0; $i != 10; $i++) silly();
  echo PHP_OS;
  __
?>