<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kiwi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->
    <?php 
		

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'kiwi'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
    <style>
        body {
            margin: 0px;
            font-family: 'Raleway', sans-serif;
            line-height: 1.5;
        }

        .jumbotron{
            background-image: url("https://res.cloudinary.com/dwjyz9gvi/image/upload/v1523904314/hero-black.jpg");
            padding-top: 10%;
            padding-right: 200px;
            padding-left: 10%;
        }

        img{
            border-radius: 50%;
            border: 10px solid gainsboro;
            margin: 0 auto;    
            
        }
        
        .about-me h2 {
            font-weight:700;
            text-align: justify;
        }

        h4{
            font-family:cursive;   
            font-weight: 200;
        }
        
        .about-me  h3{
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 200;
            letter-spacing: 2px;
            color: #999;
            margin-bottom: 5px;
        }
        
        .about-me p{
            font-size: 16px;
            font-family:  Proxima Nova,Tahoma,Helvetica,Verdana,sans-serif;  
        }
        
        #tweety, #insty , #fb, #slacky{
            color: grey;
            text-shadow: 1px 1px 1px #ccc;
            font-size: 2em;
            display: inline-block;     
        }

        .twitter-icon, .twitter-icon a{
            margin: auto;
            padding-left: 10%;    
        }

        .full-body{
            margin-top: 50px;
        }
       
    </style>
</head>
<body>
    <!--Jumbotron-->
    <div class="container-fluid full-body"> 
        <!--<div class="row">
           <div class="jumbotron">
            
           </div>
        </div> -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 img">
                <img height="auto" width="80%"  src="<?php echo $user->image_filename ?>" alt="">   
            </div>
            <div class="col-sm-6 about-me">
                <h2><?php echo $user->name ?></h2>  <!--<span><small>(Web Designer)</small></span> -->
                <h4>@<?php echo $user->username ?></h4>
                <p>Aspiring software developer and intern at Hotels.ng. At first, I intended to be an engineer but here I am writing codes. Learning how to design pages has been a wonderful experience for me. This year I decided to double down on my knowledge by signing up for the Hotels.ng internship.</p>
                
                <p>When I am not coding, I read news stories or play Video games.</p>
                <div class="experience col-xs-6 col-sm-6">
                    <h3>Work</h3>
                    <p>Intern hotels.ng</p>
                </div>
                <div class="education col-xs-6 col-sm-6 my-footer">
                    <h3>Education</h3>
                   <p> University of Calabar</p>
                </div>
                <div class="twitter-icon">
                    <a href="https://twitter.com/margaret_ogbor"><i class="fa fa-twitter" id="tweety"></i></a>
                    <a href="https://twitter.com/margaret_ogbor"><i class="fa fa-instagram" id="insty"></i></a>
                    <a href="https://twitter.com/margaret_ogbor"><i class="fa fa-facebook facebook" id="fb"></i></a>
                    <a href="https://twitter.com/margaret_ogbor"><i class="fa fa-slack" id="slacky"></i></a>

                </div>
                <!-- <a href="https://twitter.com/margaret_ogbor?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow @margaret_ogbor</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->               
            </div>
        </div>
    </div>   
</body>
</html>
