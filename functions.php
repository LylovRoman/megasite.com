<?php

function proverka(){
    if(isset($_COOKIE['token']))
    {
        $mysql = mysqli_connect("localhost", "root", "", "mysql");
        $result = mysqli_query($mysql, "SELECT * FROM users WHERE token = '{$_COOKIE['token']}'");
        $result = mysqli_fetch_array($result);
        if($result){
            return $result;
        }
    }
    return false;
}

function roleName(){
    $mysql = mysqli_connect("localhost", "root", "", "mysql");
    $result = mysqli_query($mysql, "SELECT * FROM users WHERE token = '{$_COOKIE['token']}'");
    $result = mysqli_fetch_array($result);

    switch($result['role']){
        case 1:
            return 'администратор';
            break;
        case 2:
            return 'модератор';
            break;
        case 3:
            return 'пользователь';
            break;
        default:
            return 'никто';
    }
}