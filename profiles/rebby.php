<!DOCTYPE html>
<html>
<head>
<?php
$profile_query = "SELECT name, username, image_filename FROM interns_data WHERE username = '$profile_name' LIMIT 1";
$profile_result = $conn->query($profile_query);
$profile_result->setFetchMode(PDO::FETCH_ASSOC);
$profile_details = $profile_result->fetch();

$secret_word_query = "SELECT secret_word FROM secret_word LIMIT 1";
$secret_word_result = $conn->query($secret_word_query);
$secret_word_result->setFetchMode(PDO::FETCH_ASSOC);
$secret = $secret_word_result->fetch();
$secret_word = $secret['secret_word'];
?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rebby - HNGINTERN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <style>
        body{
            padding:0;
            margin:0;
            font-family: 'Source Sans Pro', sans-serif;
            background: url('https://res.cloudinary.com/rebby/image/upload/v1525157249/lagoon.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        header{
            border-radius: 25px;
            border: 2px solid;
            background-color: white;
            text-align: center;
            padding: 2rem;
            position: relative;      
        }
       
        .img {
            border-radius: 50%;
            border:  5px solid white;
            width: 15rem;
            box-shadow: 5px 5px 5px grey;
            top: 50%;
        }
        h6 {
            left: 20%;
            color: black;
        }
        .main{
            border-radius: 25px;
            border: 2px solid;
            margin:30px;
            text-align: center;
            font-size: 1rem;
            background-color: white;
            position: relative;
            
        }

    #fun {
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 25px;
    }
    #myProgress {
    position: relative;
    border-radius: 25px;
    width: 50%;
    height: 20px;
    background-color: grey;
    float: right;
    right: 20%;
}
#myBar {
    position: relative;
    border-radius: 25px;
    height: 100%;
    float: left;
    
}

#label {
    /*text-align: center;  If you want to center it */
    line-height: 15px; /* Set the line-height to the same as the height of the progress bar container, to center it vertically */
    color: black;
    position: absolute;
}

.icon {
    background-color: black;
    border-radius: 40px;
    width: 40%;
    position: absolute;
    left: 30%;
}

.iconlink {
    color: white;
    
}

.iconlink:visited {
    color: white;
}


    </style>
</head>
<body>
        <!-- PICTURE AREA -->
        <header> 
               <img  class='img' src='<?php echo $profile_details['image_filename']?>'>
               <p> Welcome to my profile</p>
               <p>"A journey of a thousand mile begins with a step" - Never Give Up! </p>
               <div id = "fun"> <p><b>@ <?php echo $profile_details['username']?></b> </p> </div>
               <div class = "icon">
                                   <a href="https://twitter.com/_Reebby" target="_blank" class="iconlink"><i class="fa fa-twitter"></i></a> 
                                   <a href="www.linkedin.com/in/rebecca-oshiobughie-453361151" target="_blank" class="iconlink"><i class="fa fa-linkedin"></i></a> 
                                   <a href="https://www.facebook.com/rebecca.oshiobughie" target="_blank" class="iconlink"><i class="fa fa-facebook"></i></a>
               </div>
        </header>

        <!-- FIRST HEADER FOR BIO-->
        <div class='main'>
            <div id = "fun"> <p><b>BIO</b> </p> </div>
              <p><h5>Full Name: </h5><?php echo $profile_details['name']?></p>
              <p><h5>Slack Username: </h5> @<?php echo $profile_details['username']?></p>
              <p><h5>Work Status:</h5> Full Stack Developer ~ Intern(HNG)</p>
              <p><h5>Skills:</h5> HTML/CSS/JS/PHP/GIT/LINUX/PYTHON/LARAVEL/WORDPRESS</p>
              <p><h5>Interest:</h5> Coding, Travelling, Music, Reading, Solving problems, Playing video games  </p>
              <div id = "fun"> <p><b> @ <?php echo $profile_details['username'] ?></b> </p> </div>
        </div>


        <!-- SECOND HEADER FOR SKILLS -->
        <div class = "main">
            <div id = "fun"> <p><b> SKILL PROGRESS</b> </p> </div>

                <h6>HTML:   <div id="myProgress">
                                <div id="myBar" style="background-color: teal;  width: 100%;">
                                    <div id="label" style=" left: 50%;">100%</div>
                                </div>
                            </div> 
                </h6>

                <h6>CSS:    <div id="myProgress">
                               <div id="myBar" style="background-color: yellow;  width: 100%;">
                                    <div id="label" style=" left: 50%;"> 100% </div>
                               </div>
                           </div>
                </h6>

               <h6>JS:     <div id="myProgress">
                               <div id="myBar" style="background-color: red;  width: 70%;">
                                    <div id="label" style=" left: 74%;"> 70%</div>
                                      </div>
                          </div> 
                </h6>

               <h6>PHP:  <div id="myProgress">
                              <div id="myBar" style="background-color: teal;  width: 90%;" >
                                    <div id="label" style=" left: 58%;"> 90% </div>
                                      </div>
                        </div> 
               </h6>

                <h6>GIT:  <div id="myProgress">
                               <div id="myBar" style="background-color: yellow;  width: 80%;">
                                    <div id="label" style=" left: 65%;"> 80% </div>
                               </div>
                        </div>
                </h6>

                 <h6>LINUX:  <div id="myProgress">
                                  <div id="myBar" style="background-color: red;  width: 90%;">
                                      <div id="label" style=" left: 58%;"> 90%</div>
                                    </div>
                            </div> 
                </h6>

                <h6>LARAVEL:  <div id="myProgress">
                                <div id="myBar" style="background-color: teal;  width: 80%;">
                                    <div id="label" style=" left: 65%;">80%</div>
                                </div>
                            </div>
                </h6>

                <h6>WORDPRESS:  <div id="myProgress">
                                    <div id="myBar" style="background-color: yellow;  width: 99%;">
                                           <div id="label" style=" left: 52.8%;"> 99%</div>
                                    </div>
                                </div>
                 </h6>

                <h6>PYTHON:  <div id="myProgress">
                                  <div id="myBar" style="background-color: red;  width: 50%;">
                                           <div id="label" style=" left: 105%;"> 50%</div>
                                  </div>
                            </div> 
                </h6>

               <div id = "fun"> 
                        <p><b> @ <?php echo $profile_details['username'] ?></b> </p>
               </div>
        </div>
 
</body>
</html>