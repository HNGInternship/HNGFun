<?php
/*

DO NOT MODIFY THIS FILE!!!

*/

<<<<<<< HEAD


require'../config.php';
/*
>>>>>>> Update profile
=======
require_once 'config.php';

>>>>>>> c6488dc76f33b0c2a6e24d97eb06247aaf300221



try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
