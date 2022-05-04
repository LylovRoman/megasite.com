<?php
if(isset($_COOKIE['error'])){
    $errorText = $_COOKIE['error'];
    setcookie('error','');
}

include_once "functions.php";
include_once "header.php";
?>
<div class = "stroka background-color fon nowrap">
    <div class="block">
        <?php
        if (proverka()){
            include_once "content.php";
        } else {
            include_once "authorization.php";
        }   
        ?>
    </div>
    <div class="reklama">
        <h2>Реклама</h2>
    </div>
</div>
<?php include_once "footer.php"; ?>