<h2 style="text-align: center">Добавить новое объявление</h2></br>
<form name="addpost" action="addingpost.php" method="post" style="text-align: center">
    <input type="text" name="title" placeholder ="заголовок"> </br></br>
    <textarea id="textaddpost" name="text"></textarea> </br></br>
    <input type="number" name="cost" placeholder ="цена"> </br></br>
    <input type="submit" name="enter" value ="ввести">
</form>
<?php
if(isset($errorText)){
    echo $errorText;
}
?>