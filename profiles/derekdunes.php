<?php

	$user_name = "derekdunes";

	try{
		
		//secret key query
		$query = $conn->query("SELECT * FROM secret_word");
		$result = $query->fetch(PDO::FETCH_ASSOC);

		//user data query
		$stmt = $conn->query("SELECT * FROM interns_data WHERE username = '$user_name'");

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	}catch(PDOException $e){

	}
	
	$secret_word = $result['secret_word'];

	$name = $row['name'];
	$username = $row['username'];
	$imageLink = $row['image_filename'];


?>

<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- import font awesome -->
	<!-- <link rel="stylesheet" type="text/css" href="font-awesome.min.css"> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:Regular|Lato:regular" rel="stylesheet"> 

	<!-- body style -->
	<style type="text/css">
			
		

			.container {
				margin-top: 15px; 
				background-color: rgba(45,156,219,.75);
				border-radius: 5px
			}

			img {
	
				border: 2px solid #fff;
				border-radius: 5px;
				width: 312px;
				height: 416px
			}

			#bio {
				margin: 10px 
			}

			#button {
				margin: 5px;
				color: #fff;
				border: 2px solid #fff;
				border-radius: 5px;
				font-size: 14px;
				text-align: center;
				padding-top: 5px;
				height: 33px;
				width: 103px;
			}

			aside {
				color: #fff;
			}

			aside h3 {
				margin-top: 5px;
				font-family: "Work Sans", "Helvetica Neue", Serif, sans-serif;
			}

			aside h6 {
				margin-bottom: 10px;
				font-family: lato, "Helvetica Neue", Serif, sans-serif; 
			}

			aside p {
				margin-bottom: 30px;
				font-family: lato, "Helvetica Neue", Serif, sans-serif;		
			}

			aside h4{
				font-family: lato, "Helvetica Neue", Serif, sans-serif;
				line-height: 25px
			}

			#line {
				border: 1px solid #fff;
				margin: 10px
			}

			#slackName {
				border-bottom: 1px solid #fff;
				width: 76px
			}

		</style>

		<div class="container">
			<!-- Row for profile details and bio -->
			<div class="row" id="bio">
				<div class="col-md-2"></div>
				<section class="col-md-4 col-sm-12">
					<!-- image src and alt value from the database -->
					<img class="img-responsive" src="<?php echo $imageLink ?>" alt="<?php echo $name ?>">

				</section>
			
				<aside class="col-md-4 col-sm-12">
					<!-- Bio Section -->
					<h3><?php echo $name ?></h3>
					<h6 id="slackName">@Derekdunes</h6>
					<p><h4> A UI/UX Designer who's not scared to get his hands dirty with code. He's curious to learn new stacks and an overall team player</h4></p>
					
					<p><h4> Open Sourcerer, Linux contributor, etc looking for words to add to make this text box perfect.</h4></p>
					
					<p><h4> Hobbies: Coding, Reading, Video Gaming, StartUp Hunting.</h4></p>
					<div class="row">
						<div class="col-sm-2"><a href="https://github.com/derekdunes"><i class="fa fa-github" style="font-size:30px; color:white;" ></i></a></div>		
						<div class="col-sm-2"><a href="https://t.me/derekdunes"><i class="fa fa-telegram" style="font-size:30px; color:white;"></i></a></div>
						<div class="col-sm-2"><a href="https://twitter.com/derekdunes"><i class="fa fa-twitter" style="font-size:30px; color:white;"></i></a></div>
						<div class="col-sm-2"><a href="https://www.fb.com/mbahderek18"><i class="fa fa-facebook" style="font-size:30px; color:white;"></i></a></div>
						<div class="col-sm-2"><a href="https://www.instagram.com/derekdunes/"><i class="fa fa-instagram" style="font-size:30px; color:white;"></i></a></div>
						<div class="col-sm-2"><a href="https://linkedin.com/mbah_derek"><i class="fa fa-linkedin" style="font-size:30px; color:white;"></i></a></div>

    					 
    					 
						  
						 
 					</div>
				</aside>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<!-- Contact button -->
				<div class="col-sm-4 text-center" onclick="mailHim()" id="button">
					Contact
				</div>
				<div class="col-sm-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6" id="line"></div>
				<div class="col-sm-3"></div>
			</div>
		</div>

		    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript">

    	function mailHim(){
    		window.open('malito:mbahderek@gmail.com');
    	};

    </script>