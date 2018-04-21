

<!DOCTYPE html>
<html>
<head>
 <title>MY PROFILE</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<style>
body{
	background:#EEEEEE;
}

#about_text{
	color:#075E54;
	font-weight:bold;
	text-align:center;
}

#profile_text{
	color:#ffffff;
	text-align:center;
	font-weight:bold;
	font-size:20px;
	font-family:sans-serif;
}
#header{
	background:#075E54;
	padding:10px;
}
#image_center{
	margin-top:50px;
	margin-left:38%;
	border-radius:100px;
}
#about_me{
	margin-top:20px;
	background:#ffffff;
	padding:1px;
	font-family:sans-serif;
	height:150px;
}
#footer{
	margin-top:40px;
	background:#075E54;
	padding:3px;
	height:150px;
}
#footer p{
	text-align:right;
	color:#ffffff;
	margin-right:60px;
	
}
.image{
	float:right;
	margin-top:5px;
	margin-right:20px;
}
#container{
	background:#EEEEEE;
	margin-left:200px;
	margin-right:200px;
	border:1px solid gray;
	box-shadow:1px 3px 10px 3px gray;
}
.note{
	text-align:center;
	font-size:20px;
	font-family:sans-serif;
	}
#t{
	background:#EEEEEE;
	float:right;
	padding:10px;
	font-weight:bold;
	margin-top:-50px;
}

/* responsive */
@media only screen and (max-width: 880px) {
#container{
	margin-left:40px;
	margin-right:40px;
}
.note{
	font-size:18px;
}
#image_center{
	margin-left:39%;
	width:200px;
	height:200px;
}
}

@media only screen and (max-width: 680px) {
#container{
	margin-left:30px;
	margin-right:30px;
}
.note{
	font-size:16px;
}
#image_center{
	margin-left:31%;
	width:170px;
	height:170px;
}
}

@media only screen and (max-width: 480px) {
#container{
	margin-left:10px;
	margin-right:10px;
}
.note{
	font-size:15px;
	font-size:15px;
}
#image_center{
	margin-left:28%;
	width:150px;
	height:150px;
}
}

@media only screen and (max-width: 380px) {
#t{
padding:3px;
margin-top:-20px;
}
.note{
font-size:13px;
}
}

@media only screen and (max-width: 280px) {
#image_center{
	margin-left:23%;
	width:110px;
	height:110px;
}
.note{
	font-size:11px;
}
}
</style>
<body>
<div id="container">
	<div id="header">
		<h4 id="profile_text">My Profile Page</h4>
			<span id="t" onload="piece()" style="color:#075E54;"><?php echo  date("H:i:s"); ?></span>
	</div>
		<img id="image_center" src="../images/jozy.jpg" width="200px" height="200px">
			<div id="about_me">
				<h4 id="about_text">About Me</h4>
					<p class="note">
					Hi, my name is Joshua i am currently a student
					of the University of Uyo, Computer Education.
					I love Computers and programming, i develop 
					web applications and i can work in both the 
					front-end and back-end.
					</p>
			</div>
				<div id="footer">
					<p>Social Media</p>
						<div id="social_con">
							<img class="image" src="../images/facebook.png" width="60px" height="60px">
							<img class="image" src="../images/twitter.png" width="60px" height="60px">
						</div>
				</div>
</div>
<script type="text/javascript">
/*function piece(){
	var d = new Date();
	var hours = d.getHours();
	var mins = d.getMinutes();
	var secs = d.getSeconds();
	if( hours > 12 ){
		  hours = hours - 12;
	}
	if( hours == 0){ 
		  hours = 12;
	}
	var t = document.getElementById('t');
	t.innerHTML =hours+":"+mins+":"+secs;
}
var t = setInterval(piece,10);*/
</script>
</body>
</html>