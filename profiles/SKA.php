<!DOCTYPE html>
<?php

	include 'config.php';
	
	// $pdo = new PDO('mysql:host=db;dbname=hng_fun', 'ska', 'ska');
	// $statement = $pdo->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
	// $row = $statement->fetch(PDO::FETCH_ASSOC);
	// echo htmlentities($row['_message']);
	
	
	// $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	// if (mysqli_connect_errno($mysqli)) {
		// echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// }	

	// $res = mysqli_query($mysqli, "SELECT * from interns_data");
	// $row = mysqli_fetch_assoc($res);
	$error = null;
	$conn = null;
	try {
		$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		$error = true;
	}
	
	
	$secret_word = "sample_secret_word";
	$sql = "SELECT * FROM secret_word LIMIT 1";
    $q = $conn->query($sql);
    // $q->setFetchMode(PDO::FETCH_ASSOC);
    // $data = $q->fetch();
	// $secret_word = $data['secret_word'];
		
    $data = $q->fetch(PDO::FETCH_OBJ);
	$secret_word = $data->secret_word;
	
	$sql2 = "SELECT * from interns_data WHERE username = 'dan'";
    $q2 = $conn->query($sql2);
    // $q2->setFetchMode(PDO::FETCH_ASSOC);
    // $row = $q2->fetch();

    $row = $q2->fetch(PDO::FETCH_OBJ);
	$name = $row->name;
	$username = $row->username;
	$imageUrl = $row->image_filename;
	
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
				<div class="label">Name:</div>
				<div class="value"><? echo $name; ?></div>
			</div>
			<div class="flex">
				<div class="label">Connection:</div>
				<div class="value"><? if(isset($error)) echo 'Error...'; ?></div>
			</div>
		</div>        		
			
        <div id="footer">
            
        </div>        
    </body>
</html>