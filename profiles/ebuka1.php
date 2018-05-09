
<?php
 require 'db.php';
$username = "ebuka1";
 
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sql2 = "SELECT * FROM `secret_word` LIMIT 1";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $conn->prepare($sql2);
$query2->execute();
$data = $query2->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

?>



<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>ARINZE EMMANUEL EBUKA</title>
    <style type="text/css">

body{
	color:#3498db;
}
   .profile{
margin-top:100px;
   } 

img{
max-width: 100%;
height: auto;
display: block;
margin-bottom:75px;
margin-top:75px;

}

  /* start social icon */
.social-icon
	{
		position: relative;
		padding: 0;
		margin: 0
		margin-top:50px;
	}

.social-icon li
	{
		display: inline-block;
		list-style: none;
	}
.social-icon li a
	{
		border: 1px solid #fff;
		border-radius: 2px;
		color: black;
		width: 40px;
		height: 40px;
		line-height: 40px;
		text-align: center;
		text-decoration: none;
		-webkit-transition: all 0.4s ease-in-out;
		        transition: all 0.4s ease-in-out;
		margin-right: 10px;
	}
.social-icon li a:hover
	{
		background: #7efff5;
		border-color: transparent;
	}
/* end social icon */

.skills{
margin-top:75px;
font-size:20px;
}


    </style>

    </head>

    <body>
<div class="container-fluid">
     <div class="row" style="background-color: aquamarine; padding: 0"> 
       <div>
        <div class= "col-sm-8 col-sm-offset-1 profile">
            <!--Profile area-->
              <h1><?php echo $result["name"]; ?> </h1>
              <img src="http://res.cloudinary.com/dtvcmcdnu/image/upload/c_scale,h_450/v1525817213/IMG_20171129_135056_922.jpg"  class="img-circle img-responsive" alt="" /> 
              <h2>Web Developer </h2> 
              <ul class="skills">
                <h2>Skills:</h2>
                    <li><h3>Constantly learning and improving</h1></li>
                    <li><h3>keeping up to date with the industry</h1></li>
                    <li><h3>Being able to manage time and prioritize</h3></li>
                    <li><h3>Proper mmunication</h3></li>
                    <li><h3>Efficient in some programming languages</h3></li>
                </ul>
                <ul class="social-icon">
                    <li><a href="https://web.facebook.com/ebuka.arinze" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/ebuka_arinze" class="fa fa-twitter"></a></li>
                    <li><a href="https://github.com/ebukaarinze" class="fa fa-github"></a></li>
                    <li><a href="https://www.instagram.com/ebuka_arinze/" class="fa fa-instagram"></a></li>
                </ul>
           </div>
       <div class="col-sm-3 gray-background" style="background-color: rebeccapurple;padding: 10px;color:#fff"> 
            <div class= "col-xs-4 chatbot" >
              <span> </span>
   
            <!--chatbot area-->
             </div>
       </div>
</div>
</div>
</div>
    </body>
   </html>
