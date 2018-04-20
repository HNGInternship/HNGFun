<?php
require'db.php';
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username='Oluwatomisin'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Oluwatomisin's Profile</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
    
    .col-center-block {
    float: none;
    display: block;
    margin: 0 auto;
}

	</style>

</head>
<body>
    <div class="container-fluid">
     
     <center>

    <div class="row" >

    
    
    

    <div class="col-md-4 col-center-block" style=" margin-top: 100px";>
    	<img src="<?php echo $user->image_filename; ?>" alt="profile picture" class="img-thumbnail">

    <div class="row info">
	<div class="col-md-12">
					<h2 class="text-center">
						<?php echo $user->name; ?>
					</h2>
					<h4 class="text-center"><span class="slack_handle">Slack Handle: </span>@<?php echo $user->username; ?></h4>
					<p class="text-center"><span class="job_desc">Job Descripsion: </span>Web Developer</p>
	</div>

	</div>
    </div>
   
   
    	
    </div>
    </center>

    </div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
