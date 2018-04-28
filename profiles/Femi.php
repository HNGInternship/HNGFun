<?php
 $result = $conn->query("Select * from secret_word LIMIT 1");
 $result = $result->fetch(PDO::FETCH_OBJ);
 $secret_word = $result->secret_word;

 $result2 = $conn->query("Select * from interns_data where username = 'femi'");
 $user = $result2->fetch(PDO::FETCH_OBJ);

 ?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>@Femi Profile Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css">
  
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
    <script type="text/javascript" src="../js/main.js"></script>

    <style>

      body {
        /*width: 100%;
        height: 100%;
        background-image: url("./pattern2.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;*/
        background-color: #0C1621;
        /*overflow-x: hidden;*/
      }

      .square {
        background-color: #FBFEFE;
        border: 2px solid #4F4F4F;
        border-radius: 5px;
        width: 460px;
        height: 600px;
        font-family: "Open Sans";
        /*text-align: center;
        position: relative;
        top: 50px;*/
      }

      img {
        max-width: 236px;
        max-height: 236px;
        /*min-height: 140px;
        min-width: 140px;
        margin: 0 auto;
        padding-top: 25px;*/
      }

      /*h1 {
        line-height: 30px;
        font-weight: bold;
        color: #000000;
        font-size: px;
      }*/

      .nick {
        /*font-size:24px;*/
        color: #333333;
        /*margin-bottom: 38px;*/
      }

      .border {
        border: 0.5px solid #9F9D9D;
        position: relative;
        top: -3px;
        margin: 0 auto;
        max-width: 200px;
      }

.about {
  font-family: "Open Sans";
  /*font-size: 15px;
  font-weight: normal;
  width: 380px;
  margin: 0 auto;*/
}

.in {
  /*font-weight: 300;
  font-style: italic;
  font-size: 12px;*/
  font-family: "Montserrat";
  margin: 0 auto;
}

    </style>
  </head>
  <body class="oj-web-applayout-body">

<div id="pageContent" class="oj-web-applayout-page">
<header class="oj-web-applayout-header">
  @Femi
    </header>
<div class="main d-flex justify-content-center align-content-center">
            <div class="square mt-5 py-5">
            <div class="my-3">
              
              <div class="d-flex justify-content-center">
                <img src="https://res.cloudinary.com/dnxuvszxh/image/upload/v1524614743/profile.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="Femi">
              </div>
                <p class="text-center h1"><b>OLUWAFEMI</b></p>
                <p class="text-center h1"><b>AWOJANA</b></p>
                <div class="text-center border"></div>
                <p class="nick text-center h4">@femi</p>
                <p class="about text-center h4 mt-3"><span class="in h6">UI/UX Designer|Web Developer</span><br>Hello! I am Femi.<br> I am also an intern in Hotels.ng internship program.<br>
                   I love programming and design, i am here to improve on those skill.</p>
            </div>
          </div>
        </div>
        <footer role="contentinfo" class="oj-web-applayout-footer">
  <div class="oj-web-applayout-footer-item oj-web-applayout-max-width">
    @Femi Really Really hoping it works.
  </div>
</footer>
  </div>
          

         

        
  </body>
</html>