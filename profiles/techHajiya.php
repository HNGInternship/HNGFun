
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Lois Thomas</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin%20Sans:400,500,600,700" rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css' />
	
	 <?php
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'techHajiya'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
    <style>
        body {
            font-family: "quicksand"
            color: #4A4646;
			padding-left:400px;
		}        
		.profile-details{
            padding-top: 30px;
        }
        .profile-details {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            height: auto;
        }
        .profile-body {
            max-width: 100%;
        }
        .profile-image img {
            margin: auto;
            display: block;
            width: 250px;
			height:400px;
            border-radius: 100px;
			box-shadow: 0px 0px 5px 2px grey;
        }
        .profile-name {
            font-size: 25px;
            font-weight: 600;
            margin-top: 20px;
			color:#191970;
        }
        .social-links a {
            margin-right: 20px;
        }
        .fa-github {
            color: #333333;
        }
        .fa-facebook {
            color: #3b5998;
        }
        .fa-twitter {
            color: #1da1f2;
        }
        @media screen and (max-width: 768px) {
            .profile-details {
                padding-top: 115px;
            }
            .social-links {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="width:1100px;">
            <div class="col-sm-6 profile-details">
                <div class="profile-image">
                    <img src="<?php echo $user->image_filename ?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?php echo $user->name ?>  <br/>(@<?php echo $user->username ?>) <br/> I Eat | I Code | I Repeat</span>
                </p>
                <div class="text-center social-links">
                    <a href="https://github.com/cara06" target="_blank"><i class="fa fa-2x fa-github"></i></a>
                    <a href="https://twitter.com/techhajiya" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="https://facebook.com/lois.idzi5" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../vendor/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</html>
</html>