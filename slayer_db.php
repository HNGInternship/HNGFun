<?php

require_once 'db.php';

// define ('DB_USER', "root");
// define ('DB_PASSWORD', "");
// define ('DB_DATABASE', "hng_fun");
// define ('DB_HOST', "localhost");

// try {
//     $db = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
// } catch (PDOException $pe) {
//     die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
// }

global $db;

$sql1 = "CREATE TABLE IF NOT EXISTS `interns_data` (
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `phone_number` varchar(30) NOT NULL,
    `password` varchar(255) NOT NULL,
    `skills` text,
    `country` varchar(100) DEFAULT NULL,
    `image_filename` text NOT NULL,
    `public_key` text NOT NULL,
    `private_key` text NOT NULL,
    `active` enum('0', '1') DEFAULT '0',
    `token` TEXT NULL,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),
    `updated_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (id))";



try {
    $db = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

global $db;


    $sql2 = "CREATE TABLE IF NOT EXISTS buy_requests (
        `id` int(20) NOT NULL AUTO_INCREMENT,
        `intern_id` int(20) NOT NULL,
        `amount` float NOT NULL,
        `trade_limit` float DEFAULT NULL,
        `bid_per_coin` float NOT NULL,
        `status` ENUM('Completed', 'Pending', 'Closed', 'Open') NOT NULL,
        `created_at` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id),
        FOREIGN KEY (intern_id) REFERENCES interns_data (id) on delete cascade)";



     $sql3 = "CREATE TABLE IF NOT EXISTS sell_requests(
        `id` int(20) NOT NULL AUTO_INCREMENT,
        `intern_id` int(20) NOT NULL,
        `amount` float NOT NULL,
        `trade_limit` float DEFAULT NULL,
        `price_per_coin` float NOT NULL,
        `preferred_buyer` ENUM('0', '1') NOT NULL DEFAULT '0',
        `account_id` int(20) NOT NULL, 
        `status` ENUM('Completed', 'Pending', 'Closed', 'Open') NOT NULL,
        `created_at` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id),
        FOREIGN KEY (intern_id) REFERENCES interns_data (id) on delete cascade),
        FOREIGN KEY (account_id) REFERENCES account (id) on delete cascade)";



       $sql4 = "CREATE TABLE IF NOT EXISTS banks(
             `id` int(20) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            PRIMARY KEY (id))";



       $sql5 = "CREATE TABLE IF NOT EXISTS accounts(
        `id` int(20) NOT NULL AUTO_INCREMENT,
        `intern_id` int(20) NOT NULL,
        `bank_id` int(20) NOT NULL,
        `name` varchar(100) NOT NULL,
        `number` int(100) NOT NULL,
        `created_at` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id),
        FOREIGN KEY (intern_id) REFERENCES interns_data (id) on delete cascade,
        FOREIGN KEY (bank_id) REFERENCES banks (id) on delete cascade)";

        $sql6 = "CREATE TABLE IF NOT EXISTS wallets (
            `id` int(20) NOT NULL AUTO_INCREMENT,
            `intern_id` int(20) NOT NULL,
            `balance` float NOT NULL,
            `created_at` DATETIME NOT NULL DEFAULT NOW(),
            PRIMARY KEY (id),
            FOREIGN KEY (intern_id) REFERENCES interns_data (id) on delete cascade)";

        $sql7 = "CREATE TABLE IF NOT EXISTS sell_transactions(
            `id` int(20) NOT NULL AUTO_INCREMENT,
            `sell_request_id` int(20) NOT NULL,
            `buyer_id` int(20) NOT NULL,
            `status` ENUM('Completed', 'Pending', 'Closed', 'Open') NOT NULL,
            `created_at` DATETIME NOT NULL DEFAULT NOW(),
            `completed_at` DATETIME  DEFAULT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (sell_request_id) REFERENCES sell_requests (id) on delete cascade,
            FOREIGN KEY (buyer_id) REFERENCES interns_data (id) on delete cascade)";

        $sql8 = "CREATE TABLE IF NOT EXISTS buy_transactions(
            `id` int(20) NOT NULL AUTO_INCREMENT,
            `buy_request_id` int(20) NOT NULL,
            `seller_id` int(20) NOT NULL,
            `status` ENUM('Completed', 'Pending', 'Closed', 'Open') NOT NULL,
            `created_at` DATETIME NOT NULL DEFAULT NOW(),
            `completed_at` DATETIME  DEFAULT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (buy_request_id) REFERENCES buy_requests (id) on delete cascade,
            FOREIGN KEY (seller_id) REFERENCES interns_data (id) on delete cascade)";

    $sql9 = "CREATE TABLE IF NOT EXISTS `slay` (
        `id` int(20) NOT NULL AUTO_INCREMENT,
        `firstname` varchar(100) NOT NULL,
        `lastname` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password_hash` varchar(255) NOT NULL,
        `public_key` text NOT NULL,
        `private_key` text NOT NULL,
        `token` TEXT NULL,
        `active` TINYINT DEFAULT 0,
        `created_at` DATETIME NOT NULL DEFAULT NOW(),
        `updated_at` DATETIME DEFAULT NULL,
        PRIMARY KEY (id))";


    $sqls = [$sql1, $sql2, $sql3, $sql4, $sql5,$sql6, $sql7, $sql8, $sql9];

    foreach ($sqls as $sql) {
        try {
            $stm = $db->prepare($sql);
            $exec = $stm->execute();
        } catch (PDOException $pe) {
            die("Could not create table  ". $pe->getMessage());
        }

    }

    if ($exec) {
        echo  count($sqls). " tables successfully created";
    }

    else{
        echo "error creating tables";
    }
