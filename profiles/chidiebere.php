<!DOCTYPE html>
<html>
<head>
<title> ekwwueme</title>

	 <link rel="shortcut icon" type="image/png" 
	href="mygoodest.png" >
	 
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	
	body
	{
color:white;
box-sizing: border-box;
font-family:tahoma; 
margin:0;
}
	.container{ 
		display:flex;
		flex-wrap:wrap;
	
		
				
	}
	
	.container > *
	
	{
	flex: 1 100%;	
		
	}
	.header	{background-color: #ab7b7b; }
	.imageContainer {  }
	
	.longSide 
	{
		background-color:#944c4c ; font-size:18px;  padding:10px;   
		
	}
	.Hside {
		background-color:#733434; font-size:18px;  padding:10px;
	}
	
	.footer{
		background-color:#ab7b7b;
		text-align:center; 
	}
	.imageCarry{margin: 0 auto;   max-width:400px; max-height:400px }
	.imageCarry > img { height:400px;  width:400px; border-radius:10%;}
	@media all and (min-width: 900px) 
	{
		.imageContainer {display:flex; flex:1 7%; margin:10px 10px 10px 5px; }
	
		.longSide{
		
    margin: auto; display:flex; flex:1; padding:40px 10px 0px 10px; color:white; font-size:30px;  margin:0px 0px 0px 0px; line-height:56px;
		}   
	
		.Hside 
		{
		display:flex; flex:1 100%; 
			padding:15px;
			text-align:center;
		}
	.imageCarry > img {height:400px;  width:400px; border-radius:50%;}
	}
	
</style>
	
	
	<body>
		
		<?php 
  require 'db.php';
?>
		<div class="container">
		
			
	
		<div class="imageContainer"> <div class="imageCarry"><img src="http://res.cloudinary.com/chidiebere/image/upload/v1523832031/pp.jpg" alt="@chidiebere">  </div> </div>
	
		
			<div class="longSide">My name is Chidiebere Chukwudi.  <br/>I am Full-Stack Webdeveloper, A farmer--a serious type.   <br/> Css3 (flex box), Javascript, php <br/>Username: @chidiebere  </div>
		
		
		<div class="Hside">Favourite Quotes: I might not be a guru, genius or geek but i know with hard work and consistency, the result will be the same! <br />  </div>
	
	
</div>	
	
</body>

</html>