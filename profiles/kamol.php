<!DOCTYPE html>
<html>
<?php
require('db.php');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'kamol'");
if($result)    $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
$avater = "https://res.cloudinary.com/dab17ckbw/image/upload/v1523987827/dude-freecodecam.jpg";
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Ayuba Kamol | DEvArchi</title>

	<link rel="icon" href="favicon.ico" type="image/png" />

	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi|Roboto:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<style>
    /* Typography */

    html {
	    font-family: 'Roboto', sans-serif;
    }
	body {
	
	}

    @media (min-width: 576px) {
	   html {
		font-size: 14px;
	  }
    }

    @media (min-width: 768px) {
	   html {
		font-size: 16px;
    	}
    }

    @media (min-width: 992px) {
    	html {
    		font-size: 18px;
    	}
    }

    @media (min-width: 1200px) {
    	html {
    		font-size: 20px;
    	}
    }

    .icons-social i {
    	font-size: 3em;
    }

    /* Custom Styles */

    main {
    	display: flex;
    	flex-direction: column;
    	min-height: 100vh;
    	justify-content: center;
    	padding: 0 30px;
    	text-align: center;
    }

    main > .intro {
    	font-family: 'Reem Kufi', sans-serif;
    	font-size: 3.75em;
    	font-weight: 600;
    }

    main > .tagline {
    	font-size: 1.5rem;
    	margin: 1.5rem 0;
    	font-weight: 100;
    }

    .icons-social i {
    	padding: 10px;
    }

    .devto {
    	margin-bottom: -0.20rem;
    }

    .devto svg {
    	margin-bottom: -0.20rem;
    	margin-left: 0.675rem;;
    	width: 2.65rem;
    	height: 2.65rem;
    }
	
    html {
      box-sizing: border-box;
      font-size: 12px;
    }

    *, *:before, *:after {
        box-sizing: inherit;
    }

    body, h1, h2, h3, h4, h5, h6, p, ol, ul {
      margin: 0;
      padding: 0;
      font-weight: normal;
    }

    ol, ul {
      list-style: none;
    }

    img {
      max-width: 100%;
      height: auto;
    }
	.profile_image {
      border-radius: 50%;
      display: block;
      margin: auto;
      padding: 100px;
    }
</style>
</head>
<body>

                    <div class="App-header2">
                        <img class="profile_image" src="<?php echo $avater;?>" alt="kamol picture">
                    </div>


	<main>
		<div class="intro">Hello, I'm kamol!</div>
		<div class="tagline">intermidate Full Stack Dev| Code Fanatic |  Architect | HNG-Intern</div>
		<!-- Find your icons from here - https://fontawesome.com/icons?d=gallery&s=brands -->
		<div class="icons-social">
			<a target="_blank" href="https://github.com/kayub007"><i class="fa fa-github"></i></a>
			<a target="_blank" href="https://twitter.com/dudcally"><i class="fa fa-twitter"></i></a>
			<a target="_blank" href="https://stackoverflow.com/story/"><i class="fa fa-stack-overflow"></i></a>
			<a target="_blank" href="https://www.linkedin.com/in/kayub007"><i class="fa fa-linkedin"></i></a>
			<a target="_blank" href="https://medium.com/@kayub007"><i class="fa fa-medium"></i></a>
			<a target="_blank" href="https://www.freecodecamp.org/kayub007"><i class="fa fa-free-code-camp"></i></a>
			<a target="_blank" href="https://codepen.io/kayub007"><i class="fa fa-codepen"></i></a>
    </div>
	</main>
</body>
</html>