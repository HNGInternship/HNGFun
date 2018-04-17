
<!--  -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Holathunbhosun Profile</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	         <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

   <style type="text/css">
   	
  /* body{
   	background-color: grey;


   }*/

   #navbar{

   	background: green;

   }
 p{
   	color: black;
   	font-size: 30px;
   	
   }

 h5{
 	text-align: center;
 	font-size: 25px;

 }
 h4 , h6{
 	text-align: center;
 	font-size: 25px;

 }  
 h1{
 	text-align: center;

 }


 .footer{
 	background: green;
 	margin-top: 800px;
 }

 img{


 }
#social{
	margin: auto;
	padding-left: 20px;
}
#social ul, #social ul li{
	display:inline-flex;
	text-decoration: none;

}
#social ul li a{
	color:black;
     font-size: 50px;
     text-decoration: none;
     transition: all 0.4s ease-in-out;
     width: 100px;
     height: 30px;
     line-height: 50px;
     text-align: center;
     vertical-align: middle;
     position: relative;
}
   </style>

<?php 





 ?>


</head>
<body>
<nav id="navbar">
  <p style="font-size: 50px;">My Profile</p>
</nav>
<br><br>
<?php 
   require_once ('db.php');



      
			$query = $conn->query("SELECT * FROM secret_word");
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$secret_word = $result['secret_word'];


	$result2 = $conn->query("SELECT * FROM interns_data WHERE  username = 'horlathunbhosun'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
   // $user = $result2->fetch();


 ?>

	<div class="container-fluid">
  <div class="row-fluid">
    <div class="col-md-6 ">
      <!--Sidebar content-->


			<img src="<?php echo $user->image_filename; ?>" style="border: 2px solid #f3f3f3;" alt="My Image"  class="img-circle"  width="400px" height="600px">


    </div>
    <div class="col-md-6">
    	<h1>ABOUT ME</h1> <br>
		 	<h5><b>Name:</b> <?php echo  $user->name; ?> <span></span></h5>
		 	<h5><b>Username:</b> (<?php echo $user->username; ?>) </h5>
		 	<h6>(Web Developer)</h6>
		 	<h6><b>Skills:</b></h6> 
        <p style="padding-right: 10px;"> PHP,HTML,CSS,BOOTSTRAP,CODEIGNITER.</p>
		<div id="social">
				<ul>

				<li><a href="https://github.com/horlathunbhosun" target="_blank"><i class="fa fa-github"></i></a></li>
				<li><a href="https://twitter.com/@horlathunbhosun" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.linkedin.com/in/olulode-olatunbosun-458927135/" target="_blank"><i class="fa fa-linkedin "></i></a></li>
				<li><a href="https://medium.com/@olulode olatunbosun" target="_blank"><i class="fa fa-medium"></i></a></li>
				<li><a href="https://web.facebook.com/olaolulode" target="_blank"><i class="fa fa-facebook"></i></a>	</li>
				<li><a href="https://www.instagram.com/ola_olulode" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
			</div>

                          
	</div>

    </div>
  </div>
</div>




</div>


</body>
<div class="footer">

<p> </p>
	
</div>

</html>







