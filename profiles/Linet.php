<<<<<<< HEAD
 <?php
    require 'db.php';
    $sql = "Select * from secret_word LIMIT 1";
    $result = $conn->query($sql);
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
    
    $result2 = $conn->query("Select * from interns_data where username = 'I am Linet, my userename.php is Linet.php.'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
    
    
          <div class="Linet profile-wrap">
<div class="about">
	<?php if (empty($Linet)): ?>
	<span>what's wrong</SPand>
	<?php else: ?>
	<br/><br/><br/>
	
	<div class="photo-wrap">
		<img src="<?php echo $Linet['image_filename']; ?>" alt="" width="300" height="300" />
	</div>
	
	<h3>HNG INTERNSHIP 4.0 #STAGE3 TASK</h3>
	<h2><?php echo $Linet['name']; ?></h2>
	
	<?php endif; ?>
</div>
</div>
=======
<!DOCTYPE html>
<html>
 
    <head>
         <meta charset ="utf-8" />
    <title> Linet profile </title>
    
    </head>
    <style type="text/css">
         body{
                   background: #FFFFFF center 0px; 
			       width:		100%;
			       height:  	100%;
         
         }
#container
       {
			width: 80%;
			margin: 2em auto;
			background: white;
			position: relative;
     }
#picture_space
      {
            width: 343px;
			height: 260px;
			border-radius: 25px;
			border: 2px solid #ffffff;
			position: center;
			background: url (cl_image_tag("Image_20180331_000111.png", array("background"=>"#000000")));
			background-repeat: no-repeat;
          
      
      
      }
      .information
      {
            font-family: 'Open Sans', sans-serif;
			background: #000000;
			width: 60%;
			line-height: 1.8;
			padding: 10%;
			text-align: center;
			color: white;
			border-radius: 25px;
			border: 2px solid #ffffff;
      }
</style>
      <?php
    require 'db.php';
    $sql = "Select * from secret_word LIMIT 1";
    $result = $conn->query($sql);
    $res = $result->fetch(PDO::FETCH_ASSOC);
    $secret_word = $res['secret_word'];
    
    $result2 = $conn->query("Select * from interns_data where username = 'Linet'");
    $user = $result2->fetch(PDO::FETCH_ASSOC);
    ?>
         <body>
		<div id = "container" align="center">
			<div id="picture_space">
				
			</div>
    
    
          <div class="information">

	
	<span>Username: <?php echo $user['username']; ?></span><br>
	<span>Full Name: <?php echo $user['name']; ?></span>
	<br/>
	
	
	`$secretWordRow = $secret_word;`

</div>
  </body>
</html>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
