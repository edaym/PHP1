<html>
<body>

<form method="POST">
    <input type="submit" name="exit" value="Выйти"/>
    <input type="submit" name="registration" value="Регистрация"/>
</form>

<?php echo '<p align="center" ><strong> Регистрация, авторизация и поиск по пользователям </strong></p>';
session_start();
$_SESSION['login'];
$_SESSION['users'];
$login=array();
if (empty ($_SESSION['login'])) {

?>
<form action="sendmail.php" method="POST">
    <input type="text" name="name" placeholder="Name"/>
    <input type="text" name="email" placeholder="Email\Login"/>
    <input type="password" name="pass" placeholder="Password"/>
    <input type="password" name="pass_again" placeholder="Password again"/>
    <input type="submit" name="submitreg" value="Registration"/>
</form>
<?php
if (isset($_POST['submitreg'])) {
    $user = array();

    if (empty($_POST['name'])) {
        exit('Поле "Имя" не заполнено');
    } elseif (!preg_match("/\w{2,}/", $_POST['name'])){
        exit('В имени должно быть больше двух символов');
    } else {
        $user['name'] = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        exit('Поле "Email\Login" не заполнено');
    } elseif (!preg_match("/(\w[a-zA-Z0-9_\.]+@[a-zA-Z_\.]+[a-zA-Z]{2,8})/", $_POST['email']))  {
        exit('Вы неправильно ввели E-mail');
    } else {
        $user['email'] = $_POST['email'];
    }

    if (empty($_POST['pass'])) {
        exit('Одно из полей "Пароль" не заполнено');
    }elseif //(!preg_match("/[-a-zA-Z0-9]{8,30}/", $_POST['email']) || ) {
    (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}/i", $_POST['pass'])){
        exit('Пароль должен содержать строчные и заглавные буквы латинского алфавита, цифры. Не менее 7 символов');
    }
    elseif (empty($_POST['pass_again'])) {
        exit('Введите подтверждение пароля');
    } elseif (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}/i", $_POST['pass_again'])){
        exit('Подтверждение пароля не соответствует правилу');
    }
    elseif ($_POST['pass'] != $_POST['pass_again']) {
        exit('Пароли не совпадают');
    } else {
        $user['password'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    }

    for ($i = 0; $i <= count($_SESSION['users']); $i++) {
        if (isset($_POST['name']) && $_POST['name'] == $_SESSION['users'][$i]['name']) {
            exit ("Имя уже зарегистрировано");
            break;
        }
    }

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])) {
       // include_once'sendmail.php';
       print_r($user);
        $_SESSION['activate']=$user['password'];
    } else{
        echo "Возникла проблема";
    }




/*
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['activate'])) {
        $_SESSION['users'][] = $user;
        $_SESSION['login'] = $user;
    }
    if ($_SESSION['login'] = $user) {
        echo "Регистрация прошла успешно!";
    }else{
        exit;
    }
    header( "Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); */
}
}