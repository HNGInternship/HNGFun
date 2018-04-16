<?php

<<<<<<< HEAD
//<<<<<<< HEAD
require_once 'config.example.php';
//=======
//require_once '../config.php';
//>>>>>>> 1a63d6d5d02d8fe9a4544287ddac79956b89b341
=======

require_once 'config.example.php';

require_once 'config.php';

require_once 'config.example.php';

// require_once '../config.php';

>>>>>>> 2c85622cf425982d2c187cd326cd6f6ea224a94a

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    //echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
