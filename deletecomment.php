<?php
$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql === false)
{
    setcookie('error','ошибка подключения!');
}

$delete = mysqli_query($mysql, "DELETE FROM comments WHERE id = '" . $_GET['delete'] . "'");

$result = mysqli_query($mysql, "UPDATE post SET comments = `comments` - 1 WHERE id = '{$_GET['back']}'");

header("Location: obyavlenie.php?id_comments={$_GET['back']}");
?>