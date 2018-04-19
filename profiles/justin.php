<!doctype html>
<html lang="en">
<head>
	<?php
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	$result2 = $conn->query("Select * from interns_data where username = 'justin'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
    <title>Justin's Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">    
	<style>
		#header{

		font-family: 'Reem Kufi', sans-serif;		
		font-style: normal;
		font-weight: normal;
		line-height: normal;
		font-size: 48px;
		text-align: center;

		color: #000000;}

		#image{
			
		}
		#social-header{
			
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 48px;
			color: #000000;
		}

		#slack{
			
			
			
		}

		#fb{
			
			
			
		}

		#twitter{
			
			
			
		}

		#insta{
			
			
			left: 275px;
			top: 568px;

		}
		#slack_handle{
			
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px
		}

		#fb_handle{
			
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;
		}

		#twitter_handle{
			
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;
		}

		#insta_handle{
			font-family: Reem Kufi;
			font-style: normal;
			font-weight: normal;
			line-height: normal;
			font-size: 30px;

		}
		
		html{
			height:800px;
		}					
}
	</style>
</head>  
<body>
<div id="header">
	<p>HNG INTERN PROFILE</p>
</div>
<div align="center" id="image">
	<img  src="<?php echo $user->image_filename; ?>" alt="Justin's picture">
</div>
<div id="social-header">
	<P align = "center"><?php echo $user->name; ?></P>
</div>
<div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
			<li class="list-inline-item">
                  <div id="twitter">
				  <img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523987390/insta.jpg" alt="inta icon">                  
               </li>
               <li>
                <div id="insta_handle"><p style="margin: 0">justo_ke</p></div>
			   </li>
			   <li class="list-inline-item">
                  <div id="twitter">
                        <img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523987124/twitterimage.png" alt="twitter icon">
                  </div>
               </li>
               <li>
                <div id="insta_handle"><p style="margin: 0">@justin_that_guy</p></div>
			   </li>
			   <li class="list-inline-item">
                  <div id="slack">
				  <img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523986719/download.jpg" alt="slack icon">
                  </div>
               </li>
               <li>
                <div id="insta_handle"><p style="margin: 0">@justin</p></div>
			   </li>
			   <li class="list-inline-item">
                  <div id="fb">
				  <img src="https://res.cloudinary.com/dykuixlcf/image/upload/v1523986958/fbimage.png" alt="fb icon">
                  </div>
               </li>
               <li>
                <div id="insta_handle"><p style="margin: 0">Justin Wainaina</p></div>
               </li>
    
            </ul>
         </div>
      </div>
   </div>
</html>