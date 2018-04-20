<?php 
  require 'db.php';
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'enyioma'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- W3 CSS and font awesome links-->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="c:\Users\Jnr\Desktop\bootstrap4beta\css\bootstrap.min.css">
    <style>
         .prof{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: justify;
        }
        .profile {
            /* width: 1500px; */
            /* left: 50%; */
            margin-left: 500px;
            margin-right: auto;
            width: 1500px;
            
        }
        .fa {
            padding: 20px;
            font-size: 30px;
             width: 60px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
             border-radius: 60%;
        }

        .fa:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body class="w3-container">
    <div class="profile">

    <h2>Enyioma's Profile Page</h2>
    
    
    <div class="w3-card-4" style="width:40%">
      <img src= "https://res.cloudinary.com/dwkzixuca/image/upload/v1524141051/eyo3.jpg" alt="Enyioma's photo" style="width:100%">
      <div class="w3-container">
        <h4 class= "prof"><b>Enyioma Nwadibia</b></h4>
        <p class= "prof">I am a budding Web Developer with an intermediate knowledge and experience garnered in a very short while.
                I am a fast learner who is optimistic about any task, situation and life in general. I have working knowledge of the following 
                technologies (The list will keep increasing of course):<br>
                <b>Frontend:</b> HTML, CSS, Bootstrap<br>
                <b>Backend:</b> MySQL, PHP<br>
                <b>Server:</b> Laragon, MAMP<br>
                <b>Design:</b> Figma<br>
        </p>
        <div>
            <a href="https://twitter.com/Fynewily" target= "_blank" class="fa fa-twitter"></a>
            <a href="https://www.linkedin.com/in/enyioma-nwadibia-40b59244/" target= "_blank" class="fa fa-linkedin-square"></a>
            <a href="https://github.com/fynewily" target= "_blank" class="fa fa-github"></a>
            <a href="https://hnginternship4.slack.com/account/profile" target= "_blank" class="fa fa-slack"></a>

              
        </div>
      </div>
    </div>
    </div>
    
</body>
</html>
