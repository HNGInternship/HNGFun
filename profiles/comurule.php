<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'comurule'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title> Comurule Project </title>
   
   <meta name="viewport"
         content= "width=device-width,initial-scale=1";>

   

   <style type="text/css">
   	*{
   	   box-sizing: border-box;   	}

   	   /*style of body*/
   	   body {
   	   	background-color:rgb(100,100,255);
   	   	border: 10px;
   	   	color: white;
        padding: 20px
   	   	
   	   }

   	   

   </style>
         
  </head>

  <body>
    <div style="width: 60vw; height: 60%; background-color: rgba(240, 240, 240, 180); box-shadow: 5px, solid; padding: 0px; position: middle;">
    	<div style="width: 20vw; height: 90%; float: left;"> 
    		<img src="http://res.cloudinary.com/comurule/image/upload/v1524716649/IMAG0270.jpg" style="width: 100%; height: 50%;">
    		<h4 style="text-align: center; color: rgba(255,60,60); text-shadow: 5px; ">Umechukwu Chibuike</h4>
    	</div>
    <div style="width: 39.6vw; height: 38vw; background-color: rgba(200, 200, 240, 90); float: right; color: black; padding: 20px">
    	I'm an aspiring Full-stack web developer.
    	
    </div>


    </div>
  </body>
</html>
