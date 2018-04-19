<<<<<<< HEAD
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
<<<<<<< HEAD
=======
<!DOCTYPE html>
<html>
  <head>
    <style>
    /* Desktop */

body {
    position: fixed;
    width: 100%;
    height: 100%;
    background: Blue;
}
/*    Hello World, HNG STAGE 3 */
p {
    position: absolute;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    left: 25%;

    font-family: Roboto Slab;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 50px;

    color: White;
}
/* Rectangle */
box {
    position: absolute;
    align-items: center;
    justify-content: center;
    left: 28%;
    top: 40%;
    font-size: 37px;
    color: white;
    padding: 50px;

    background: Brown;
}
</style>
    <title></title>
    <meta content="">
  </head>
  <body>
  <p>Hello World, HNG STAGE 3 </p>
  <box><?php
echo "Today's Date is " . date("F j, Y, g:i a") . "<br>";
?>
</box>
  </body>
</html>
>>>>>>> b2bbe46b15fc26a9eb4bb2d3c3786788727f0b54
=======

	

>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6
