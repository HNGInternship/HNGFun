<!doctype html>
<html lang="en">
<head>
	<?php
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	$result2 = $conn->query("Select * from interns_data where username = 'justin'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
    <title><?php echo $user->username; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">  	
</head>  
<body>
<div class="container">
<div id="header">
	<p><?php echo $user->username; ?>'s Profile</p>
</div>
<div id="image">
	<img src="<?php echo $user->image_filename; ?>" alt="Justin's picture">
</div>
<div id="social-header">
	<P><?php echo $user->name; ?></P>
</body>
</html>