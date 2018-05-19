<!DOCTYPE html>

<html>
<head>
	<title>Hotelsng User Profile </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style> 
	p {
	font-size: 12px;
	font-family: Ubuntu;
	color: #ececec;
	text-align: center;
}
h1 {
	font-size: 50px;
	font-family: Ubuntu;
	color: #ececec;
	background: #000000;
	text-align: center;
}
h3 {
	font-size: 15px;
	font-family: Ubuntu;
	color: #FFFF00;
	background: #000000;
	text-align: center;
}

a {
	text-align: center;
}

.row {
	background: #ececec;
	font-family: Ubuntu;
	font-weight: bold;
	width: 500px;
	margin-right: auto;
	margin-left: auto;

}

@font-face {
      font-family: 'FontAwesome';
      src: url('../font/fontawesome-webfont.eot');
    }
.column {
    float: left;
    width: 50%;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
	</style>
</head>
<body>
  
<h1> Hotelsng </br>User Profile for </br> Code-X

</h1>

 <div class="row">
  <div class="column">
<img src="http://res.cloudinary.com/code-x/image/upload/v1525118313/code-x.jpg" alt="Ndueze Ifeanyi Code-X" width="250" height="250">
</br>
<h3>Ndueze Ifeanyi David (Code-X) </br> Web Apps || Mobile Apps </h3>
  <a href="https://www.facebook.com/engrify"><i class="fa fa-facebook-official  fa-3x" aria-hidden="true"></i></a>
  <a href="https://twitter.com/IfeanyiOghene"> <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
  <a href="https://www.instagram.com/davidify/"> <i class="fa fa-instagram fa-3x" aria-hidden="true"></i></i></a>
  <a href="https://github.com/DavidIfeanyichukwu"> <i class="fa fa-github fa-3x" aria-hidden="true"></i></a>
  </div>
  <div class="column">
<?php
  //require '../db.php';
  $res = $conn->query("SELECT * FROM  interns_data WHERE username = 'code-x' ");
  $row = $res->fetch(PDO::FETCH_BOTH);
  $name = $row['name'];
  $img = $row['image_filename'];
  $username =$row['username'];



  $res1 = $conn->query("SELECT * FROM secret_word");
  $res2 = $res1->fetch(PDO::FETCH_ASSOC);
  $secret_word = $res2['secret_word'];
?>
  </div>
</div> 


</body>

</html>