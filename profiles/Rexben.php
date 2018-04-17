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
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result -> fetch(PDO::FETCH_OBJ);
$secret_word = $result ->secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'Rexben'");
$user = $result2 -> fetch(PDO::FETCH_OBJ);
?>


<p class= "imagee">
<img src="<?php echo $user->image_filename ?>" alt="Rexben Image">
</p>
	<h1 class = "named">
		<?php
		echo $user->name
		?>
	</h1>
	<p class = "named2">
		I am into Web design, Android development, Content writing, Blogging, I do a little of graphic designs too.
	</p>

<div class = "Skills"> <p>Skills</p>
				<p>
					Java | Joomla | Blogger | Scrabble | Sleeping | WordPress | Mentoring
				</p>

			</p>

	</div>
		</body>

</html>