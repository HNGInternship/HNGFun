<?php
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result;
		$result2 = $conn->query("Select * from interns_data where username = 'chemicalstan'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHEMICALSTAN PROFILE</title>

<!--     Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
      <div class="container">
        <h1 class="text-center">ChemicalStan's Profile.</h1>
      </div>
    </nav>
<!--header end-->
    
    
     <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Entries Column -->
        
            <h2 class="text-center" >Hello Guys, I'm an intern @ HNG4.0</h2>
            <hr>
            <div class="row">
            <div class = "col-md-4">
        <img src="http://res.cloudinary.com/dtlp5erc1/image/upload/v1523705946/DSC_7568.jpg" alt="" width="160" height="200">
          <hr>
<a style="text-decoration:none;" href="https://github.com/ChemicalStan"><i style="font-size:30px;     margin-right:3%;
    margin-left: 13%;" class="devicon-github-plain colored"></i></a>
<a style="text-decoration:none;" href="https://twitter.com/ChemicalStan"><i style="font-size:25px; margin-right: 4%;" class="devicon-twitter-plain colored"></i></a>         <hr>
           </div>
            <div class="class-md-4">
                
                
                <h3>Skills:PHP,HTML,CSS & JS.</h3>
                <h3>Email:chemicalstan15@gmail.com</h3>
                <h3>Username:chemicalstan.</h3>
            
            </div>
            </div>
            </div>
            </div>
</body>
</html>
