<?php
$dbh = 'mysql:dbname=PlayStand;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dbh, $user, $password);
    $dbh->query("SET NAMES 'utf8'");
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

if (!$dbh) {
throw new PDOException();
}





?>