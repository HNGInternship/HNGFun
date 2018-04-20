<!DOCTYPE html>
 <?php  
	require('db.php');
		$connect = mysqli_connect( localhost, root, Freeborn01, hng_fun );
		$result = mysqli_query($connect, "SELECT * FROM secret_word");
		$secret_word = mysqli_fetch_assoc($result)['secret_word'];
		$result = mysqli_query($connect, "SELECT * FROM interns_data_ WHERE username = 'Fayoung'");
	if($result) $my_data = mysqli_fetch_assoc($result);
	else {echo "An error occured";}
    }
	$name= $result['name'];
	$username= $result['username'];
	$link= $result['image_filename'];
?>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HNG FUN</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="/css/style2.css" rel="stylesheet">
    <link href="/css/style1.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/learn.css" rel="stylesheet">

    <!-- <link href="css/carousel.css" rel="stylesheet">-->
    <link href="/css/landing-page.min.css" rel="stylesheet">

    <style type="text/css">
      
      body{
        background-color: #000000;
        color: #ffffff 
      }
      h1{
        color: #ffffff;
      }
      h3{
        color: #ffffff;

      }
      #name{
        color: #ffffff;
        font-size: 100px;
        font-family:'Alfa Slab One';
        text-align: center;
        padding-left: 120px; 
      }
      #main{
        justify-content: center;
        font-family: arial;
        text-align: center;
      }
    </style>    
  </head>

  <body>
<<<<<<< HEAD
<<<<<<< HEAD
  <?php  
	require('db.php');
		$connect = mysqli_connect( localhost, root, Freeborn01, hng_fun );
		$result = mysqli_query($connect, "SELECT * FROM secret_word");
		$secret_word = mysqli_fetch_assoc($result)['secret_word'];
		$result = mysqli_query($connect, "SELECT * FROM interns_data_ WHERE username = 'Fayoung'");
	if($result) $my_data = mysqli_fetch_assoc($result);
	else {echo "An error occured";}
    }
	$name= $result['name'];
	$username= $result['username'];
	$link= $result['image_filename'];
?>
=======
 
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
 
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand" href="/index.php">HNG FUN</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/learn.php">Learn</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="/listing.php">Interns</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/testimonies.php">Testimonies</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <hr>
    <hr><br>

    <!--Avatar-->
    <img src="https://res.cloudinary.com/fayoung/image/upload/v1523738849/me.jpg" width="300px" style="border-radius: 50%" alt="Fayoung" width="300" height="290" radius="10px" border="7px"><span id="name"> Fayoung </span>
    
    <!--content-->
    <span id="main">
     
      <h3><hr><hr><br>  
      Hello, my name is <strong> Faith Uhie. </strong>
      Mechanical Engineering student and Full Stack Developer.<br><br>
      I read and write HTML/CSS,
      Javascript and Python.<br>
      I love to learn and I’m very open to new ideas.
      <br>
      <br>
      A big thank you to HNG and all the sponsors for this wonderful program. Cheers!!
      <br><br><hr>
      </h3>
    </span>
    
    <!-- my footer -->
    <footer>
	
		<ul class="social-icons animated">
			<li>
				<a href="https://web.facebook.com/faith.uhie" target="_blank" class="social-icon">
					<span class="fa" data-hover="&#xf0e1;">&#xf0e1;</span>
				</a>
			</li>
			<li>
				<a href="https://twitter.com/_Fayoung" target="_blank" class="social-icon">
					<span class="fa" data-hover="&#xf099;">&#xf099;</span>
				</a>
			</li>
			<li>
				<a href="https://www.github.com/Fayoung01" target="_blank" class="social-icon">
					<span class="fa" data-hover="&#xf09b;">&#xf09b;</span>
				</a>
			</li>
		</ul>
	
      <p style="font-size: 28px">Contact</p>
        
    </footer>
    <br>
    <br>
    <br>
    <script type="text/javascript">document.getElementById('secret').style.display = 'block';</script>
    </body>

	<?php
   try {
       $sql = 'SELECT * FROM secret_word';
	   }
	   $secret_word = $data['secret_word'];
   ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/hng.min.js"></script>
  </body>

</html>