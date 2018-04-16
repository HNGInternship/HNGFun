<<<<<<< HEAD
<?php
try {
      $sql = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE username = \'OG\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  	} catch (PDOException $e)
		{
      throw $e;
		}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['name'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">


    <!-- Plugin CSS -->
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
  background-color:#4a423f!important}
.bg-dark{
  background-color:#212529!important}
.text-faded{
  color:rgba(255,255,255,.7)}
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
    background-image:url(https://res.cloudinary.com/cyuket/image/upload/v1523892790/og.jpg);
    background-position:center center;
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
  <img src="https://res.cloudinary.com/dchvdgnh8/image/upload/v1523738881/IMG_20171111_113643.jpg" alt="Tha" style="width:100%">
</div>

              <strong>WELCOME</strong><br>
              <small>
       <?php echo $data['name'] ?>
        </small>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Godswill Okokon - Front End & Back End Developer<?php echo $data['name'] ?></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">A Little About Me</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4"> <?php echo $data['name'] ?> Is a Back-End Web Developer, Wanna be Full Stack.</p>
            <p>
            My Name is Godswill Okokon, I'm a full stack web developer who loves the magic of backend, Godswill Okokon loves creating things that will make life easlier and at the same time produce solutions to real life problems.
            <br>I'm the web developer from the future(..winks..), I'm a techie with lots of humour, I can be scaratic most times too, <br> Some people call me OG, I love creamy cakes and i also have a thing for roasted plantain, OG loves making techie friends, <br>Music is his esacpe to blow off steam when ever he's in a funk about any situation or something,<br> I'm passionate about learning and developing myself in everything that has to do with life  and Tech.<br>
            I'm more of a twitter person than any other social media platform,
            just make sure to follow me at the bottom of the page.
            <br>Apart from coding and developing stuffs, <br>OG is a movie person, he also loves playing video games and  watching football.
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
              <h3 class="mb-3">Full Stack Web Developer</h3>
              <p class="text-muted mb-0">Need a Website<strong><a class="nav-link js-scroll-trigger" href="#contact">CONTACT ME</a></strong></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">I Work Remotely</h3>
              <p class="text-muted mb-0">Ready For You Anywhere, Any Time</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Ready To Work With Time</h3>
              <p class="text-muted mb-0">Time is One of the most Important Factors.Time Is Money</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Yon Can Always Get Back To Me</h3>
              <p class="text-muted mb-0">Like i said You would never be disappointed and would always end up with a smile</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="contact" style="background-color: rgba(184, 195, 195, 0.5)">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">If you are looking for a strategist and experienced developer,<br>just leave me a message and I'll contact you soon.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+234-81-770-248-47</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:godswillokokon3@gmail.com">feedback@OG.com</a>
            </p>

    <footer class="footer text-center">
      <div class="container">
                    <ul class="list-inline text-center">
               <li class="list-inline-item">
                  <a id="twitter" href="https://twitter.com/godswillokokon"" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>

               <li class="list-inline-item">
                  <a id="github" href="https://github.com/godswillokokon" target="_blank">
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
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>
  </body>
=======
<!DOCTYPE HTML>

<html>
	<head>
		<title>Godswill Okokon</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<meta name="author" content="Godswill Okokon">
		<meta name="description" content="Back-end Web developer">



		<script>

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77783023-1', 'auto');
		  ga('send', 'pageview');

		  function _gaLt(t){if(ga.hasOwnProperty("loaded")&&1==ga.loaded){for(var e=t.srcElement||t.target;e&&("undefined"==typeof e.tagName||"a"!=e.tagName.toLowerCase()||!e.href);)e=e.parentNode;if(e&&e.href){var a=e.href;if(-1==a.indexOf(location.host)&&!a.match(/^javascript\:/i)){var n=(e.target&&!e.target.match(/^_(self|parent|top)$/i)?e.target:!1,!1),o=function(){n||(n=!0,window.location.href=a)};e.target&&!e.target.match(/^_(self|parent|top)$/i)?ga("send","event","Outgoing Links",a,document.location.pathname+document.location.search):(ga("send","event","Outgoing Links",a,document.location.pathname+document.location.search,{hitCallback:o}),setTimeout(o,1e3),t.preventDefault?t.preventDefault():t.returnValue=!1)}}}}var w=window;w.addEventListener?w.addEventListener("load",function(){document.body.addEventListener("click",_gaLt,!1)},!1):w.attachEvent&&w.attachEvent("onload",function(){document.body.attachEvent("onclick",_gaLt)});

		</script>

<style>

@import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,900");
@import url("font-awesome.min.css");


	html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}

	article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
		display: block;
	}

	body {
		line-height: 1;
	}

	ol, ul {
		list-style: none;
	}

	blockquote, q {
		quotes: none;
	}

	blockquote:before, blockquote:after, q:before, q:after {
		content: '';
		content: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	body {
		-webkit-text-size-adjust: none;
	}

/* Box Model */

	*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

/* Basic */

	body, input, select, textarea {
		color: #fff;
		font-family: 'Source Sans Pro', sans-serif;
		font-size: 15pt;
		font-weight: 300 !important;
		letter-spacing: -0.025em;
		line-height: 1.75em;
	}

	body {
		background: #F2C8FD;
		overflow: hidden;
	}

		body.loading * {
			-moz-animation: none !important;
			-webkit-animation: none !important;
			-ms-animation: none !important;
			animation: none !important;
		}

	a {
		-moz-transition: border-color 0.2s ease-in-out;
		-webkit-transition: border-color 0.2s ease-in-out;
		-ms-transition: border-color 0.2s ease-in-out;
		transition: border-color 0.2s ease-in-out;
		border-bottom: dotted 1px;
		color: inherit;
		outline: 0;
		text-decoration: none;
	}

		a:hover {
			border-color: transparent;
		}

	.icon {
		text-decoration: none;
		position: relative;
	}

		.icon:before {
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-transform: none !important;
		}

		.icon > .label {
			display: none;
		}

/* Wrapper */

	@-moz-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-webkit-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-ms-keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@keyframes wrapper {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	#wrapper {
		-moz-animation: wrapper 3s forwards;
		-webkit-animation: wrapper 3s forwards;
		-ms-animation: wrapper 3s forwards;
		animation: wrapper 3s forwards;
		height: 100%;
		left: 0;
		opacity: 0;
		position: fixed;
		top: 0;
		width: 100%;
	}

/* BG */

	#bg {

		background: #AA22CC;
		height: 100%;
		left: 0;
		opacity: 1;
		position: fixed;
		top: 0;
	}
	#main {
		height: 100%;
		left: 0;
		position: fixed;
		text-align: center;
		top: 0;
		width: 100%;
	}

		#main:before {
			content: '';
			display: inline-block;
			height: 100%;
			margin-right: 0;
			vertical-align: middle;
			width: 1px;
		}

/* Header */

	@-moz-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-webkit-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-ms-keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@keyframes header {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-moz-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-webkit-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@-ms-keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	@keyframes nav-icons {
		0% {
			-moz-transform: translate3d(0,1em,0);
			-webkit-transform: translate3d(0,1em,0);
			-ms-transform: translate3d(0,1em,0);
			transform: translate3d(0,1em,0);
			opacity: 0;
		}

		100% {
			-moz-transform: translate3d(0,0,0);
			-webkit-transform: translate3d(0,0,0);
			-ms-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			opacity: 1;
		}
	}

	#header {
		-moz-animation: header 1s 1.25s forwards;
		-webkit-animation: header 1s 1.25s forwards;
		-ms-animation: header 1s 1.25s forwards;
		animation: header 1s 1.25s forwards;
		-moz-backface-visibility: hidden;
		-webkit-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		backface-visibility: hidden;
		-moz-transform: translate3d(0,0,0);
		-webkit-transform: translate3d(0,0,0);
		-ms-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
		cursor: default;
		display: inline-block;
		opacity: 0;
		position: relative;
		text-align: center;
		top: -1em;
		vertical-align: middle;
		width: 90%;
	}

		#header h1 {
			font-size: 4.35em;
			font-weight: 900;
			letter-spacing: -0.035em;
			line-height: 1em;
		}

		#header p {
			font-size: 1.25em;
			margin: 0.75em 0 0.25em 0;
			opacity: 0.75;
		}

		#header nav {
			margin: 1.5em 0 0 0;
		}

			#header nav li {
				-moz-animation: nav-icons 0.5s ease-in-out forwards;
				-webkit-animation: nav-icons 0.5s ease-in-out forwards;
				-ms-animation: nav-icons 0.5s ease-in-out forwards;
				animation: nav-icons 0.5s ease-in-out forwards;
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
				display: inline-block;
				height: 5.35em;
				line-height: 5.885em;
				opacity: 0;
				position: relative;
				top: 0;
				width: 5.35em;
			}

				#header nav li:nth-child(1) {
					-moz-animation-delay: 1.5s;
					-webkit-animation-delay: 1.5s;
					-ms-animation-delay: 1.5s;
					animation-delay: 1.5s;
				}

				#header nav li:nth-child(2) {
					-moz-animation-delay: 1.75s;
					-webkit-animation-delay: 1.75s;
					-ms-animation-delay: 1.75s;
					animation-delay: 1.75s;
				}

				#header nav li:nth-child(3) {
					-moz-animation-delay: 3s;
					-webkit-animation-delay: 3s;
					-ms-animation-delay: 3s;
					animation-delay: 3s;
				}

				#header nav li:nth-child(4) {
					-moz-animation-delay: 3.25s;
					-webkit-animation-delay: 3.25s;
					-ms-animation-delay: 3.25s;
					animation-delay: 3.25s;
				}

				#header nav li:nth-child(5) {
					-moz-animation-delay: 3.5s;
					-webkit-animation-delay: 3.5s;
					-ms-animation-delay: 3.5s;
					animation-delay: 3.5s;
				}

				#header nav li:nth-child(6) {
					-moz-animation-delay: 3.75s;
					-webkit-animation-delay: 3.75s;
					-ms-animation-delay: 3.75s;
					animation-delay: 3.75s;
				}

				#header nav li:nth-child(7) {
					-moz-animation-delay: 4s;
					-webkit-animation-delay: 4s;
					-ms-animation-delay: 4s;
					animation-delay: 4s;
				}

				#header nav li:nth-child(8) {
					-moz-animation-delay: 4.25s;
					-webkit-animation-delay: 4.25s;
					-ms-animation-delay: 4.25s;
					animation-delay: 4.25s;
				}

				#header nav li:nth-child(9) {
					-moz-animation-delay: 4.5s;
					-webkit-animation-delay: 4.5s;
					-ms-animation-delay: 4.5s;
					animation-delay: 4.5s;
				}

				#header nav li:nth-child(10) {
					-moz-animation-delay: 4.75s;
					-webkit-animation-delay: 4.75s;
					-ms-animation-delay: 4.75s;
					animation-delay: 4.75s;
				}

			#header nav a {
				-webkit-tap-highlight-color: transparent;
				-webkit-touch-callout: none;
				border: 0;
				display: inline-block;
			}

				#header nav a:before {
					-moz-transition: all 0.2s ease-in-out;
					-webkit-transition: all 0.2s ease-in-out;
					-ms-transition: all 0.2s ease-in-out;
					transition: all 0.2s ease-in-out;
					border-radius: 100%;
					border: solid 1px #fff;
					display: block;
					font-size: 1.75em;
					height: 2.5em;
					line-height: 2.5em;
					position: relative;
					text-align: center;
					top: 0;
					width: 2.5em;
				}

				#header nav a:hover {
					font-size: 1.1em;
				}

					#header nav a:hover:before {
						background-color: rgba(255, 255, 255, 0.175);
						color: #fff;
					}

				#header nav a:active {
					font-size: 0.95em;
					background: none;
				}

					#header nav a:active:before {
						background-color: rgba(255, 255, 255, 0.35);
						color: #fff;
					}

				#header nav a span {
					display: none;
				}

/* Footer */


/* Really Wide */
	@media screen and (min-width: 1680px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 13pt;
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-1500px,0,0);
					-webkit-transform: translate3d(-1500px,0,0);
					-ms-transform: translate3d(-1500px,0,0);
					transform: translate3d(-1500px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		#bg {
			background-size: 1500px auto;
			width: 4500px;
		} }

	@media screen and (max-width: 1680px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 13pt;
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-1500px,0,0);
					-webkit-transform: translate3d(-1500px,0,0);
					-ms-transform: translate3d(-1500px,0,0);
					transform: translate3d(-1500px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-1500px,0,0);
				-webkit-transform: translate3d(-1500px,0,0);
				-ms-transform: translate3d(-1500px,0,0);
				transform: translate3d(-1500px,0,0);
			}
		}

		#bg {
			background-size: 1500px auto;
			width: 4500px;
		} }

/* Normal */

	@media screen and (max-width: 1280px) {

		/* Basic */

			body, input, select, textarea {
				font-size: 12pt;
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-750px,0,0);
					-webkit-transform: translate3d(-750px,0,0);
					-ms-transform: translate3d(-750px,0,0);
					transform: translate3d(-750px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-750px,0,0);
				-webkit-transform: translate3d(-750px,0,0);
				-ms-transform: translate3d(-750px,0,0);
				transform: translate3d(-750px,0,0);
			}
		}

		#bg {
			background-size: 750px auto;
			width: 2250px;
		} }

/* Mobile */

	@media screen and (max-width: 736px) {

		/* Basic */

			body {
				min-width: 320px;
			}

			body, input, select, textarea {
				font-size: 11pt;
			}

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-300px,0,0);
					-webkit-transform: translate3d(-300px,0,0);
					-ms-transform: translate3d(-300px,0,0);
					transform: translate3d(-300px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-300px,0,0);
				-webkit-transform: translate3d(-300px,0,0);
				-ms-transform: translate3d(-300px,0,0);
				transform: translate3d(-300px,0,0);
			}
		}

		#bg {
			background-size: 300px auto;
			width: 900px;
		}

	/* Header */

		#header h1 {
			font-size: 2.5em;
		}

		#header p {
			font-size: 1em;
		}

		#header nav {
			font-size: 1em;
		}

			#header nav a:hover {
				font-size: 1em;
			}

			#header nav a:active {
				font-size: 1em;
			} }

/* Mobile (Portrait) */

	@media screen and (max-width: 480px) {

		/* BG */

			@-moz-keyframes bg {
				0% {
					-moz-transform: translate3d(0,0,0);
					-webkit-transform: translate3d(0,0,0);
					-ms-transform: translate3d(0,0,0);
					transform: translate3d(0,0,0);
				}

				100% {
					-moz-transform: translate3d(-412.5px,0,0);
					-webkit-transform: translate3d(-412.5px,0,0);
					-ms-transform: translate3d(-412.5px,0,0);
					transform: translate3d(-412.5px,0,0);
				}

	}

		@-webkit-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
			}

		@-ms-keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
		}

		@keyframes bg {
			0% {
				-moz-transform: translate3d(0,0,0);
				-webkit-transform: translate3d(0,0,0);
				-ms-transform: translate3d(0,0,0);
				transform: translate3d(0,0,0);
			}

			100% {
				-moz-transform: translate3d(-412.5px,0,0);
				-webkit-transform: translate3d(-412.5px,0,0);
				-ms-transform: translate3d(-412.5px,0,0);
				transform: translate3d(-412.5px,0,0);
			}
		}

		#bg {
			background-size: 412.5px auto;
			width: 1237.5px;
		}



		#header nav {
			padding: 0 1em;
		} }


</style>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">

						<p>&nbsp;&bull;&nbsp; Web Developer. &nbsp;&bull;&nbsp; Back-end code Eater.</p>



						<h1>OG Loves to Code</h1>

						<p>
						<?php
						require 'db.php';

						 // time and date
							echo "Time/Date " . date('F jS Y h:i a' );

							//database connect
							//$con = mysqli_connect("DB_HOST", "DB_USER", " DB_PASSWORD", "DB_DATABASE");

							//if ($con)
						//	{

						//	}
						//	else
						//	{

						//		die("ERROR: Could not connect. " . mysqli_connect_error());
						//	}
							///query///

							//insert
							$name = 'Godswill Effiong Okokon';
							$username = 'OG';
							$image_filename = 'https://res.cloudinary.com/dchvdgnh8/image/upload/v1523738881/IMG_20171111_113643.jpg';
							$query = "UPDATE interns_data_ (name,username,image_filename) VALUES ('$name','$username','$image_filename')";
							$result = $con->query($query);

							//view
							$query = "SELECT * FROM  interns_data_ ";
							$result = $con->query($query);



							if($result)
							{

							}
							else
							{
								echo '<br>ERROR: Could not get details from database ';
							}
							?>
							<br><br>
							<table class="">
						      <thead>
						          <tr class="headings">

						            <th class="column-title">Name</th>
						            <th class="column-title">Username</th>
						            <th class="column-title">Image File</th>


						          </tr>
						          </thead>
						          <tbody>
						          <tr class="">
						          <?php
						          while($userInfo = mysqli_fetch_assoc($result)):
						          ?>
						          <tr>
						            <td><?php echo $userInfo['name'] ;?></td>
						            <td><?php echo $userInfo['username'] ;?></td>
						            <td><?php echo $userInfo['image_filename'] ;?></td>


						          </tr>
						        <?php endwhile ;?>

						          </tr>
						          </tbody>

						  </table>


							<?php

							$query = "SELECT * FROM secret_word ";
							$result = $con->query($query);
							if ($result)
							{

							}
							else
							{
								echo 'no secret word found';
							}


							?>
							<br><br>
							<table class="">
						      <thead>
						          <tr class="headings">

						            <!--<th class="column-title">Secret Message</th>-->
											</tr>
										 </thead>
										 <tbody>
										 <tr class="">
										 <?php
										 while($userInfo = mysqli_fetch_assoc($result)):
										 ?>
										 <tr>
											 <td><?php //echo $userInfo['secret_word'] ;?></td>
										 </tr>
									 <?php endwhile ;?>

										 </tr>
										 </tbody>
					 			 </table>
								 <?php

								 $secret_word = '1n73rn@Hng';
								 //echo "$secret_word";

								  ?>




			</p>


					</header>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>

	// var dt = new Date();
	// document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
>>>>>>> 84ffc10a87de5ac4811b315078e867765e41ec6c
</html>
