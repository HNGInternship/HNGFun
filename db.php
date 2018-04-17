<?php

<<<<<<< HEAD

require_once 'config.php';
=======
require_once '../config.php';
>>>>>>> 8c91b69ac371fbb6c66f2976738b91f19cd9c40a


try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
