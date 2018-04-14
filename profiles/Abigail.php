<?php
require '../db.php';
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Portfolio | Adeboga Abigail</title>
	<style type="text/css">
<<<<<<< HEAD
	#name-div::after{
=======
<<<<<<< HEAD
	#fst::after{
=======
	#name-div::after{
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
		 content: "";
 /* background: url(https://i.imgur.com/0EWDjqv.jpg);*/
  opacity: 0.35;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;  
   background-repeat: no-repeat;
    background-position: 50% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
<<<<<<< HEAD
=======
    position: fixed;
<<<<<<< HEAD
>>>>>>> be3fa7c29f997825de9ad279b33f11df3eb052fc
=======
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
		height: 100vh;
				width: 100%;
				background-image: url(http://res.cloudinary.com/bogadeji/image/upload/v1523633847/happy_x89ylu.jpg);
				/*opacity: 50%;*/
	}
<<<<<<< HEAD
			#name-div{
=======
<<<<<<< HEAD
			#fst{
=======
			#name-div{
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
				
				font-family: "Montserrat" Monospace;
				align-items: bottom;
			}
<<<<<<< HEAD
=======
<<<<<<< HEAD
			#container, #fst{
				height: 100vh;
			}
			#fst h1, #fst h4{position: absolute;}
			#fst h1{
=======
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
			#about-div, #name-div, #abt-me-div{
				height: 100vh;
			}
			#name-div h1, #name-div h4{position: absolute;}
			#name-div h1{
<<<<<<< HEAD
=======
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
				/*margin-top: 300px;*/
				text-align: right;
				font-size: 72px;
				font-family: "Lori";
				align-items: bottom;
				position: absolute;
				bottom: 10%;
				right: 10%;
			}
<<<<<<< HEAD
=======
<<<<<<< HEAD
			#fst h4{
				font-family: "Muli";
				font-size: 20px;
				position: absolute;
				bottom: 9%;
				right: 10%;
			}
		#main{
			width: 80%;
			margin:  auto;
			padding: 100px;
			height: 500px;
=======
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
			#name-div h4{
				font-family: "Muli";
				font-size: 20px;
				position: absolute;
				bottom: 9%;
				bottom: 7%;
				right: 10%;
			}
		#abt-me-div{
			width: 70%;
			margin:  auto;
			padding: 100px;
<<<<<<< HEAD
=======
			/*background-color: #bcd6d6;
			opacity: 0.2;*/
			background-color: rgba(239, 239, 239, 0.6);
<<<<<<< HEAD
>>>>>>> be3fa7c29f997825de9ad279b33f11df3eb052fc
=======
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
		}
		#about-me{
			width: 40%;
			float: right;
<<<<<<< HEAD
			height: 80%;
=======
<<<<<<< HEAD
			height: 90%;
=======
			height: 80%;
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
			border-radius: 50%;
			background-color: white;
			align-items: center;
		}
		#about-me p{
			margin: 110px 22px 20px 22px;
			font-size: 20px;
		}
		#pic{
			background-image: url();
			width: 35%;
			float: left;
			height: 80%;
<<<<<<< HEAD
<<<<<<< HEAD
			margin: 30px 30px 70px 30px;
=======
			margin: 30px 70px 70px 60px;
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
		}
		#pic img{
			margin: 0px 70px 70px 30px;
=======
			/*margin: 30px 30px 70px 30px;*/
		}
		#pic img{
			/*margin: 0px 70px 70px 30px;*/
<<<<<<< HEAD
>>>>>>> be3fa7c29f997825de9ad279b33f11df3eb052fc
=======
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
			border-radius: 10px;
		}
		#contact{
			display: inline-block;
			background-color: #e4e4e4;
			padding:10px 0;
<<<<<<< HEAD
			width: 35%;
=======
<<<<<<< HEAD
			width: 30%;
=======
			width: 35%;
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
			border-radius: 50px;
			margin: 0 auto;
		}
		#contact,#contact a{
			text-decoration-line: none;
			text-align: center;
			display: block;
			vertical-align: middle;
		}
		#social-media{
			margin: auto;
		}
		#social-media ul, #social-media ul li{
			display:inline-flex;
			text-decoration: none;

		}
		#social-media ul li a{
			color:#e4e4e4;
                         font-size: 30px;
                         text-decoration: none;
                         transition: all 0.4s ease-in-out;
                         width: 30px;
                         height: 30px;
                         line-height: 50px;
                         text-align: center;
                         vertical-align: middle;
                         position: relative;
		}
	</style>
</head>
<body>
<<<<<<< HEAD
=======
<<<<<<< HEAD
	<?php
	$username = "Abigail";
	$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);

$name = $my_data['name'];
$src = $my_data['image_filename'];
$username =$my_data['username'];
?>
	<div id="fst">
		<h1><?php echo $name;?></h1>
		<h4>FULL STACK DEVELOPER | WRITER</h4>
	</div>
	<div id="container">
<div id="main" align="center">
=======
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
 	<?php
	$username = "Abigail";
	$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
	$my_data = $data->fetch(PDO::FETCH_BOTH);

	$name = $my_data['name'];
	$src = $my_data['image_filename'];
	$username =$my_data['username'];
?>
	<div id="name-div">
		<h1><?php echo $name;?></h1>
		<h4>FULL STACK DEVELOPER | WRITER</h4>
	</div>
	<div id="about-div">
<div id="abt-me-div" align="center">
<<<<<<< HEAD
=======
>>>>>>> 41423abe05c9e89fb255c09678a8779decd2c470
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
	<div id="about-me">
		<p>I am a junior web developer with experience with HTML, CSS, JavaScript, Bootstrap and PHP. My love for words and solving problems brought me to the world of writing and coding(which I choose to acknowledge as writing). Want to chat, collaborate or hire me on a project, please feel free to contact me.</p>
		<div id="contact" align="center"><a href="mailto:animashaunoluwatosin7@gmail.com">CONTACT ME</a></div>

			<div id="social-media">
				<ul>

				<li><a href="https://github.com/bogadeji"><i class="fa fa-github"></i></a></li>
				<li><a href="https://twitter.com/AdebogaAbigail"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://medium.com/@bogadeji"><i class="fa fa-medium"></i></a></li>
				<li><a href="https://web.facebook.com/olufadejimi"><i class="fa fa-facebook"></i></a>	</li>
				<li><a href="https://www.instagram.com/bogadeji/"><i class="fa fa-instagram"></i></a></li>
                </ul>
			</div>

                          
	</div>
	<div id="pic" ><img onload="this.width/=(2.5);this.onload=null;" src= "<?php echo $src;?>"alt="<?php echo $name;?>"></div>
</div>
</div>

</body>
</html>