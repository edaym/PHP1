<?php ## Анонимная функция.
  $myecho = function (...$str)
  {  
    foreach ($str as $v) {
      echo "$v<br />\n"; // выводим элемент
    }
  };
  var_dump($myecho);
  // Вызов функции
  $myecho("Меркурий", "Венера", "Земля", "Марс");
?>