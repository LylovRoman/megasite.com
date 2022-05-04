<?php
$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql === false)
{
    setcookie('error','ошибка подключения!');
}

$autor = mysqli_query($mysql, "SELECT login FROM users WHERE token = '" . $_COOKIE['token'] . "'");
$autor = mysqli_fetch_array($autor);
$autor = $autor['login'];
if ($result = mysqli_query($mysql, "INSERT INTO `comments` (`idpost`, `autor`, `text`, `date`) VALUES ('{$_POST['id_comments']}', '{$autor}', '{$_POST['textcomment']}', '" . date('Y-m-d H:i', strtotime('+2 hour')) ."')")){
    $result = mysqli_query($mysql, "UPDATE post SET comments = `comments` + 1 WHERE id = '{$_POST['id_comments']}'");
}


header("Location: obyavlenie.php?id_comments={$_POST['id_comments']}");
?>