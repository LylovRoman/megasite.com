<?php
$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql === false)
{
    setcookie('error','ошибка подключения!');
}

$result = mysqli_query($mysql, "INSERT INTO `post` (`title`, `text`, `cost`, `views`, `comments`, `date`) VALUES ('{$_POST['title']}', '{$_POST['text']}', '{$_POST['cost']}', '0', '0', '" . date('Y-m-d H:i', strtotime('+2 hour')) ."')");

header('Location: adminpanel.php');
?>