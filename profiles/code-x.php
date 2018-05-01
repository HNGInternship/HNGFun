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
  <a href="https://www.facebook.com/engrify"><i class="fab fa-facebook-square"></i></a>
  <a href="https://twitter.com/IfeanyiOghene"> <i class="fab fa-twitter-square"></i></a>
  <a href="https://www.instagram.com/davidify/"> <i class="fab fa-instagram"></i></a>
  <a href="https://github.com/DavidIfeanyichukwu"> <i class="fab fa-github-square"></i></a>
  </div>
  <div class="column">
<?php
$con=mysqli_connect("localhost","","","hng_fun");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT name,username,image_filename FROM interns_data";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    printf ("%s (%s)\n",$row[0],$row[1]);
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

?> 
  </div>
</div> 


</body>

</html>
