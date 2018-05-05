<?php
    $result = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("SELECT * FROM interns_data where username = 'Fumike'");
    $user = $result2->fetch(PDO::FETCH_ASSOC);

    $username = $user['username'];
    $name = $user['name'];
    $image_filename = $user['image_filename'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hng_Fun</title>
    <style type="text/css">
        body {
            color: blue;
            background-color: white;
}
#wrap {
                width:50%;
                margin:0 auto;
                padding-top: 100px;
                
        }
        .container{
            margin: 50px auto;
        }
p {
            font-family: verdana;
            font-size: 16px;
            color: black;
            width: 500px;
            padding-left: 20px;
        
       }
        img{
            padding-left: 20px;
            border-radius: 50%;

        }

        #column1 {
                float:left;
                width:400px;
                
        }
       /* #column2 {
                float:right;
                width:500px;
                padding-right: 80px;
        }

       */

        .fa-instagram {
            background: red;
            color: white;
        }
        
        .fa-facebook {
            background: blue;
            color: white;
        }

        .fa-twitter {
            background: blue;
            color: white;
        }
        .fa-linkedin {
            background: blue;
            color: white;
        }
        .fa-github {
            background: black;
            color: white;
        }

        
        form {
            font-size: 15px;
        }

        }
    </style>
        
        <script type="text/javascript">
            function show_alert()
        {
            alert("Thanks for reaching out, I will respond shortly! You can also follow me on all social media platforms by clicking any of the icons");
        }
</script>
</style>
</head>
<body>
<div class="container">
    <div id="wrap">
    
        
    
    <h1><?php echo $name; ?></h1>
    </div>
    

    <div id="column1">
<img src= "https://res.cloudinary.com/fumike/image/upload/v1524527784/IMG_20170816_172409.jpg" width="350px" height="300px" alt="My Profile Picture">
    <script type="text/javascript">
    
    document.write("<p>I am Iribiri Mary Onome, a UX/UI Designer, Front End Developer. I enjoy every moment of this process of turning complex problems into simple, beautiful and intuitive interface designs. When I'm not coding, I'm definitely singing somewhere, desining a bag or watching movies. I am an unstoppable Dreamer. I'm always looking for the good side of life, I love to learn new things and if you want to make me happy, create a challenge for me. I consider myself a unique skilled problem solver.</p>");
    
    </script>

    
        
        

    <!-- <h2>  CONTACT ME</h2>
    <form name="" action="/action_page.php" onsubmit="return validateForm()" method="post">
        Full Name:<br> 
        <INPUT TYPE=TEXT NAME= "FullName"> <br>
        Email:<br>
        <INPUT TYPE=TEXT NAME= "Email"> <br>
        Phone:<br>
        <INPUT TYPE=TEXT NAME= "Phone"><br> -->
        <!-- Comments: <br>
        <INPUT TYPE=TEXT NAME= "Comments"> <br>  -->
        <!-- Comments:<br> 
        <TEXTAREA NAME="Comments" ROWS=5 COLS=40></TEXTAREA><br> -->
        <!--  <INPUT TYPE=SUBMIT NAME="SUBMIT" VALUE="Submit!"> -->
      <!-- <input type="button" onclick="show_alert()" value="SUBMIT!" />  -->
    <!-- Prompt box     <input type="button" onclick="show_prompt()" value="SUBMIT" /> -->

    <!-- </form> -->
    
    You can <a href="mailto:iribirimary@gmail.com"> email me </a>  for any web based projects.
<br>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <a href="https://facebook.com/maryonome" class="fa fa-facebook"></a>
    <a href="https://twitter.com/mayrieh_" class="fa fa-twitter"></a>
    <a href="https://github.com/OnomeMary" class="fa fa-github"></a>
    <a href="https://linkedin.com/in/mary-iribiri" class="fa fa-linkedin"></a>
    <a href="https://instagram.com/mayrieh" class="fa fa-instagram"></a>


    

    
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</div>
</div>
</body>
</html>