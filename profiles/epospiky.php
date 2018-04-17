<style>
body{background:#ced7df;
}
.head {color: #4eacff;
		font-size: 6.5em;
		text-transform: none;
		text-decoration: none;
		overflow: hidden;
	}
	
.head:hover {
	color: #fff;
}
.link--head::after {
	content: '';
	position: absolute;
	top: 0;
	right: 0;
	z-index: -1;
	background: #242424;
	-webkit-transform: translate3d(101%,0,0);
	transform: translate3d(101%,0,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.link--head:hover::after {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

ul {
    list-style-type: none;
    margin: 0;
    padding:30px 0px 30px 0px;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    font-size: 20px;
    color: #000;
    padding: 10px;
    text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}
.pull-left{float: left;}
.pull-right{float: right;
			padding-right: 150px;}
.about {
  background:#76b852;
  padding: 80px 0;
}
.clear{clear:both;}
h3{font-size: 25px; text-align: center;;}
</style>
<?php
	//require '../db.php';

?>
<?php
	$result = $conn->query("SELECT * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ, PDO::ERRMODE_EXCEPTION);
	$secret_word = $result->secret_word;
	$result2 = $conn->query("SELECT * from interns_data where username = 'Epospiky'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<div>
	
	<div class="pull-left">
		<div>
			 <a class="head" href="#home"><span data-letters=""><?php echo $user->name ?></span></a>
		</div>
						<div class="">
						
							<nav class="">
								<ul class="">
									<li><a class="scroll" href="#home">Home</a></li>
									<li><a class="scroll" href="#about">About</a></li>
									<li><a class="scroll" href="#portfolio">Portfolio</a></li>
									<li><a class="scroll" href="#services">Services</a></li>
									<li><a class="scroll" href="#contact">Contact</a></li>
								</ul>
							</nav>
							<!-- script for menu -->
						
							<!-- //script for menu -->

				</div>
	</div>
<div class="pull-right"> <img src="http://res.cloudinary.com/epospiky/image/upload/v1523739075/epo.png" height="400px"/></div>
<div class="clear"> </div>
	<div id = "about" class="about">
		<div class="about-info">
				<h3>ABOUT ME</h3>
				<h4>Who I am and why I design</h4>
				<p>I am Ernest Paul but i am porpularly known as epopsiky. I am a web designer. 
					I design because of my passion for designing. Since my kiddies time i've 
					always had a flare for designing and thus i started implementing it.</p>
		</div>
		<div class="about-grids">
		   	<div class="col-md-6 about-grid">
		   		<h4>What I do and my experience</h4>
		   		<p>I design. My long time in designing have given me lots of experiences and knowledge
		   			which i have implemented in some of my work.</p>
		   	</div>
		   	<div class="col-md-6 about-grid">
		   		<h4>My goals</h4>
		   		<p>My goal is to be the best designer ever. I Want to make great contribution to web design 
		   			per se and bridge the gap between imagination and reality. </p>
		   	</div>
		   	<div class="clear"> </div>
		</div>   
	</div>

</div>