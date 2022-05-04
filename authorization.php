<h2 style="text-align: center">Авторизуйтесь</h2></br>
<form name="test" action="processing.php" method="post" style="text-align: center">
    <input type="text" name="login" placeholder ="логин"> </br></br>
    <input type="password" name="password" placeholder ="пароль"> </br></br>
    <input type="submit" name="enter" value ="ввести">
</form>
<?php
if(isset($errorText)){
    echo $errorText;
}
?>