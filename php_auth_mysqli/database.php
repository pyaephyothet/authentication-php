<?php
define('SERVER', 'localhost');
define('UNAME', 'root');
define('PW', 'pyaephyo');
define('DBNAME', 'db-auth-byppt');
define('PORT', '3306');

$connection = mysqli_connect(SERVER, UNAME, PW, DBNAME, PORT);