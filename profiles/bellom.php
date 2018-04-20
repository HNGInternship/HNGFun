<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];

  $result2 = $conn->query("Select * from interns_data where username = 'bellom'");
  $user = $result2->fetch(PDO::FETCH_ASSOC);
  
  $username = $user['username'];
  $name = $user['name'];
  $image_filename = $user['image_filename'];
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bellom Sean  | Web Developer</title>
		<link href="https://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400,400i,700,700i,800" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
             /************************************
 GENERAL
 ************************************/
             body {
                font-family:'open sans', san serif;
            }


             #wrapper {
                max-width: 940px;
                margin: 0 auto;
                padding: 0 5%;
            }

             a {
                text-decoration:none;
            }

            img {
                max-width: 100%;
            }

            h3 {
                margin: 0 0 1em 0;
            }

             /************************************
             HEADING
             ************************************/
             header {
                 float: left;
                 margin: 0 0 30px 0;
                 padding: 5px 0 0 0;
                 width: 100%;
             }


             #logo {
                text-align: center;
                margin: 0;
            }

            h1 {
                font-family: 'Changa One', sans-serif;
                margin: 15px 0;
                font-size: 1.75em;
                font-weight: normal;
                line-height: 0.8em;
            }

            h2 {
                font-size: 0.75em;
                margin: -5px 0 0;
                font-weight: normal;
            }
            /************************************
            FO0TER
            ************************************/
            footer {	
                font-size: 0.75em;
                text-align:center;
                clear:both;
                padding-top:50px;
                color:#ccc;
            }

            .social-icon {
                width: 20px;
                height: 20px;
                margin: 0 5px;
            }

            /************************************
            PAGE: ABOUT
            ************************************/
            .profile-photo {
                display: block;
                max-width: 150px;
                margin: 0 auto 30px;
                border-radius: 20%;

            }

            /************************************
            COLORS
            ************************************/

             /* site body */
            body {
                background-color:#fff;
                color:#999;
            }

            /*green header*/
            header {
                background: #6ab47b;
                border-color: #599a68;
            }

            /*logo text*/
            h1, h2 {
                color: #fff;
            }

            /*links*/
            a {
                color: #6ab47b;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            td {
                font-family: Arial, Helvetica, sans-serif;
            }

            th {
                font-family: Arial, Helvetica, sans-serif;
            }
            
            @media screen and (min-width: 480px) {
	
            /************************************
            TWO COLUMN LAYOUT
            ************************************/

            #primary {
                width: 50%;
                float: left;
            }
            #secondary {
                width: 40%;
                float: right;
            }

            /************************************
            PAGE: ABOUT
            ************************************/
            .profile-photo {
                float: left;
                margin: 0 5% 80px 0;
            }

        }
            @media screen and (min-width: 660px) {
                /************************************
                HEADER 	
                ************************************/

                #logo {
                    float: left;
                    margin-left: 5%;
                    text-align: left;
                    width: 45%;
                }

                h1 {
                    font-size: 2.5em;
                }


                h2 {
                    font-size: 0.85em;
                    margin-bottom: 20px;
                    text-align: left;
                }

                header {
                    border-bottom: 5px solid #599a68;
                    margin-bottom: 60px;
                }


             }

        </style>
        
	</head>
	<body>
		<header>
			<a href="index.html" id="logo">
				<h1><?php echo $name; ?></h1>
				<h2>Web Developer</h2>
			</a>

		</header>
		<div id="wrapper">
			<section>
				
				<img src="<?php echo $image_filename?>" alt="Photogragh of Bellom Sean"  class="profile-photo">
				<h3>About</h3>
				<p>Hi, I'm Bellom Sean! This is my design portfolio where i share all of my design work.</p>
				<p>If you like to follow me on facebook, my facebook name is <a href="http://facebook.com/oluwadamilare.bellomsean">bellom sean</a>.</p>							
			</section>
			
			<footer>
				<a href="http://facebook.com/oluwadamilare.bellomsean"><img src="http://res.cloudinary.com/hng-bellom/image/upload/v1524171059/image6.png" alt="Facebook Logo" class="social-icon"></a>
				<p>&copy; 2018 Bellom Sean.</p>
			</footer>
		</div>
	</body>
</html>