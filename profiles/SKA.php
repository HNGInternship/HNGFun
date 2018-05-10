<!DOCTYPE html>
<?php

	// if(!defined('DB_USER')){
     // require "../../config.php";
     // try {
         // $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
     // } catch (PDOException $pe) {
         // die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
     // }
   // }
	
	// $sql = "SELECT * FROM secret_word LIMIT 1";
    // $q = $conn->query($sql);
    // $q->setFetchMode(PDO::FETCH_ASSOC);
    // $data = $q->fetch();
	// $secret_word = $data['secret_word'];
	
	// $sql2 = "SELECT * from interns_data WHERE username = 'SKA'";
    // $q2 = $conn->query($sql2);
    // $q2->setFetchMode(PDO::FETCH_ASSOC);
    // $row = $q2->fetch();
	
	// $name = $row['name'];
	// $username = $row['username'];
	// $imageUrl = $row['image_filename'];
	try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="Dan"';
        $query_my_intern_db = $conn->query($sql_queryname);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
    }
    catch (PDOException $exceptionError) {
        throw $exceptionError;
   }

        $secret_word = $query_result['secret_word'];
        $name = $intern_db_result['name'];
        $username = $intern_db_result['username'];
        $imageUrl = $intern_db_result['image_filename'];
?>
<html>
    <head>
        <title>STAGE 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            html{height: 95%}
            body { height: 100%; display: flex; flex-flow: column nowrap;   }
            #header, #footer{ height: 50px; flex:0 0 auto;  display: flex; flex-flow: row nowrap; justify-content: center; }
            #middle{ width: 300px; height: auto; margin-right: auto; margin-left: auto; }
            #image{ width: 300px; height: 250px; flex:1 1 auto; }
			.flex{display: flex; flex-flow: row nowrap; justify-content: space-between; width: 100%}
			.label{width: 40%;}
			.value{width: 60%;}
		</style>
    </head>
    <body>
		<br/>
        <div id="header">
            <h3 style="">WELCOME TO HNG INTERNSHIP 4</h3>              
        </div>
		<div id="middle">
			<div id="image"  style="background-image: URL(<? echo $imageUrl; ?>); background-size: cover; background-repeat:   no-repeat;
                     background-position: center center; -webkit-background-size: cover; -moz-background-size: cover;
                     -o-background-size: cover;"  >           
			</div>
			<br/>
			<div class="flex">
				<div class="label">NameNew:</div>
				<div class="value"><? echo $name; ?></div>
			</div>
			<div class="flex">
				<div class="label">Username:</div>
				<div class="value"><? echo $username; ?></div>
			</div>
			<div class="flex">
				<div class="label">Root:</div>
				<div class="value"><? echo $_SERVER["DOCUMENT_ROOT"]; ?></div>
			</div>
			<div class="flex">
				<div class="label">Dir:</div>
				<div class="value"><? echo __DIR__; ?></div>
			</div>
		</div>        		
			
        <div id="footer">
            
        </div>        
    </body>
</html>