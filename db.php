<?php
<<<<<<< HEAD
=======


>>>>>>> 0c2936348e390d50c6a58feae75501892470f268
/*

DO NOT MODIFY THIS FILE!!!

*/

require_once '../config.php';


try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
