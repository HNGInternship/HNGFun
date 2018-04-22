<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Victor Jonah</title>
    
    <style>
        .page {
            background-color: whitesmoke;
        }

        .main {
            justify-content: center;
            align-content: center;
            margin: auto;
            padding-top: 20px;
        }

        .image {
            
        }
        
        .about {
            padding: 
            font-family: 'Gamja Flower', cursive;

        
        h1 {
            
            font-family: 'Jua', sans-serif;
        }

        }

        .fa:hover {
            color: limegreen;
            padding: 3px;
        }

        .social-icons {
            padding: 5px;
            height: 180px;
            weight: 180px;
        }

        .socials-icons {
            height:100%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    


        <!-- Main Page -->
<div class="page"> 
    <div class="main text-center">
        <div class="image">
            <img class="img-thumbnail img-fluid square" width="350px" height="350px" src="https://res.cloudinary.com/vectormike/image/upload/v1523655733/gg.jpg" alt="This is me o!">
        </div> 
        <div class="about">
            <h1>Hello!</h1>
            <p>This is Victor Jonah.</p>
            <p>300l Computer science of the University of Uyo.</p>
            <p>HNG Intern, 2018</p>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row socials-icons">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://mobile.facebook.com/victor.jonah?ref_component=mbasic_home_header&ref_page=%2Fwap%2Fprofile_timeline.php&refid=17">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/Vectormike40">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com/in/victor-jonah-abb1a1120/">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="copyright text-center">Copyright &copy; HNG FUN 2018</p>
    </footer>
     <!-- animate.css -->
    <script type="text/javascript">
        $('h1').addClass('animated infinite shake');
    </script>
</div>    

        <?php
            require_once '../db.php';
            try {
                $select = 'SELECT * FROM secret_word';
                $query = $conn->query($select);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $data = $query->fetch();
            } 
            catch (PDOException $e) {
                
            throw $e;
            }
            $secret_word = $data['secret_word'];        
        ?>
</body>
</html>