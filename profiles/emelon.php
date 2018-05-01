
	<meta name="author" content="Emmanuel-Melon">
	<link href="https://fonts.googleapis.com/css?family=Orbitron|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<style type="text/css">
		body {
			background: linear-gradient(to left top, #EAE2D6, #D5C3AA); /* Linen, Oyster */
		}
		/* typography */
		h1, h2, h3, h4, h5, h6 {
			font-family: 'Orbitron', sans-serif;
			padding-left: 0.3em;
			border-radius: 0.2em;
		}
		.emphasized {
			background: #fff;
			color: #D13525; /* apple red */
			width: 170px;
			padding-left: 0.5em;
			border-radius: 0.3em;
		}
		p, li {
			font-family: 'Ubuntu', sans-serif;
		}
		ul {
			list-style-type: none;
		}
		ul li {
			border-left: solid #4C3F54 0.2em; /* fig */
			padding-left: 0.5em;
			color: #4C3F54; /* fig */
		}
		.fas {
			color: #D13525; /* apple red */
		}
		/* general styles */
		.card, .social, .para {
			box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			transition: all 0.3s cubic-bezier(.25,.8,.25,1);
		}
		.card:hover, .social:hover, .para:hover {
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
		}
		.card-title {
			color: #4C3F54; /* fig */
			border-left: solid #4C3F54 0.2em;  /* fig */

		}
		.social {
			background: #fff; /* white */
			padding: 2.5em;
			width: 50%;
			margin: 0 auto;
			text-align: center;
			margin-top: 0.5em;
		}
		.social a {
			padding: 0.5em;
			color: #4C3F54; /* fig */
		}
		.social a:hover {
			padding: 0.5em;
			color: #D13525;  /* apple red */
		}
		.header h1 {
			background: #fff;
			color: #4C3F54;
			padding-left: 0.5em;
			border-left: solid #4C3F54 0.3em;
		}
		.header h3 {
			color:  #D13525;
		}
	</style>
</head>
<body>
<?php 
	//create database connection
	if(!defined('DB_USER')){
        require "../config.php";     
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }

    //query databse for secret word
    $query_secret_word = $conn->query("Select * from secret_word LIMIT 1");
	$query_secret_word = $query_secret_word->fetch(PDO::FETCH_OBJ);
	$secret_word = $query_secret_word->secret_word;

    //query databse for username
    $query_username = $conn->query("Select * from interns_data where username = 'emelon'");
	$query_username = $query_username->fetch(PDO::FETCH_OBJ);
	$username = $query_username->username;

    //query databse for name
	$query_name = $conn->query("Select * from interns_data where name = 'Emmanuel Daniel'");
	$query_name = $query_name->fetch(PDO::FETCH_OBJ);
	$name = $query_name->name;

?>

		<div class="row">
			<div class="col-md-5">
				<div id="profile">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="http://res.cloudinary.com/dwacr3zpp/image/upload/v1525132727/QVmkcjuT_400x400.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo "$name"; ?></h5>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><i class="fas fa-map-marker"></i> Harare, Zimbabwe</li>
								<li class="list-group-item"><i class="fas fa-graduation-cap"></i> Harare Institute of Technology</li>
								<li class="list-group-item"><i class="fas fa-briefcase"></i> Web Developer</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="header">
					<h1>Hi, my name is <?php echo "$username"; ?></h1> <hr>
				</div>
				<p class="emphasized"><strong>&amp; I love to code...</strong></p>

				<h3 class="emphasized">I do...</h3> <hr>
				<ul class="list-group list-group-flush">
					<li>Web application development,</li>
					<li>HTML5 games,</li>
					<li>Software design and architecture,</li>
					<li>API design,</li>
					<li>&amp; I also build mobile apps</li>
				</ul> <hr>

				<h3 class="emphasized">Find me...</h3>
				<div class="social">
					<p>
						<a href="https://www.facebook.com/profile.php?id=100000674982505" target="_blank"><i class="fab fa-facebook-f fa-3x" ></i></a>
						<a href="https://twitter.com/JunubiMan" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
						<a href="https://github.com/Emmanuel-Melon/" target="_blank"><i class="fab fa-github fa-3x"></i></a>
					</p>
				</div>
			</div>
		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>

<!-- 
Color Scheme 


BOLD AND CULTURED

#4C3F54 FIG
#D13525 APPLE RED
#F2C057 SWISS CHEESE
#486824 BASIL

POLISH AND INVITING 

#EAE2D6 LINEN
#D5C3AA OYSTER 
#867666 PEWER
#E1B80D LEMON TEA


-->