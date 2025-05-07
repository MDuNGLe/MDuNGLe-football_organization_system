<?php
$dsn = 'mysql:host=project-mysql;port=3306;dbname=information_schema';
$username = 'root';
$password = '1';

$connection = new PDO($dsn, $username, $password);
?>