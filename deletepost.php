<?php
$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql === false)
{
    setcookie('error','ошибка подключения!');
}

$delete = mysqli_query($mysql, "DELETE FROM post WHERE id = '" . $_GET['delete'] . "'");

$result = mysqli_query($mysql, "DELETE FROM comments WHERE idpost = '{$_GET['delete']}'");

header("Location: obyavlenie.php");
?>