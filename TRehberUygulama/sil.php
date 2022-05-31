<?php
require_once 'header.php';
if(!isset($_GET['ad']) || empty($_GET['ad'])){
    header('Location:index.php');
    exit;
}

$sorgu = $db->prepare('DELETE FROM telrehber WHERE ad=?');

$sorgu->execute([
    $_GET['ad']
]);
header('Location::index.php');


?>