<?php
     

       
    try {
        $profile = 'SELECT * FROM interns_data WHERE username="woleo"';
        $select = 'SELECT * FROM secret_word';
    
        $query = $conn->query($select);
        $profile_query = $conn->query($profile);
    
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $profile_query->setFetchMode(PDO::FETCH_ASSOC);
    
        $get = $query->fetch();
        $secret_word = $get['secret_word'];
        $user = $profile_query->fetch();
        $name = $user['name'];
        $username = $user['username'];
        $image_filename = $user['image_filename'];
    } catch (PDOException $e) {
        throw $e;
    }
    //$secret_word = $get['secret_word'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        .card{
            margin: auto 0;
            width: 60%;
            text-align: center;
        }

     button {
  border: none;
  display: inline-block;
  padding: 8px;
  color:grey;
  background-color: #000;
  text-align: center;
  width: 100%;
  font-size: 16px;
}
img{
    margin:0 10%;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: blue;
  padding-right:20px;
}
    </style>
</head>
<body>

<div class="card">
  <img src="<?php echo $image_filename; ?>" alt="profile" style="width:80%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2> 
  <p>Software Developer from Ogun State</p>
  <div style="margin: 24px 0;">       
    <a href="https://twitter.com/oluwolley"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/iam_ahead/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/S.Hammed"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>

</body>
</html>

