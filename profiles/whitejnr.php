<?php


//require_once '../../config.php';


try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}


try{
 $sql = 'SELECT * FROM secret_word';
 $q = $conn->query($sql);
 $q->setFetchMode(PDO::FETCH_ASSOC);
 $data = $q->fetch();
 $secret_word= $data['secret_word'];
} catch (PDOException $e){
     throw $e;
 }


$result2 = $conn->query("Select * from interns_data where username = 'whitejnr'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html>
<head>
	<title>HNG Internship</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
div{
	background-color:#aed;
	height: 150px;
	margin-right: 20%
}
img{
	height: 200px;
	margin-left: -1%;
	width: 200px;
	border-radius: 80%;
	border: solid white 7px;
	margin-top: 35px;
	margin-right: 200px;
	margin-bottom: 20px
}
body{
	background-color: #aed;
	
	text-align: center;

}
p{font-size: 30px;
text-align: center;
margin-right: 20%}
.bot{
	background-color: white;
    margin-left: 70%;
    height: 400px; 
    width: 25%;
    margin-top: 3%;
    border-radius: 20px
}
.pro{
	font-size: 18px;
	color: red;

}
.prof{
	font-size: 25px;
	color: red;
}

</style>
</head>

<body>
	<div>
		<p>HNG INTERNSHIP 4</p>
		<img src="jasper.jpg">
		<p class="pro"><em>My name is <strong>Ndifreke Emmanuel Okon</strong>,one of the interns at <strong>HNG INTERNSHIP 4</strong></em</p>
		<p class="prof">An upcoming Web Developer and Designer. i also love singing, playing football and computer games</p>
    <div>
		 <a href="https://www.facebook.com/ndifreke.okon.7121" target="_blank"><i class="fa fa-facebook-square" style="font-size:40px;color:gray"></i></a>
	     <a href="https://www.instagram.com/ndifrekeemman/" target="_blank"><i class="fa fa-instagram" style="font-size:40px;color:gray;margin-left:20px"></i></a>
	     <a href="https://bit.ly/2wLSdPR" target="_blank"><i class="fa fa-slack" style="font-size:40px;color:gray;margin-left:20px"></i>
	</div>




		</div>
<div class="bot"></div>



</body>

</html>
