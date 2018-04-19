<html>
<head>
<title>ESETANG'S PROFILE</title>
</head>
<style>
}
nav{
	float: right;
}
	.facebook{
	color: #0232f4;
	cursor: pointer;
	font-weight: bold;
	border: 0px;
	padding: 5px;
	background-color: white;
}
	.github{
	color: #000000;
	cursor: pointer;
	font-weight: bold;
	border: 0px;
	padding: 5px;
	background-color: white;
}
	.header{
	 padding-top: 70px;
	 font-family: impact;
	 font-stretch: 1000;
	 font-weight: bold;
	 color: #FE0000;
	 font-weight: bold;
	 padding-left: 255px
}
	.paragraph{
	padding-right: 1000px
	line-height: 70px;
	font-weight: bold;
	word-wrap: 10px;
	width:40%;
	max-width: 30rem;
	padding-bottom: 20px;
		}
	.nospace{
		line-height: 5px;
		p{
		line-height: 5px;
}
	#clock{
	padding-bottom: 10px;
	}
	
</style>

<body>
<nav>
</nav>
	<div>
		<h1 class="header">DANIEL ESETANG</h1>
		<img src="https://scontent.flos5-1.fna.fbcdn.net/v/t1.0-9/14199239_142965549488098_349539371939339548_n.jpg?_nc_cat=0&oh=75fe2f486f7cfdf74e251a64f4d2e6f0&oe=5B64C207" height="400" width="79%" style="padding-left: 255px;">
		<div class="paragraph" style="margin-left:255px;">
		<p> Objective: To enhance my development skills.</p>
		<p> Goal: Bring indept creativity into tech development.</p>
		<p> Community service: Helping people realize their potentials in tech world.</p>
		<div class="nospace">

<?php
date_default_timezone_set('UTC');
?>
<script>
var d = new Date(<?php echo time() * 1000 ?>);
function digitalClock() {
  d.setTime(d.getTime() + 1000);
  var hrs = d.getHours();
  var mins = d.getMinutes();
  var secs = d.getSeconds();
  mins = (mins < 10 ? "0" : "") + mins;
  secs = (secs < 10 ? "0" : "") + secs;
  var apm = (hrs < 12) ? "am" : "pm";
  hrs = (hrs > 12) ? hrs - 12 : hrs;
  hrs = (hrs == 0) ? 12 : hrs;
  var ctime = hrs + ":" + mins + ":" + secs + " " + apm;
  document.getElementById("clock").firstChild.nodeValue = ctime;
}
window.onload = function() {
  digitalClock();
  setInterval('digitalClock()', 1000);
}
</script>
<div id="clock"> </div>

		<a href="https://web.facebook.com/daniel.esetang.3" target="_blank"><button class="Facebook">Facebook</button></a>
		<a href="https://github.com/EsetangDan" target="_blank"><button class="Github">Github</button></a>
		</div>
	</div>
</div>


</body>
</html>

