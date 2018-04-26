<?php
 	// require_once '../db.php';
 	try {
 	      $query = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE username = \'Luthfulahi\'';
 	      $result = $conn->query($query);
 	      $result->setFetchMode(PDO::FETCH_ASSOC);
 	      $luthfulahi = $result->fetch();
 	      $secret_word = $luthfulahi['secret_word'];
 	  } catch (PDOException $event) {
 	      throw $event;
 	  }
  ?>

<html lang="en-US">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $luthfulahi['username']; ?> | The Optimist</title>
		<link rel="shortcut icon" type="image/png" href="http://res.cloudinary.com/luthfulahi/image/upload/v1517637458/logo_gbmklw.png">
  <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
  	body{font-family: 'Supermercado One', cursive;}
  	#landingPage{
  		min-height: 100vh;
  		background-image: url(http://res.cloudinary.com/luthfulahi/image/upload/v1517637437/hire_kzgnxn.jpg);
  		background-size: cover;
  		padding-top: 100px;
  		font-weight: bolder;
  		color: #000;
  	}
  	#aboutMe{
  		/*background: linear-gradient(to bottom left, rgb(255, 5, 85), #fff);*/
  		font-size: xx-large;
  		line-height: 300%;
  		min-height: 100vh;
  		font-weight: 300;
  	}
  	#learning{
  		min-height: 100vh;
  		line-height: 300%;
  	}
  	.icon-round {
  	font-size: 30px;
  	height: 60px;
  	width: 60px;
  	text-align: center;
  	align-content: center;
  	border-radius: 50%;
  	line-height: 60px;
  	margin-top: 40px;
  	margin-bottom: 20px
  	}
  	.icon-square{
  		font-size: 20px;
  		height: 50px;
  		width: 50px;
  		text-align: center;
  		align-content: center;
  		line-height: 50px;
  	}
  	#p1:hover{
  		content: url(http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project1-0_g1dzd5.jpg);
  	}
  	#p2:hover{
  		content: url(http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project2-0_wunbos.jpg);
  	}
  	#p3:hover{
  		content: url(http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project3-0_m0yg6g.jpg);
  	}
  	.main-img:hover{
  		content: url(http://res.cloudinary.com/luthfulahi/image/upload/v1517637436/code_ss9mzh.png);
  	}
  	.fadeh {
  		margin-top: 70px;
  	}

  	/* color scheme */
  	/* color scheme */
  	/* color scheme */
  	/* color scheme */
  	/* color scheme */
  	#landingPage a:hover{
  		color: #000;
  		text-decoration: none;
  	}
  	#landingPage {
  		color:#fff !important;
  	}
  	#footer{
  		color: #000;
  		background-color: #FFF;
  	}
  	#contactMe a:visited {
  		color: #000;
  	}
  	#contactMe a:hover{
  		color: #000;
  	}
  	.icon-round{
  		border: 2px solid #FFF;
  		color:#000;
  		background-color: #FFF;
  	}
  	.icon-square{
  		background-color: #FFF;
  		color: #000;
  	}
  	.icon-square:hover{
  		color: #FFF;
  		background-color: #000;
  	}
  	.icon-round:hover{
  		color: #FFF;
  		background-color: #000;
  	}
  	a{
  		color: #000;
  	}
  	code{
  		color: #000000 !important;
  	}
  </style>
</head>
<body class="container-fluid text-center">
		<!-- color picker	color picker	color picker	color picker	color picker -->
		<!-- color picker	color picker	color picker	color picker	color picker -->
		<!-- color picker	color picker	color picker	color picker	color picker -->

		<!-- color picker	color picker	color picker	color picker	color picker -->
		<!-- color picker	color picker	color picker	color picker	color picker -->

		<!-- landing page	landing page	landing page	landing page	landing page	landing page -->
		<!-- landing page	landing page	landing page	landing page	landing page	landing page -->
		<!-- landing page	landing page	landing page	landing page	landing page	landing page -->
		<div id="landingPage">
			<div class="row">
				<div class="col-md-3">
					<a href="#aboutMe"><h3 class="animated fadeh">ABOUT ME</h3></a>
					<a href="#aboutMe"><i class="fa fa-info icon-round animated swg"></i></a>
					<a href="#learning"><h3 class="animated fadeh">SKILLS</h3>
					<a href="#learning"><i class="fa fa-briefcase icon-round animated swg"></i></a>
				</div>
				<div class="col-md-6">
					<img src="<?php echo $luthfulahi['image_filename']; ?>" alt="Luthfulahi" class="img-responsive main-img img-circle center-block" id="test">
					<h1><?php echo $luthfulahi['name']; ?></h1>
					<code id="intro">
					<p class="animated"><i class="fa fa-asterisk"></i>&nbsp Hi!, I am <?php echo $luthfulahi['username']; ?> <br> I learn how to write <i class="fa fa-pencil"></i> codes <br> WHY <i class="fa fa-question"></i></br>To make my day-to-day activity automated <i class="fa fa-exclamation"></i>
					I just Joined Hotels.ng Internship 4.0 and I am really loving it
					</p>
					</code>
				</div>
				<div class="col-md-3">
					<a href="#projects"><h3 class="animated  fadeh">PROJECT</h3>
					<a href="#projects"><i class="fa fa-code icon-round animated swg"></i>
					<a href="#contactMe"><h3 class="animated fadeh">Let's Connect!</h3>
					<a href="#contactMe"><i class="fa fa-comments icon-round animated swg"></i>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" >
					<a href="#aboutMe"><i class="fa fa-angle-double-down animated bounce infinite icon-round" id="navArrow"></i></a>
				</div>
			</div>
		</div>
		<!-- landing page	landing page	landing page	landing page	landing page	landing page -->
		<!-- landing page	landing page	landing page	landing page	landing page	landing page -->

		<!-- about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me  -->
		<!-- about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me  -->
		<!-- about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me  -->
		<div id="aboutMe">
			<div class="row">
				<div class="col-md-12">
					<h1><strong>ABOUT <?php echo $luthfulahi['username']; ?>!</strong></h1>
					<!-- <img src="img/hero.jpg" alt="Luthfulahi" class="img-responsive"> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="me">
					<p class="abt">I am <?php echo $luthfulahi['name']; ?></p>
					<p class="abt">An aspiring web developer</p>
					<p class="abt">I am a Student Of Computer Science Department<br> at The Polytechnic Ibadan</p>
					<p class="abt">Also an Intern at Hotels.ng</p>
					<p class="abt" title="Click me!"><a href="#contactMe">Ask me More about myself</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" >
					<a href="#landingPage"><i class="fa fa-angle-double-up animated bounce infinite icon-round" id="navArrow"></i></a>
					<a href="#learning"><i class="fa fa-angle-double-down animated bounce infinite icon-round" id="navArrow"></i></a>
				</div>
			</div>
		</div>
		<!-- about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me  -->
		<!-- about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me 	about me  -->

		<!-- learning + projects	learning + projects	learning + projects	learning + projectslearning + projects	learning -->
		<!-- learning + projects	learning + projects	learning + projects	learning + projectslearning + projects	learning -->
		<!-- learning + projects	learning + projects	learning + projects	learning + projectslearning + projects	learning -->
		<div id="learning">
			<div class="row">
				<div class="col-md-12">
					<h1>Languages I Am Learning</h1>
					<h2><i class="fa fa-html5"></i>&nbsp HTML</h2>
					<h2><i class="fa fa-css3"></i>&nbsp CSS</h2>
					<h2><img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517637434/javascript_kjsypm.png" alt="" width="40" height="40">JavaScript(ES6)</h2>
					<h2><i class="fa fa-php"></i>&nbsp PHP</h2>
					<h1>Frameworks I Use</h1>
					<h2><img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517637435/bootstrap_mfs2z5.png" alt="" width="40" height="40">Bootstrap</h2>
					<h2><img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517637435/jquery_mwhteq.png" alt="" width="40" height="40">jQuery</h2>
					<h2><i class="fa fa-flash"></i>&nbsp Animate.css</h2>
					<em><h3>One other thing..... I use FireBase <i class="fa fa-fire"></i></h3></em>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" >
					<a href="#aboutMe"><i class="fa fa-angle-double-up animated bounce infinite icon-round" id="navArrow"></i></a>
					<a href="#projects"><i class="fa fa-angle-double-down animated bounce infinite icon-round" id="navArrow"></i></a>
				</div>
			</div>
		</div>
		<div id="projects">
			<div class="row text-center">
				<div class="col-md-12">
					<h1>My Projects</h1>
					<p>
						I just started learning so I haven't really had my hands on many things, a bigger project page <em>Coming soon...</em>
					</p>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-4">
					<img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project1_ez9cjw.jpg" alt="MY Portfolio" class="center-block img-responsive" id="p1">
					<h2>My Portfolio</h2>
				</div>
				<div class="col-md-4">
					<img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project2_vlkqwc.jpg" alt="Wedding Invitation" class="center-block img-responsive" id="p2">
					<h2>Wedding Invitation</h2>
				</div>
				<div class="col-md-4">
					<img src="http://res.cloudinary.com/luthfulahi/image/upload/v1517454658/project3_apus3d.jpg" alt="Tribute Page" class="center-block img-responsive" id="p3">
					<h2>Tribute Page</h2>
				</div>
			</div>
		</div>
		<!-- learning + projects	learning + projects	learning + projects	learning + projectslearning + projects	learning -->
		<!-- learning + projects	learning + projects	learning + projects	learning + projectslearning + projects	learning -->

		<!-- contact me 	contact me 	contact me 	contact me contact me contact me contact me contact me contact me  -->
		<!-- contact me 	contact me 	contact me 	contact me contact me contact me contact me contact me contact me  -->
		<!-- contact me 	contact me 	contact me 	contact me contact me contact me contact me contact me contact me  -->
		<div id="contactMe">
			<div class="row text-left">
				<div class="col-md-3">
					<h1>Let's Connect!</h1>
					<ul class="list-unstyled">
						<a href="tel:+2349030836199"><li><i class="fa fa-phone icon-square"></i><kbd>+234-90-308-361-99</kbd></li></a>
						<a target="_blank" href="mailto:luteeph@gmail.com"><li><i class="fa fa-envelope icon-square"></i><kbd>luteeph@gmail.com</kbd></li></a>
						<a target="_blank" href="https://twitter.com/LuthfulahiO"><li><i class="fa fa-twitter icon-square"></i><kbd>@LuthfulahiO</kbd></li></a>
						<a target="_blank" href="https://www.linkedin.com/in/luthfulahi"><li><i class="fa fa-linkedin icon-square"></i><kbd><?php echo $luthfulahi['name']; ?></kbd></li></a>
						<a target="_blank" href="https://medium.com/@luteeph"><li><i class="fa fa-pencil icon-square"></i><kbd>@Luteeph</kbd></li></a>
					</ul>
					<span><a href="#landingPage">Back to top</a></span>
				</div>
			</div>
			<div class="row text-center" id="footer">
				<div class="col-md-12">
					Made by <strong><?php echo $luthfulahi['username']; ?></strong> with <i class="fa fa-heart animated swing infinite"></i> and <i class="fa fa-code animated swing infinite"></i>
					<p>&copy 2018</p>
				</div>
			</div>
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			    <div class="modal-header">
			      <span class="close">&times;</span>
			      <h2>LuthfulahiBot Chat</h2>
			    </div>
			    <div class="modal-body">
					<div class="bot">
					    <div class="botHeader"><h4>LuthfulahiBot</h4></div>
					    <div class="botMessage">
					       <p>
					       	Hi, I am Luthfulahi's bot here is a list of thing I can do for you!
					       	<ol>
					       		<li>To get information about me type <code>aboutbot</code></li>
					       		<li>To train me use this format <code>train:question#answer#password</code></li>
					       		<!-- <li>To get top10 cryptocurrency and thier price use <code>TopTenCrypto</code></li> -->
					       	</ol>
					       </p>
					    </div>
					</div>
			    </div>
			    <div class="modal-footer">
			        <!-- <button onclick="addNew()">add</button> -->
			      <form action="" method="post" id="chatForm">
			          <input type="text" name="userMessage" id="inputChat" placeholder="Hi, lets chat, I'm pretty intelligent" autofocus>
			          <input type="submit" value="Send" id="sendBtn">
			      </form>
			    </div>
			  </div>

			</div>
			<div id="chatButton pull-left" style="position: fixed;bottom: 0;">
				<div class="row">
					<div class="col-md-12">
						<button id="openModal" style="height: 40px; width: 90px; border-radius: 10px; background-color: black; color: white;">Chat <i class="fa fa-comments"></i></button>
					</div>
				</div>
			</div>
		</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$('#intro').addClass('swing');
			$('.fadeh').addClass('fadeInUpBig');
			$('.swg').addClass('swing');
			$('a[href^="#"]').on('click',function (e) {
				    e.preventDefault();

				    var target = this.hash;
				    var $target = $(target);
				    // console.log(target);
				    // console.log($target);

				    $('html, body').stop().animate({
				        'scrollTop': $target.offset().top
				    }, 2000);
				});
		});
	</script>
	<script type="text/javascript">
		var modalBody = document.getElementsByClassName('modal-body')[0];
		// var userInput = document.getElementById('chatForm').element.namedItem('userMessage').value;
	  $(document).ready(function(){
	        $('form').on('submit', function(e){
	         e.preventDefault();
	         // console.log(userInput);
	            $.ajax({
	                type: "POST",
	                cache: false,
	                url: "profile.php?id=Luthfulahi",
	                dataType: "json",
	                data: $('form').serialize(),
	                success: function(result) {
	                  console.log(result);
	                  modalBody.innerHTML += `<div class="user"><div class="userHeader"><h4>You</h4></div><div class="userMessage"><p>${result.input}</p></div></div><div class="bot"><div class="botHeader"><h4>LuthfulahiBot</h4></div><div class="botMessage"><p>${result.response}</p></div></div>`;
	                  $('.modal-body').scrollTop($('.modal-body')[0].scrollHeight);
	                  document.getElementById('chatForm').reset();
	                }

	            });
	        });

	        });
	</script>
	<!-- <script>
		const form = document.forms['chats'];
		form.addEventListener('submit', processChat , false);
		const url = "Luthfulahi.php"
		function processChat(e){
			e.preventDefault();
			fetch(url, {
			  method: "POST",
			  body: new FormData(form),
			  headers: new Headers({
			    "Content-Type": "plain/text"
			  })
			})
			.then((response) => response.text())
			.then((response) => {
			  console.log(response)
			})
			.catch((err) => console.log("Oops, error :("));
		}

	</script> -->
	<script>


		function addNew(){
			var modalBody = document.getElementsByClassName('modal-body')[0];
		    modalBody.innerHTML += `<div class="bot">
		            <div class="botHeader"><h4>LuthfulahiBot</h4></div>
		            <div class="botMessage">
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quaerat voluptate iure ea expedita autem, aut, necessitatibus pariatur illum omnis quia. Dolorum iste corrupti alias ipsa quia, similique vel dignissimos.</p>
		            </div>
		        </div>
		        <div class="user">
		            <div class="userHeader"><h4>You</h4></div>
		            <div class="userMessage">
		                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error explicabo neque, recusandae molestias nulla natus voluptas optio dignissimos veritatis ab repellat, eum voluptates qui incidunt maiores quod mollitia ducimus iure!</p>
		            </div>
		        </div>`
		    $('.modal-body').scrollTop($('.modal-body')[0].scrollHeight);
		}
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("openModal");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>
	</body>
</html>
