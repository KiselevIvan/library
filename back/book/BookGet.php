<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Book.php";
$id = $_POST["id"];
$b=new book();
echo json_encode($b->loadBook($id,$pdo));
?>