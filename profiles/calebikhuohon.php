<?php 

    require('db.php');
    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

main{
    background: url(http://res.cloudinary.com/calebikhuohon/image/upload/v1523645342/green-and-white_092340582.jpg);
    height: 100vh;
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color: #ffffff;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
}

#calebikhuohon-rectangle{
    position: absolute;
    top: 60%;
    width: 100%;
    background: rgba(111, 207, 151, 0.8);
    text-align: center; 
}
.calebikhuohon-profile-img{
	width: 300px;
	border-radius: 50%;
	height: 300px;
}
.calebikhuohon-profile{
	width: 300px;
	border: 1px solid #848484;
	border-radius: 50%;
	margin: 30px auto 0 auto;
	height: 300px;
}
    </style>
</head>
<body>
    <main>
    <div class="calebikhuohon-profile">
			<img class="calebikhuohon-profile-img" src="http://res.cloudinary.com/calebikhuohon/image/upload/v1523645514/my_pic.jpg" alt="my-profile">
		</div>
    <div id="calebikhuohon-rectangle">
        <h1>Caleb Ikhuohon-Eboreime</h1>
        <h2>I love to learn, teach and collaborate. I am an undergraduate with skills in web development using node, react and PHP</h2>
    </div>
    </main>
</body>
</html>
