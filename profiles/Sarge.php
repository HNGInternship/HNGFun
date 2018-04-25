	<?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'Sarge'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
<!DOCTYPE html>
<html>
<head>
  <title>Sarge | HNG Profile</title>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
  	#hero{
		background: linear-gradient(rgba(26,26,26,0.7),rgba(26,26,26,0.7)), url(http://res.cloudinary.com/de31wg5rr/image/upload/v1524655744/bg_djwtwt.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		height: 100vh;
		width: 100%;
		color: white;
		text-align: center;
		margin-top: 40px;
	}

	.cover-cap{
		width: 100%;
		margin-top: 10px;
		padding-top: 10px; 
		height: auto;
	}

	.profile-box{
	width: 100%;
	}

	.profile{
		border-radius: 10px;
		box-shadow: rgba(0, 0, 0, 0.3) 12px 15px 20px;
		height: auto;
		margin: auto;
	}
	.profile-meta-container{
		background-color: #007bff;
		height: auto;
		overflow: hidden;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
	}
	
	.profile-meta{
		padding-top: 15px;

	}

	.profile-meta img{
		max-width: 100%;
		height: 100px;
		border-radius: 50%;
	}
	
	.name{
		font-weight: bolder;
		text-transform: uppercase;
	}

	.title{
		line-height: 7px;
	}

	.profile-social{
		list-style-type: none;
	}

	.profile-social li{
		display: inline-block;
		padding: 0 auto;
	}
	.profile-social li img{
		height: 30px;
		width: 30px;
	}

	.about-me-title{
		height: 40px;
		box-shadow: rgba(0, 0, 0, 0.3) 12px 15px 20px;
		margin:-20px 9px;
		left: 27%;
		width: 140px;
		padding-top: 7px;
		border-radius: 20px;
		background-color: #fff;
		color: #007bff;
		font-weight: bold;
		position: relative;
	}

	.about-me-text{
		padding: 30px;
		background-color: #fff;
		color: #007bff;
		border-radius: 0 0 10px 10px; 
	}

@media (min-width:320px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
	/* smartphones, iPhone, portrait 480x320 phones */
.profile{
		
		width: 17em;
		margin: auto;
		font-size: 1em;
	}

.profile-social{
	margin-left: -40px;
}

	.about-me-title{
		left: 21%;
	}
}

@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
	/* smartphones, iPhone, portrait 480x320 phones */
.profile{
		
		width: 21em;
		
	}
.about-me-title{
		left: 26%;
	}
}

@media (min-width:641px)  {  /*portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones*/  

}

@media (min-width:767px)  { /*minor break point */


}

@media (min-width:781px)  { /*minor break point */

}

@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ 

}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */ 
	
}
@media (min-width:1281px) { /* hi-res laptops and desktops */ }

  </style>
</head>
<body id="hero">
    <div class="cover-cap">
      <div class="container">
      	<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
			<div class="profile-box">
				<div class="profile">
				  <div class="profile-meta-container">
					<div class="profile-meta">
						<img src="<?php echo $user->image_filename; ?>" alt="" class="">
						<h5 class="name"><?php echo $user->name; ?></h5>
						<p class="title">Web Developer</p>
						<ul class="profile-social">
						  <li>
							<a href="https://github.com/SirG97">
							  <span class="fa-stack fa-lg">
		                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
		                      </span>
		                   </a>
		                  </li>
						  <li>
							<a href="https://web.facebook.com/omesu.chinedu.9">
							  <span class="fa-stack fa-lg">
		                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
		                      </span>
		                    </a>
		                   </li>
		                 <li>
		                 	<a href="https://twitter.com/OmesuC">
						      <span class="fa-stack fa-lg">
	                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
	                          </span>
	                       </a>
	                     </li>
						</ul>
					</div>
				  </div>
				  <div class="about-me-title">ABOUT ME</div>
				  <div class="about-me-text">	
				    <p>I am a tech enthusiast and a lover of code. I do freelance projects and I'm conversant with PHP and Javascript. I've got Laravel and React queued up as my next challenge.</p>
				  </div>
				  
				</div>
			</div>
        </div>
        </div>
      </div>
    </div>

</body>
</html>
