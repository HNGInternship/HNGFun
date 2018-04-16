<!DOCTYPE html>

<html lang="en">


<head>

  <meta charset="UTF-8">

  <title>Afolabi's Profile</title>

  <meta name="theme-color" content="#757575">

  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

  <style>

body {

background-color: #757575;

font-family: 'mono';

}

#main {

height: 100vh;

display: flex;

justify-content: center;

align-items: center;

}

#about {

color: #ffffff;

}

#hello {

font-size: 200px;

color: #ffffff;

font-family: 'mono';

}

#about h5 {

font-size: 14px;

color: #ffffff;

}

#social {

margin: 0 auto;

width: 250px;

}

.social-icons {

width: 25px;

transition: all 700ms;

}

.social-icons:hover {

transform: scale(1.2, 1.2);

}

.main pic{

width: 50%;

margin: auto;

height: auto;

}

.profile_pic{

width: 100%;

padding: 5%;

}

.profile_pic img{

width: 100%;

height: 200px;

border-radius: 102%;

}

.name{

font-size: 40px;

font-weight: bold;

text-align:center;

}

.description{

font-size: 1.5em;

font-weight:bold;

text-align:center;

}

</style>

</head>


<body>
<?php
        $result = $conn->query("Select * from secret_word LIMIT 1");
        $result = $result->fetch(PDO::FETCH_OBJ);
        $secret_word = $result->secret_word;
        $result2 = $conn->query("Select * from interns_data where username = 'cyphr19'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>

  <div id="main">

    <div id="about">

      <div class="text-center">

       <div id="main pic" class="bgimg">
  <img src="http://res.cloudinary.com/galdrencyphr/image/upload/v1523626611/IMG_20180218_181243_674.jpg"  alt="My Image" max-width="100%" height="150px">
  </div>

        
     

       <h3 class="name">Aina Afolabi</h3>

       <h4 style="text-align:center; font-size:1em;">Ibadan, Nigeria</h4>

        <h4 class="description">Illustrator,Programmer,Graphics designer</h4>


       

        

          <div id="social">

            <ul class="nav nav-pills">

              <li>

                <a href="https://github.com/galdrencyphr" target="_blank" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_150/v1523623556/github.svg" />

                </a>

              </li>

              <li>

                <a href="https://twitter.com/GALDREN_CYPHR" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_100/v1523623465/twitter.svg" />

                </a>

              </li>

              <li>

                <a href="https://facebook.com/tommy5b" target="_blank" target="_blank">

                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_512/v1523623281/facebook.png" />

                </a>

              </li>

           

            </ul>

          </div>

        </div>

      </div>

    </div>

  </div>

</body>


</html>
