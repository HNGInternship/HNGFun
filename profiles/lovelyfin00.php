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
<html>
	<head>
	    <title>HNGFUN</title>
	     <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
		 body, html {
		height: 100%;
		margin: 0;
		
	}
	.footer {
			text-align: center;
			margin-top: 30px;
			font-size:15px;
		}
	.text{
	font-family:amaranth;
    color:grey;
	font-size:50;
	text-align:center;
	text-shadow: 2px 2px 7px blue;
	padding-top:100px;
   	padding-bottom:0px;
    }
	.text:hover{
		background-color:blue;
	}
	.bg{
		background-color:black;
	}
	.yea{
		color:grey;
		font-size:25px;
		padding-top:100px;
		text-align:centre;
		
	}
	.design{
		color:grey;
		font-size:35px;
		text-shadow:3px 3px 5px grey;
		text-weight:bolder;
	}
	.kill{
		float:left;
	}
       div.picture1 {
               width:350px; 
               height:450px;
               background-image:url('http://res.cloudinary.com/lovelyfin00/image/upload/c_scale,h_200,w_192/v1523820745/IMG_20171124_144344.jpg');
               margin:0; 
               padding:0;
               background-repeat:no-repeat;
}
</style>
</head>
<body class="bg">
<h1 class="text"> Welcome to <br>Omokaro Loveth's page</h1>
<div class = "yea">
			<h2 class="design"> ABOUT</h2>
			<ul>
			<li>
			A student of the university of Benin<br>curently an intern in HNG INTERNSHIP
			</li>
			</ul>
			<ul>
			<li>
			Amenble, affable, charismatic, loves everything <br>programming and up for any<br> challenge in the field 
			</li>
			</ul>
			<ul>
			<li>Web developer
			</li>
			</ul>
		</div>
		 <div class="picture1">&nbsp;
		 </div>
		    <?php

    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="lovelyfin00"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
		
		<div class="footer">
  <p>© 2018 Omokaro Loveth</p>
</div>
</body>
</html>
