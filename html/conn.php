<?php
    $mysql_host = 'localhost';
    $port = '';
    $username = 'root';
    $password = '';
    $database = 'danekrzyzowka';

    try {
        $pdo = new PDO( 'mysql:host=' . $mysql_host . ';dbname=' . $database . ';port=' . $port, $username, $password );
    } catch( PDOException $e ) {
        echo 'Polaczenie nie moglo zostac utworzone.<br />';
        exit;
    }
