<!DOCTYPE html>
<html lang="en">
<?php 
	function getUserInfo($username="Fayoung"){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT intern_id, name, username, image_filename FROM interns_data WHERE username =:username");
		    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$user_info = getUserInfo();

	function getSecretWord(){
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT * FROM secret_word");
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    if(!empty($result)){
		    	return $result[0]['secret_word'];
		    }
		    
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

	$secret_word = getSecretWord($user_info['intern_id']);
?>

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
    <img src=<?php echo $user_info['image_filename']?> width="300px" style="border-radius: 50%" alt="Fayoung" width="300" height="290" radius="10px" border="7px"><span id="name"><?php echo $user_info['username'];?></span>
    
    <!--content-->
    <span id="main">
     
      <h3><hr><hr><br>
      Hello, my name is <strong><?php echo $user_info['name']?></strong>
      Mechanical Engineer and Full Stack Developer.<br><br>
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
      <p style="font-size: 28px">Contact:</p>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a id="twitter" href="https://twitter.com/_Fayoung" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>  
              </li>
                 
              <li class="list-inline-item">
                <a id="facebook" href="https://web.facebook.com/faith.uhie" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
              </li>
                 
              <li class="list-inline-item">
                <a id="github" href="https://github.com/Fayoung01" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <br>
    <br>
    <br>
    <script type="text/javascript">document.getElementById('secret').style.display = 'block';</script>
    </body>


    <!-- HNG footer -->
    <footer>
      <div class="container">
        <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
               <li class="list-inline-item">
                  <a id="twitter" href="https://twitter.com/hnginternship?lang=en" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="facebook" href="https://web.facebook.com/hotelsng/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="github" href="https://github.com/HNGInternship/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                      </span>
                      </a>
                  </li>
    
                </ul>
               <p class="copyright text-muted">Copyright &copy; HNG FUN 2018</p>
            </div>
          </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/hng.min.js"></script>
  </body>

</html>