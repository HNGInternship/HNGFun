<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<title>Perkyprince's Profile</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  	<style type="text/css">
* {
      margin: 0;
      padding: 0;
}
	.main {
    font-size: 45px;
}
	.sub {
    font-size: 30px;
}
 body {
 	background-image: url(https://res.cloudinary.com/perkyprince/image/upload/v1524717109/Profile_Background.jpg);
    background-size:cover;
    background-color: #dfdfdf;
    color: #333333;
    font-family: 'Courier New', Courier, 'Lucida Sans Typewriter', 'Lucida Typewriter', monospace;
}
.header {
     border-top: solid 8px #019cdb;
     margin-bottom: 18px;
}
 .nav {
      margin-top: 12px;
      margin-left: 10%;
}    
 .nav-item {
      list-style: none;
      display: inline;
      margin-right: 12px;
}
	a {
      color: #184bd6;
      text-decoration: none;
}    
	a:hover {
      color: #48b2e8;
}
	.title {
      color: #184bd6;
      text-transform: uppercase;
      letter-spacing: 2px;
} 
	.titles {
      margin-top: -22%;
    }
	.footer {
      text-align: center;
      width: 100%;
      margin-bottom: 2%;
    }
    
    .line {
      border-top: 2px solid #001489;
      width: 100%;
      margin-left: 1%;
      margin-right: 1%;
    }
	.footer-sub {
		font-size: 30px;
      	width: 35%;
      	margin: 10px 0px 10px 0px;
      	color: #184bd6;
      	text-decoration: none;
      	text-align: center;
      	line-height: normal;
  		font-weight: bold;
  		font-family: Roboto;  		
}
	.button {
      border: 2px solid #a0f6f9;
      color: #a0f6f9;
      display: inline-block; /* To wrap the border just around the content */
      font-size: 10px;
      margin-top: 12px;
      padding: 12px 30px;
}    
    .button:hover {
      border: 2px solid #019cdb;
      background-color: #019cdb;
      color: #dfdfdf;
      cursor: pointer; /* This ensures that the cursor changes on hover */
}
	.thick-green-border {
    	border-color: grey;
    	border-width: 1px;
    	border-style: solid;
    	border-radius: 50%;
	  } 
	.smaller-image {
    	width: 40%;
}
	.img-wrapper{
		margin: 10px 0px 300px 500px;
	}
   
	.flex {
		align-items: center;
      	display: -webkit-box;  /* OLD - iOS 6-, Safari 3.1-6, BB7 */
      	display: -ms-flexbox;  /* TWEENER - IE 10 */
      	display: -webkit-flex; /* NEW - Safari 6.1+. iOS 7.1+, BB10 */
      	display: flex;         /* NEW, Spec - Firefox, Chrome, Opera */
      }
 
    .column {
      flex-direction: column;
	  }
 .row {
      flex-direction: row;
    }
    .text{
    	width: 100%;
    	margin-bottom: 10px;
      	color: #a0f6f9;
      	text-decoration: none;
      	text-align: center;
      	line-height: normal;
  		font-weight: bold;
  		font-family: Roboto;
  		font-style: italic;
  		font-size: 22px;
  	}

    @media (max-width: 481px) { 
      .main {
        font-size: 34px;
     }
    
      .sub {
        font-size: 24px;
      }
    }
    @media (max-width: 481px) { 
      .img-wrapper {
        width: 95%;
      }
    }
</style>
</head>
<body>

	<?php
	require 'db.php';

$select = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $result= $select->fetch();
    $secret_word = $result['secret_word'];


$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'perkyprince'");
    $result2->setFetchMode(PDO::FETCH_ASSOC);
    $user = $result2->fetch();

// $query = "SELECT * FROM secret_word LIMIT 1";
// $result = mysqli_query($conn, $query);
// while($secret_word= mysqli_fetch_assoc($result))

// $query2= "SELECT * FROM interns_data WHERE username = 'perkyprince'";    
// $result2 = mysqli_query($conn, $query2);
// while ($user = mysqli_fetch_assoc($result2));
?>
	
	<div class="main-wrapper">
		<header class="header">
        	<!-- NAVIGATION BAR -->
<nav class="navbar navbar-default navbar-fixed-top">
   <div class="row"> 
  <div class="container-fluid col-xs-12 col-md-10 col-md-offset-1">
    <div class="collapse navbar-collapse" id="NavbarForCollapse">
      <ul class="nav navbar-nav navbar-right text-center">
       <li class="nav-item"><a href="#about-ref">ABOUT</a></li>
       <li class="nav-item"><a href="#skills-ref">SKILLS</a></li>
       <li class="nav-item"><a href="#contact-ref">CONTACT</a></li>
      </ul>
     </div> <!--navbar-collapse-->
    </div><!--container-fluid -->
    </div><!--row -->
   </nav><!--navbar -->
<!-- END NAVIGATION BAR -->
    	</header>
   
    	<div class="flex column">
    		<section>
    			<div class="img-wrapper">
  					<img class="smaller-image thick-green-border" src="https://res.cloudinary.com/perkyprince/image/upload/v1524667119/Perky.jpg" alt= "perkyprince">
  				</div>
    			<div class="titles flex column">
    				<h1 class="main title">Hello I'm <span id="me"><?php echo $user["name"]?></span></h1>
    				<h2 class="sub title">I love creating code</h2>
    			</div>
    		</section>
    	</div>
    </div>
    
    <footer class="footer">
    	<a name="about-ref"></a>
        <div class="flex">
            <div class="line"></div> 
            <h3 class="footer-sub title">About Me</h3>
            <div class="line"></div>
        </div>
        <div class="text">I am a Front End Web Developer from Owerri, Imo State. <br> I just joined Hotels NG Internship and I'm loving it. <br> At the end of this Internship, <br> I would love to become a better Software Developer. <br> I'm also a Surveyor; with great experience in Land related matters, <br> GIS and Spatial analysis and Remote sensing. <br> I'm not much of an outdoor person but I'm definitely fun to be with.<br>
      	</div>

      	<a name="skills-ref"></a>
        <div class="flex">
            <div class="line"></div> 
            <h3 class="footer-sub title">Skills</h3>
            <div class="line"></div>
        </div>
        <div class="text">
        	<p>Photoshop, HTML, CSS, Javascript, jQuery</p>
      	</div>

      	
      	<a name="contact-ref"></a>
      	<div class="flex">
            <div class="line"></div> 
            <h3 class="footer-sub title">Contact</h3>
            <div class="line"></div>
        </div>
    	<div>
    		<a href="https://github.com/Perkyprince" class="button btn btn-default" target="_blank"><i class="fa fa-github  fa-2x"></i></a>
    		<a href="https://web.facebook.com/perky.prince.14" class="button btn btn-primary" target="_blank"><i class="fa fa-facebook-official fa-2x"></i></a>
    		<a href="https://www.instagram.com/princewillherberts/" class="button btn btn-default" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
    		<a href="https://twitter.com/Perkyprince33" class="button btn btn-primary" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
    		<a href="https://www.linkedin.com/in/princewill-herberts-63b399126/" class="button btn btn-primary" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a>
    	</div>
    </footer>
</body>
