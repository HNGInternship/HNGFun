<?php
//require('db.php');

$query = $conn->prepare("SELECT * FROM secret_word");
if($query->execute()){
  $result = $query->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];
}else{
  die("Operation failed");
}

$username = "Sunkanmi";

$data = $conn->prepare("SELECT * FROM interns_data WHERE username = :username");
$data->bindParam(":username",$username);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);
if($data->rowCount() > 0){
  $name = $result['name'];
  $image_filename = $result['image_filename'];
  $username = $result['username'];
}else{
  die("user not found");
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sunkanmi's Profile</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    body {
        background-color: #0e353e;
       font-family: 'Robot';
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
      font-family: 'Alfa Slab One';
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
    .pic{
        width: 38%;
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
    .designation{
     font-size: 1.5em;
     font-weight:bold;
     text-align:center;
    }
    
  </style>
</head>

<body>

  <div id="main">
    <div id="about">
      <div class="text-center">
       <div class="profile_pic">
          <div class="pic"><img src="<?=$image_filename;?>" alt="Sunkanmi ijatuyi"/></div>
       </div>
       
       <h3 class="name"><?=$name?></h3>
       <h4 style="text-align:center; font-size:1em;">Lagos, Nigeria</h4>
        <h4 class="designation">Software Developer</h4>

       
        
          <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://github.com/eskye" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_150/v1523623556/github.svg" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/ijatuyisunkanmi" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_100/v1523623465/twitter.svg" />
                </a>
              </li>
              <li>
                <a href="https://facebook.com/ijatuyiok" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_512/v1523623281/facebook.png" />
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/ijatuyi-sunkanmi-temitope-77046485/" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_200/v1523624207/linkedin-icon.png" />
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
