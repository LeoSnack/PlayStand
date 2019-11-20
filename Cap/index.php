<?php  
// старт сессии
session_start(); 
// Сравниваем введенную капчу с тем, что храниться в сессии

 if($_SESSION['capcha'] == $_POST['capcha']){
    echo 'Капча верная';
}else {
    echo 'Капча не верная';
} 
// Удаляем значение капчи из сессии 
unset($_SESSION['capcha']);  
?>


<form method="post" action="/Cap/index.php">
    <img src="/Cap/capcha.php" width="100" height="40" /> <br />
    Код с картинки: <input type="text" name="capcha" /><br />
    <input type="submit" value="Отправить" />
</form>