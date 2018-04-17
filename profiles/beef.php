
<?php
require('db.php');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'Beef'");
if($result)    $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
?>


	
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $my_data['name']; ?> - HNG Internship</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat');
  @import url('https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?9ukd8d');
  @import url('https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css');
  .bg-1 { 
      background-color: #cc66ff; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color:  #ff66a3; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #fff; /* White */
      color: #555555;
	  
.skills, .social {
  margin: 10px 0 10px 0;
}

.devicon-html5-plain.sq:hover {
  background-color: #e54d26;
  color: #fff;
}
.devicon-css3-plain.sq:hover {
  background-color: #3d8fc6;
  color: #fff;
}
.devicon-php-plain.sq:hover {
  background-color: #6181b6;
  color: #fff;
}
.devicon-nodejs-plain.sq:hover {
  background-color: #83CD29;
  color: #fff;
}
.devicon-ruby-plain.sq:hover {
  background-color: #d91404;
  color: #fff;
}
.devicon-javascript-plain.sq:hover {
  color: #f0db4f;
  font-size: 30px;
  padding: 10px;
  margin: 0;
  width:50px;
  height:50px;
  background: linear-gradient(to bottom, #fff 0%, #f0db4f 100%);
  margin:0 auto;
  margin-top:50px;
  background: #fff;
  box-shadow: inset 0 0 0 13px #f0db4f;
}

  }
  </style>
</head>
<body>

<div class="container-fluid bg-1 text-center">
  <h1><?php echo $my_data['name']; ?></h1>
  <img src="<?php echo $my_data['image_filename']; ?>" class="img-square" alt="profile picture" width="200" height="200">
  
  <h3>Adobe Certified Associate, Frontend, Backend.</h3>
  

</div>

<div class="container-fluid bg-2 text-center">
  <p>Skills</p>
    <div class="skills">
      <i class="devicon-html5-plain sq" title="HTML5"></i>
      <i class="devicon-css3-plain sq" title="CSS3"></i>
      <i class="devicon-javascript-plain sq gradient" title="JavaScript"></i>
      <i class="devicon-php-plain sq" title="PHP"></i>
      <i class="devicon-nodejs-plain sq" title="NodeJS"></i>
      <i class="devicon-ruby-plain sq" title="Ruby"></i>
    </div>
</div>

</body>
</html>

	

