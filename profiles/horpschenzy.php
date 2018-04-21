<!DOCTYPE html>
<html>
<head>
	<title>horpschenzy's Profile</title>
</head>
<style type="text/css">
body{

	background-color: #badacc;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
.row {
    margin-right: -15px;
    margin-left: -15px
}

fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}

@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:20px;
}


.fb-profile-text>h3{
    font-weight: 300;
    font-size:18px;
    color: #ffffff;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%; 
}
}
img{
  max-width: 100%;
  border: 1px solid red;
  width: 100%;
  height: 300px;  // adjust it based on your need
}
.thumbnail {
    display: block;
    padding: 4px;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: border .2s ease-in-out;
    -o-transition: border .2s ease-in-out;
    transition: border .2s ease-in-out
}

.thumbnail a>img,
.thumbnail>img {
    margin-right: auto;
    margin-left: auto
}

a.thumbnail.active,
a.thumbnail:focus,
a.thumbnail:hover {
    border-color: #1e90ff
}

.thumbnail .caption {
    padding: 9px;
    color: #333
}
.col-md-4 {
	
	margin-left:  400px;
	padding: 10px;
}
.det{

	color:  blue;
	font-size: 30px;
	font-weight: 700px;
	font
}
</style>
<body>

	<?php
	require_once ('../db.php');
   $result = $conn->query("SELECT * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("SELECT * from interns_data where username = 'horpschenzy'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

	<div class="container">
    <div class="fb-profile row">
        <img align="left" class="fb-image-lg thumbnail" src="http://res.cloudinary.com/hostnownow/image/upload/v1523974290/1.jpg
" alt=""/>
        <img align="left" class="fb-image-profile thumbnail" src="<?= $user->image_filename; ?>" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><?= $user->name; ?> <?= $user->username; ?></h1>
            <h3>Skills: </h3>
        </div>
            
            <div class="row">
            	<div class="col-md-4"><span class="det">CodeIgniter</span> <span class="det"> PHP</span></div>
            	<div class="col-md-4"><span class="det">HTML</span></div>
            	<div class="col-md-4"><span class="det">CSS</span></div>
            	<div class="col-md-4"><span class="det">BOOTSTRAP</span></div>
            	<div class="col-md-4"><span class="det">JS</span></div>
            	
            </div>
            


    </div>
</div> <!-- /container -->  


</body>
</html>