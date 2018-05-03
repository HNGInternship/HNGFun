<?php
 require 'db.php';
$username = "mikkybang";
 
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
	<title>Michael Efemena</title>
    <style type="text/css">

    body {
        color: floralwhite;
        height: 100%;
    }

  img{
      border-radius: 50%;
  }


   .profile{
       background-color: #cd84f1;
   } 

  .chatbot{
      background-color: #4b4b4b;
      background-size: cover;
      height: 100%;
  }



  /* start social icon */
.social-icon
	{
		position: relative;
		padding: 0;
		margin: 0;
	}
.social-icon h4
	{
		display: inline-block;
		padding-right: 20px;
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
		color: #fff;
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


    </style>

    </head>

    <body>

        <div>
            <!--Profile area-->
        <div class="col-md-7 profile">
       
            <img class="pic" src="http://res.cloudinary.com/mikkybang/image/upload/c_scale,h_387/v1524318803/me.jpg">

         
            <h2>Hi welcome to my page </br></br>
                I am <?php echo $result["name"]; ?> </h2>
        </br>
        <h3>I am a Technology Enthusiast and a Computer Engineering student...</h3>

            <ul class="social-icon">
                    <li><h4>FEEL FREE TO FOLLOW ME ON MY SOCIAL MEDIA HANDLES</h4></li>
                    <li><a href="https://web.facebook.com/michael.efemena" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/Mikky_bang" class="fa fa-twitter"></a></li>
                    <li><a href="http://www.github.com/mikkybang" class="fa fa-github"></a></li>
                    <li><a href="http://www.linkedin.com/in/michael-efemena" class="fa fa-linkedin"></a></li>
                    <li><a href="https://www.youtube.com/channel/UC4yzoGuKkCL_8FzI-B-x83A" class="fa fa-instagram"></a></li>
                </ul>
                </div>
    <!--chat bot area-->
    <div class="col-md-5 chatbot">
        <span style="height:100%;"></span>
    </div>

</div>
    </body>
   </html>