<?php

//<<<<<<< HEAD
require_once 'config.example.php';
//=======

//require_once '../config.php';
//>>>>>>> 830da70f6eb97dd08e0d23fc6b3fd57279d8d22a

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
