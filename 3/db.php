<?php

$dsn = "mysql:dbname=testdb;host=127.0.0.1";
$user = "test_user";
$password = "12345";

$solveMessage = <<<TEXT
<br>You should probably execute the following queries to prepare MySQL database:
<br>
<br>CREATE DATABASE IF NOT EXISTS testdb;
<br>
<br>USE testdb;
<br>
<br>CREATE TABLE IF NOT EXISTS comments (
	<br>id int PRIMARY KEY AUTO_INCREMENT,
	<br>COMMENT TEXT NOT NULL
<br>);
<br>
<br>CREATE user IF NOT EXISTS test_user IDENTIFIED by '12345';
<br>
<br>GRANT ALL ON testdb.comments TO test_user;
TEXT;

//пробуем установить соединение с бд
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    exit("Database connection failed: " . $e->getMessage().$solveMessage);
}