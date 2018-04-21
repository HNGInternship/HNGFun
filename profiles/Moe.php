<?php  
  try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>
<!DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <style>
.fa {
			float: left;
			font-size: 25px;
			color: #ccc;
			padding: 10px;
		}   

body {
    position: fixed;
    width: 100%;
    height: 100%;
    background: lightgrey;
}

p {
    position: absolute;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    

    font-family: Herculanum;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 50px;

    color: white;
}

box {
    position: absolute;
    align-items: center;
    justify-content: center;
    left: 28%;
    top: 50%;
    font-size: 37px;
    color: black;
    padding: 30px;
    border-radius:30px;
    background:white;
    border-color:2px solid white;
}
box.a{
    font-family:herculanum;
}

img{
    border-radius:50px;
    margin-top:30px;
}
</style>
    <title></title>
    <meta content="">
  </head>
  <body>

  <header>
			<div>
				<a href="https://github.com/benzowe"><i class="fa fa-github"></i></i></a>
				<a href="https://twitter.com/moegram"><i class="fa fa-twitter"></i></i></a>
			</div>
		
	</header>
  <center><img src="http://res.cloudinary.com/benzowe/image/upload/v1523637805/IMG_0343.jpg" alt="Mohammed" align="center" width="100" height="100" ></center>
  <center><p>Hey Guys.I'm Mohammed Sanusi </p></center>
  <box class="a">
  <center>Today</center> <br>
  <?php
echo "Time is " . date("F j, Y, g:i a") . "<br>";
?>
</box>

  </body>

</html>
