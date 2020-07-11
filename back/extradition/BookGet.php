<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Book.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Extradition.php";
$id = $_POST["id"];
$e = new extradition();
$e->loadExtradition($id,$pdo);
$b=new book();
echo json_encode($b->loadBook($e->getBookIdbook(),$pdo));
?>