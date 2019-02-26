<?php

function connect() {
    $host = 'localhost';
    $dbname = 'blog';
    $user = 'root';
    $password = '1234';

    $DSN = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';

    $database = new PDO($DSN, $user, $password);

    return $database;
}
?>