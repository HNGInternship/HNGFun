<?php

    $sql = 'SELECT * FROM interns_data WHERE username="folu"';
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetch();    

    $name = $result['name'];
    $user = $result['username'];
    $image = $result['image_filename'];
  ?>
 <?php
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

       throw $err;
    }?>
	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HNG STAGE 1</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
body
{
	background-color: rgba(115, 136, 156, 0.98);
}

.btn-tw {
  background: #55ACEE;
  color: white;
}
.btn-git {
    background-color: #333;
    color: #fff;
}
.btn-ins {
    background-color: #1b4f7b;
    color: #fff;
}

h2
{
font-family: Rambla;
font-style: normal;
font-weight: normal;
line-height: normal;
font-size: 54px;
text-align: center;
color: #F2F2F2;
}
.title
{
	padding-top: 20px;
}
.profileimg
{
	    padding-left: 130px;
}

.subtext
	{
	color: white; 
	}
p.intro
	{
	
		Font-Family: Rambla;
		Font-Style: Regular;
		Font-Size: 20px;
		text-align: Center;
		color :#F2F2F2;
	}

		</style>
</head>
<body class="body">
<div class="container">

<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6 title"> 
<h2> about me on hng </h2>
</div>
<div class="col-lg-3"></div>
</div>

<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6 profileimg"> 
<img src="https://res.cloudinary.com/bifolu/image/upload/v1523952729/my_pics.jpg" class="rounded-circle" alt="bifolu" width="280" height="280">
</div>
<div class="col-lg-3"></div>
</div>

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-8"> 
<p class="intro"> My name is Oloyede Abimifoluwa and I am a programming intern at hotels.ng,
I am a virtual reality and tech enthusiast. My goal for this internship is to be able to work on web solutions. 
I believe I am in the right place</p>
</div>
<div class="col-lg-2"></div>
</div>

<div class="row" id="social-media">
<div class="col-lg-3"></div>
<div class="col-lg-6"> 

<a href="https://twitter.com/bimfoluwa" target="_blank"><button type="button" class="btn btn-tw"><i class="fa fa-twitter pr-1"></i> Twitter</button></a>
<a href="https://github.com/bifolu" target="_blank"> <button type="button" class="btn btn-git"><i class="fa fa-github pr-1"></i> Github</button></a>
<a href="https://www.instagram.com/bimifoluwa" target="_blank"><button type="button" class="btn btn-ins"><i class="fa fa-instagram pr-1"></i> Instagram</button></a>

			</div>
			<div class="col-lg-3"></div>
</div>


</div>
</body>

</html>