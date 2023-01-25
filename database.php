<?php
//define('SERVER', 'localhost');
//define('UNAME', 'root');
//define('PW', 'pyaephyo');
//define('DBNAME', 'db-auth-byppt');
//define('PORT', '3306');

//$connection = mysqli_connect(SERVER, UNAME, PW, DBNAME, PORT);
$servername = "localhost";
$username = "root";
$password = "pyaephyo";
$dbname = "db-auth-byppt";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);