<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (($_POST['password'] != $_POST['password_confirmation'])){
    $_SESSION['error']['password_confirmation'] = "Пароли не совпадают";

        header("location: register.php");
}
elseif (($_POST['password'] != $_POST['password_confirmation'])){
     $_SESSION['error']['password_confirmation'] = "Пароли не совпадают";

        header("location: register.php");
}

elseif(empty($_POST['name']) && empty($_POST['email']) &&  empty($_POST['password'])){
    $_SESSION['error']['name'] = "Заполните поле";
    $_SESSION['error']['email'] = "Заполните поле";
    $_SESSION['error']['password'] = "Заполните поле";

        header("location: register.php");
}
elseif (empty($_POST['name'])){
    $_SESSION['error']['name'] = "Заполните поле";

             header("location: register.php");
}

elseif (empty($_POST['email'])){
    $_SESSION['error']['email'] = "Заполните поле";

            header("location: register.php");
}

elseif (empty($_POST['password'])){
    $_SESSION['error']['password'] = "Заполните поле";

            header("location: register.php");
}
else{
    require_once 'database.php';

    $Name = $_POST['name'];
    $mail = $_POST['email'];
    $Password = $_POST['password'];
    $password_2 = $_POST['password_confirmation'];

//подготовка и выполнение запроса
    $sql ='INSERT INTO register (Name, Mail_Address, Password ) VALUES  (?,?,?), where Mail_Address = $_POST[email]';

    $result = $statement->execute([$Name, $mail, $Password]);

    $_SESSION['name'] ['email'] ['password']= 'Регистрация прошла успешно!';

            header("location: register.php");
}

