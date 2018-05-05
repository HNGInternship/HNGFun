<?php 
	//create database connection
	if(!defined('DB_USER')){
        /*require "./../db.php"; */  
        require "../../../config.php"; 
        try {
            $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
        }
    }

    //query databse for secret word
    $query_secret_word = $conn->query("Select * from secret_word LIMIT 1");
	$query_secret_word = $query_secret_word->fetch(PDO::FETCH_OBJ);
	$secret_word = $query_secret_word->secret_word;

    //query databse for username
    $query_username = $conn->query("Select * from interns_data where username = 'achim'");
	$query_username = $query_username->fetch(PDO::FETCH_OBJ);
	$username = $query_username->username;

    //query databse for name
	$query_name = $conn->query("Select * from interns_data where name = 'Achim Munene'");
	$query_name = $query_name->fetch(PDO::FETCH_OBJ);
    $name = $query_name->name;

?>
<html >

<title><?php echo $name ?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
body {
    background-color: #f2f2f2;
      font-family: "Lato";
      font-weight: 300;
      font-size: 16px;
      color: #555;
  
      -webkit-font-smoothing: antialiased;
      -webkit-overflow-scrolling: touch;
  }
  
  /* Titles */
  h1, h2, h3, h4, h5, h6 {
      font-family: "Raleway";
      font-weight: 300;
      color: #333;
  }
  
  
  /* Paragraph & Typographic */
  p {
      line-height: 28px;
      margin-bottom: 25px;
  }
  
  .centered {
      text-align: center;
  }
  
  /* Links */
  a {
      color: #f85c37;
      word-wrap: break-word;
  
      -webkit-transition: color 0.1s ease-in, background 0.1s ease-in;
      -moz-transition: color 0.1s ease-in, background 0.1s ease-in;
      -ms-transition: color 0.1s ease-in, background 0.1s ease-in;
      -o-transition: color 0.1s ease-in, background 0.1s ease-in;
      transition: color 0.1s ease-in, background 0.1s ease-in;
  }
  
  a:hover,
  a:focus {
      color: #7b7b7b;
      text-decoration: none;
      outline: 0;
  }
  
  a:before,
  a:after {
      -webkit-transition: color 0.1s ease-in, background 0.1s ease-in;
      -moz-transition: color 0.1s ease-in, background 0.1s ease-in;
      -ms-transition: color 0.1s ease-in, background 0.1s ease-in;
      -o-transition: color 0.1s ease-in, background 0.1s ease-in;
      transition: color 0.1s ease-in, background 0.1s ease-in;
  }
  
   hr {
      display: block;
      height: 1px;
      border: 0;
      border-top: 1px solid #ccc;
      margin: 1em 0;
      padding: 0;
  }

  #headerwrap {
      background: url(http://res.cloudinary.com/kimo/image/upload/c_scale,h_600,w_1300/v1525527786/SAM_2501.jpg) no-repeat center top;
      text-align:center;
      background-attachment: relative;
      background-position: center center;
      min-height: 500px;
      width: 100%;
      
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
  
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
  }
  
  #headerwrap h1 {
      font-size: 80px;
      color: white;
  }
  
  #headerwrap h3 {
      font-size: 20px;
      color: white;
  }
  
  /* Intnro Wrap */
  
  #intro {
      background: #2c3e50;
      padding-top: 60px;
      padding-bottom: 60px;
      color: white;
  } 
  
  #intro h5, p {
      color: white;
  }
  
  #intro i {
      color: white;
      font-size: 20px;
      padding-right: 8px;
      vertical-align: middle;
  }

</style>


<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>


</head>

<body data-spy="scroll" data-offset="0" data-target="#nav">

<div id="section-topbar">
    <div id="topbar-inner">
        <div class="container">
            <div class="row">

                <div class="clear"></div>
            </div><!--/.row -->
        </div><!--/.container -->

        <div class="clear"></div>
    </div><!--/ #topbar-inner -->
</div><!--/ #section-topbar -->

<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1 style="padding-top:300;"><?php echo  $name ?></h1>
                <h3>Deep Learning Engineer | achim_munene@hotmail.com</h3>
            </div><!--/.col-lg-12 -->
        </div><!--/.row -->
    </div><!--/.container -->
</div><!--/.#headerwrap -->


<section id="about" name="about"></section>
<div id="intro">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-2 col-lg-offset-1">
                <h5>ABOUT</h5>
            </div>
            <div class="col-lg-6">
                <p>I am a self taught Full stack python developer, i mainly work with the Flask Microframework, an Artificial Intelligence fanatic and UI/UX designer....</p>
            </div>
            <div class="col-lg-3">
                <h2><?php echo  $name ?></h2>
            </div>
            
        </div><!--/.row -->
    </div><!--/.container -->
</div>

</body>
</html>