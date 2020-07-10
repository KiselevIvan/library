<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Classes/Extradition.php";
$id = $_POST["id"];
$e=new extradition();
$e->loadExtradition($id,$pdo);
$r= new reader();
$r->loadReader($e->getReaderIdreader(),$pdo);
$b=new book();
$b->loadBook($e->getBookIdbook(),$pdo);
$data=[
    "idreader"=>$e->getReaderIdreader(),
    "idbook"=>$e->getBookIdbook(),
    "fullnameReader"=>$r->getFullName(),
    "nameBook"=>$b->getName(),
    "dateExtradition"=>$e->getDateExtradition(),
    "datePlaneReturn"=>$e->getDatePlaneReturn(),
    "dateReturn"=>$e->getDateReturn()
];
echo json_encode($data);
?>