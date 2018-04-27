<?php
/*

DO NOT MODIFY THIS FILE!!!

*/

<<<<<<< HEAD
require_once 'config.php';

=======
require_once '../config.php';
/*

*/
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
