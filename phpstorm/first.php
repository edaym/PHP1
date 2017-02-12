<html>
<head>
    <title> Тестирование страницы PHP </title>
</head>
<body>
<?php
echo '<p align="center" ><strong> Cтраница № 1 </strong></p>';
echo $_SERVER["HTTP_USER_AGENT"]; echo '<br/>';
echo $_SERVER["REQUEST_URI"];echo '<br/>';
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == TRUE) {
    echo 'Вы используете браузер Google Chrome/56.0.2924.87.<br />';
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') == TRUE){
    echo 'Вы используете браузер Safari/537.36<br />';
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla') == TRUE){
    echo 'Вы используете браузер Mozilla/5.0 (Windows NT 6.3; Win64; x64)<br />';
}
else {
    echo 'Ваш браузер не определен.';
}
echo '<br/>';
?>
<p> Портрет личности </p>
<form action="action.php" method="POST">
    <p>Ваше имя: <input type="text" name="name" /></p>
    <p>Ваш возраст: <input type="text" name="age" /></p>
    <p>Любимая музыка:
        <input name="music" type="checkbox" value="Rock" > Rock
        <input name="music" type="checkbox" value="Pop"> Pop
        <input name="music" type="checkbox" value="Rap"> Rap
        <input name="music" type="checkbox" value="Hard Metal">Hard Metal </p>

    <p> Ваш темпрамент:
        <input name="temp" type="radio" value="Сангвиник"> Сангвиник
        <input name="temp" type="radio" value="Меланхолик"> Меланхолик
        <input name="temp " type="radio" value="Холерик"> Холерик
        <input name="temp " type="radio" value="Флегматик"> Флегматик</p>

    <p><input type="submit" /></p>
</form>

<?php phpinfo(); ?>
</body>

</html>
