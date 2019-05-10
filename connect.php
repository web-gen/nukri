<?php

$host = 'localhost';

$db = 'test';

$dsn = "mysql:host=$host;dbname=$db";

$username = 'root';

$password = '';

$connectdb = new PDO($dsn, $username, $password);

?>