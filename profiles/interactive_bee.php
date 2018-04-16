<?php
   try {
       $sql = 'SELECT * FROM secret_word';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q->fetch();
   } catch (PDOException $e) {
       throw $e;
   }
   $secret_word = $data['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Rhodium+Libre" rel="stylesheet">
    <title>Blessing Akpan</title>
</head>
<style>
    body{
        font-family: 'Rhodium Libre', serif;
    }
    #head{
        background: blue;
        min-height: 400px;
        text-align:center;
    }
    img{
        border-radius:50%;
        background-color: beige;
        width:350px;
        height:300px;
        margin-top:3em;
    }
    h1{
        font-size: 2.5em;
        /* padding:0px; */
        margin-bottom:0px;
    }
    #content{
        text-align:center;
    }
    p{
        margin:0px;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<body>
    <div id="head">
        <img src="http://res.cloudinary.com/dlvlxep3r/image/upload/v1523715773/interactive_bee.jpg" alt="image">
    </div>
    <div id="content">
        <h1>AKPAN, BLESSING MICHAEL</h1>
        <p>Writer | Android Developer | HNG Intern</p>
        <p>Email: blessingakpan0001@gmail.com</p>
    </div>
    <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://github.com/BeeAkpan" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/eskye/image/upload/c_scale,w_150/v1523623556/github.svg" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/interactive_bee" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/dlvlxep3r/image/upload/v1523839984/twitter.png" />
                </a>
              </li>
              <li>
                <a href="https://facebook.com/interactiveBee" target="_blank" target="_blank">
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