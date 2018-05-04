<?php
    $sql = "SELECT secret_word FROM secret_word;";
    $query = $conn->query($sql);
    $result = $query->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
    
    $queryProfile = $conn->query("SELECT * FROM interns_data WHERE username = 'walecloud';");    
    $rsProfile = $queryProfile->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>WaleCloud - Profile</title>
	<style>
		* {
			font-family: OCR A std;
			font-size: 30px;
			padding: 2px;
			text-align: center;
		}

		.card {
			height: 600px;
			width: 400px;
			border: 1px groove #ccc;
			border-radius: 3px;
			margin-left: 38%;
			margin-top: 7%;
		}
		.dp {
			padding: 2px;
			height: 300px;
		}
		span {
			font-size: 18px;
		}
	</style>
</head>
<body>

<div class="card">
	<div class="dp">
		<img src="<?= $rsProfile->image_filename; ?>">
	</div>
	<div>
		<h2><?= $rsProfile->name; ?><br>
			<span><?= $rsProfile->username; ?><span></h2>
		<p>Having fun at HNG4...</p>
	</div>
</div>

<script>
	
</script>
</body>
</html>