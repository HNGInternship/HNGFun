<?php

	// $sql = "SELECT * FROM secret_word";
	// $result = mysqli_query($conn, $sql);
   $result = $conn->query("Select * from secret_word LIMIT 1");

   // $secret_word = mysqli_fetch_assoc($result);

   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;


   // $sql2 = "SELECT * FROM interns_data WHERE username = 'hanyi'";
   // $result2 = mysqli_query($conn, $sql2);
   // $intern_data = mysqli_fetch_assoc($result2);

   $result2 = $conn->query("Select * from interns_data where username = 'hanyi'");
   $intern = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hanyi | Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">  

    <style>
        body{
    padding: 0;
    margin: 0;
    font-family: 'Roboto', sans-serif;
    }

    ul li a, a {
        text-decoration: none;
        color: black;
    }

    .header_container {
        height: 73px;
        background-color: #D4CDCD;
        text-align: center;
        color: #ffffff;
    }

    .header_wrapper div {
        display: inline-block;
        padding: 10px 30px;
        
    }

    div.logo {
        float: left;
        margin-top: 15px;
        font-size: 24px;
        line-height: 28px;
    }

    .logo-blue {
        color: #00AFFF;
    }

    .logo-white {
        color: #fffFFF;
    }

    div .nav ul li{
        display: inline-block;
        padding: 0 30px;
        color: black;
        
    }

    div .signup_login ul li {
        display: inline-block;
        padding: 0 30px; 
    }

    div .nav {
        float: right;
    }

    div.header_wrapper {
        overflow: hidden;
        widows: 100%;
    }
    /* .clear {
        clear: both;
    } */

     .mid {
        /* background-image: url(images/image1.jpg); */
        /* background-position: 0 15px; */
       /* background-repeat: no-repeat;
        background-size: cover;
        height:600px;
        /* margin-top: -22px; */
    } 

    .content {
        text-align: center;
        
    }

    .content_h1 {
        color: black; 
        /* padding-top: 120px; */
        font-size: 36px;
        line-height: 30px;
        font-family: 'Pacifico', cursive;
        
    }

    .pee {
        margin-top: -20px;
    }

    p {
        font-size: 16px;
        /* line-height: 16px; */
        color: #000000;
        /* padding-top: -20px; */
        
    }

    hr {
        width: 800px;
        color: #000000;
    }

    h2 {
        font-size: 1.5em;
        font-weight: lighter;
        line-height: 5px;
        /* color: #000000; */
        padding-top:-10px;
    }

    .my_image {
        height: 200px;
        width: 200px;
        border: 2px solid black;
        background-color: blue;
        margin: 70px auto;
        border-radius: 50%;
        background-image: url(http://res.cloudinary.com/navanchure/image/upload/c_scale,r_0,w_806/v1523814133/pexels-photo-935980.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    </style>


</head>
<body>
    <header>
        <div class="header_container">
            <div class="header_wrapper">
                <div class="logo">
                        <a href="#"><span class="logo-blue">HNG</span> <span class="logo-white">internship4</span></a>
                </div>

                <div class="nav">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        
                    </ul>
                </div>

                <div class="signup_login">
                    <ul>
                            <!-- <li><a href="#">Signup</a></li>
                            <li><a href="#">Login</a></li> -->
                    </ul>
                </div>
                <!-- <div class="clear"></div> -->
                    
            </div>    
                
        </div>
    </header>

    <main class="mid">
        <div class="content-container">
            <div class="content">

                <div class="my_image"></div>

                <div class="content_h1">
                    <h1>Hello</h1>
                    
                </div>
                <br>
                
                
                <div class="pee">
                <h2>I'M IFEANYI OKOYE &#38; I FIX COMPUTERS</h2>
                </div>
                <br>
                <hr>

                <p>A lover of tech things and currently joined the HNGInternship 4 to learn Web Development &#38; project collaboration</p>
                <p>slack: @Hanyi</p>
                   
    
            </div>
    
           
        </div>
            
        
    </main>
</body>
</html>