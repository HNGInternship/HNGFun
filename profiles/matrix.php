<!DOCTYPE html>
<html>
<head>
	<title>Matrix</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.card {
		    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		    max-width: 300px;
		    margin: auto;
		    text-align: center;
		}

		.title {
		    color: grey;
		    font-size: 18px;
		}

		button {
		    border: none;
		    outline: 0;
		    display: inline-block;
		    padding: 8px;
		    color: white;
		    background-color: #000;
		    text-align: center;
		    cursor: pointer;
		    width: 100%;
		    font-size: 18px;
		}

		a {
		    text-decoration: none;
		    font-size: 22px;
		    color: black;
		}

		button:hover, a:hover {
		    opacity: 0.7;
		}
		.list{
			list-style: none;
			display: inline-flex;
			margin-left: 40px;
		}
		.list li{
			padding-left: 10px;
		}
	</style>
</head>
<body>

	<?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
    } catch (PDOException $e) {

        throw $e;
    }?>

	<div class="card">
	  <img src="https://res.cloudinary.com/sirmatrix/image/upload/v1523739407/sm.jpg" alt="John" style="width:100%">
	  <h1>Sanusi Mubaraq</h1>
	  <p class="title">Web developer</p>
	  <p>Nigeria</p>
	  <ul class="list">
		  <li><a href="https://github.com/LPMatrix"><i class="fa fa-github"></i></a> </li>
		  <li><a href="https://twitter.com/_sirmatrix_"><i class="fa fa-twitter"></i></a></li> 
		  <li><a href="https://www.linkedin.com/in/matrix2552/"><i class="fa fa-linkedin"></i></a></li> 
		  <li><a href="#"><i class="fa fa-facebook"></i></a></li> 
	  </ul>
	  <p><button>Contact</button></p>
	</div>

</body>
</html>