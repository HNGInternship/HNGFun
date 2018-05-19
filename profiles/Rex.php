
<?php
   
require '../db.php'; 

//query to select intern data
    $userrow = "SELECT * FROM interns_data WHERE username='Rex'" ; 
    $q = $conn->query($userrow);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $name=$data['name'];
    $username=$data['username'];
    $image_file=$data['image_filename'];
    
    
//query to get secret word
    $word = "SELECT * FROM secret_word" ; 
    $q = $conn->query($word);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word=$data['secret_word'];
    

?>



<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>HNG_FUN</title>
    <meta charset="UTF-8">
	<meta name="description" content="HNG4.0 Stage3 Task">
	<meta name="keywords" content="HTML,CSS,PHP">
	<meta name="author" content="Abdulhafiz Ahmed (@Rex)">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
<style type="text/css">
    body{
        font-family: 'Open Sans', sans-serif;
        background: url("http://res.cloudinary.com/rexdavinci/image/upload/v1525635316/nature_crash____free_texture___background_by_supersweetstock-d5he0bx.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-repeat: no-repeat;
        
    }
    /*Box for image and data*/.
    .image{
      position: absolute;
      height: 475px;
      width: 325px;
      border-radius: 4px;
      border: solid coral;
    }
    .container {
    width: 350px;
    height: 700px;

    }
    .container img {
    width: 100%;
    border: solid 4px coral;
    height: auto;
    margin: 70px 0 0 0;
    
    }
    .Wordings{
        position: absolute;
        font-family: "Helvetica";
        text-align: center;
        top: 200px;
        margin-left: 850px;
    }
    .name{
        font-size: 23px;
    }
    .Description{
        
        font-size: 18px;
    }
    .box{
        position: absolute;
        margin-left: 645px;
        top: 510px;
        height: 200px;
        width: 700px;
        text-decoration: none;
        display: block;
    }
    


</style>
</head>
<body>
    <div class="container">
        <img src="<?php echo $image_file ?>">
    </div>
    <div class="Wordings">
        <p style="font-weight:bold" class="name"><?php echo $name?></p>
        <p class="Description">(HNG4 Intern)</p>

    </div>
    <div class="box">
    
    <a href="https://twitter.com/realrexdavinci"><i class="fa fa-twitter fa-2x"></i></a> 
    <a href="https://web.facebook.com/abdhafizahmed"><i class="fa fa-facebook fa-2x"></i></a> 
    <a href="https://github.com/rexdavinci"><i class="fa fa-github-alt fa-2x"></i></a>
    <a href="https://facebook.com/abdhafizahmed"><i class="fa facebook-square fa-2x"></i></a>
    </div>






</body>


</html

