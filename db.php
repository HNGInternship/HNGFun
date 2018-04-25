<?php
/*

DO NOT MODIFY THIS FILE!!!

*/

require_once 'config.php';
<<<<<<< HEAD
/*
>>>>>>> Update profile

*/

=======
>>>>>>> dac559b96d9ecf83cd3a9eaafd9cada8d0f52c6c




try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
