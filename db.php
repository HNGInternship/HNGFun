<?php

<<<<<<< HEAD
require_once 'config.example.php';
//=======
//require_once '../config.php';


require_once 'config.example.php';

require_once 'config.php';

require_once 'config.example.php';

// require_once '../config.php';
=======
require_once '../config.php';
>>>>>>> c3d0eeffae11b8a26a7e9a1af44d97849792912e

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    //echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
