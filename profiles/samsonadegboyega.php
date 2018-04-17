<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Samson's Profile</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    body {
        background-color: #598fbf;
       font-family: 'Ebrima';
    }

    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about {
      color: black;
    }

    #hello {
      font-size: 200px;
      color: #ffffff;
      font-family: 'Ebrima';
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
        /*width: 38%;*/
    /*margin: auto;*/
    /*width: 70px;
    height: 100px;*/
    }
    .profile_pic{
    /*width: 100%;*/
    padding: 5%;
    }
    .profile_pic img{
    width: 50%;
    height: 50%;
    /*border-radius: 102%;
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

  <?php 

    // $my_data = "SELECT * FROM interns_data_";
    // $result = $conn->query($my_data);
    // $resultSet = $result->fetch(PDO::FETCH_ASSOC);

    // if($resultSet->num_rows > 0) {
      
    //   $name = $resultSet['name'];
    //   $username = $resultSet['username'];
    //   $image_filename = $resultSet['image_filename'];
    // }

    // $word = "SELECT secret_word FROM secret_word";
    // $query = $conn->query($word);
    // $querySet = $query->fetch(PDO::FETCH_ASSOC);

    // if($querySet->num_rows > 0) {
    //   $secret_word = $row['secret_word'];
    // }

  //Fetch User Details
try {
    $query = "SELECT * FROM interns_data WHERE username='samsonadegboyega'";
    $resultSet = $conn->query($query);
    $result = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $result['username'];
$name = $result['name'];
$picture = $result['image_filename'];
//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $result  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $result['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $result['secret_word'];

  ?>

  <div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">


      <div class="panel panel-default">

        <div class="panel-heading">
            <h2 style="color: black; text-align: center;">My Profile </h2>
        </div>

        <div class="panel-body">
          <div id="main">
            <div id="about">
              <div class="text-center">
               <div class="profile_pic">
                  <div class="pic"><img src="http://res.cloudinary.com/webcoupers/image/upload/v1523626904/me.jpg" alt="Samson Samuels"/></div>
               </div>
               
               <h3 class="name">Name: <?php echo $name ?></h3>
               <h4>Username: <?php echo $username ?></h4>
               <h4 style="text-align:center; font-size:1em;">Lagos, Nigeria</h4>
                <h4 class="designation">Software Developer</h4>
               </div>

             </div>

           </div>

         </div>
                <div class="panel-footer">
                  <div id="social">
                    <ul class="nav nav-pills">
                      <li>
                        <a href="https://github.com/sammieneutron" target="_blank" target="_blank" target="_blank">
                          <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_150/v1523623556/github.svg" />
                        </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/sammie_neutron" target="_blank" target="_blank">
                          <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_100/v1523623465/twitter.svg" />
                        </a>
                      </li>
                      <li>
                        <a href="https://facebook.com/adgboyega.samson" target="_blank" target="_blank">
                          <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_512/v1523623281/facebook.png" />
                        </a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/in/sammieneutron" target="_blank" target="_blank">
                          <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_200/v1523624207/linkedin-icon.png" />
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
        
        </div>

    </div>

    <div class="col-md-3"></div>
    </div>
  
</body>

</html>