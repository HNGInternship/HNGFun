<?php 
$sql = $conn->query("SELECT * FROM secret_word");
$result = $sql->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];

$username = "Esurf";
$user_data = $conn->query("SELECT * FROM interns_data WHERE username = '".$username."'");
$user = $user_data->fetch(PDO::FETCH_ASSOC);

$name = $user['name'];
$imgsrc = $user['image_filename'];
$username = $user['username'];

 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<title>Portfolio | Adimoha Emmanuel</title>
 	<style type="text/css">
 		      * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
       
        body {
        	margin: 0;
            padding: 0;
            border: 0;
            height: 100%;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            background-color: #ffffff;
            font-family: 'Lato', sans-serif;

        }
        .card{
        	padding-top: 40px;
        	background-color: #fff;
        	width: 60%;
        	min-height: 300px;
        	margin: 10% auto;
            color: #000;
            border-radius: 5px;
            box-shadow: 0 4px 6px 0 #cccccc;
        }
        .card .pic{
          text-align: center;
        }
        .card h2{
        	text-align: center;
        	color: #000;
        	font-family: cursive;
        }
        .card h2 #flash{
        	font-style: italic;
        	animation: flash 0.7s infinite;
        }
        @keyframes flash{
        	0%{
        		color: #000;
        	}
        	100%{
        		color: blue;
        	}
        }
        .card h4, .card h5{
        	text-align: center;
        }
        .card #social-icons{
        	text-align: center;
        	width: 30%;
        	margin: auto;
        }
       .card #social-icons ul{
        padding: 0;
        margin: 0;
        list-style-type: none;
       }
       .card #social-icons ul li{
       	float: left;
       	margin-left: 10px;
       }

       .card #social-icons ul li a .fa {
            padding: 10px;
            font-size: 18px;
            width: 35px;
            height: 35px;
            text-align: center;
            margin: 3px 2px;
            border-radius: 100%;
            text-decoration: none;
        }

       .card #social-icons ul li a .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }

       .card #social-icons ul li a .fa-facebook {
            background: #000000;
            color: #fff;
        }

       .card #social-icons ul li a .fa-twitter {
           background: #000000;
            color: #fff;
        }

       .card #social-icons ul li a .fa-linkedin {
            background: #000000;
            color: #fff;
        }

       .card #social-icons ul li a .fa-github {
            background: #000000;
            color: #fff;
        }

 	</style>
 </head>
 <body>
 <div class="container">
 <div class="card">
 	<div class="pic">
 		<img src="https://res.cloudinary.com/esteve/image/upload/v1524228509/mep.jpg" class="img-circle center" id="hover" title="Web Developer" alt="Esurf picture">
 	</div>
 	<h2><span id="flash">Hi!</span> I am <?php echo $name; ?></h2>
 	<h4 class="do">A Web Developer and Designer</h4>
 	<h5>HNG INTERN | Slack : @<?php echo $username; ?></h5>

        <div id="social-icons">
             <h5>Lets Keep in touch</h5>
           <ul>
           	  <li> <a href="https://www.facebook.com/stephenadimoha1">
                <i class="fa fa-facebook"></i>
            </a></li>
           <li> <a href="#">
                <i class="fa fa-twitter"></i>
            </a></li>
            <li><a href="#">
                <i class="fa fa-linkedin"></i>
            </a></li>
           <li> <a href="https://github.com/Emmydite">
                <i class="fa fa-github"></i>
            </a></li>
           </ul>
        </div>
 </div>
</div>
 </body>
 </html>
