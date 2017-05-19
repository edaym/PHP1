<?php
//include_once 'regauth.php';
session_start();
require_once 'database.php';
//$strSQL = mysqli_query("INSERT INTO users(email, name, password, phone) values('', '', )");


//обработка формы
if (isset($_POST['submitreg'])) {
    $user = array();

    if (empty($_POST['name'])) {
        exit('Поле "Имя" не заполнено');
    } elseif (!preg_match("/\w{2,}/", $_POST['name'])) {
        exit('В имени должно быть больше двух символов' . "<br/><a href=\"/adminpanel/register.php\">Назад</a>" );

    } else {
        $user['name'] = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        exit('Поле "Email\Login" не заполнено');
    } elseif (!preg_match("/(\w[a-zA-Z0-9_\.]+@[a-zA-Z_\.]+[a-zA-Z]{2,8})/", $_POST['email'])) {
        exit('Вы неправильно ввели E-mail'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } else {
        $user['email'] = $_POST['email'];
    }

    if (empty($_POST['pass'])) {
        exit('Одно из полей "Пароль" не заполнено'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } elseif //(!preg_match("/[-a-zA-Z0-9]{8,30}/", $_POST['email']) || ) {
    (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}/i", $_POST['pass'])
    ) {
        exit('Пароль должен содержать строчные и заглавные буквы латинского алфавита, цифры. Не менее 7 символов'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } elseif (empty($_POST['pass_again'])) {
        exit('Введите подтверждение пароля'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } elseif (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}/i", $_POST['pass_again'])) {
        exit('Подтверждение пароля не соответствует правилу'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } elseif ($_POST['pass'] != $_POST['pass_again']) {
        exit('Пароли не совпадают'. "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
    } else {
        $user['password'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    }

    for ($i = 0; $i <= count($_SESSION['users']); $i++) {
        if (isset($_POST['name']) && $_POST['name'] == $_SESSION['users'][$i]['name']) {
            exit ("Имя уже зарегистрировано". "<br/><a href=\"/adminpanel/register.php\">Назад</a>");
            break;
        }
    }

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
        // include_once'sendmail.php';
        print_r($user);
        $_SESSION['activate'] = $user['password'];
        $db->query("INSERT INTO users(email, name, password) values('". $_POST['email'] ."', '". $_POST['name'] ."', '". $_POST['pass'] ."')");
    } else {
        echo "Возникла проблема";
    }

}



//отправка письма
$login=$_POST['name'];
$activation = $_SESSION['activate']; //sha1($_POST['name']);
$to  = $_POST['email']; //"buhugi@gmail.com " ;
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
