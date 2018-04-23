<?php 
		require 'db.php';
		$result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = "1n73rn@Hng";
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data where username = 'ekpono'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ekpono's Profile</title>
   <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
   

<style>
* {
    margin: 0;
    padding: 0;
}
body {
  font-family: 'Dosis', sans-serif;
    background: linear-gradient(to right, rgba(216,0,0,0), rgba(216,0,0,0.2));
    background-repeat: cover;
}
.container {
    width: 80%;
    height: auto;
    margin: 0 auto;
    display: flex;
    padding-top: 170px;
    position: relative;
    color: #806a21;
}
.text {
    width: 50%;
    display: block;
    text-align: right;
    font-size: 20px;
    padding-top: -80px;
}
.photo {
    width: 50%;
    margin-left: 80px;
    display: block;
   
}
.slogan {
    margin-top: 30px;
}
h3 {
    color:rgb(32, 32, 216)
}
a {
    text-decoration: none;
     text-decoration: underline dotted;
}
</style>
<body>
<div class="container">
    <div class="text">
        <h1 style="color:rgb(32, 32, 216);">Hey! I'm Ekpono Ambrose</h1>
        <h2 style="color:#806a21;">I'm a developer from Nigeria</h2>
        <h3 class="slogan">I work with companies</h3>
        <p>Jiggle, Thirdfloor, JandK Services, Hilltop</p>
        <br><br>
        <h3>I use different technologies</h3>
        <p>Frontend: HTML, CSS, Bootstrap, Javascript, JQuery </p>
        <p>Backend: PHP, Laravel </p>
        <p>Design: Photoshop, Sketch, Figma</p>
        <br>
        <h3>I'm available for hire</h3>
        <a href="mailto:ekponoambrose@gmail.com">Email</a>
        <a href="http://www.facebook.com/ekpono">Facebook</a>
        <a href="http://www.twitter.com/ekpono11">Twitter</a>
        <a href="http://www.linkedin.com/in/ekpono">Linkedin</a>
        <a href="http://www.github.com/ekpono">Github</a>
    </div>
    <div class="photo">
        <img src="http://res.cloudinary.com/ambrose/image/upload/r_29/v1523629415/dp2.jpg" width="300px" height="300px"  style="border-radius: 50%;" alt="Ekpono's Profile Picture" />
    </div>

</div>
</body>
</body>
</html>
