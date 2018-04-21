
<?php
include '../db.php';
$sql = 'SELECT * FROM `interns_data` WHERE `username`="kingsley67"';
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);  
    $result = $query->fetch();    

    $name = $result['name'];
    $user = $result['username'];
    $image = $result['image_filename'];

$sql2 = 'SELECT * FROM `secret_word`';
    $query = $conn->query($sql2);
    $query->setFetchMode(PDO::FETCH_ASSOC);  
    $result2 = $query->fetch(); 
$secret_word=$result2['secret_word'];

  ?>
<!DOCTYPE>
<html>

<head>
<style>
    img{   
     width:250px;
    height:250px
    }
    .intro{
        background-color: black;
      
        text-align: left;
    }
   
    h3{background-color: coral}
    
    html{background-color: white}
    p{color:black}
    h1{color: coral}
    #credentials{  color:white;}
</style>    
    
 </head>

<body>
  <div class="intro">
  <h1>Welcome to Kingsley's profile on HNGInternship 4</h1>  
      <div id='credentials'><h2>Name:<?php echo $name ?> </h2>
     <h2>Username: <?php echo $user?> </h2>
       </div>
      <div><img src="
https://res.cloudinary.com/dyngnvcre/image/upload/v1524083992/king.jpg" alt="king.jpg"></div>
     </div>
  <div id="bio">
      <h3>Biography</h3>
   <p> I'm an Electrical Engineer with a passion for programming from Cameroon.Born in May 1994, I attended school in different parts of my country hence was chanced to learn several cultures as well as English and French which are the official languages of Cameroon. I'm very interested in Web and Game developement and aim to be a robotic engineer in the nearest future.</p> </div>  
    <div>
   <h3>Domain of competence</h3> 
    <p>I'm knowledgeable in the following domains when it comes to programming</p>
    <ol>
        <li>HTML......Average</li>
        <li>CSS.......Average</li>
        <li>Bootstrap......Average</li>
        <li>JavaScript.....Average</li>
        <li>PHP.......Beginner</li>
        <li>MYSQL.....Beginner</li>
         <li>Java.....Beginner</li>
        </ol>

    </div>
    <div>
    <h3>Contact</h3>
    <p>you can contact me at:</p>
        <ul>
        <li>Kingsleyche67@yahoo.com</li>
         <li>Kingsleyche77@gmail.com</li>
            <li>+237675350217</li></ul>
    </div>
    
 </body>












</html>