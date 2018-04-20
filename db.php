<?php
<<<<<<< HEAD

require_once 'config.php';




 require_once 'config.php';


require_once '../config.php';
//=======
# PRODUCTION
//require_once '../config.php';


=======
require_once '../config.php';
>>>>>>> b674a50fe54b0cbef9201a73a3e01f2ad9de9118

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

?>
