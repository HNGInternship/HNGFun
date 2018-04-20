    <?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $secret_word = $result['secret_word'];

        $result2 = $conn->query("Select * from interns_data where username = 'abayomi'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<title>HNGFun | Abayomi</title>
	
	<style>
        body{
        background: #fff;
        padding: 0;
        margin: 0;
        font-family: 'Montserrat',sans-serif;
        }
        html{
        box-sizing:border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        }
        .main {
        width: 360px;
        height: 600px;
        left: 50%;
        top:55%;
        background: rgb(43, 108, 167);
        position: absolute;
        transform: translate(-50%, -50%);
        }
         img{
        height: 150px;
        width: 150px;
        top: -80px;
        position: absolute;
        left: calc(50% - 80px);
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }
        h1 {
        margin-top: 100px;
        font-size: 24px;
        color: #fff;
        text-align: center;
        }
        h3 {
        margin: -10px;
        font-size: 20px;
        text-align: center;
        color: #fff;
        }
        p{
        margin:20px 35px;
        width: 80%;
        text-align: center;
        line-height:1.4em;
        color: #fff;
        }
        .connect_me {
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 16px;
        }
        #icons{
        margin-left: 100px;
        }
        .fa {
        padding: 10px;
        font-size: 20px;
        width: 50px;
        height: 50px;
        text-align: center;
        text-decoration: none;
        border-radius: 50%;
        }
        .fa:hover {
        opacity: 0.7;
        }
        .fa-facebook {
        background: #3B5998;
        color: white;
        }
        .fa-twitter {
        background: #55ACEE;
        color:#fff;
        }
        .fa-github {
        background: rgb(50, 73, 90);
        color:#fff;
        }
        .fa-linkedin {
        background: rgb(47, 136, 204);
        color:#fff;
        }
        .date{
        margin-bottom: 10px;
        }
	</style>
</head>
<body>
    <div class="main">
        <div class="image"><img src="<?php echo $user->image_filename; ?>" alt="Author's Picture"></div>
        <div class="details">
            <h1><?php echo $user->name; ?></h1>
            <h3>Slack Username: @<?php echo $user->username; ?></h3>
            <p>Exceptionally well organised, self taught, self motivated and resourceful Professional with few years of experience in Website Development and Design using HTML, CSS, Bootstrap, JAVASCRIPT, JQuery, Laravel, PHP, MYSQL.  Excellent analytical and problem solving skills.</p>
            <p class="connect_me">Connect with me</p>
        <div id="icons">
            <a href="https://www.facebook.com/abayomijohn1670">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com/abayomijohn273">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/in/abayomi-olatunji-a60766b2">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="https://github.com/abayomijohn273">
                <i class="fa fa-github"></i>
            </a>
        </div>
            
        </div>
        <div class="date">
        <p>Copyright &copy; HNG FUN <?php echo date("Y"); ?></p>
        </div>
    </div>
</body>