<?php

$username = "root";
$password = "pyaephyo";

$dsn = "mysql:host=localhost;dbname=db-auth-byppt;charset=utf8mb4";
$options = [
    PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
$pdo = new PDO($dsn, $username, $password, $options);