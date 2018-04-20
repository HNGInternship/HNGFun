<?php
<<<<<<< HEAD


require_once 'config.php';




 require_once 'config.php';


require_once '../config.php';
//=======
# PRODUCTION
//require_once '../config.php';


require_once '../config.php';

=======

require_once '../config.php';
>>>>>>> 947d1a10467c2048c1a746058f139e30db52e43c

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
