<?php
session_start();
/*
if(!empty($_GET['code']) && isset($_GET['code'])){
    echo $_GET['code'];
}
 */
if ($_SESSION['activate']== $_GET['code']) {
    echo "Аккаунт активирован" ;
    echo ("Перейти в панель ". "<a href=\"/php/adminpanel/admin.php\">администратора</a><br/>");
}

/*
if  ($_GET['code']== $activation){
    $_SESSION['users'][] = $user;
    $_SESSION['login'] = $user;
    echo "Регистрация прошла успешно!";
}
else
{
    echo "Что то пошло не так";
}

*/

//header( "Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );