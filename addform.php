<h2 style="text-align: center">Добавить нового пользователя</h2></br>
<form name="add" action="adduser.php" method="post" style="text-align: center">
    <input type="text" name="user_login" placeholder ="логин"> </br></br>
    <input type="password" name="user_password" placeholder ="пароль"> </br></br>
    <input type="number" name="user_role" placeholder ="роль"> </br></br>
    <input type="submit" name="enter" value ="ввести">
</form>
<?php
if(isset($errorText)){
    echo $errorText;
}
?>