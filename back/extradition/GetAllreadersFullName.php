<?php

require_once $_SERVER['DOCUMENT_ROOT']."/back/connect.php";
    $stmt = $pdo->prepare("select libraryCardNumber, fullname from reader");
    if($stmt->execute()){
        echo json_encode($stmt->fetchall(PDO::FETCH_ASSOC));
    }
    else
        echo null;
?>