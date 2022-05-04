<?php
function generateToken(){
    $src = "qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
    return substr(str_shuffle($src),0,16);
}

$mysql = mysqli_connect("localhost", "root", "", "mysql");
if($mysql == false)
{
    print("Ошибка подключения");
}

$result = mysqli_query($mysql, "SELECT * FROM users WHERE login='" . addslashes($_POST['login']) . "'");
if($user = mysqli_fetch_array($result)){
    if($user['password'] === $_POST['password']){
        $token = generateToken();
        $update = mysqli_query($mysql, "UPDATE users SET token='" . $token . "' WHERE id='" . $user['id'] . "'" );
        if($update === true) {
            setcookie('token', $token);
        } else {
            setcookie('error','что-то пошло не так');
        }
    } else {
        setcookie('error','неправильный пароль');
    }
} else {
    setcookie('error','неправильный логин и пароль');
}
header('Location: index.php');
?>