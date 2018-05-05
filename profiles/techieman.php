<?php

    if(!defined('DB_USER')){
        require '../config.php';
        //require '../db.php';
      }

      //Connect to the Database
      try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        }
      catch( PDOException $e )
        {
        echo "Connection failed: " . $e->getMessage();
        }
        global $conn;
    

     // Chat Function
      function processInput( $chatInput ){
        //Connect to the Database
      try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        }
      catch( PDOException $e )
        {
        echo "Connection failed: " . $e->getMessage();
        }

        if ( $chatInput === "aboutbot" ) {
              $response["chatInput"] = $chatInput;
              $response["answer"] = "Techieman v-1.0";
              echo json_encode( $response );
              return;
            } 

            $is_train = stripos( $chatInput, 'train:' );

            ################################################
            #######   Check if its in training mode   ######
            ################################################

            if( $is_train !== false ) {
              $train = substr( $chatInput, 6 );
              $train = preg_replace( '([\s]+)', ' ', trim($train) );
              $breakInput = explode( '#', $train );

              if( count($breakInput) < 3) {
                echo json_encode([
                  'chatInput' => $chatInput,
                  'answer' => "Please i don't understand this training format."
                ]);
                return;
              } else {
                $question = trim( $breakInput[0] );
                $answer = trim( $breakInput[1] );
                $password = trim( $breakInput[2] );
                // define(PASSWORD, 'password');
                if ($password == 'password') {
                  $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
                  if ($conn->exec($sql)) {
                    # check if question was saved
                    echo json_encode([
                      'chatInput' => $chatInput,
                      'answer' => "Thanks for the new info, Data Saved."
                    ]);
                    return;
                  } else {
                    echo json_encode([
                      'chatInput' => $chatInput,
                      'answer' => "Sorry! I did't get that"
                    ]);
                    return;
                  }
                } else {
                  echo json_encode([
                  'chatInput' => $chatInput,
                  'answer' => "You've entered an  incorrect password."
                ]);
                }
              }

              // echo json_encode([
              //   'chatInput' => $chatInput,
              //   'answer' => $train
              // ]);
              // return;
            } else {
              ####################################################
              #######   Check if its not in training mode   ######
              ####################################################

              $query = $conn->prepare("SELECT * FROM chatbot  WHERE question LIKE :question ORDER BY RAND() Limit 1");
              $query->bindParam(':question', $chatInput);
              $query->execute();
              $result = $query->fetch();
              $answer = $result['answer'];
              if (isset($answer)) {
                echo json_encode([
                  'chatInput' => $chatInput,
                  'answer' => $answer
                ]);
                return;
              } else {
                echo json_encode([
                  'chatInput' => $chatInput,
                  'answer' => 'I am not smart enough to answer that. Use this format to train me train: question # answer # password'
                ]);
                return;
              }
            } 
      }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      // Chat Bot ************************
      if(isset($_POST['chatInput'])){
        $chatInput = $_POST['chatInput'];
        $answer    = processInput($chatInput);
            //echo $answer;
            return $answer;
      } else {
        echo json_encode([
          'chatInput' => $chatInput,
          'answer' => "Please provide a question"
        ]);
        return;
      }

     
    }
    
    $query = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];

    $username = "techieman";
    $fullname = "";
    $image = "";
    $query = $conn->query("SELECT * FROM interns_data where username='$username' limit 1");
    while($result = $query->fetch(PDO::FETCH_ASSOC)){
        $fullname = $result['name'];
        $image = $result['image_filename'];
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Techieman</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/stylish-portfolio.min.css" rel="stylesheet"> -->
    <style type="text/css">body,html{width:100%;height:100%}body{font-family:'Source Sans Pro'}.btn-xl{padding:1.25rem 2.5rem}.content-section{padding-top:7.5rem;padding-bottom:7.5rem}.content-section-heading h2{font-size:3rem}.content-section-heading h3{font-size:1rem;text-transform:uppercase}h1,h2,h3,h4,h5,h6{font-weight:700}.text-faded{color:rgba(255,255,255,.7)}.map{height:30rem}@media (max-width:992px){.map{height:75%}}.map iframe{pointer-events:none}.scroll-to-top{position:fixed;right:15px;bottom:15px;display:none;width:50px;height:50px;text-align:center;color:#fff;background:rgba(52,58,64,.5);line-height:45px}.scroll-to-top:focus,.scroll-to-top:hover{color:#fff}.scroll-to-top:hover{background:#343a40}.scroll-to-top i{font-weight:800}.masthead{min-height:30rem;position:relative;display:table;width:100%;height:auto;padding-top:8rem;padding-bottom:8rem;background:linear-gradient(90deg,rgba(255,255,255,.1) 0,rgba(255,255,255,.1) 100%),url(https://res.cloudinary.com/techieman/image/upload/v1523695188/bg-masthead.jpg);background-position:center center;background-repeat:no-repeat;background-size:cover}.masthead h1{font-size:4rem;margin:0;padding:0}@media (min-width:992px){.masthead{height:100vh}.masthead h1{font-size:5.5rem}}#sidebar-wrapper{position:fixed;z-index:2;right:0;width:250px;height:100%;-webkit-transition:all .4s ease 0s;-moz-transition:all .4s ease 0s;-ms-transition:all .4s ease 0s;-o-transition:all .4s ease 0s;transition:all .4s ease 0s;transform:translateX(250px);background:#1d809f;border-left:1px solid rgba(255,255,255,.1)}.sidebar-nav{position:absolute;top:0;width:250px;margin:0;padding:0;list-style:none}.sidebar-nav li.sidebar-nav-item a{display:block;text-decoration:none;color:#fff;padding:15px}.sidebar-nav li a:hover{text-decoration:none;color:#fff;background:rgba(255,255,255,.2)}.sidebar-nav li a:active,.sidebar-nav li a:focus{text-decoration:none}.sidebar-nav>.sidebar-brand{font-size:1.2rem;background:rgba(52,58,64,.1);height:80px;line-height:50px;padding-top:15px;padding-bottom:15px;padding-left:15px}.sidebar-nav>.sidebar-brand a{color:#fff}.sidebar-nav>.sidebar-brand a:hover{color:#fff;background:0 0}#sidebar-wrapper.active{right:250px;width:250px;-webkit-transition:all .4s ease 0s;-moz-transition:all .4s ease 0s;-ms-transition:all .4s ease 0s;-o-transition:all .4s ease 0s;transition:all .4s ease 0s}.menu-toggle{position:fixed;right:15px;top:15px;width:50px;height:50px;text-align:center;color:#fff;background:rgba(52,58,64,.5);line-height:50px;z-index:999}.menu-toggle:focus,.menu-toggle:hover{color:#fff}.menu-toggle:hover{background:#343a40}.service-icon{background-color:#fff;color:#1d809f;height:7rem;width:7rem;display:block;line-height:7.5rem;font-size:2.25rem;box-shadow:0 3px 3px 0 rgba(0,0,0,.1)}.callout{padding:15rem 0;background:linear-gradient(90deg,rgba(255,255,255,.1) 0,rgba(255,255,255,.1) 100%),url(https://res.cloudinary.com/techieman/image/upload/v1523695196/bg-callout.jpg);background-position:center center;background-repeat:no-repeat;background-size:cover}.callout h2{font-size:3.5rem;font-weight:700;display:block;max-width:30rem}.portfolio-item{display:block;position:relative;overflow:hidden;max-width:530px;margin:auto auto 1rem}.portfolio-item .caption{display:flex;height:100%;width:100%;background-color:rgba(33,37,41,.2);position:absolute;top:0;bottom:0;z-index:1}.portfolio-item .caption .caption-content{color:#fff;margin:auto 2rem 2rem}.portfolio-item .caption .caption-content h2{font-size:.8rem;text-transform:uppercase}.portfolio-item .caption .caption-content p{font-weight:300;font-size:1.2rem}@media (min-width:992px){.portfolio-item{max-width:none;margin:0}.portfolio-item .caption{-webkit-transition:-webkit-clip-path .25s ease-out,background-color .7s;-webkit-clip-path:inset(0);clip-path:inset(0)}.portfolio-item .caption .caption-content{transition:opacity .25s;margin-left:5rem;margin-right:5rem;margin-bottom:5rem}.portfolio-item img{-webkit-transition:-webkit-clip-path .25s ease-out;-webkit-clip-path:inset(-1px);clip-path:inset(-1px)}.portfolio-item:hover img{-webkit-clip-path:inset(2rem);clip-path:inset(2rem)}.portfolio-item:hover .caption{background-color:rgba(29,128,159,.9);-webkit-clip-path:inset(2rem);clip-path:inset(2rem)}}footer.footer{padding-top:5rem;padding-bottom:5rem}footer.footer .social-link{display:block;height:4rem;width:4rem;line-height:4.3rem;font-size:1.5rem;background-color:#1d809f;transition:background-color .15s ease-in-out;box-shadow:0 3px 3px 0 rgba(0,0,0,.1)}footer.footer .social-link:hover{background-color:#155d74;text-decoration:none}a{color:#1d809f}a:active,a:focus,a:hover{color:#155d74}.btn-primary{background-color:#1d809f!important;border-color:#1d809f!important;color:#fff!important}.btn-primary:active,.btn-primary:focus,.btn-primary:hover{background-color:#155d74!important;border-color:#155d74!important}.btn-secondary{background-color:#ecb807!important;border-color:#ecb807!important;color:#fff!important}.btn-secondary:active,.btn-secondary:focus,.btn-secondary:hover{background-color:#ba9106!important;border-color:#ba9106!important}.btn-dark{color:#fff!important}.btn{box-shadow:0 3px 3px 0 rgba(0,0,0,.1);font-weight:700}.bg-primary{background-color:#1d809f!important}.text-primary{color:#1d809f!important}.text-secondary{color:#ecb807!important}</style>
<style>
.chatbox {
	width: 500px;
	min-width: 390px;
	height: 600px;
	background: #a58989;
	padding: 25px;
	margin: 20px auto;
	box-shadow: 0 3px #ccc;
  border-radius: 20px;
}

.chatlogs {
	padding: 10px;
	width: 100%;
	height: 450px;
	overflow-x: hidden;
	overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
	width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: rgba(0,0,0,.1);
}

.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: flex-start;
	margin-bottom: 10px;
}


.chat .user-photo {
	width: 60px;
	height: 60px;
	background: #ccc;
	border-radius: 50%;
}

.chat .chat-message {
	width: 80%;
	padding: 10px;
	margin: 5px 5px 0;
	border-radius: 10px;
	color: #fff;
	/* font-size: 20px; */
}

.friend .chat-message {
	background: #1adda4;
}

.self .chat-message {
	background: #1ddced;
	order: -1;
}

.chat-form {
	margin-top: 20px;
	display: flex;
	align-items: flex-start;
}

.chat-form textarea {
	background: #fbfbfb;
	width: 75%;
	height: 35px;
	border: 2px solid #eee;
	border-radius: 3px;
	resize: none;
	padding: 10px;
	font-size: 18px;
	color: #333;
}

.chat-form textarea:focus {
	background: #fff;
}

.chat-form button {
	background: #1ddced;
	padding: 5px 15px;
	/* font-size: 30px; */
	color: #fff;
	border: none;
	margin: 0 10px;
	border-radius: 8px;
	box-shadow: 0 3px 0 #0eb2c1;
	cursor: pointer;

	-webkit-transaction: background .2s ease;
	-moz-transaction: backgroud .2s ease;
	-o-transaction: backgroud .2s ease;
}

.chat-form button:hover {
	background: #13c8d9;
}
#msg {
    height: 35px;
    width: 70%;
    float: left;
    border-radius: 8px;
}
form {
    width: 100%;
}
</style>

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav"
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1">AKanbi Tunde Lawal<?php echo $secret_word; ?></h1>
        <h3 class="mb-5">
          <em>This is my Website, and this is a bit of copy about me</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#chat">Chat with Me</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Joined Hotel NG Internship</h2>
            <p class="lead mb-5"> I just Joined Hotels.ng Internship 4.0 and I am really loving it</p>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">Skillset </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <!-- <h3 class="text-secondary mb-0">Services</h3> -->
          <h2 class="mb-5">SKillset</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-smartphone"></i>
            </span>
            <h4>
              <strong>HTML5</strong>
            </h4>
            <!-- <p class="text-faded mb-0">Looks great on any screen size!</p> -->
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-pencil"></i>
            </span>
            <h4>
              <strong>CSS3</strong>
            </h4>
            <!-- <p class="text-faded mb-0">Freshly redesigned for Bootstrap 4.</p> -->
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i>
            </span>
            <h4>
              <strong>Jquery</strong>
            </h4>
           <!--  <p class="text-faded mb-0">Millions of users
              <i class="fa fa-heart"></i>
              Start Bootstrap!</p> -->
          </div>
          <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-mustache"></i>
            </span>
            <h4>
              <strong>PHP/Laravel</strong>
            </h4>
            <!-- <p class="text-faded mb-0">I mustache you a question...</p> -->
          </div>
        </div>
      </div>
    </section>


    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-secondary mb-0">Portfolio</h3>
          <h2 class="mb-5">Recent Projects</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Stationary</h2>
                  <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                </span>
              </span>
              <img class="img-fluid" src="https://res.cloudinary.com/techieman/image/upload/v1523695079/portfolio-1.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Ice Cream</h2>
                  <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                </span>
              </span>
              <img class="img-fluid" src="https://res.cloudinary.com/techieman/image/upload/v1523695076/portfolio-2.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Strawberries</h2>
                  <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                </span>
              </span>
              <img class="img-fluid" src="https://res.cloudinary.com/techieman/image/upload/v1523695079/portfolio-3.jpg" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Workspace</h2>
                  <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                </span>
              </span>
              <img class="img-fluid" src="https://res.cloudinary.com/techieman/image/upload/v1523695077/portfolio-4.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

<div name="chat" class="chatbox" id="chat">
		<div class="chatlogs">
			<div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">Hello, my name is Techieman, how may I help you? <br/> I can be trained in this format <br/> <i>train: question # answer # password</i> </p>	
			</div>
			<!-- <div class="chat self">
				<div class="user-photo"></div>
				<p class="chat-message">What's up ..!!</p>	
			</div> -->
		</div>
		<div class="chat-form">
			<!-- <textarea></textarea>
      <button>Send</button> -->
      <form id="formSub" method="POST">
        <input id="msg" type="text" name="chatInput" placeholder="" />
        <!-- <input type="submit" id="sub" type="button" value="send"> -->
        <button type="submit" name="submit">Send</button>
      </form>
		</div>
	</div>
      <!-- <form id="formSub" method="POST">
        <input id="msg" type="text" name="chatInput" placeholder="Write your message here..." />
        <input type="submit" id="sub" type="button" value="send">
        <button type="submit" name="submit" class="btn btn-info float-right w-100">Send</button>
       </form> -->


    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; HNG 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<!--     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <!-- <script src="js/stylish-portfolio.min.js"></script> -->
    <script type="text/javascript">!function(e){"use strict";e(".menu-toggle").click(function(a){a.preventDefault(),e("#sidebar-wrapper").toggleClass("active"),e(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times"),e(this).toggleClass("active")}),e('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var a=e(this.hash);if((a=a.length?a:e("[name="+this.hash.slice(1)+"]")).length)return e("html, body").animate({scrollTop:a.offset().top},1e3,"easeInOutExpo"),!1}}),e("#sidebar-wrapper .js-scroll-trigger").click(function(){e("#sidebar-wrapper").removeClass("active"),e(".menu-toggle").removeClass("active"),e(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times")}),e(document).scroll(function(){e(this).scrollTop()>100?e(".scroll-to-top").fadeIn():e(".scroll-to-top").fadeOut()})}(jQuery);var onMapMouseleaveHandler=function(e){var a=$(this);a.on("click",onMapClickHandler),a.off("mouseleave",onMapMouseleaveHandler),a.find("iframe").css("pointer-events","none")},onMapClickHandler=function(e){var a=$(this);a.off("click",onMapClickHandler),a.find("iframe").css("pointer-events","auto"),a.on("mouseleave",onMapMouseleaveHandler)};$(".map").on("click",onMapClickHandler);</script>

<script type="text/javascript">
      $(document).ready(function(){
            $('form').on('submit', function(e){
            e.preventDefault();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "profiles/techieman.php",
                    cache: false,
                    data: $('form').serialize(), 
                    success: function(response) {
                      console.log(response);
                      // alert("Thank you");
                      $('.chatlogs').append("<div class=\" chat friend \"><div class = \" user-photo \"></div> <p class = \" chat-message \"> "
                       +response.chatInput + "</p>"
                        +"</div><div class=\" chat self \"><div class = \" user-photo \"></div><p class = \" chat-message \">" 
                        +response.answer+ "</p></div>");
                        $('#msg').val('');
                    },
                    error: function(xhr, errorType, erroThrown){
                      alert("An error Occured: " + xhr.status + " " + xhr.statusText + '. error type ' + errorType + ' error thrown: ' + erroThrown + '<br/>' + xhr.responseText);
                    }

                });
            });
            
            });
    </script>

  </body>

</html>
