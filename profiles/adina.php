<?php
	if(!defined('DB_USER')){
	  require "../../config.php";		//change config details when pushing
	  try {
	      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	  } catch (PDOException $pe) {
	      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	  }
	}
	//Fetch User Details
	try {
	    $query = "SELECT * FROM interns_data WHERE username ='Adina'";
	    $resultSet = $conn->query($query);
	    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $e){
	    throw $e;
	}
	$username = $resultData['username'];
	$fullName = $resultData['name'];
	$picture = $resultData['image_filename'];
	//Fetch Secret Word
	try{
	    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
	    $resultSet   =  $conn->query($querySecret);
	    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
	    $secret_word =  $resultData['secret_word'];
	}catch (PDOException $e){
	    throw $e;
	}
	$secret_word =  $resultData['secret_word'];
?>
<!DOCTYPE html>
<html lang= "en">
    
<head>
	<title>Aussie/Afrik...</title>
	<meta name= "keywords" content= "xdna, adina, adinadoes, website developer, webdev, web, web designer, web developer, framework, website">
	<meta name= "author" content= "Xdna">
    <link rel= "stylesheet" href= "css/font-awesome.css">
    <link rel= "stylesheet" href= "css/bootstrap.min.css">
    <style>
        *
        {
            margin: 0px;
            padding: 0px;
            font-family: sans-serif;
        }

        html
        {
            height: 100%;
            width: 100%;
        }

        #div1
        {
            position: relative;
            height: calc(100vh);
            background-color: RGBA(30, 33, 71, 1);
            overflow: hidden;
        /*
            background: url(../images/c.png);
            background-repeat: no-repeat;
            background-position: bottom;
            background-attachment: scroll;
            background-size: cover;
        */
            width: 100%;
        /*    margin-top: 70px;*/
            display: flex;
        }
        
        #div11
        {
            position: relative;
            height:100%;
            width: 35%;
            background-color: transparent;
        }
        
        #div12
        {
            color: RGBA(142, 207, 211, 1);
            position: relative;
            height:100%;
            width: 65%;
            background-color: transparent;
        }
        
        #aboutme
        {
            position: relative;
            height: 50%;
            width: 75%;
            transform: translate(17%, 50%);
            -webkit-transform: translate(17%, 50%);
            -ms-transform: translate(17%, 50%);
            -o-transform: translate(17%, 50%);
            -moz-transform: translate(17%, 50%);
/*            background-color: black;*/
            text-align: center;
            font-family: "Elephant Regular";
            letter-spacing: 2.5px;
        }
        
        #img
        {
            height: 70%;
            width: 80%;
            left:10%;
            margin: auto;
            position: relative;
            top: 15%;
            background: url(<?php echo $image; ?>);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: scroll;
            background-size: cover;
        }
        
        @media (max-width:772px) {
            html
            {
            }
            
            #div1
            {
                display: block;
                height: 100%;
                overflow: visible;
            }
            
            #div11
            {
                position: relative;
                height: 100vh;
                width: 100%;
                background-color: transparent;
            }
            
            #div12
            {
                position: relative;
                height:auto;
                width: 100%;
                background-color: transparent;
            }
            
            #img
            {
                height: 70%;
                width: 60%;
                left: 0%;
            }
            
            #aboutme
            {
                height: auto;
                width: 80%;
                left: 10%;
                padding-bottom: 100px;
                transform: none !important;
            }
        }
        
        @media (max-width:374px) {
            #img
            {
                height: 280px;
                width: 60%;
                left: 20%;
                margin: 70px 0px 50px 0px;
            }
            #div11
            {
                display: block;
                height: 400px;
                overflow: visible;
            }
        }
    </style>
</head>

<body>
    <div id= "bodydiv">
        <div id="div1">
            <div class="divs" id= "div11">
                <div id="img"></div>
<!--                <img src="http://res.cloudinary.com/djdhcpx0q/image/upload/v1524662314/HNG%20Internship%204/IMG_20170924_104542.jpg">-->
            </div>
            <div class="divs" id="div12">
                <div id="aboutme">
                    <span> I am <b>@</b><b><?php echo $username; ?>!!!</span>
                    <p></p>
                        <span> Tch. Not true. Well it is true...technically. At least that is my Slack username on the HNG Internship 4 workspace. My birth name is <b><?php echo $name; ?></b>. If you are wondering what the <b>C.</b> is for, <b>Dont't!</b> You aren't going to find out. At least, not from me. If you won't call me Adina then Oluwatoyin is good, unless It is a mouthfull for you, then  you can call me Toyin.</span>
                    <p></p>
                    <span> I live for <span style="text-decoration:line-through;">JavaScript</span> <b>jQuery</b> though I am not that good at it. I also dabble in <b>HTML</b> and <b>CSS</b>. So basically, I am a front-end developer. I am not bad at it, but I am terrible at coming up with good UI designs.</span>
                </div>
            </div>
        </div>
    </div>
</body>
    
<!--
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/typed.js"></script>
<script type='text/javascript' src = "js/index.js"></script>
    <script type='text/javascript'>
    function ajaxcall()
        {
            $.ajax({
                method:'GET',
                url: 'js/gettime.php',
                success: function(data){
            //            alert(data);
                    data = data.split(':');
                    $('#hours').text(' ' + data[0] );
                    $('#minutes').text(' ' + data[1] );
                    $('#seconds').text(' ' + data[2]);
                }
            });
        }
        setInterval('ajaxcall()', 1000);
    </script>
    <script type='text/javascript'>
//    $(document).ready(function(){
        $.ajax({
                method:'GET',
                url: 'js/getdate.php',
                success: function(data){
            //            alert(data);
//                    data = data.split(' ');
                    $('#div112').html(data);
                }
            });
//    }
    </script>
-->
    
</html>
