<?php
$result = $conn->query("SELECT * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'ogopedia'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Ogopedia's Profile</title>
	<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
	<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,500,300,200,700);
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,200,700);

html{
	-webkit-font-smoothing: antialiased;
	overflow-x: hidden;
}

body {
	font-family: 'Montserrat';
	overflow-x: hidden;
	font-size: 12px; 
	color: #e9eaee;
	background: url('https://res.cloudinary.com/ogopedia/image/upload/v1525665782/bg.png');
    margin: 0;
    padding: 0;
}

.site-bg {
    z-index: 1;
    display: block;
    width: 100%;
    background-position: top;
    background-repeat: no-repeat;
    background-size: inherit;
}

#site-main {
    padding: 70px 70px 0px 50px;
}

header {
    color: #fff;
    font-weight: 200;
    font-size: 40px;
}

header .logo {
    width: 100px;
    background: rgba(255, 255, 255, 0.9);
    padding: 12px;
    border-radius: 4px;
}

header .menu {
    width: 50px;
    float: right;
}

img.circle {
    width: 54%;
    position: absolute;
    left: 50%;
    margin-left: -27%;
    margin-top: -27%;
    bottom: 0%;
}

img.ogo {
    width: 70%;
    position: absolute;
    left: 55%;
    margin-left: -35%;
    margin-top: -375px;
    bottom: 0%;
}

.apa-otun {
    float: right;
    padding-top: 20%;
}

.apa-otun ul {
    list-style-type:none;
}

img.social {
    width: 50px;
    padding-bottom: 20px;
}

.apa-osi {
    width: 65%;
    float: left;
    mix-blend-mode: exclusion;
}

h1 {
    font-size: 70px;
    line-height: 80px;
    font-weight: 500;
    max-width: 100px;
    padding-top: 55%;
    font-family: 'Montserrat';
    color: #e9eaee;
}

p {
    font-family: 'Roboto';
    font-size: 50px;
    font-weight: 100;
    line-height: normal;
    margin: 0;
    letter-spacing: 1px;
}

@media(max-width: 999px) {
    .apa-osi {
        text-align: center;
        float: none;
        width: auto;
    }

    .apa-otun {
        float: none;
        text-align: center;
        padding-top: 20px;
        mix-blend-mode: difference;
    }

    h1 {
        padding-top: 0;
        max-width: none;
    }

    ul.social-icons {
        display: -webkit-inline-box;
        padding: 0px;
    }

    ul.social-icons li {
        padding: 10px;
    }

    img.circle {
    width: 30%;
    margin-left: -15%;
    margin-right: -15%;
    }

    img.ogo {
    width: 40%;
    margin-left: -20%;
    margin-right: -20%;
    left: 52%;
    }
}

	.social-icons i.fa {
    color: #fff;
    font-size: 55px;
    padding-bottom: 20px;
	}

	.social-icons i:hover {
    color: #b3b8ce;
    transition: color 300ms;
	}

    .container {
        max-width: 100% !important;
    }

    @media (min-width: 1200px){}
    .container {
    max-width: 100% !important;
}

#mainNav .navbar-toggler {
    color: #e9eaee;
    border-color: #e9eaee;
}

.navbar-light .navbar-nav .nav-link {
    color: #e9eaee;
}

#mainNav .navbar-brand {
    color: #e9eaee;
}

.bg-primary {
    background: transparent !important;
    border-bottom: 1px solid rgba(233, 234, 238, 0.1) !important;
}

footer {
    display: none !important;
}

	</style>
</head>
<body class="site-bg">
	<div class="thats-me">
	<img class="circle" src="https://res.cloudinary.com/ogopedia/image/upload/v1525665781/circle.png">
	<img class="ogo" src="https://res.cloudinary.com/ogopedia/image/upload/v1525665786/ogo.png">
	</div>
	<div id="site-main">
		<header>
<!-- 				<a href="./"><img class="logo" src="../img/logo.png" alt="logo"></a>
			<div class="menu">
				<a href="#."><img class="menu" src="https://res.cloudinary.com/ogopedia/image/upload/v1525665779/menu.png" alt="menu"></a>
			</div> -->
		</header>

		<div class="apa-osi">
			<h1>Ojewale Ogoluwa</h1>
			<p>ui/ux designer</p>
		</div>

		<div class="apa-otun">
			<ul class="social-icons">
			  <li><a href="https://github.com/ogopedia"><i class="fa fa-github"></i></a></li>
			  <li><a href="https://twitter.com/ogopedia"><i class="fa fa-twitter"></i></a></li>
			  <li><a href="https://linkedin.com/in/ogoluwaojewale"><i class="fa fa-linkedin"></i></a></li>
			  <li><a href="https://facebook.com/ogopedia"><i class="fa fa-facebook"></i></a></li>
			</ul>
		</div>

	</div>
</body>
</html>