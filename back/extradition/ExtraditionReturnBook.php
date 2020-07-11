<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Book.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Extradition.php";
$id = $_POST["id"];
$e = new extradition();
$e->loadExtradition($id,$pdo);
$e->setDateReturn(date("Y-m-d"));
$e->update($id,$pdo);
?>