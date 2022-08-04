<?php

$host = "localhost";

$root = "root";
$root_password = "Cx]ftn@._ok(PfP6";

$user = 'netfluxien';
$pass = 'azerty';
$db = "netflux_db";

try {
    $dbh = new PDO("mysql:host=$host", $root, $root_password);

    $dbh->exec("CREATE DATABASE `$db`;
            CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
            GRANT ALL ON `$db`.* TO '$user'@'localhost';
            FLUSH PRIVILEGES;")
    or die(print_r($dbh->errorInfo(), true));

    echo "Database created successfully";
}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}