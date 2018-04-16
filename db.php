<?php

<<<<<<< HEAD


require_once 'config.example.php';
//=======
//require_once '../config.php';


require_once 'config.example.php';

require_once 'config.php';

require_once 'config.example.php';

// require_once '../config.php';


require_once 'config.php';


=======
require_once 'config.php';

>>>>>>> b2bbe46b15fc26a9eb4bb2d3c3786788727f0b54
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
