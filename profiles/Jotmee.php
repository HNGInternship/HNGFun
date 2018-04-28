<?php 


    $sql = 'SELECT secret_word FROM secret_word';
    $qword = $conn->query($sql);
    $qword->setFetchMode(PDO::FETCH_ASSOC);
    $data = $qword->fetch();
    $secret_word = $data['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOTMEE'S PROFILE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0px;
            font-family: 'Raleway', sans-serif;
            line-height: 1.5;
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
        
        .full-body{
            margin-top: 50px;
        }
        .profile__image {
      width: 75%;
    }

    .profile__image img {
      border-radius: 75%;
    }
       
    </style>
</head>
<body>
    <!--Jumbotron-->
    <div class="container-fluid full-body">
        <div class="row">
            <div class="col-xs-12">
                <?php
                $myname = 'Jotmee';
                $profile = $conn->prepare("SELECT * FROM interns_data WHERE username =:username");
                $profile->bindParam("username", $myname, PDO::PARAM_STR);
                $profile->execute();

                $user = $profile->fetchAll(PDO::FETCH_OBJ);
                foreach($user as $users){
                    echo '

                    <div class="col-xs-12 col-sm-6 img">
                    <img height="auto" width="75%"  src="http://res.cloudinary.com/lumio/image/upload/v1524511783/'.$users->image_filename.'.jpg" alt="">
                    </div>
                    <h2>'. $users->name.'</h2>
                    <h4>@'.$users->username.'</h4>
                        
                    ';
                }
                ?>
                <p>I am an aspiring software developer with intermediate programming skills, I actually didnt study IT or computer related course but I love Technology... It's a pity as much as I love programming I'm poor with designs...</p>
                <div class="experience col-xs-4 col-sm-4">
                    <h3>Skills</h3>
                    <p>C#, .NET, PHP, MYSQL, CSS AND HTML</p>
                </div>

                <div class="education col-xs-4 col-sm-4">
                    <h3>Hobbies</h3>
                   <p> Surfing, Chess, Music and Talking</p>
                </div>
                <div class="education col-xs-4 col-sm-4">
                    <h3>Work</h3>
                    <p> Intern at HNG</p>
                </div>

                <div class="twitter-icon">
                    <a href="https://api.whatsapp.com/send?phone=2348034048405"><i class="fab fa-whatsapp"></i>WhatsApp Contact</a>
                </div>
          </div>
        </div>
    </div>   
</body>
</html>
