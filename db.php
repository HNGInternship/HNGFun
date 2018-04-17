<?php
<<<<<<< HEAD

=======
>>>>>>> a86f61c629811511e3d9e7d68b268dbc936f3227
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    //echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
