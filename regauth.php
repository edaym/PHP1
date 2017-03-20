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
    <form method="POST">
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
            exit('Пароль не соответствует правилу');
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
            $_SESSION['users'][] = $user;
            $_SESSION['login'] = $user;
        }
        if ($_SESSION['login'] = $user) {
            echo "Регистрация прошла успешно!";
        }
    }
}


//АВТОРИЗАЦИЯ

if (empty($_SESSION['login'])) {
    // print_r($_SESSION['users']);
    ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Login"/>
        <input type="password" name="pass" placeholder="Password"/>
        <input type="submit" name="submit" value="Sign in"/>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        if (empty($_POST['name']) || empty($_POST['pass'])) {
            exit('Поле "Имя" или "Пароль" не заполнено');
        }

        foreach ($_SESSION['users'] as $user) {
            if ($_POST['name'] == $user['name']) {
                $_SESSION['login']['name'] = $_POST['name'];
                break;
            }
        }
        /*
        if (isset($login['name'])){
            echo "Вы авторизированы как", $login['name'];
        } else{
            echo "Пользователь не зарегистрирован";
        }
        */
        $log = [
            TRUE => "Пользователь {$_SESSION['login']['name']} найден",
            FALSE => "Пользователь не зарегистрирован",
        ];
        echo $log[isset($_SESSION['login']['name'])];

        echo "<br/>";

        foreach ($_SESSION['users'] as $user) {
            if (password_verify($_POST['pass'], $user['password']) && $_POST['name'] == $user['name']) {
                $_SESSION['login'] = $user;
            }
        }
        /*
        if (empty($login['user'])){
                echo "Неправильный логин или пароль";
        }
        */
        $pass = [
            TRUE => "Вы авторизированы как {$_SESSION['login']['name']}",
            FALSE => "Пароль не подходит этому логину",
        ];
        echo $pass[isset($_SESSION['login']['password'])];
        //print_r($login);
    }
}


//ПОИСК

if (isset($_SESSION['login'])) {
    ?>
    <html>

    <form method="GET">
        <label class="screen-reader-text">Поиск: </label>
        <input type="text" name="searchtext" placeholder="Введите имя для поиска"/>
        <input type="submit" name="searchsubmit" value="Search"/>
    </form>

    </html>

    <?php
    $search = array();
//print_r($_SESSION['users']);
    if (isset($_GET['searchsubmit'])) {
        if (empty($_GET['searchtext'])) {
            exit('Поле не заполнено');
        }
        foreach ($_SESSION['users'] as $user) {
            if ($_GET['searchtext'] == $user['name']) {
                $search = $user;
            }
        }

        if (isset($search)) {
            ?>
            <html>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td><?php echo $search['name']; ?></td>
                    <td><?php echo $search['email']; ?></td>
                </tr>
            </table>
            </html>
            <?php
        }

        $poisk = [
            TRUE => "Пользователь {$search['name']} найден",
            FALSE => "Пользователь не найден",
        ];
        echo $poisk[isset($search)];
    }
}

if (isset($_POST['exit'])) {
    unset($_SESSION['login']);
}

?>


