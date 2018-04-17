<?php
//<<<<<<< HEAD
//<<<<<<< HEAD

//<<<<<<< HEAD
//require_once 'config.example.php';
//=======

require_once 'config.php';
//>>>>>>> 830da70f6eb97dd08e0d23fc6b3fd57279d8d22a
//=======
//require_once '../config.php';
//>>>>>>> 572965041b1dcf43d51a6911134c5afcbd2796e4
//=======
//require_once '../config.php';
//>>>>>>> 5d39431939c5c58b9b82b3995e99e76eca333097

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
