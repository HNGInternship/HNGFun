<DOCTYPE! html>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <style>
        body{
font: 15px/1.5 Arial, Helvetica, sans-serif;
margin:0;
padding:0;
background-color:#f4f4f4;
}
/* Global */
.container{
width:60%;
margin: auto;
overflow: hidden;
}
header{
    background: #35424a;
    color: #ffffff; 
    padding-top: 30px;
    min-height: 40px;
    border-bottom: #e8491d 3px solid;
}

header #branding{
    float: left;
    
}

header #branding h1{
    margin:0;
    font-size: 20px;
    margin-bottom: 3px;
    margin-left: 250px;
}

header .highlight, header .current a{
    color: #e8491d;
    font-weight: bold;
}

section .container .login{
    height: 200%;
}

form .form{
  
    margin-top: 50px;
    padding: 20px;
    background-color: #35424a;
    border-radius: 10px;
    color:  white;
    font-weight: bold;
    width: 50%;
}
img{
    margin-left: 20px;
}
form .form p{

    margin-left: -140px;
}
form .form h4{

    margin-left: -110px;
}

    </style>
</head>
<body>

<?php 

  //Fetch User Details
   require '../db.php';

try {
    $query = "SELECT * FROM interns_data_ WHERE username='StarzIke'";
    $resultSet = $conn->query($query);
    $result = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $result['username'];
$name = $result['name'];
$picture = $result['image_filename'];
//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $result  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $result['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $result['secret_word'];

  ?>
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">My</span>Profile</h1>
                </div>
                
                
            </div>
        </header>
        
        <section>
            <div class="container">
            
                    <center>
                    <div class="form">
                                              
                        <div class="user">
                            <img src="http://res.cloudinary.com/starzike/image/upload/v1524580965/Esther.jpg">
                        </div>
                       <p class="p1">Name: <?php echo $name; ?>  </p>
                        <h4 class="p2">Username: <?php echo $username; ?> </h4>

                    </div> 
                    </center>
                
            </div>
        </section>
</body>
</html>