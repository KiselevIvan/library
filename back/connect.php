<?
$server = 'localhost';
$user = 'root';
$password = 'root';
$DB_NAME = 'library';

$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

$pdo = new PDO('mysql:host='.$server.';dbname='.$DB_NAME.';charset=utf8', $user, $password,$opt);
