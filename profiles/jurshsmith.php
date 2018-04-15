<?php 
		require 'db.php';
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'olubori'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
HNG | Jurshsmith
</title>
<!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--javascripts assets-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
    </script>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<style type="text/css">
	html,body{
	height : 100%;}
li {
	display: inline;
	padding: 20px;
	font-size: 32px;
	
}
li a:hover{
 font-size: 28px;
}
li a{
	color: orange;
}
b{
	letter-spacing: 0.9px;
	

}
</style>

</head>

<body style = "background-image : url(https://wallpapercave.com/wp/58eyKEt.jpg); background-size:cover;">
	<br>
	<br><br>
	<center><h2 style = "font-family: montserrat; color: white; letter-spacing: 1px"><font style = "color: orange">HNG 4.0.0</font> Internship Profile Page</h2></center>
	<hr style = "background-color : purple;color:  purple; width : 50%">
	<br>
	<br>

	<center>
<img  style = "border-radius: 7%;max-width : 100%" class = "myimage"
src = "https://res-console.cloudinary.com/jurshsmith/thumbnails/v1/image/upload/v1523643164/SU1HXzIwMTcwMjI0XzE1MDkxNA==/grid"  alt = ""><br><br><br>
<script type="text/javascript"> $('.myimage').hide();</script>
<font style = "color : white; font-family: montserrat">Username &nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;<b>JURSHSMITH</b></font><br><br>
<font style = "color : white; font-family: montserrat">Skills&nbsp; : <b>&nbsp;&nbsp;&nbsp;&nbsp;HTML,&nbsp; CSS, &nbsp;PHP, &nbsp;mySQL,&nbsp; Bootstrap,&nbsp; Jquery,&nbsp; MJML,&nbsp; Adobe-Illustrator.</b></font>
<br><br>
<br><br>
<br><br>
<div id = "social">
<ul style = "display: inline; list-style-type: none;color: white">
	<li><a href = "https://github.com/Jurshsmith"><i class="fab fa-github"></i></a></li>
	<li><a href = "https://instagram.com/jurshsmith"><i class="fab fa-instagram"></i></a></li>
	<li><a href = "https://twitter.com/jurshsmith"><i class="fab fa-twitter"></i></a></li>
</ul>
</div>
<script type="text/javascript"> $('#social').hide();</script>

</center>
<img height = "100px" align = "right" style = "position: relative; top : -80px;" src="https://res-console.cloudinary.com/jurshsmith/thumbnails/v1/image/upload/v1523649287/c2lnbg==/grid" alt = "jurshsmith">

</body>
<script type="text/javascript">
$(document).ready(function(){
$('.myimage').fadeIn(2500);
$('#social').fadeIn(2800);
});
</script>

</html>
