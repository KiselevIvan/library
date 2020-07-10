<?php
require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
    $stmt = $pdo->prepare("select idextradition,fullName,name,dateExtradition,datePlaneReturn,dateReturn from (extradition inner join reader on reader_idreader=libraryCardNumber) inner join book on book_idbook=idbook");
    if($stmt->execute()){
        echo json_encode($stmt->fetchall(PDO::FETCH_ASSOC));
    }
    else
        echo null;
?>