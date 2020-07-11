<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Reader.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Extradition.php";
$id = $_POST["id"];
$e = new extradition();
$e->loadExtradition($id,$pdo);
$r=new reader();
echo json_encode($r->loadReader($e->getReaderIdreader(),$pdo));
?>