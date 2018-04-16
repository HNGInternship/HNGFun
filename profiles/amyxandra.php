<?php
	
	if(!defined('DB_USER')){
		require "../config.php";
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$my_secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "amyxandra";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];	
			$image_filename = $row['image_filename'];	
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>

<!Doctype html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<style>
body{
	background-color:#fbfbfb;
}
.my_profile{
	width:80%;
	padding:20px;
	background-color:;
	margin:0 auto;
}
.img-card{
	padding:20px;
	background:linear-gradient(#00fff3, #ff00eb);
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	border-radius:15px;
	
}
.card-info{
	margin:0 auto;
}
.profile ul li{
	color:white;
	font-size:16px;
	list-style:none;
	margin:3px;
	padding:3px;
	font-weight:bold;
}
.profile ul li span{
	font-size:14px;
	font-weight:normal;
}
.socials{
	text-align:center;
}
.socials h5{
	color:#FFFFFF;
	font-size:20px;
}
.socials p a i{
	font-size:20px;
	color:white;
}
.socials p a i:hover{
	border: 2px solid #ffffff;
	font-size:25px;
    box-shadow: 0 4px 15px 0 rgba(255, 255, 255, 0.4), 0 12px 30px 0 rgba(255, 255, 255, 0.39);
	padding:6px;
	border-radius:10px;
}
.socials p a {
	padding:6px;
}
.details{
	box-shadow: 0 4px 8px 0 rgb(74, 180, 240, 0.3), 0 6px 20px 0 rgb(193, 61, 236, 0.6);
	border-radius:15px;
	margin-left:25px;
	padding:20px;

}
.details h4{
	background-color:f4f4f4;
	font-weight:bold;
	border-bottom: 2px solid rgb(193, 61, 236);
}
.details button{
	margin:0 auto;
	font: 18px bold;
	padding:8px 30px;
	border-radius:15px;
	background-color: rgb(74, 180, 240);
	box-shadow: 0 4px 15px 0 rgba(255, 255, 255, 0.4), 0 12px 30px 0 rgba(255, 255, 255, 0.29);
	border:none;
	color:white;

}
.details button:hover{
	background: linear-gradient(#00fff3, #ff00eb);
}

</style>
</head>

<body>
<div class="my_profile">

<div class="row">

<div class="col-md-4 col-sm-12 col-xs-12 img-card">
<div class="card-info">
<div>
<img src=" <?php echo $image_filename; ?>" class="img-circle img-responsive" alt="@AmyXandra" style="margin:0 auto;" width="170px">
</div>

<div class="profile">
<ul>
<li>Name: <span>
<?php echo $name; ?>
</span></li>
<li>Username: <span>@AmyXandra</span></li>
<li>Phone: <span>08162027522</span></li>
<li>Email: <span>amyabafor013@gmail.com</span></li>
</ul>
</div>
<br>
<div class="socials">
<h5>Connect with me!</h5>
<p><a href="https://web.facebook.com/amy.abafor"><i class="fab fa-facebook-f"></i></a> <a href="https://github.com/AmyXandra"><i class="fab fa-github"></i></a> <a href="https://www.linkedin.com/in/amy-abafor-00116a151/"><i class="fab fa-linkedin-in"></i></a></p>
<br>

</div>


</div>
</div><!--img-card div closes-->

<div class="col-md-8 col-sm-12 col-xs-12 ">
<div class="details">
<h4>Details</h4>
<br>
<div>

<h5>Hi, I'm Abafor Amalachukwu. I am an intermediate frontend developer in the HNG 2018 May internship. I am a tech lover and I believe Software is the future of Africa</h5>
<br>
<h5>I am a graduate of Electronic Engineering department, University of Nigeria, Nsukka (UNN) with a B.Eng title among my accolades</h5>
<h5>When I'm not writing code, debugging or reading and learning about code, I like to watch TV. Action movies are my favourite and also fashion channels.
I also read novels and like to hangout with my friends. I like anywhere nature is at its finest. I like the beach, nature parks and resorts, the hills and waterfalls.
I love nature and beauty. It makes me think about God.</h5>
<br>
<h5>This is the beginning of this internship and I hope to be here till the end. It's been an amazing learning process so far.</h5>
<h5 style="text-align:center;">Thanks for reading. Click the button below to get a <b>Shout Out!</b></h5>
<br>
<div style="text-align:center;">
<button style="box-shadow: 0 4px 15px 0 rgba(255, 255, 255, 0.4), 0 12px 30px 0 rgba(255, 255, 255, 0.29);">Click Here!</button>
</div>
<br><br>
</div>
<?php 
echo $my_secret_word
?>
</div>
</div><!--col-md-8 div closes-->


</div><!--row div closes-->


</div><!--my_profile div closes-->

<script>
 $('.button').click(function() {

 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });
	</script>
</body>
</html>