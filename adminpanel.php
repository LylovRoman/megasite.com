<?php
if(isset($_COOKIE['error'])){
    $errorText = $_COOKIE['error'];
    setcookie('error','');
}

include_once "functions.php";
include_once "header.php";
?>
<div class = "stroka background-color fon">
    <div class="block" style="width: 350px">
        <?php
            include_once "addpostform.php";
        ?>
    </div>
    <?php
    
        if (roleName() == 'администратор'){
            echo '<div class="block" style="width: 350px">';
            include_once "addform.php";
            echo '</div>';
        }
    ?>
</div>
<?php include_once "footer.php"; ?>