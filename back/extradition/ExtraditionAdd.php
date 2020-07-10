
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Extradition.php";
$e=new extradition();
$e->setExtradition($_POST);
$e->insert($pdo);
?>
