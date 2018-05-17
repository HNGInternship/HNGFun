<!DOCTYPE html>

<html>
<head>
	<title>Hotelsng User Profile </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="./profilecss.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<h1> Hotelsng </br>User Profile for </br> Code-X

</h1>

 <div class="row">
  <div class="column">
  CONTENT1 </br>
  <a href="https://www.facebook.com/engrify"><i class="fab fa-facebook-square"></i></a>
  <a href="https://twitter.com/IfeanyiOghene"> <i class="fab fa-twitter-square"></i></a>
  <a href="https://www.instagram.com/davidify/"> <i class="fab fa-instagram"></i></a>
  <a href="https://github.com/DavidIfeanyichukwu"> <i class="fab fa-github-square"></i></a>
  </div>
  <div class="column">
<?php
$con=mysqli_connect("localhost","codex","MerCury@001","hng_fun");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT name,username,image_filename FROM interns_data ORDER BY name";

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
{
echo "  

      Name: $name

      Username: $username

  ";
}
mysqli_close($con);

?> 
  </div>
</div> 


</body>

</html>