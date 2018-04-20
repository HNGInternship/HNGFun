<?php
// include "config.php";
// x

// try {
// 		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
// 	} 
// 	catch (PDOException $pe) {
// 			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
// 			} 

    try {
        $sql = "SELECT name, username, image_filename FROM interns_data WHERE username='Wizard of Oz'";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
		
		$fullname = $data["name"];
		$username = $data["username"];
		$profilePic = $data["image_filename"];

		  try {
        $sql = "SELECT secret_word FROM secret_word";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }

    $secret_word=$data["secret_word"];

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700" rel="stylesheet" type="text/css">


	<title>HNG FUN</title>


<style>
body{
background: #667db6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


font-family: "Open Sans";
font-size:14px;


}



.main-content{
margin-top:5%;
/*border-radius: 10px 10px;*/
/*box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.4);*/
min-height: 400px;

}


.main-info{
display: flex;
padding: 0px;
background-image: url("https://res.cloudinary.com/benjorah/image/upload/v1524172454/beth-teutschmann-154958-unsplash.jpg");
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
background-repeat: no-repeat;
background-size: cover;
background-position: center;
text-align: center;
color: white;
max-width: 500px;


}


#fullname,#school{
	font-size:1.6em;
	font-family: arial;
	text-align: center;
	padding: 3%;
	padding-bottom: 1%;
}


#username{

	font-size:1.3em;
	font-family: arial;
	text-align: center;
	padding: 5%;
	padding-top: 0%;

}

#job{

	font-size:1em;
	font-family: arial;
	text-align: center;
	margin-bottom: 10%;

}


#secret-word{

    font-size:1.6em;
    font-family: arial;
    text-align: center;
    padding: 3%;
    padding-bottom: 0%;
    margin-bottom: 0%;
    color: white;

}


#profile-pic{

width:50%;
height:auto;
margin:5%;
}

.scrim{
	padding-top:5%;
padding-bottom:5%;
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
text-align: center;
background: rgba(0, 0, 0, 0.7);
}



@media(max-width:960px){

.main-Info{
	max-width: 300px;
}
}


</style>


  </head>
  <body>

<main class="container">

    <h1 id="secret-word">The secret word is <?php echo $secret_word?></h1> 

    
<div class="row main-content justify-content-md-center">



    <section class="main-info col-sm-10 col-lg-6">
    	

<div class="scrim">


    <h1 id="fullname"><?php echo $fullname?></h1>

    <h2 id="username">@<?php echo $username?></h2>

    <h3 id="job">Web &amp; Android Engineer</h3>


     <img class="rounded-circle" id="profile-pic" src=<?php echo $profilePic?> alt="Profile picture"> 

    <h3 id="school">Graduate of the University of Lagos</h3>


</div>




    </section>

    
</div>

</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>