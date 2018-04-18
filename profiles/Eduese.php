<!Doctype html>
<html>
<head>
<title>Eduese's Profiles</title>
<meta charset= "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "patfon.css">
</head>
<body>

<style>

* {
    box-sizing: border-box;
}

.row::after {/* after each class insert some contents...*/
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 10px;
}

html, body{
    font-family: Verdana, Arial, "Lucida Sans", sans-serif;
	background-color:#9dd9eb;
}

h1, h2, h3{
	color:green;
	text-align:center;
}

p, h4{color:blue}

#wrapper{
	width: 80%;
	border: 1 1;
	margin: 0 10% 0 10%;
	padding:0 0% 0 0%; 
	background-color: #9dd9eb;
}

#mytxt{
	position: absolute;
	top: 20%;
	left: 0%;
	font-size: 1.5em;
	
}


/* For mobile phones: */
[class*="col-"] {
    width: 100%;
}


@media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 25%;}
    .col-2 {width: 75%;}
    }



</style>

<div id = "wrapper" class = "row">

<h2 >Eduese Profile Page</h2>

<div class="col-1">
<caption><h3>Meet Me:</h3></caption>
<h4><i>Welcome to my page, I am 

<?php 
$q = "SELECT name, username, image_filename  FROM interns_data  
		WHERE (username='Eduese')  ";
$result = mysqli_query($dbcon, $q); 


	if($result){
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		echo($row['name']);
		
		echo ' am a web developer. <br><br>
		I am so glad to have you here. Please do more to explore the site. <br><br>
		Meanwhile, my username on slack is  @'; 
		echo ($row['username']);
		echo ' <br><br>And the file name to the saved image is : ';
		echo ($row['image_filename']);
		
		}
	}
	
$p = "SELECT secret_word FROM secret_word ;";	
$result2 = mysqli_query($dbcon, $q); 

$secret_word = $row['secret_word'];
echo $secret_word;

?> 
	
	   <p>Thanks</i></p>
</h4>  

<caption><h1>MORE INFO</h1></caption>
<a href ="home.html" target= "_blank">Home</a><br><br> 
<a href ="projects.html" target= "_blank">Projects</a><br><br>   
<a href ="services.html" target= "_blank">Services</a><br><br>
<a href ="donations.php" target= "_blank">Donate</a><br><br>
<a href ="about_us.html" target ="_blank">About Us</a><br>  
</div>

<div id = "my_pics" class = "col-2">
<figure class = "allimage" id = "logo">
 width ="35%" height ="50%" ></figure></br>

</div> 
</div>

