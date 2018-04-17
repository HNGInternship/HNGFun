

<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_ASSOC);
  $secret_word = $result['secret_word'];

  $result2 = $conn->query("Select * from interns_data where username = 'chisom5'");
  $user = $result2->fetch(PDO::FETCH_ASSOC);

  $username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chisom Okoye</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .card {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			}

			.title {
			  color: grey;
			  font-size: 18px;
			}
            #twitter{
                color:#00aced;
            }
            #facebook{
                color:#3b5998;
            }
            #github{
            	color:#333;
            }
          
            footer{
                background:#000000;
/*                height:40px;
*/            }
            footer p{
                color:#ffffff;
                line-height:40px;
                font-size:13px;
            }
    </style>
</head>
<body>
    	<h2 style="text-align:center">My Profile Card</h2>

	<div class="card">
	
	  <img src= "<?=$image_filename;?>" alt="chisom profile" style="width:100%; height: 300px">

	  <h1><?=$name;?></h1>

	  <p style="margin:10px 0px"><span class="title">FrontEnd Developer</span> <br>
	  		  Angular and anything JS

	  </p>
	  
      <p> connect with me <br>
	    <a href="https://twitter.com/chisom_code"><i class="fa fa-twitter" id="twitter"></i></a>  
	    <a href="https://web.facebook.com/chisom.okoye.108"><i class="fa fa-facebook" id="facebook"></i></a> 
	    <a href="https://github.com/chisom5"><i class="fa fa-github" id="github"></i></a>
        </p>
	 

     <footer style="padding:0px">
    <p>coptright&copy; HNGInternship 2018</p>
    </footer>
	</div>

    
</body>
</html>