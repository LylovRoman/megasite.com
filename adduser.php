<?php
include_once 'functions.php';

$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql === false)
{
    print("Ошибка подключения");
}

$sss = mysqli_query($mysql, "SELECT login FROM users WHERE login = '" . addslashes($_POST['user_login']) . "'");
if(($_POST['user_role'] > 0) && ($_POST['user_role'] < 4)){
    if(!($sss = mysqli_fetch_array($sss))){
        $result = mysqli_query($mysql, "INSERT INTO `users` (`login`, `password`, `role`) VALUES ('{$_POST['user_login']}', '{$_POST['user_password']}', '{$_POST['user_role']}')");
    } else {
        setcookie('error',"</br>этот логин уже занят");
    }
} else {
    setcookie('error',"</br>указанная роль не существует");
}
header('Location: adminpanel.php');
?>