<?php 

    $result = $conn->query("Select * from secret_word LIMIT 1");

    $result = $result->fetch(PDO::FETCH_OBJ);

    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'codergab'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

    // echo $user->name;
    
?>

   <!DOCTYPE html>
   <html>
   <head>
       <meta charset="utf-8" />
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title></title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
       <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .jumbotron {
            background-color: #fcfcfc;
            border-radius: .3rem;
            box-shadow: 0px 0px 14px 5px #d8d8d821;
        }
        h1,h2,h3,h4,h5,h6 {
            color: #444 !important;
        }
       </style>
   </head>
   <body>
    <div class="jumbotron">

        <div class="row">
            <div class="col-4">
                <img class="rounded img-thumbnail" src="<?php echo $user->image_filename; ?>" />
            </div>
            <div class="col-8">
                <h4 class="display-6">About Me.</h4>
                <hr class="my-4" />
                <h2 class="display-4"><?php echo $user->name; ?></h4>
                <p class="lead text-center"><b>A</b> Software Developer, DJ</p>
                <hr class="my-4" />
                <h4>My Skills</h4>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-2 text-center">
                        <i class="fab fa-html5 fa-3x"></i>
                        
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-css3-alt fa-3x"></i>
                        
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-js fa-3x"></i>
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-php fa-3x"></i>
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-laravel fa-3x"></i>
                    </div>
                    <div class="col-2 text-center text-center">
                        <i class="fas fa-database fa-3x"></i><br>
                        SQL
                    </div>
                </div>
                <hr class="my-4" />
                <h4>Talk to me</h4>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-1">
                        <a href="https://fb.me/adewumi.mhideh" target="_blank">
                            <i class="fab fa-facebook fa-2x" style="color: #3b5999"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="https://twitter.com/codergab" target="_blank">
                            <i class="fab fa-twitter fa-2x" style="color: #55acee"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="https://github.com/codergab" target="_blank">
                            <i class="fab fa-github fa-2x" style="color: #34465d"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            var documentHead = document.querySelector('title');

            documentHead.innerHTML = "Adewumi Gabriel's Profile";
        </script>
   </body>
   </html>
<link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">


