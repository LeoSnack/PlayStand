<?php
include('/Site/header.php');

if (isset($_GET['page'])) {
    $pageToShow = $_GET['page'];
}else {
    $pageToShow = '';
}
// Проверка пользовательского ввода
switch ($pageToShow) {
    case 'cs':
        include('/Cont/Cs.php');
        break;
    case 'minecraft':
        include('/Cont/minecraft.php');
        break;
    default:
        include('/Cont/home.php');
}

include('/Site/footer.php');
?>



