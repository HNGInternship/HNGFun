<?php
    try {
        $select = 'SELECT * FROM secret_word';
        $query = $conn->query($select);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word']; 
    
    $result2 = $conn->query("Select * from interns_data where name = 'Sule Olanrewaju'");
	$user = $result2->fetch(PDO::FETCH_OBJ);  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload file</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<style type="text/css">
img{
	width: 60%;
	height: 60%;
}
</style>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Brand</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Welcome</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<img src="http://res.cloudinary.com/olanrewaju/image/upload/v1523722036/a.png" class="img-responsive img-circle">
						<h1 class="text-success"> Sule Olanrewaju </h1>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h1>Skill Set</h1>
						<h3> Front End Skills: Html, Css, Js, Vue ...</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%;">
								85%
							</div>
						</div>

						<h3> Backend Skills : Php, Laravel...</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
								70%
							</div>
						</div>

						<h3> Version Control : Github</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%;">
								60%

							</div>
						</div>

						<h3> Data Science : Python</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:30%;">
								30%
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
