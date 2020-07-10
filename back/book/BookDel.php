<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Book.php";
$result = 0;
book::delBook($_POST['id'],$pdo);
?>