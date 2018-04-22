<?php
try {
    $sql = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE username = \'Winnie_fred\'';
     $q = $conn->query($sql);
     $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
     $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
     throw $e;
 }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ekwunife Winifred">

    <title><?php echo $data['name'] ?></title>

     <!--Bootstrap core CSS--> 
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!--Custom fonts for this template--> 
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

     <!--Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">


     <!--Plugin CSS-->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">


    <style type="text/css">
    	body,html{
  width:100%;
  height:100%}
body{
  font-family:Merriweather,'Helvetica Neue',Arial,sans-serif}
hr{
  max-width:50px;
  border-width:3px;
  border-color:#f05f40}
hr.light{
  border-color:#fff}
a{color:#f05f40;
  -webkit-transition:all .2s;
  -moz-transition:all .2s;
  transition:all .2s}
a:hover{
  color:#f05f40}
h1,h2,h3,h4,h5,h6{
  font-family:'Open Sans','Helvetica Neue',Arial,sans-serif}
.bg-primary{
  background-color:#b149e8!important}
.bg-dark{
  background-color:#212529!important}
.text-faded{
  color:#212529}
section{
  padding:8rem 0}
.section-heading{
  margin-top:0}
::-moz-selection{
  color:#fff;
  background: #e1e5f1;;
  text-shadow:none}
::selection{
  color:#fff;
  background:#212529;
  text-shadow:none}
img::selection{
  color:#fff;
  background:0 0}
img::-moz-selection{
  color:#fff;
  background:0 0}
#mainNav{
  border-bottom:1px solid rgba(33,37,41,.1);
  background-color:#fff;
  font-family:'Open Sans','Helvetica Neue',Arial,sans-serif;
  -webkit-transition:all .2s;
  -moz-transition:all .2s;
  transition:all .2s}
#mainNav .navbar-brand{
  font-weight:700;
  text-transform:uppercase;
  color:#f05f40;
  font-family:'Open Sans','Helvetica Neue',Arial,sans-serif}
#mainNav .navbar-brand:focus,#mainNav .navbar-brand:hover{
  color:#f05f40}
#mainNav .navbar-nav>li.nav-item>a.nav-link,#mainNav .navbar-nav>li.nav-item>a.nav-link:focus{
  font-size:.9rem;
  font-weight:700;
  text-transform:uppercase;
  color:#212529}
#mainNav .navbar-nav>li.nav-item>a.nav-link:focus:hover,#mainNav .navbar-nav>li.nav-item>a.nav-link:hover{
  color:#f05f40}
#mainNav .navbar-nav>li.nav-item>a.nav-link.active,#mainNav .navbar-nav>li.nav-item>a.nav-link:focus.active{
  color:#f05f40!important;
  background-color:transparent}
#mainNav .navbar-nav>li.nav-item>a.nav-link.active:hover,#mainNav .navbar-nav>li.nav-item>a.nav-link:focus.active:hover{
  background-color:transparent}
@media (min-width:992px){
  #mainNav{
    border-color:transparent;
    background-color:transparent}
  #mainNav .navbar-brand{
    color:rgba(255,255,255,.7)}
  #mainNav .navbar-brand:focus,#mainNav .navbar-brand:hover{
    color:#fff}
  #mainNav .navbar-nav>li.nav-item>a.nav-link{
    padding:.5rem 1rem}
  #mainNav .navbar-nav>li.nav-item>a.nav-link,#mainNav .navbar-nav>li.nav-item>a.nav-link:focus{
    color:rgba(255,255,255,.7)}
  #mainNav .navbar-nav>li.nav-item>a.nav-link:focus:hover,#mainNav .navbar-nav>li.nav-item>a.nav-link:hover{
    color:#fff}
  #mainNav.navbar-shrink{
    border-bottom:1px solid rgba(33,37,41,.1);background-color:#fff}
  #mainNav.navbar-shrink .navbar-brand{
    color:#f05f40}
  #mainNav.navbar-shrink .navbar-brand:focus,#mainNav.navbar-shrink .navbar-brand:hover{
    color:#f05f40}
  #mainNav.navbar-shrink .navbar-nav>li.nav-item>a.nav-link,#mainNav.navbar-shrink .navbar-nav>li.nav-item>a.nav-link:focus{
    color:#212529}
  #mainNav.navbar-shrink .navbar-nav>li.nav-item>a.nav-link:focus:hover,#mainNav.navbar-shrink .navbar-nav>li.nav-item>a.nav-link:hover{
    color:#f05f40}
  }
  header.masthead{
    padding-top:10rem;padding-bottom:calc(10rem - 56px);
    background-image:url(http://res.cloudinary.com/winifred/image/upload/v1524156375/IMG-20180419-WA0009.jpg);
    background-position: center;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    -o-background-size:cover;
    background-size:cover}
  header.masthead hr{
    margin-top:30px;
    margin-bottom:30px}
  header.masthead h1{
    font-size:2rem}
  header.masthead p{
    font-weight:300}
  @media (min-width:768px){
    header.masthead p{
      font-size:1.15rem}}
  @media (min-width:992px){
    header.masthead{
      height:100vh;
      min-height:650px;
      padding-top:0;
      padding-bottom:0}
  header.masthead h1{
    font-size:3rem}
  }
  @media (min-width:1200px){
    header.masthead h1{
      font-size:4rem}}
  .service-box{
    max-width:400px}
  .portfolio-box{
    position:relative;
    display:block;
    max-width:650px;
    margin:0 auto}
  .portfolio-box .portfolio-box-caption{
    position:absolute;
    bottom:0;
    display:block;
    width:100%;
    height:100%;
    text-align:center;
    opacity:0;
    color:#fff;
    background:rgba(240,95,64,.9);
    -webkit-transition:all .2s;
    -moz-transition:all .2s;transition:all .2s}
  .portfolio-box .portfolio-box-caption .portfolio-box-caption-content{
    position:absolute;
    top:50%;
    width:100%;
    transform:translateY(-50%);
    text-align:center}
  .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-category .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-name{
    padding:0 15px;
    font-family:'Open Sans','Helvetica Neue',Arial,sans-serif}
  .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-category{
    font-size:14px;
    font-weight:600;
    text-transform:uppercase}
  .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-name{
    font-size:18px}
  .portfolio-box:hover .portfolio-box-caption{
    opacity:1}
  .portfolio-box:focus{
    outline:0}
  @media (min-width:768px){
    .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-category{
      font-size:16px}
    .portfolio-box .portfolio-box-caption .portfolio-box-caption-content .project-name{
      font-size:22px}
      }
  .text-primary{
    color:#f05f40!important}
  .btn{
    font-weight:700;
    text-transform:uppercase;
    border:none;
    border-radius:300px;
    font-family:'Open Sans','Helvetica Neue',Arial,sans-serif}
  .btn-xl{
    padding:1rem 2rem}
  .btn-primary{
    background-color:#f05f40;
    border-color:#f05f40}
  .btn-primary:active,.btn-primary:focus,.btn-primary:hover{
    color:#fff;
    background-color:#ee4b28!important}
  .btn-primary:active,.btn-primary:focus{
    box-shadow:0 0 0 .2rem rgba(240,95,64,.5)!important}

footer.footer .social-link{
	display:block;
	height:4rem;
	width:4rem;
	line-height:4.3rem;
	font-size:1.5rem;
	background-color:#1d809f;
	transition:background-color .15s ease-in-out;
	box-shadow:0 3px 3px 0 rgba(0,0,0,.1)}
footer.footer .social-link:hover{
	background-color:#155d74;
	text-decoration:none}
.footer{
	padding-left: 0px;
}
.icon-social-twitter,
.icon-social-facebook,
.icon-social-instagram,
.icon-social-linkedin,
.icon-social-pinterest,
.icon-social-github,
.icon-social-google,{
  font-family: 'simple-line-icons';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.icon-social-twitter:before {
  content: "\e009";
}
.icon-social-facebook:before {
  content: "\e00b";
}
.icon-social-instagram:before {
  content: "\e609";
}
.icon-social-github:before {
  content: "\e60c";
}
.icon-social-google:before {
  content: "\e60d";
}
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    	<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
<?php echo $data['name'] ?>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">



            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../learn.php">Learn</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../listing.php">Interns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../testimonies.php">Testimonies</a>
            </li>

            <?php echo "Time/Date : " . date('F jS Y h:i a' ); ?>

          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">

              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="card" style="width:30%" >
  <img src="http://res.cloudinary.com/winifred/image/upload/v1524156375/IMG-20180419-WA0009.jpg" alt="Tha" style="width:100%">
</div>

              <strong>WELCOME</strong><br>
              <small>
       <?php echo $data['name'] ?>
        </small>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5"><strong>Winifred Ekwunife - Front End </strong><?php echo $data['name'] ?></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">A Little About <?php echo $data['name'] ?></h2>
            <hr class="light my-4">
            <p class="text-faded mb-4"> <strong>Ekwunife Winifred Is a Front-End Web Developer, I Want To Be A Technical Writer.</strong></p>
            <p>
             Hey there! My name is Ekwunife Winifred.
			    	<br>I'm a <strong> Front-end Developer</strong> who is going to be a badass programmer someday and go places. <!--I'm a 300level student of Cross River University Of Technology Calabar.//--></p>
		    		<br> I am a crazy freak of Mandala and I am a part-time artist(I draw when I'm bored.)</br>
				 </p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Let's Work!</a>
          </div>
        </div>
      </div>
    </section>


    <section id="services" style="background-color: #967468">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Work With Me</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Front-end Web Developer</h3>
              <p class="text-muted mb-0">Need a sweet Website!<strong><a class="nav-link js-scroll-trigger" href="#contact">CONTACT ME</a></strong></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">I Work Remotely</h3>
              <p class="text-muted mb-0">Ready For You Anywhere </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Ready To Work With Time</h3>
              <p class="text-muted mb-0">Time is One of the most Important Factors.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Yon Can Always Get Back To Me</h3>
              
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="contact" style="background-color: #cd83f5 ">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">If you are looking for a strategist and experienced developer,<br>just leave me a message and I'll contact you ASAP.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+234-81-854-417-15</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:winifredchineze22@gmail.com">feedback@winifredchineze22.com</a>
            </p>

    <footer class="footer text-center">
      <div class="container">
                    <ul class="list-inline text-center">
               <li class="list-inline-item">
                  <a id="twitter" href="https://twitter.com/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>-->

               <li class="list-inline-item">
                  <a id="github" href="https://github.com/winnieefred" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
      </div>
    </footer>
          </div>
        </div>
      </div>
    </section>
     <!--Bootstrap core JavaScript--> 
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript--> 
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
     <!--Custom scripts for this template--> 
    <script src="../js/creative.min.js"></script>
  </body>
</html>
