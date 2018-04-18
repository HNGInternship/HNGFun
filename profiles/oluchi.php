<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ATANDA AMINAT</title>
  <style type="text/css">
  	p{
  		color: #ffffff
  	}

	body {

		padding-top: 150px;
      	/*background-color: #ff0000;*/
      	font-family: 'Ubuntu';
    	width: 100%;
        text-align: center;
    	height: 100%;
    	background-image: url('http://res.cloudinary.com/dgq4lqnnd/image/upload/v1523618844/BeautyPlus_20180101165118_save_1.jpg');
    	background-size: cover;
    	font-size: 50px
    }
  </style>
</head>

<body>

		<p>Hi Everyone!!!. </p>
        <p>I'm ATANDA AMINAT OLUCHI </p>
        <p>I am a Tech Enthusiast from Nigeria</p>
     
         <a href="https://github.com/oleey">
             <p>Checkout my work on github</p>
         </a>

             
          <a href="https://twitter.com/precsyg">
            <p>Follow me on twitter</p>
          </a>

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
    
</body>

</html>