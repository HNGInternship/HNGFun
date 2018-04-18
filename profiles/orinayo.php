<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Roboto|Spectral+SC" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  <style>
    .content {
      padding-top: 10px;
      text-align: center;
    }

    .profile-pic {
        width: 18em !important;
    }

    .bio {
      text-align: center;
      margin: 0px 150px;
      font-family: 'Roboto', sans-serif;
    }

    .checkwork {
      border: 1px solid #f4511e;
      color: #f4511e;
      transition-duration: 0.4s;
      font-family: 'Roboto', sans-serif;
    }

    .checkwork:hover {
      background-color: #f4511e;
      color: black;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      height: 30px;
      width: 30px;
      outline: black;
      background-size: 100%, 100%;
      border-radius: 50%;
      border: 1px solid black;
      background-image: none;
    }

    .carousel-control-next-icon:after {
      content: '>';
      font-size: 15px;
      color: red;
    }

    .carousel-control-prev-icon:after {
      content: '<';
      font-size: 15px;
      color: red;
    }

    .self-eval {
      text-align: center;
      padding-bottom: 20px;
    }

    .progress {
      font-family: 'Roboto', sans-serif;
      height: 53px;
      font-size: 13px;
      background-color: #fff;
    }

    .strengths {
      font-size: 80px;
      text-align: center;
      display: inline-block;
    }

    .icon-desc {
      font-family: 'Roboto', sans-serif;
      display: block;
      text-align: center;
    }

    .socialMedia {
      font-size: 30px;
    }
  </style>
</head>

<body>
<?php
$sql = "SELECT * FROM secret_word";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();
$secret_word = $result['secret_word'];

try {
    $sql2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="orinayo"';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $me = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}

?>
  <!--home-->
  <div class="container-fluid content">
    <h3 class="text-center text-dark display-5">Hello, I'm
      <span class="display-4" id=name style="color: #f4511e"> <?php echo $me['name'] ?> </span>
    </h3>
    <br/>
    <?php echo '<img class="d-block rounded-circle profile-pic img-fluid mx-auto" style="height: 18em" 
     src="'.$me['image_filename'].'" alt="Orinayo Oyelade" />' ?> 
    </br>
    <h5 class="text-dark bio"> I'm an Android &amp; Full-stack developer from Nigeria. I love complete software design and development, 
        specialize in creating custom-built applications for clients with a
      passion for creating intuitive, dynamic user experiences.</h5>
      <br/>
    <a href="#portfolio" class="btn btn-light checkwork mt-4 mb-4" role="button">VIEW MY WORK</a>
  </div>
  <br/>
  <div class="container-fluid content" id="portfolio" style="background-color: #f4511e">
    <h3 class="text-center text-white display-4 mt-4" style="font-family: 'Spectral SC', serif;">PROJECTS</h3>
    <br/>
    <div class="row">
      <div class="col-sm-10 mx-auto pb-5">
        <div id="carouselControls" class="carousel slide" data-interval=5000 data-ride="carousel" data-pause="hover" data-wrap=true>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523638233/android.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523634850/webpage2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523639851/cbtapp.png" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523639348/contactmanager.png" alt="Fourth slide">
            </div>
          </div>
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--About-->
  <div class="container-fluid content mb-5">
    <h3 class="text-center display-4 mt-4" style="font-family: 'Spectral SC', serif;">ABOUT</h3>
    <br/>
    <div class="container mt-4 pb-2">
      <div class="row self-eval mx-auto">
        <div class="col-sm-5">
          <!--measurement chart-->
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      HTML
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:72%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:8%">
      90%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      JavaScript
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:64%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:16%">
      80%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      Bootstrap
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:64%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:16%">
      80%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      CSS
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:56%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:24%">
      70%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      XML
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:56%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:24%">
      70%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      Java
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:48%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:32%">
      60%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      TypeScript
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:40%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:40%">
      50%
          </div>
        </div>
        <div class="progress col self-eval">
          <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
      Node.js
          </div>
          <div class="progress-bar progress-bar-info" role="progressbar" style="width:40%">
          </div>
          <div class="progress-bar bg-secondary" role="progressbar" style="width:40%">
      50%
          </div>
        </div>
      </div>
        <div class="col-sm-1"></div>
        <!-- strength icons-->
        <div class="col-sm-3">
          <div class="row">
            <dl>
              <i class="col fa fa-bolt self-eval strengths text-warning"></i>
              <span class="icon-desc">
                <strong>Quick</strong>
                <br/>Fast load times is of importance.
              </span>
              <i class="col fa fa-exchange self-eval strengths text-success"></i>
              <span class="icon-desc">
                <strong>Responsive</strong>
                <br/> Layout works on any device.
              </span>
            </dl>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <dl>
              <i class="col fa fa-rocket self-eval strengths text-info"></i>
              <span class="icon-desc">
                <strong>Dynamic</strong>
                <br/>Make pages come alive.
              </span>
              <i class="col fa fa-heart self-eval strengths text-danger"></i>
              <span class="icon-desc">
                <strong>Invested</strong>
                <br/> Built with love.
              </span>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--contact-->
  <div class="container-fluid content bg-primary text-white">
    <h3 class="text-center display-4 mt-4" style="font-family: 'Spectral SC', serif;">CONTACT</h3>
    <br/>
    <p class="text-center" style="font-family: 'Roboto', sans-serif; font-size: xx-large;">HAVE A QUESTION OR SOME COOL PROJECT TO WORK ON TOGETHER?</p>
    <p style="font-family: 'Roboto', sans-serif;">Just send me a direct message or contact me through social sites listed below.</p>
    <a href="mailto:orinayooyelade@gmail.com" class="btn btn-dark directMessage mt-4 mb-4" role="button" style="font-family: 'Roboto', sans-serif;">GET IN TOUCH
      <i class="fa fa-envelope text-danger"></i>
    </a>
    <div class="container-fluid socialMedia mx-auto">
      <div class="row mx-auto align-items-center">
        <div class="col">
          <a href="https://www.facebook.com/segun.oyelade" target="_blank" class="fa fa-facebook text-dark mr-2"></a>
          <a href="https://twitter.com/IamPattern" target="_blank" class="fa fa-twitter text-dark mr-2"></a>
          <a href="https://github.com/orinayo/" target="_blank" class="fa fa-github text-dark mr-2"></a>
          <a href="https://www.linkedin.com/in/oluwasegun-oyelade-b4973ba7/" target="_blank" class="fa fa-linkedin text-dark mr-2"></a>
        </div>
      </div>
    </div>
  </div>
  <script>
      $(document).ready(function(){
$("#name").hide();
$("#name").fadeIn(2000);
$("a").on('click', function(event) {
if (this.hash !== "") {
  event.preventDefault();
  var hash = this.hash;
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 800, function(){
    window.location.hash = hash;
  });
}
});
  window.sr = ScrollReveal();
  sr.reveal('.progress', { duration: 2000, origin: 'left' });
  sr.reveal('.strengths', { duration: 2000, origin: 'right' });
});    
      </script>
  
</body>
</html>