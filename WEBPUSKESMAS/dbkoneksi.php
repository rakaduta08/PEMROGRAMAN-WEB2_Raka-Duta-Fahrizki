<?php
$host = 'localhost';
$db = 'db_raka23180si';
$user = 'raka23180si';
$pass = '25760110123180';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dbh = new PDO($dsn, $user, $pass, $opt);