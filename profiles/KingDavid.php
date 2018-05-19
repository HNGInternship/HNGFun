<?php
	if(!defined('DB_USER')){
	  require "../../config.php";		//change config details when pushing
	  try {
	      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
	  } catch (PDOException $pe) {
	      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	  }
	}
	//Fetch User Details
	try {
	    $query = "SELECT * FROM interns_data WHERE username ='KingDavid'";
	    $resultSet = $conn->query($query);
	    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $e){
	    throw $e;
	}
	$username = $resultData['username'];
	$fullName = $resultData['name'];
	$picture = $resultData['image_filename'];
	//Fetch Secret Word
	try{
	    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
	    $resultSet   =  $conn->query($querySecret);
	    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
	    $secret_word =  $resultData['secret_word'];
	}catch (PDOException $e){
	    throw $e;
	}
	$secret_word =  $resultData['secret_word'];
?>

<html>
    <head>
        <title>HNG Internship 4 Stage1</title>        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">

  	</head>

   	<style>

      	 body { font-family: roboto;
             	background-color: #03030F;
                position: static;
               	color: white;}             

     	 h1  {	font-family: Roboto, sans-serif;
                font-weight: bold;
                font-size: 66px;
                line-height: 113px;
                text-align: center;
                margin:0 auto;
                top:450px;}

  	     hr {	width: 120px;
                border-color: white;
                border-style: solid;
                border-radius: 20px;
                border-width: 3px;
                margin:0 auto;
                left: 655px;
                top: 585.79px;} 

        p {     font-family:roboto, sans-serif;
				font-size: 17px;                    
				line-height: 28px;
                text-align: center;
                margin:0 auto;
                top:632px;
                left:233px;} 

        button {font-size: 18px;
                font-family: roboto;
                text-align: center;
                text-decoration: none;
                margin-top:10px;
                margin: 0 auto;
                height: 50px;
                width:170px;
                top:632px;
                left:233px;
                border-radius: 10px;
                border:2px solid white;
                background-color:  #03030F;
                color: white;
	            box-sizing: border-box;}
       
		button:hover{  text-decoration: none;
		               color:#03030F;
             		   background-color: white;;
 		               cursor: pointer;}]       

 		#center     {  position: center;} 

 	    .profile  	{  border-radius: 100%;
	                   padding: 0px;
	                   display: block;
	                   width: 189px;
	                   height: 189px;
	                   margin:0 auto;
	                   top:102px;
	                   left:575px;}

    </style>

    <body>

        <div id= center>

	     	<button>  Chat with my bot  </button>
	        
	        <img src="http://res.cloudinary.com/kingdavid/image/upload/v1526417765/Profile.jpg" class="profile">
	        
	        <h1>UI/UX DESIGN INTERN</h1>
	        
	        <hr> <br>
		    
		    <p>  
	            Hi, I am Fayemi David, a self taught UI/UX designer in the making from Lagos.<br>
	            I believe in the “simple is more” principle.<br>
	            I would be joining the HNG internship to improve myself and speed up my learning process.<br>
	            Nice to meet you.
	        </p>
   
        </div> 

    </body>
</html>
