
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Book.php";
$b=new book();
$b->setBook($_POST);
$b->insert($pdo);
?>
