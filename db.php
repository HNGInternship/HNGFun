<?php
/*

DO NOT MODIFY THIS FILE!!!
<<<<<<< HEAD

*/

require_once 'config.php';
/*
>>>>>>> Update profile

*/





try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
