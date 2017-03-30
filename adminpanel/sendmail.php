<?php
//include_once 'regauth.php';
session_start();

$login=$_POST['name'];
$activation = $_SESSION['activate']; //sha1($_POST['name']);
$to  = "buhugi@gmail.com " ;
$subject = "Подтверждение регистрации";

/*$message = '
<html> 
    <head> 
        <title>Тебе пришло письмо!</title> 
    </head> 
    <body> 
        <p>ответчать не надо!</p>
    </body> 
</html>'; */

$message = "Здравствуйте! Спасибо за регистрацию на eday.in.ua\nВаш логин: ".$login."\n Перейдите по ссылке,
     чтобы активировать ваш аккаунт:\nhttp://eday.eday.in.ua/adminpanel/verification.php?login=".$login."&code=".$activation."\nС уважением,\n Администрация 
     eday.in.ua";
$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
$headers .= "From: Birthday Reminder <info@eday.in.ua>\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации.";
} else {
    echo "Произошла ошибка почтовой функции";
}

?>
