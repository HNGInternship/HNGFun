<?php
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
	<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>
	<title>Portfolio | Tobi Ayanwola</title>
	<style type="text/css">
	 @import url('https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans');

	#name-div::after{
		 content: "";


  opacity: 0.65;
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
    position: fixed;
	height: 100%;
	width: 100%;
	background-image : url(http://res.cloudinary.com/tobividz/image/upload/v1525350131/pexels-photo-273222.jpg);				
	}

			#name-div{
				


				font-family: "Serif" Monospace;
				font-weight: 500;
				align-items: bottom;
			}
			#about-div, #name-div, #abt-me-div{
				height: 100vh;
			}
			#name-div h1, #name-div h2{position: absolute;}
			#name-div h1{
				/*margin-top: 300px;*/
				text-align: right;
				font-size: 72px;
				font-family: "Lori";
				align-items: bottom;
				position: absolute;
				bottom: 10%;
				right: 10%;
			}
			#name-div h2{
				font-family: "Serif";
				font-size: 20px;
				position: absolute;
				bottom: 9%;
				bottom: 7%;
				right: 10%;
			}
		#abt-me-div{
			width: 100%;
			height: auto;
			margin:  auto;
			padding: 100px 100px 0 100px;
			background-color: rgba(239, 239, 239, 0.6);
		}
		#about-me{
			/*float: right;*/
			/*height: 110%;*/
			width: 110%;
			min-height: 400px;
			border-radius: 30%;
			background-color: white;
			align-items: center;
			margin-left: -20px;
		}
		#about-me p{
			margin: 30px 22px 20px 22px;
			font-size: 20px;
		}
		#pic{
			background-image: url();
			height: 80%;
			margin-top: 50px;
			margin-left: -20px;
			/*margin: 30px 20px 70px 30px;*/
		}
		#pic img{
			/*margin: 0px 70px 70px 30px;*/
			border-radius: 10px;
		}
		#contact{
			display: inline-block;
			background-color: #e4e4e4;
			padding:10px 0;
			width: 30%;
			font-size: 0.9em;
			border-radius: 20px;/*
			margin: 0 auto;*/
		}
		#contact,#contact a{
			text-decoration-line: none;
			text-align: center;
			display: block;
			vertical-align: middle;
		}
		#social-media{
			margin-top: 80px;


			width: 50%;
		}
		

		#social-media ul{
			display:inline-flex;
			text-decoration: none;
			list-style: none;

		}
		#social-media ul li a{
			color:#e4e4e4;
                         font-size: 30px;
                         text-decoration: none;
                         transition: all 0.4s ease-in-out;
                         width: 400px;
                         height: 30px;
                         line-height: 50px;
                         text-align: center;
                         margin:20px 30px 0 -40px;
                         vertical-align: middle;
                         position: relative;
                         color:black;
		}

		

	</style>

</head>
<body>
 	<?php   

	$username = "phil";
	$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
	$my_data = $data->fetch(PDO::FETCH_BOTH);

	$name = $my_data['name'];
	$src = $my_data[ 'image_filename' ];
	$username =$my_data['username'];
	?>
	<div class="ot oj-flex oj-flex-item oj-sm-only-flex-direction-column oj-md-only-flex-direction-column">
		<div id="name-div">
			<h1><?php echo $name;?></h1>
			<h2 >Software Engineer</h2>
		</div>
	</div>
	<div id="abt-me-div" align="center">
		<div class="ot oj-flex oj-flex-item oj-sm-only-flex-direction-column oj-md-only-flex-direction-column">
			<div class="oj-sm-flex-1 oj-xl-web-padding-top oj-sm-web-padding-bottom oj-md-down-web-padding-start oj-lg-padding-2x-start oj-sm-web-padding-end oj-xl-6 oj-flex-item ">
		   		<div id="pic" >
					<img onload="this.width/=(2.5);this.onload=null;" src= "<?php echo $src;?>"alt="<?php echo $name;?>">
				</div>
			</div>
    	<div class="oj-sm-flex-2  oj-xl-web-padding-bottom  oj-md-down-web-padding-start oj-lg-down-web-padding-end oj-xl-padding-2x-end oj-xl-6 oj-flex-item">
      		<div id="about-div">
				<div id="about-me">
					<div id="social-media">
						<ul>
							<li><a href="https://github.com/tobividz"><i class="fa fa-github"></i></a></li>
							<li> &nbsp&nbsp&nbsp&nbsp</li>
							<li><a href="https://twitter.com/hnginternship"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
					<p>Newbie programmer,student and eager learner. Seeking projects to collaboraytye, please feel free to contact me.</p>
    				<div id="contact" align="center">
						<a href="mailto:tobividz150@gmail.com">CONTACT</a>
					</div>                
  				</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
