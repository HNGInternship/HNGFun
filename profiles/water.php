<?php 
<<<<<<< HEAD
  if(!defined('DB_USER')){
	  require "../../config.php";		
		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		}catch (PDOException $pe) {
		   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}
 
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;
	$result2 = $conn->query("Select * from interns_data where username = 'WaTeR'");
	$user = $result2->fetch(PDO::FETCH_OBJ);  
?>
=======
 require 'db.php';
  $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

$query1 = "SELECT * FROM interns_data_ WHERE username='WaTeR'";

$stmt = $conn->query($query1);

$stmt->execute();







      
?>

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
<!DOCTYPE html>
<html>
<head>
	<title>HNG INternship Task 3</title>
	<style type="text/css">
<<<<<<< HEAD
	{
		padding: 0px;
		margin:0px auto;
		max-width: 100%;
		font-size: 100%;
	}

	.head{
		margin-top: 30px;
		padding: 20px;
		max-width: 90%;
		background: #F0F8FF;
		color: #002610;

	}

	.head h1{
		font-size: 40pt;
		text-align: center;
	}
	.compliment{
		padding: 20px;
		background: #6A5ACD;
		max-width: 90%;
		font-size: 20pt;
		color: #FDFDF8;
		text-align: center;
	}
			
	.content{
		margin-top:  5px;
		padding: 20px;
		background:#DC143C;
		max-width: 90%;
		
		color: #FDFDF8;height: 150px;
		text-align: center;
	}
	.content .header{
		color: #4D0909;
		font-size: 30pt;
		text-align: left;
		
		
	}
	.text-primary{
		font-size: 20px;
		float: center;
	}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
=======
		*{
	padding: 0px;
	margin:0px auto;
	max-width: 100%;
	font-size: 100%;
}

.head{
	margin-top: 30px;
	padding: 20px;
	max-width: 90%;
	background: #F0F8FF;
	color: #002610;

}

.head h1{
	font-size: 40pt;
	text-align: center;
}
.compliment{
	padding: 20px;
	background: #6A5ACD;
	max-width: 90%;
	font-size: 20pt;
	color: #FDFDF8;
	text-align: center;
}
		
.content{
	margin-top:  5px;
	padding: 20px;
	background:#DC143C;
	max-width: 90%;
	
	color: #FDFDF8;height: 150px;
	text-align: center;
}
.content .header{
	color: #4D0909;
	font-size: 30pt;
	text-align: left;
	
	
}



	</style>
}
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
</head>
<body>

<div class="head">
	<h1>Hi,</h1>
	<h1>I am WATER from AndroidNGR, EKITI</h1>
</div>

<div class="compliment">
	<p> a member of the HNG Internship 4.0 </p>
</div>

<div class="content">
<<<<<<< HEAD
	<div class="col-lg-3">
		<?php echo $user->name ?>
	</div>
</div>
<div class="col-lg-6">
          <!--<img class="img-circle " src="<?php echo $data['image_filename']; ?>" alt="Generic placeholder image" width="200" height="200" style="border:solid 5px #fff;">-->
          <h2 style="color: #fff; font-size: 40px; float: center;"><?php echo $user->name ?>
          	<!--<br/><small style="color: red; float: center;"><?php echo $user->name ?></small>--></h2>
=======
<div class="col-lg-3">
	</div>
		<?php while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>


<div class="col-lg-6">
          <img class="img-circle " src="<?php echo $data['image_filename']; ?>" alt="Generic placeholder image" width="200" height="200" style="border:solid 5px #fff;">
          <h2 style="color: #fff;"><?php echo $data['username']; ?>
          	<br/><small style="color: #FFFFCC;"><?php echo $data['name']; ?></small></h2>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440

          <p class="text-primary" style="color: #F0F8FF;">FULL-STACK DEVELOPER | GRAPHICS DESIGNER | LEARNER</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
</div>
<<<<<<< HEAD
<!-- /.row -->
</body>
</html> 

<?php

?>
=======

	
	<?php } ?>
<div class="col-lg-3">
	</div>
<div style="background: #6A5ACD; height: 200px;max-width: 90%">

</div>
</div>
<!-- /.row -->
</body>
</html> 
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
