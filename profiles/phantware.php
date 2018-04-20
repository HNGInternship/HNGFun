<?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'phantware'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
<style id="webmakerstyle">
.navbar{
  margin: 0px;
}
section{
  margin: 0px;
}
.jumbotron{
  margin: 0px;
  padding: 50px 0 60px 0;
}
section h2{
  margin-bottom: 30px;
}
#pageOne .jumbotron{
  background-color: #3498db;
  color: #eee;
}
#pageOne a {
  color: #333;
}
#about .jumbotron {
  background-color: #EEEEEE;
}
</style>
</head>
<body>

<!--here we start the first section one of the Portfolio-->
<secton id="pageOne">
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-1 col-md-2">
          <img src="http://res.cloudinary.com/phantware-nigeria/image/upload/v1523795095/me_in_suit.jpg" alt=" Phantware Photo" class="img-responsive img-circle">
        </div>
        <div class="col-md-8 typed text">
          <p>
            <i class="fa fa-chevron-right"></i> Welcome friends! I am Ismail Jamiu Babatunde and this is my first <strong>HNG INTERNSHIP </strong> portfolio
          </p>
          <p>
            <i class="fa fa-chevron-right"></i> I have not really done much project since i have joined this program.
          <p>
            <i class="fa fa-chevron-right"></i> It is quite long I have been on this web development stuffs, but I have not been able to do a very big project because I am very busy with one thing or the other, but I am back and better now. If you want to know more about me, feel free to <a href="https://www.facebook.com/phantwarecompany" target="_blank">get in touch</a> with me
          </p>
        </div>
      </div>
    </div>
  </div>
</secton>
<!-- Here we begin the section two of the Portfolio-->
<section id="about">
  <div class="jumbotron">
    <div class="container">
      <h2 class="text-center">
        About me
      </h2>
      <div class="row">
      <div class="col-md-offset-1 col-md-1 text-right"><i class="fa fa-code fa-lg"></i> 
      </div>
      <div class="col-md-9">
        <p>
          I am a self taught web developer, designer, electronic engineer, IT consultant, Forex trader, Mentor, an enterprenuerer, founder of <strong>Phantware Company</strong> based in Nigeria. I work currently in an ERP company here in Nigeria as an IT consultant, I was once an Assistant co-ordinator of Association of Muslim Engineering Student of Nigeria in Yabatech.
        </p>
        <p>
          I have been to many Tech meetups, DEV C Lagos, Hackathon Community Challenge, Lagos, Member of Free Code Camp, an online programming class. My passion is to use my skills in bringing up another generation of technology expert to change the face of Nigeria Education and inculcate the habit of humanitarian service.

  </p>
      </div>
        </div><!-- here denote the closing of row div -->
      <div class="row">
        <div class="col-md-offset-1 col-md-1 text-right"><i class="fa fa-graduation-cap fa-lg"></i>
        </div>
        <div class="col-md-9">
          <p>
            I am a graduate of Computer engineering from <a href="https://www.yabatech.edu.ng" targer="_blank">Yaba College of Education,</a> Yaba Nigeria, where I obtained my Higher National Diploma in Computer Engineering.
          </p>
        </div>
      </div>
    </div>
  </div>  
</section>

<section id="contact">
  <div class="container">
    <h2 class="text-center">
      Contact Me<br>
      <small class="lead">follow me on my social networks</small>
    </h2>
    <div class="text-center">
      <a href="https://github.com/phantware" target="_blank" class="btn btn-default btn-lg" role="button"><i class="fa fa-github"></i> Github</a>
      <a href="https://www.linkedin.com/in/ismail-jamiu-92308612a" target="_blank" class="btn btn-default btn-lg" role="button"><i class="fa fa-linkedin-square"></i> Linkedin</a>
      <a href="https://freecodecamp.com/phantware" target="_blank" class="btn btn-default btn-lg" role="button">(<i class="fa fa-fire"></i>) freeCodeCamp</a>
    </div>
  </div>
</section>

<footer>
  <div class="container text-center">
      <i class="fa fa-copyright"></i> Copyright 2015, Ismail Jamiu Babatunde | All Rights Reserved.
      <a href="#" class="btn btn-default pull-right"><i class="fa fa-arrow-up fa-2x"></i></a>
  </div>
</footer>



<script>

//# sourceURL=userscript.js
</script>
</body>
</html>