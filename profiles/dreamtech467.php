
<?php

require 'db.php';

  try {
      $sql = "SELECT * FROM interns_data WHERE username ='dreamtech467'";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $names = $data['name'];
  $username = $data['username'];
  $profile_img = $data['image_filename'];


  try {
      $sql2 = 'SELECT * FROM secret_word';
      $q2 = $conn->query($sql2);
      $q2->setFetchMode(PDO::FETCH_ASSOC);
      $data2 = $q2->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $secret_word = $data2['secret_word'];

  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initail-scale=1">
		<title>Abraham Profile</title>
		
		<style>
			body{
				padding-bottom: 0px;
				font-family: 'Open Sans', Arial, Tahoma;
				color: #363636;
				background: #ededed;
				font-size: 14px;
			}
			h2{
				font-weight: 700;
				font-size:1.5em;
				line-height: 1.4em;
			}
			strong, h2{
				color: #3b5a76;
			}

			.container-main{
				background: #fff;
				  margin-top: 80px;
				  padding:30px;
				  width:80%;
				  margin-right:auto;
				  margin-left:auto;
				  border-radius: 10px;

			}

			header{
				min-height: 100px;
				overflow: auto;
			}

			header h3{
				margin:0;
				padding:20px 0 0 0;
				font-size: 2.2em;
				font-weight: 700;
				letter-spacing:-1px;
				text-align: center;
				line-height: 1.4em;

			}


			.row{
				margin-bottom:20px;
				line-height:25px;
				  margin-top: 0px;
				  padding:30px;
				  width:70%;
				  margin-right:auto;
				  margin-left:auto;
				  border-radius: 10px;

			}
			 
			.profile-img{
				width:200px;
				height:200px;
				display: block;
				margin: auto;
				margin-top:-80px;
				border-radius: 20%;
			}
		</style>
	</head>
	<body>
		<section>
			<div class="container-main">
			
				<img src="<?php echo $profile_img ?>" alt="" class="profile-img" />
				<header>
					<h3>Hello, <br>My Name Is <strong><?php echo $names ?></strong> a web developer @<?php echo $username ?>
					</h3>
					
				</header>
				
				
				<div class="row">
				
					<hr>
						<h2># About Me</h2>
						<p>Hi!! I am a Front-end/Backend Developer, self-driven, highly 
						motivated and hungry to learn new technologies, methodologies and 
						processes.Having overall experience in programming using google 
						search, I make complex problems beautiful. Outside the programming
						world, I’m a Crane Operator (Vessel Cranes).
						</p>
					
				</div>
				
			</div>
		</section>
	</body>
</html>

