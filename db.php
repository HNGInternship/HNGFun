<?php

require_once 'config.php';


<<<<<<< HEAD
require_once 'config.php';
=======
/*

DO NOT MODIFY THIS FILE!!!
>>>>>>> 66fd249c9bf5b6512b4fac800d5207c95c31df12

*/

require_once 'config.php';

>>>>>>> 688757314aa5f07d2792b7955c41ed7a0474fea5

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
