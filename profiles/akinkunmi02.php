<?php
   try {  //query to select intern data
    $myname = "SELECT * FROM interns_data WHERE username='Akinkunmi02'" ; 
    $q = $conn->query($myname);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $name=$data['name'];
    $username=$data['username'];
   // $user_pic=$data['image_filename'];
} 
catch (PDOException $e) {

    throw $e;
} 
 try {  //query to get secret word
    $word = "SELECT * FROM secret_word" ; 
    $q = $conn->query($word);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word=$data['secret_word'];
   
}

catch (PDOException $e) {

    throw $e;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Akinkunmio2</title>
	<style type="text/css">
		.content{
			 max-width: 800px;
			 margin: auto;
			 height: 800px;
			 border-radius: 25px;
			 padding: 20px;
			 border: 2px solid #73AD21;
			 word-wrap: break-word;
		}
		#name{
			color: #73AD21;
			top: 280px;
			position: absolute;
			left: 50%;  
	        transform: translate(-50%, -50%) 
		}
		hr{
			border: 1px solid #73AD21;
			top: 330px;
			position: absolute;
			width:  750px;
			margin: auto;
		}
		.img{
					
			 position: absolute;
			 top: 150px;
	        left: 50%;  
	        transform: translate(-50%, -50%) 
	       	
		}
		#circle{
			border-radius: 50%;
			border: 2px solid #73AD21;
				
		}
		.info{
			position: absolute;
			top: 185px;
			
			
		}
		#details{
			top: 320px;
			position: absolute;
			word-wrap: break-word;

		}
		span{
			color: #73AD21;
		}


	</style>

</head>
<body>

	<div class="content">
	<div class="img"> 
	<img src="https://res.cloudinary.com/akinkunmi02/image/upload/v1524778700/IMG_20180205_121443.jpg" height="150" width="150px" id="circle">
	</div>
		<div id="name"><h3>
		<?php
		echo "Name: ".$name . "<br>";
		echo "Username: ".$username . "<br>";
		?></h3></div>	
		<hr/>
		
		<div id="details">
		<p><span>About me :</span> I am Akinkunmi. A native of Ibadan Oyo state. A 400L student of the <br/> prestigious University of Ibadan.</p>
		<p><span>Skills :</span>
		<ul>
			<li>Andriod Development</li>
			<li>Web Development</li>
			<li>CCTV,LAN and Intercom Installation and maintenance</li>
			<li>Public Speaking</li>
		</ul>
		</p>
		<p><span>Goals :</span> To strive to always be among the best. Make friends, have a great family life <br/> and travel around the world</p>
		</div>

	</div>

	</body>
</html>


