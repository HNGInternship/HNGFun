<?php
 require '../db.php';
?>

<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'olubori'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<?php echo $user->mercyikpe ?>



<?php


   try {
       $sql = 'SELECT intern_id, name, username, image_filename FROM interns_data WHERE username=\'mercyikpe\'';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q->fetch();
   } catch (PDOException $e) {
       echo $e->getMessage();
   }
        
        $mynameis = $data["name"];
        $myusernameis = $data["username"];
        $myimagelinkis = $data["image_filename"];



?>
<!DOCTYPE html>
<html>
<head>
	<title>MercyIkpe</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		body {
			background-image: url("<?php  echo $myimagelinkis; ?>");
			background-size: cover;
		}
		
		.fa:hover {
    		color: #536DFE;
		}

		#clock {
			float: right;
			font-size: 4em;
			display: inline;
			color: #ccc;
			text-align: center;
			margin: 150px 10px 0 0;
		}	
	</style>
</head>

<body>


	<header>
			<div>
				<a href="https://github.com/mercyikpe"><i class="fa fa-github" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://twitter.com/mercyikpee"><i class="fa fa-twitter"style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://medium.com/@mercyikpe"><i class="fa fa-medium" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://web.facebook.com/mercy.ikpe.79"><i class="fa fa-facebook" float style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>	
			</div>
		
	</header>
    
	<p id="clock">
		<?php
			echo "The time is </br>" . date("h:i:sa");
		?> 
	</p>
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

