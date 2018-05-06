  
  
  <Html>
<title>
HNG
</title>
<head>

<?php 
	if(defined('DB_USER') === false){
		try {
			require "../../config.php";
			global $conn;	
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}
        
        $result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'charlyge'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
		?>

 <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
</head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #efefef;
            background-image: url(http://res.cloudinary.com/tarrot-system-inc/image/upload/v1503349370/dot_srox60.png);
            color: #157EFB;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
        }
        .containers {
            display: flex;
            max-width: 700px;
            height: 100vh;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .wrappers {
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .mybio b {
            font-size: 14px;
            color:white;
        }
        .mybio{
            color:blue;
        }
        .avatar {
            background-size: cover;
            height: 190px;
            width: 190px;
            margin: 8px
        }
        .name {
            font-size: 15px;
            padding-left: 20px;
            padding-right: 5px;
        }
        .name p {
            padding-left: 35%;
            padding-bottom: 5px;
        }
        .about {
            line-height: 1.5;
        }

        .about h3{
            color: #157EFB;
        }
        .profile-social-links span {
            display: none;
        }
        .footer-wrapper {
            display: flex;
            justify-content: space-between;
            float: right;
            margin: 0px 15px;
        }

        .others {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
        }

        .task {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
            padding-right: 15px;
            padding-bottom: 10px;
            float: right;
        }
        .task a {
            text-decoration: none;
            color: #636b6f;
        }
        .fa-link {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #00aced;
            margin-left: 10px;
            color: #fff;
        }
        .fa-link:hover {
            background-color: #322f30;
        }
        .myprofile {
            background-color: white;
            margin-right: 20px;
            height: 350px;
			width:200px;
        }
        .profile-social-links {
            color: #fff;
            margin-left: 18%;
        }
        ul.profile-social-links {
            align-items: center;
            float: right;
        }
        .profile-social-links li {
            vertical-align: top;
            height: 100px;
            display: inline;
        }
        .profile-social-links a {
            color: #fff;
            text-decoration: none;
        }
        .fa-slack {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-slack:hover {
            background-color: #00aced;
        }
        .fa-github {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-github:hover {
            background-color:#157EFB;
        }
        .fa-twitter {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #157EFB;
        }
        .fa-twitter:hover {
            background-color: #157EFB;
        }
        .sendersname {
            padding: 20px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .submit {
            padding: 10px;
            font-size: 14px;
            width: 460px;
            height: 40px;
            border: 0px;
        }
        .contact {
            margin-top: 10px;
        }
        .submit {
            background-color: #157EFB;
            color: white;
        }
        .submit:hover {
            background-color: #157EFB;
        }
        .message {
            height: 100px;
            padding: 20px;
            margin-top: 5px;
            font-size: 14px;
            width: 460px;
            border: 0px;
        }
    </style>
</head>

<body>
    <div class="containers">
        <div class="wrappers">
            <div class="myprofile">
                <img src="http://res.cloudinary.com/charlyge/image/upload/v1523623038/HNG/IMG_20150910_093320.jpg" class="avatar">
                <div class="name" style ="color: #157EFB;"><b>Uhiara Charles</b>
               
            </div>
            <div class="others socials">
                <ul class="profile-social-links">
                    <li>
                        <a href="https://github.com/charlyge" class="social-icon" target="_blank"> <i class="fa fa-github"></i></a>
                    </li>
                
                    <li>
                        <a href="https://twitter.com/charlyge2" class="social-icon" target="_blank"> <i class="fa fa-twitter"></i></a>
                    </li>
                    <br>
                </ul>
            </div>
        </div>

        <div class="mybio">
            <br/><h3>Uhiara Charles</h3><br/>
            
            <p># Android APP Developer<br/>#ISpeakJava<br/> </b></p>
			<p> Currently Interning at Hotels.ng</p>
        </div>
     
    </div>
 
	</Html>