
<?php
    try {
          $query = $conn->query("SELECT * FROM secret_word");
          $result = $query->fetch(PDO::FETCH_ASSOC);
          $secret_word = $result['secret_word'];
          $username = "Peculiar";
          $fullname = "Peculiar Ediomo-Abasi";
          $image = "http://res.cloudinary.com/pediomo/image/upload/v1516201515/pecu_lhdpbt.jpg";
          $query = $conn->query("SELECT * FROM interns_data where username='$username' limit 1");
          while($result = $query->fetch(PDO::FETCH_ASSOC)){
              $fullname = $result['name'];
              $image = $result['image_filename'];
          }
      } 
  catch (PDOException $event) {
          throw $event;
  }
    //echo $secret_word;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Peculiar's Profile Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  	<style type="text/css">
  		body{
  			background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url("http://res.cloudinary.com/pediomo/image/upload/v1516201515/pecu_lhdpbt.jpg");
			height: 600px;
			background-size: cover;
			margin: 0;
  		}
  		ul {
		    list-style-type: none;
		    margin: 0;
		    padding: 3em 2em 3em 2em;
		    overflow: hidden;
		    background-color: transparent;
		    position: relative;
		}
		li {
		    float: left;
		}
		li a {
		    display: block;
		    color: #fff;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}
		li a:hover:not(.active) {
		    background-color: #121;
		}
		.active {
		    background-color: blue;
		}
			@media screen and (max-width: 600px){
	    	ul.topnav li.right, 
	    	ul.topnav li {float: none;}
		}
		.nav-title{
			font-size: 30px;
			font-family: courier;
		}
		img {
		    border: 5px solid #fff;
		    border-radius: 4px;
		    padding: 0px;
		    width: 350px;
		    float: right;
		    margin-right: 8em;
		}
		img:hover {
		    box-shadow: 2px 0px 4px 3px #fff;
		}
		.body-text{
			margin-left: 8em;
		}
		p{
			color: #fff;
			font-size: 25px;
		}
		
  	</style>
</head>
<body>
	<!-- navbar -->
	<ul>
	    <li class="nav-title"><a href="#home">Peculiar</a></li>
	    <li style="float:right"><a href="#news">Contact</a></li>
	    <li style="float:right"><a href="#contact">Projects</a></li>
	    <li style="float:right"><a class="active" href="#about">About</a></li>
	</ul>

    <!-- body -->
    <img src="http://res.cloudinary.com/pediomo/image/upload/v1516201515/pecu_lhdpbt.jpg" alt="Forest" style="width:350px">

	<div class="body-text">
		<p style="font-size: 50px">Helloooo, I am<br>
	   	<span style="font-size: 75px; color: red"><a href="https://medium.com/@peculiarediomoabasi" target="_blank" style="text-decoration: none; color: pink;">Peculiar Ediomo-Abasi</a></span></p>
	    <p>
	    	I am basically an explorer.<br> 
	    	Most times I know what I am doing,<br>
	    	but sometimes; I honestly do not know.<br>
        That's when I ask heavy questions.<br>
        
	    </p>
	    <small style="color: white;">
			<em>[Click on my name to follow me on Medium]</em>
		</small>
	</div>
	<br>


</body>
</html>
