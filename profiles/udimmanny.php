<?php
error_reporting(0);
if (empty($conn)) {
    include("../db.php");

    define('DB_CHARSET', 'utf8mb4');
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $conn = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
}

$intern_details_query = $conn->query(
    "SELECT     interns_data.name, 
                interns_data.username, 
                interns_data.image_filename
    FROM        interns_data
    WHERE       interns_data.username = 'udimmanny' LIMIT 1");

$secret_word_query = $conn->query(
    "SELECT     secret_word.secret_word 
    FROM        secret_word LIMIT 1");

$intern_detail = $intern_details_query->fetch();
$secret_word = $secret_word_query->fetch();

// Secret Word
$secret_word = $secret_word['secret_word'];

// Profile Details
$name = $intern_detail['name'];
$username = $intern_detail['username'];
$filename = $intern_detail['image_filename'];

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Udim Manny</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    html{background: url

(http://res.cloudinary.com/eacademy/image/upload/v152397057

8/mechie.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;}

body{position: relative;
font-size:18px;
font-family: roboto;}

nav{position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    background: #F2F2F2;}
    

#about{
text-align: center;
background-size:cover;
background-repeat: no-repeat;
height: 700px;
width: 100%;
color: #F5D984;
margin-top:0; 
position: relative;
margin-top: 0px;
}
.name{position: relative;
    text-align: center;
   top: 220px;
    font-family: Radley;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 64px;
    color: #F5D984;}

.what{position: relative;
    text-align: center;
    top: 160px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 35px;
    text-align: center;
    color: #56CCF2;}

.time{color: #F2C94C;
    position: relative;
    text-align: center;
    top: 150px;
    font-family: Ropa Sans;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 36px;
    text-align: center;}

.echo{
   g

color: #F2C94C;

}
nav{margin-bottom: 2px;
height: 52px;}

nav li {
    display: inline-block;
    text-decoration: none;
    color: #56CCF2;
   
}
h2{text-align: center;}
li{margin-left: 17px;}

a{text-decoration: none;
color:#56CCF2;}

ul{float: right;
    margin-right:10px;
padding-bottom: 3px;
right: 78px;
position: absolute;
top:2px;}
</style>
</head>
<body>
    <section id="navbar">
<nav>
    <ul>
        <li><a href="#" class="link1">Home</a></li>
        <li><a href="http://manny.techno-dombai.com.ng" class="link2">About</a></li>
        <li><a href="#" class="link3">Portfolio</a></li>
    </ul>
</nav>                                                 
    </section>
    <!--background-image starts here-->
    <section id="about"> 
        <div class="container col-sm-12">
            <h1 class=" name">Udim Manasseh Victor</h1>
            <h3 class="what" >Human|Engineer|Budding Developer| Wannabe Designer</h3>
            <p class="time">Time is an equally distributed resource, best used wisely</p>
            <h2 class="echo">
            <?php echo date('Y-m-d H:i:s'); ?>
        </h2>
        </div>
    </section> 
</body>
</html>