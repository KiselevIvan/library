<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Reader.php";
$id = $_POST["id"];
$r=new reader();
echo json_encode($r->loadReader($id,$pdo));
?>