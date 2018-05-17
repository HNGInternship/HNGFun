

<?php 

	

/*$result = $conn->query("SELECT * FROM secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("SELECT * FROM interns_data where username = 'johnugbor'");
$user = $result2->fetch(PDO::FETCH_ASSOC);  */

/////////////////////////////////////
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("SELECT * from interns_data where username = 'johnugbor'");
$user = $result2->fetch(PDO::FETCH_ASSOC);















//////////////////////////////////////////

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>John Ugbor's Profile</title>
 <style type="text/css">
   .bodydiv{ background-color: black; height: 100%}

  .profilepix{ text-align:center;  padding: 0px; background-color: violet; } 


  .profiledetails{   padding: 0px; background-color: gray; text-align:center; color: #ffffff;}

    .center{text-align: center; color: violet;}

  a{color: violet;}

.right{ margin-right: 20px; } 

.left{margin-left: 20px;}

 </style>
</head>
<body>


<div class="bodydiv"><div class="profilepix"><marquee loop="1"><h1 class="right">Nice to see you around here! You're welcome to my page </h1></marquee>

<img src="<?php echo $image_filename ;?>" alt ="johnugbor"></div><div class="profiledetails" ><h1 class="left"><h2><?php echo $name ;?> | Software Engineer|slack:@<?php echo $username ;?></h2></div>


<div class="center">
	
<a href="https://github.com/JohnLarry"><img src="http://res.cloudinary.com/johnlarry/image/upload/v1524821787/github.png"> Github </a>
	<a href="https://twitter.com/UgborJohn"><img src="http://res.cloudinary.com/johnlarry/image/upload/v1524820931/twitter.png"> @UgborJohn</a><a href="https://www.linkedin.com/in/johnugbor/"><img src="http://res.cloudinary.com/johnlarry/image/upload/v1524821802/linkedin-icon-logo-vector1.png">LinkedIn </a>
</div>

</div>

<script type="text/javascript"></script>
</body>
</html>