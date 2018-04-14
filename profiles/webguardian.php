<?php
require '../db.php';
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Stephen Moses">
    <meta name="description" content="">
    <meta name="keywords" content="HNG Internship, Stage 1 contest">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>HNG Stage #1</title>
<!-- MY CSS LINKS-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- I WANT THIS SCRIPT TO GET CURRENT TIME IN HOURS MINUTES AND  SECONDS AND DISPLAY IN DIV TAG 
<link rel="stylesheet" href="css/bootstrap.css">
    -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!---INTERNAL CSS TO CONTROL LOOK AND LAYOUT---->
<style>
	body{
	background:url(https://i.imgur.com/Mo78jJo.jpg);
	background-repeat: repeat-x;
}
.menu{

font-family: Roboto;
font-size: 18px;
height:14px;
font:#fff;
text-decoration:none;
position:left;
opacity: 100%;
margin:4px;
}

.active{
border-bottom:2px solid #fff;
}

.lg{
	font-family: Rambla;
	font-size: 48px;
	position:center;
}
.date{
	font-family: Roboto;
	font-size: 24px;
	height: 28px;
	position:center;
}
.time{
	font-family: Roboto;
	font-size: 18px;
	height: 21px;
	position:center;
}
.see{
	opacity:0.5;
	background-color:black;	
}
    .panel-transparent {
        background: none;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.2)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.2)!important;
        background-color:black;

    }
    .img{
        border-width:5px;  
        border-style:outset;
        border-color:black;
    }
    .j_transparent{
       opacity: 0.8; 
    }
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    opacity: 0.8;
    color: white;
    text-align: center;
}
    #social{
	size: 5px;
	}


</style>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>

<body onload="startTime()">
<!--<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HGN Fun</a>
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
        </button>
    </div>

    <div>
      <ul class="nav navbar-nav collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <li class="active"><a href="#" class="glyphicon glyphicon-option-vertical">Home</a></li>
        <li><a href="#" class="glyphicon glyphicon-book"> Learn</a></li>
        <li><a href="#" class="glyphicon glyphicon-education" > Intern</a></li>
        <li><a href="#" class="glyphicon glyphicon-folder-open" > Jobs</a></li>
        <li><a href="#" class="glyphicon glyphicon-question-sign" > Help</a></li>
        <li><a href="#" class="glyphicon glyphicon-git=hub" > Git</a></li>
        <li><a href="#" class="glyphicon glyphicon-log-in" > Login/ Register</a></li>
      </ul>
    </div>
  </div>
</nav>-->

    <div class="container-fluid" align=center>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-12 col-lg-4" >
                <div class="jumbotron panel-body j_transparent" style="border-radius:0px;">
                    <a href="https://imgur.com/WyagUPQ"><img src="https://i.imgur.com/WyagUPQ.jpg"  class="img img-circle" width="150" height="150" alt="" /></a>
                  
                        <div class="" align=left>
                            <h4><span class="glyphicon glyphicon-user"></span> : STEPHEN Moses I.</h4>
                            <h4><span class="glyphicon glyphicon-send"></span> : @webguardian</h4>
                            <h4><span class="glyphicon glyphicon-phone"></span> : +234-813-1523-939</h4>
                        </div>
                    <p id="social">
                            <a href="https://github.com/mozenge360"><i class="fa fa-github"></i></i></a>
                            <a href="https://twitter.com/stephen_aitech"><i class="fa fa-twitter"></i></i></a>
                            <a href="https://web.facebook.com/stephen.mozenge"><i class="fa fa-facebook"></i></i></a>	
                    </p>
                </div>
                <div class="panel panel-transparent">
                          <div class=" panel-body glyphicon glyphicon-time" id="txt"> </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-xs-12 col-lg-8">

                <div class="jumbotron panel-body j_transparent" style="border-radius:0px;">
                        <div class="" align=justify>
                            <p>Hi, I am STEPHEN Moses, A Software Developer, and Tech Enthusiast. </p>
                            <p>I have one desire right now, I want to help SMEs in Africa take advantage of ICT and the Internet Technology, for the purpose of creating good business structure, generating good cashflow and positioning for global expansion.</p>
                            <p>I think this is why I fell in love with programming 6 years ago, I feel powerful like a super hero, I can bring your ideas to life.</p>
                            <p>I am excited about HNG Internship program, strangely I feel at home, everyone is excited, we all want to learn... and most importantly Programming is not treated as one cryptic world its easy if you put your mind to it...</p>
                            <blockquote>I love you guy's at Hotel.NG God bless you for me abeg.</blockquote>
                        </div>                
                </div>
            </div>
           
    </div>
        </div>
    <div class="footer">
        <p>Copyright &copy; HNG FUN <?php echo date("Y"); ?></p>
    </div>
</body>
</html>
