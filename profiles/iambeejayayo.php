<?php
        require_once '../db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];
        ?>
        
<?php

    $query = $conn->query("SELECT * FROM secret_word");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];

	$username = "iambeejayayo";
	$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
	$my_data = $data->fetch(PDO::FETCH_BOTH);
	$name = $my_data['name'];
	$src = $my_data['image_filename'];
	$username =$my_data['username'];
?>


<!DOCTYPE html>
<html lang="en">
        <title>BOLAJI AYODEJI | HNG4 Internship Profile</title>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bolaji Ayodeji">

    <!-- FONT Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <style>
            .container {
        text-align:left;
        padding:2%;
    }
    img {
        width: 40%;
        height:auto;
    } 
    a {
        color: inherit;
        text-decoration:none;
    }
    .links {
        padding:1%;
    }
    .color {
        color:blue;
    }
    .footer {
        text-align: center;
    }
    .social {
        font-size: 130%;
    }
    </style>

           </head>
       <!-- BODY SECTION -->

        <body class="bg-dark text-light">
    <div class="container">
        <div class="row">
        <div class="col">
            <br />
                <img class="rounded-circle" src="<?php echo $src; ?>" alt="My Picture">
                <br /><br /><br />
                         <p> Hello World! <br />
            I'm <?php echo $name; ?> <br />
            Tech Geek <i class="fa fa-user text-primary"></i>&nbsp & Web Developer <i class="fa fa-laptop text-primary"></i></p>
            
            I believe i can change the world with Brilliant Innovations <br />
            With God & Code, i'ld get there.
        </p>
        </div> 

                <div class="col bg-dark">
            <div id="bio">
                <br />
                        <br />
            <div class="social">
                <br /><br /><br />
                    <a class="navbar-brand btn btn-outline-primary" href="#">Contact Me!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
                    <br /> <br />
                    
                     <div class="text-light">
                      <p><i class="fa fa-map-marker text-primary"></i> Lokoja, Nigeria</p>
                      <p><i class="fa fa-phone text-primary"></i> +234 8109445504</p>
                      <p><i class="fa fa-envelope text-primary"> </i> Sirbeejay1@gmail.com</p>
                      
                <a href="https://github.com/iambeejayayo" style="text-decoration:none"
                class="fa fa-github social text-light"></a>&nbsp
                <a href="https://facebook.com/ayodeji.beejay" style="text-decoration:none"
                class="fa fa-facebook-official social text-light"></a>&nbsp
                <a href="https://instagram.com/iambeejayayo" style="text-decoration:none"
                class="fa fa-instagram social text-light"></a>&nbsp
                <a href="https://twitter.com/iambeejayayo" style="text-decoration:none"
                class="fa fa-twitter social text-light"></a>&nbsp
                <a href="https://linkedin.com/iambeejayayo" style="text-decoration:none"
                class="fa fa-linkedin social text-light"></a>&nbsp
                <a href="https://medium.com/@BolajiAyodeji" style="text-decoration:none"
                class="fa fa-medium social text-light"></a>&nbsp
              
                                  </div><br>
                        </div></div></div>
                    </body>
                    <div class="container expand-lg">
                    <br /><br /><br />
            <footer class="footer bg-dark">
                <hr class="bg-light" />
                Developed with <i class="fa fa-heart text-danger"></i> & <i class="fa fa-coffee text-warning"></i>
            </footer>
            </div></html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
