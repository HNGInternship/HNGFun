<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Onwubiko, Chibuike U.</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

		<style>
*{
box-sizing: border-box !important;
}		
body{
margin: 0 !important;
padding: 0 !important;
}
a{
color: rgba(0,0,0,1);
}
.myimage{
border-radius: 50%;
display: block;
margin: auto;
}
main{
margin: 0 !important;
padding: 0 !important;
}
p,ul,h4,a{
text-align:center;
list-style-type:none;
color:rgba(0,0,0,1);
text-decoration: none !important;
justify-content: center;
}
i{
font-size:30px;
margin:5px;
padding:5px;
}
.design{
background-color: rgba(102,51,153,0.5);
margin: 0.5em;
padding: 0.5em;
border-radius: 5px;
justify-content: center;
}
/*layout*/
@media only screen and (min-width: 768px)
{
.main{
display: flex;
flex-flow: row-wrap;
width: 100%;
}
.contact{
display:flex;
flex: 1;
justify-content: center;
}
.me{
flex-flow: row wrap;
flex: 1;
width: 30%;
order: -1;
}
.skill{
flex-flow: row wrap;
flex: 1;
width: 30%;
order: 0;
}
.image{
flex-flow: row wrap;
flex: 1;
width: 30%;
}
}
    </style>
	</head>
	<body>
	
		<main>
 <?php 
 try { 
 //$pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=hng_fun;
 //charset=utf8', 'root', ''); 
// $pdo->setAttribute(PDO::ATTR_ERRMODE, 
 PDO::ERRMODE_EXCEPTION); 
 $sql = "SELECT * FROM interns_data WHERE username = 'Prince-Curie' LIMIT 1"; 
 $result = $pdo->query($sql);
 foreach ($result as $row) {
 # code...
 $name = $row['name'];
 $username = $row['username'];
 $image_filename = $row['image_filename'];
 }
 
 $sql = 'SELECT * FROM secret_word LIMIT 1'; 
 $result2 = $pdo->query($sql);
foreach ($result2 as $row) { 			
               # code... 			
                $secret_word = $row['secret_word']; }
  
 $output = 'Database connection established.'; } 
 catch (PDOException $e) 
 { $output = 'Unable to connect to the database server: ' . 
 $e->getMessage() . ' in ' . 
 $e->getFile() . ':' . 
 $e->getLine(); } 
 ?>
 
			<div class="main"> 
			<div class="image design" >
			 		<h4>
			 		<?php
			 		echo $name;
			 		?>
			 		</h4>
			 		<p> 
			 			<?php
			 			echo $username;
			 			?>
			 		</p>
					<img class="myimage" 
					src="<?php
							echo $image_filename;
							?>
					" alt="a picture of chibuike"
					srcset="http://res.cloudinary.com/prince-curie/image/upload/c_scale,q_100,w_200/v1522472475/chibuike_msblqx.jpg 1x,
					http://res.cloudinary.com/prince-curie/image/upload/v1522472475/chibuike_msblqx.jpg 2x,
					http://res.cloudinary.com/prince-curie/image/upload/v1522472475/chibuike_msblqx.jpg 3x">
				</div>
				<div class="me design" >
					<p>I am a budding frontend web developer who likes to learn and loves to write codes, always practicing, loves responsive and interactive designs, traveling and meeting with people.</p>
				</div>
				<div class="skill design">
					<ul>
					<li>I use</li>
						
							<li>html</li>
							<li>css</li>
							<li>bootstrap</li>
                            
						</ul>
				</div>
			</div>
	
		
		<div class="contact design">

			<p> 
			<a href="mailto:prince.chibuike@gmail.com" alt="Chibuike's email link"> <i class="material-icons">&#xE0BE;</i> </a>
			<a href="tel:+2348165058399" alt="Chibuike's phone number"> <i class="material-icons">&#xE0B0;</i></a>
			<a target="_blank" href="https://www.facebook.com/chibuike.onwubiko" alt="Chibuike's facebook account"> <i class="fab fa-facebook"></i> </a>
			<a target="_blank" href="https://www.twitter.com/Thisischibuike" alt="Chibuike's twitter account"> <i class="fab fa-twitter"></i> </a>
			<a target="_blank" href="https://www.github.com/prince-curie" alt="Chibuike's github page"> <i class="fab fa-github"></i> </a>
			</p>
			</div>
			
			</main>
</body>
</html>