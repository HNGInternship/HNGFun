<?php
/*
<<<<<<< HEAD
DO NOT MODIFY THIS FILE!!!
 */
require '../config.php';

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
=======

DO NOT MODIFY THIS FILE!!!

*/

require_once '../../config.php';


try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
?>
