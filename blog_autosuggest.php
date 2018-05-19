<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {    
   
	if(!defined('DB_USER')){
		require "config.php";		
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
    }

    try {
            $query = "SELECT * FROM posts WHERE name LIKE :search";
            $q = $conn->prepare($query);
            $q->execute(array(':search' => $search));
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetchAll();
        
        } catch (PDOException $e) {
            throw $e;
        }

    }


function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}


if(!is_ajax_request()) {
    exit;
}


function str_starts_with() {
    return strpos($choice, $query) === 0;
}

function str_contains() {
    return strpos($choice, $query) !== false;
}

function search($query, $choices) {
    $matches = [];

    foreach($choices as $choice) {
        $d_choice = strtolower($choice);
        $d_query = strtolower($query);
        if(str_starts_with($d_choice, $d_query)) {
            $matches[] = $choice;
        }
    }
}

$query = isset($_GET['q']) ? $_GET['q'] : '';

$suggestions = serach($query, $choices);
sort($suggestions);
$max_suggestions = 5;
$top_suggestions = array_slice($suggestions, 0, $max_suggestions);

echo json_encode($top_suggestions);


$choices = $data;

?>
