
<!DOCTYPE html>
<?php

try{
    $sql = "SELECT * FROM secret_word" ;
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    $secret_word = $data['secret_word'];

}catch(PDOException $err){
    throw $err;
}

try{
    $sql = "SELECT * FROM interns_data_ WHERE username = 'techHajiya'";
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    $name = $data['name'];
	$username = $data['username'];
    $image_url = $data['image_filename'];
 

}catch(PDOException $err){
    throw $err;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lois Thomas</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=quicksand" rel='stylesheet' type='text/css' />
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
                    <img src="<?php echo $image_url ?>" alt="Lois Thomas">
                </div>
				<p class="text-center profile-name">
				<span> Hi! I am  <?php echo $name ?> ?>  <br/>(@<?php echo $username ?>) <br/> I Eat | I Code | I Repeat</span>
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

</html>