<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Reader.php";
$result = 0;
Reader::delReader($_POST['id'],$pdo);
?>