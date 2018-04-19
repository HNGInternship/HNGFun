<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Ibrahim Isa - Hng Intern</title>
		<script type="text/javascript">
			var i = 0;
			var text = "Software Engineer with a knack for machine learning. Constant learner and a track record of solving problems with technology. Extensive experience in implementing complex software projects to make life better for clients and Users.";
			var speed = 50;
			var j = text.length;
			function textType() 
			{
				if (i < text.length) 
				{
					document.getElementById("typingEffect").innerHTML += text.charAt(i);
					i++;
					setTimeout(textType, speed);
				}
			}
		</script>
		<style type="text/css">
			body
			{
				font-family: 'Arial', sans-serif;
				color: #545E6C;
				background: #f5f5f5;
				font-size: 14px;
				padding: 90px 30px 30px 30px;
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}
			footer 
			{
				padding-top: 10px;
				text-align: center;
				font-size: 21px;
			}
			@media (min-width: 1200px)
			{
			.container {
				width: 950px;
			}
			}
			.profile-pic
			{
				display : block;
				text-align : center;
				padding : 10px 
			}
			.profile-pic img
			{
				max-width : 100px;
				max-height : 100px;
				border-radius : 50%;
			}
			.basic-info
			{
				text-align : center
			}
			.basic-info .skills-size
			{
				font-size : 35px;
			}
			#typingEffect 
			{
				padding-top: 10px;
				font-size: 21px;
				text-align : center;
			}
			#socialMedia 
			{
				padding-top: 10px;
				font-size: 21px;
				text-align: center;
			}
			#socialicons 
			{
				padding-top: 20px;
			}
			.left-content 
			{
				color : #FFF;
			}
			.left-content .top
			{
				background : #34879a;
				text-align : center;
				margin-bottom : 15px;
				padding : 25px 9px;
				border-radius : 5px;
			}
			.left-content .top p
			{
				margin : 0px
			}
			.left-content .top h2
			{
				font-weight : bold;
			}
			.left-content .top img
			{
				max-width : 100px;
				max-height : 100px;
				border-radius : 50%;
			}
			.left-content .bottom
			{
				background : #42A8C0;
				padding : 20px 15px 20px 25px;
				border-radius : 5px;
			}
			
			.left-content .bottom .section
			{
				padding-top : 25px;
				padding-bottom : 25px;
			}

			.left-content .bottom .section span
			{
				color : #70dbf5
			}

			.right-content 
			{
				background : #FFF;
				padding : 55px;
				border : 1px solid #EEE;
				border-radius : 5px;
				text-align : justify;
			}

			.right-content i
			{
				width: 30px;
				height: 30px;
				margin-right: 8px;
				display: inline-block;
				color: #fff;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				-ms-border-radius: 50%;
				-o-border-radius: 50%;
				border-radius: 50%;
				-moz-background-clip: padding;
				-webkit-background-clip: padding-box;
				background-clip: padding-box;
				background: #2d7788;
				text-align: center;
				padding-top: 8px;
				font-size: 16px;
				position: relative;
				top: -2px;
			}

			.right-content .section-title
			{
				text-transform: uppercase;
				font-size: 20px;
				font-weight: bold;
				color: #2d7788;
				margin-top: 0;
				margin-bottom: 20px;
			}

			.right-content span 
			{
				color : #2d7788; 
			}
			.right-content .p-content
			{
				padding-bottom : 15px;
			}

			.career-profile, .experiences, .projects, .skills
			{
				padding-bottom : 35px;
			}
		</style>
	</head>
	<body class="container" onload="textType()">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 left-content">
					<div class="top">
						<p><img src="http://res.cloudinary.com/di4zcjwn0/image/upload/v1523629645/mypic.jpg" /></p> 
						<h2>IBRAHIM ISA</h2>
						<p>Software Engineer</p>
					</div>
					<div class="bottom">
						<!-- Part 1 -->
						<div class="section">
							<p><i class="fa fa-envelope"></i> Ibrahimisa.d8@gmail.com</p>
							<p><i class="fa fa-phone"></i> +2347068869376</p>
							<p><i class="fa fa-globe"></i> ibrahimisad8.github.io/porfolio/</p>
							<p><i class="fa fa-linkedin"></i> LinkeIn<br/></p>
							<p><i class="fa fa-github"></i> github</p>
							<p><i class="fa fa-twitter"></i> @ibrahimd8</p>
							<p><i class="fa fa-map-marker"></i> Kaduna, Nigeria</p>
						</div>
						<!-- Part 2 -->
						<div class="section">
							<p class="education"><b>EDUCATION</b></p>
							<p>
							<b>MSc Computer & Microelectronics Systems</b><br/>
							University of Technology Malaysia<br/>
							2014 - 2015<br/>
							<br/>
							<b>BSc Electronics Engineering</b>
							Infrastructure University Kuala Lupur<br/>
							2010 - 2013<br/>
							</p>
						</div>
						<!-- Part 3 -->
						<div class="section">
							<p class="education"><b>LANGUAGES</b></p>
							<p>
								English <span>(Poficient)</span></br> 
								Arabic <span>(Intermediate)</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-8 right-content">
					<div class="career-profile">
						<p class="section-title"><i class="fa fa-user"></i> CAREER PROFILE</p>
						<p>
							Agile Software Engineer, designer, programmer and web developer with wide-ranging IT experience, strive to build software that is as structurally, semantically and aesthetically cohesive as it is intuitive for the user. Work collaboratively to isolate problem domains and implement simple and repeatable solutions.
						</p>
					</div>
					<div class="experiences">
						<p class="section-title"><i class="fa fa-briefcase"></i> EXPERIENCES</p>
						<p class="p-content">
						<b>Software Developer</b> (Feb 2018 - Present)<br/>
						<span>Inteliworx Technologies</span><br/>
						Software application development on various platforms System integrations, API handshaking. Modification of existing software to correct errors, upgrade interfaces and improve performance. Database configuration & design.<br/>
						</p>
						<p class="p-content">
						<b>Software Engineer</b> (Feb 2017 - Jan 2018)<br/>
						<span>Hib Soft Solutions</span><br/>
						Designed, developed and maintained web-based applications. Modified existing software to correct errors, upgrade interfaces and improve performance. Directed software design and development while remaining focused on client needs
						</p>
						<p class="p-content">
						<b>Research Assistant</b> (Mar 2015 - Sep 2015)<br/>
						<span>VeCAD (VLSI – eCAD) Research Group, University of Technology Malaysia (UTM)</span><br/>
						Modeling of image processing algorithms for hardware-software co- simulation. Worked together in a team to solve floating point issues in the hardware software co-simulation environment. Programming of embedded systems such as Olimex and Altera Cyclone V FPGA Boards
						</p>
					</div>
					<div class="skills">
						<p class="section-title"><i class="fa fa-rocket"></i> SKILLS</p>
						<p class="skills-size">
							<b>Back-End</b><br/>
							Nodejs(Express Adonis), Php(laravel), Python(Django)<br/>
							<br/>
							<b>Front-End</b><br/>
							HTML5, CSS3, Sass, Javascript(jquery, Vuejs, React)<br/>
							<br/>
							<b>Databases</b><br/>
							MongoDB, MysQl, ArangoDB<br/>
							<br/>
							<b>Cache Systems</b><br/>
							Memcached, Redis<br/>
							</br>
							<b>Cloud Platform</b><br/>
							AWS, Heroku<br/>
							</br>
							<b>Continous Integration</b></br>
							Circle CI<br/>
							</br>
							<b>Development Environment & Tools</b></br>
							*unix, git, composer, webpack, npm, vagrant, docker, Test (PHPunit)</br>
							</br>
							<b>Principles, Paradigms, Concepts</b></br>
							SOLID, DRY, TDD, OOP, Clean Architecture, Refactoring.</br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
