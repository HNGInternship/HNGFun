<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">
    <?php
       $y = $GLOBALS ['profile_name'];

       $result = $conn->query("Select * from secret_word LIMIT 1");
       $result = $result->fetch(PDO::FETCH_OBJ);
       $secret_word = $result->secret_word;
    
       $result2 = $conn->query("Select * from interns_data where username = '$y'");
       $result2->setFetchMode(PDO::FETCH_ASSOC);
       $user =$result2->fetch();
       $name = $user['name'];
       $username = $user['username'];
       $image = $user['image_filename'];
    ?>

<div class="w3-content w3-margin-top" style="max-width:1400px;">

  
  <div class="w3-row-padding">
  
    
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="<?php echo $image ?>" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2 style="color:white;"><?php echo ($name) ?></h2>
            <h4 style="color:white;">@<?php echo $username ?></h4>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Software Developer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Accra, Ghana</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>sammykori72@gmail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>+233542833108</p>
          <hr>

          <p class="w3-large"><b><i class=" fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p>Web Development</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>
          <p>React Native - Mobile Development</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p>JAVA</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">90%</div>
          </div>
          <p>Python</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">60%</div>
          </div>
          <br>

          <p class="w3-large w3-text-theme"><b><i class=" fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Twi</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Dagaate</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:75%"></div>
          </div>
          <br>
        </div>
      </div><br>


    </div>


    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class=" fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Mobile Developer</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>November 2017 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
          <p>My journey of becoming a mobile developer started not long ago when I was supposed to build a mobile app as a project in school. I learnt React Native because it was cross platform and fairly easy to use. My project can be found <a href = 'https://github.com/sammykori/foodexpress'> here</a></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Web Developer</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>July 2016 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
          <p>In school we were taught web development. I started with HTML, CSS and Javascript. Later on learnt PHP, and the laravel framework. Since then i have been learning different frameworks like Django, Devless and React.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Graphic Designer</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>Jun 2016 - </h6>
          <p>I design flyers, cards, logos, etc using adobe photoshop and microsoft publisher</p><br>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class=" fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Lancaster University</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>2015 - 2019</h6>
          <p>Computer Science (Bsc)</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>w3schools.com</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>Forever</h6>
          <p>HTML, PHP, Javascript, CSS</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>HNG Internship</b></h5>
          <h6 class="w3-text-teal"><i class=" fa-fw w3-margin-right"></i>2018 - </h6>
          <p>Bachelor Degree</p><br>
        </div>
      </div>

  
    </div>
    
  </div>
  
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <a href = 'https://www.facebook.com/sammy.kori.1'><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href = 'https://www.instagram.com/sammykori/'><i class="fa fa-instagram w3-hover-opacity"></i></a>
  <a href = 'https://github.com/sammykori'><i class="fa fa-github-p w3-hover-opacity"></i></a>
  <a href = 'https://twitter.com/kori_mwin'><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href = 'https://www.linkedin.com/in/samuelkori/'><i class="fa fa-linkedin w3-hover-opacity"></i></a>
  <br>
</footer>

</body>
</html>