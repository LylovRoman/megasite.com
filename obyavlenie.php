<?php
if(isset($_COOKIE['error'])){
    $errorText = $_COOKIE['error'];
    setcookie('error','');
}
include_once "functions.php";
include_once "header.php";

$mysql = mysqli_connect("localhost", "root", "", "mysql");
$records = mysqli_query($mysql, "SELECT * FROM post");
$comments = mysqli_query($mysql, "SELECT * FROM comments");
$autor = mysqli_query($mysql, "SELECT role FROM users WHERE token = '" . $_COOKIE['token'] . "'");
$autor = mysqli_fetch_array($autor);
if (!isset($_GET['id_comments'])){
    include_once "search.php";
}
?>
<?php
while ($result = $records->fetch_assoc()) {
    if (isset($_GET['id_comments'])){
        if ($_GET['id_comments'] == $result['id']){
            echo "
            <div class = 'stroka background-color fon' style='align-items: center;'>
            <div class='block'>
            <h2 style = 'text-align: center;'> " . $result['title'] . "</h2>
            </br><p> " . $result['text'] . " </p>
            </br><p>Цена: " . $result['cost'] . " ₽</p>
            </br><p>Опубликовано: " . $result['date'] . "</br>Просмотров: " . $result['views'] . "<a href='obyavlenie.php?id_comments={$result['id']}'>Комментариев: " . $result['comments'] . "</a></p>";
            if ($autor['role'] < 3){
                echo "</br><a href='deletepost.php?delete={$result['id']}'>Удалить</a>";
            }
            echo "</div></div>";
            echo "
            <div class = 'stroka background-color fon' style='align-items: center;'>
            <br>
            <h2 style='color: Ivory; margin-top: 20px;'>Комментарии</h2>
            </div>
            ";
            while ($result = $comments->fetch_assoc()) {
                if ($_GET['id_comments'] == $result['idpost']){
                    echo "
                    <div class = 'stroka background-color fon' style='align-items: center;'>
                    <div class='block'>
                    <h2> " . $result['autor'] . "</h2>
                    </br><p> " . $result['text'] . " </p>
                    </br><p>Опубликовано: " . $result['date'] . "</p>
                    ";
                    if ($autor['role'] < 3){
                        echo "</br><a href='deletecomment.php?delete={$result['id']}&back={$_GET['id_comments']}'>Удалить</a>";
                    }
                    echo "</div></div>";
                }
            }
            ?>
            <div class = 'stroka background-color fon' style='align-items: center;'>
                <div class='block'>
                <form name="writecomment" action="writingcomment.php" method="post" style="text-align: center">
                    <textarea id ="polewrite" name="textcomment" placeholder="Введите текст комментария" required></textarea> </br></br>
                    <input type="number" name="id_comments" value="<?php echo $_GET['id_comments']; ?>" hidden="hidden">
                    <input type="submit" name="enter" value="отправить">
                </form>
                </div>
            </div>
            <?php
        }
    }
    else 
    {
        if (!isset($_GET['title_search']) || (strpos(mb_strtolower($result['title']), mb_strtolower($_GET['title_search']), 0) !== false)){
            echo "
            <div class = 'stroka background-color fon' style='align-items: center;'>
            <div class='block'>
            <h2 style = 'text-align: center;'> " . $result['title'] . "</h2>
            </br><p> " . $result['text'] . " </p>
            </br><p>Цена: " . $result['cost'] . " ₽</p>
            </br><p>Опубликовано: " . $result['date'] . "</br>Просмотров: " . $result['views'] . "<a href='obyavlenie.php?id_comments={$result['id']}'>Комментариев: " . $result['comments'] . "</a></p>";
            if ($autor['role'] < 3){
                echo "</br><a href='deletepost.php?delete={$result['id']}'>Удалить</a>";
            }
            echo "</div></div>";
            $update = mysqli_query($mysql, "UPDATE post SET views='" . $result['views'] + 1 . "' WHERE id = ". $result['id'] ."");         
        }
    }
    
}
?>
<?php
include_once "footer.php"; ?>