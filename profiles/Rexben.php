<?php
require_once '../config.php';
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    // echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
?>

<!DOCTYPE html>
<head>
	<style type="text/css">
		.named{
			text-align: center;
			color: blue;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  			max-width: 300px;
  		    margin: auto;
  		    text-align: center;
  		    font-family: arial;
  		    margin-top: 30px;
		}
			.named2{
			text-align: center;
			color: blue;
			margin: auto;
		    max-width: 400px;
			margin-top: 20px;
		}
		.Skills{
			text-align: center;
			color: blue;
			margin: auto;
		    max-width: 400px;
			margin-top: 20px;
		}
			.lists{
				text-align: center;
			color: blue;
			margin: auto;
		    max-width: 400px;
			margin-top: 20px;
			}
			.imagee{
							text-align: center;
			color: blue;
			margin-top: 40px;
			margin: auto;
			  
			}
	</style>
</head>
<body>
	<?php
$name_query = $conn->query('SELECT * FROM interns_data WHERE username="Rexben"');
			$name_query->execute(); 
			$result = $name_query->fetch(PDO::FETCH_ASSOC);
			$name = $result['name'];
			$img_file = $result['image_filename'];
			$username = $result['username'];
		?>


<p class= "imagee">
<img src="<?php echo $img_file ?>" alt="Rexben Image">
</p>
	<h1 class = "named">
		<?php
		echo $name
		?>
	</h1>
	<div class = "named2">
		<p> Slack Username: @<?php echo $username?></p>
		<p>I am into Web design, Android development, Content writing, Blogging, I do a little of graphic designs too.</p>
	</div>

<div class = "Skills"> <p>Skills</p>
				<p>
					Java | Joomla | Blogger | Scrabble | Sleeping | WordPress | Mentoring
				</p>

			</p>

	</div>
 <?php
					    try {
					        $sql = 'SELECT * FROM secret_word';
					        $q = $conn->query($sql);
					        $q->setFetchMode(PDO::FETCH_ASSOC);
					        $data = $q->fetch();
					    } catch (PDOException $e) {
					        throw $e;
					    }
					    $secret_word = $data['secret_word'];
					  ?>
		</body>

</html>
