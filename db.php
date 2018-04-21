<?php
<<<<<<< HEAD
require_once 'config.php';
=======

/*

DO NOT MODIFY THIS FILE!!!

*/
>>>>>>> e19e8621d6637cfb7bcf6fe86ffc52d5536583cb






try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
