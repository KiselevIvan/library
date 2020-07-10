
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Reader.php";
$r=new reader();
$r->setReader($_POST);
$r->insert($pdo);
?>
