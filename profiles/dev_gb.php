<?php
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
 <head>
<title>dev_geaks</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
<style>
body {
  margin: 0;
  background-image: url("https://res.cloudinary.com/devgeaks/image/upload/v1523891444/bot2.jpg");
  background-attachment: fixed;
  background-size: 100% 100%;
  background-repeat: no-repeat;
}

.dropbtn {
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}


 #flip {
  float: left;
    position: relative;
    padding: 5px;
    text-align: left;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}

#panel {
  opacity: 0.9;
  filter: alpha(opacity=0);
    border: solid 1px #c3c3c3;
    display: inline-block;
    display: none;
    text-align: left;
    max-width: 215px;
}

/* Style the top navigation bar */
.topnav {
    display: block;
    text-align: center;
    padding: 14px 16px;
    overflow: hidden;
}

/* Style the topnav links */

.topnav a {
  float: center;
  font-family: "Comic Sans MS";
    font-size: 20px;
    text-decoration: none;
    color: black;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    font-family: "Comic Sans MS";
    text-decoration: none;
    font-size: 20px;
    color: white;
}

/* Style the content */
.content  h2{
  margin-top: 70px;
    font-family: "Lobster", Sans-serif;
    font-size: 80px;
    text-align: center;
    float: center;
}

/* Style the footer */
.footer {
    background-color: white;
    width:100%;
    opacity: 0.5;
    filter: alpha(opacity=50);
    bottom:0;
    position:absolute;
}

.footer p1 {
    float: left;
    font-family: "Comic Sans MS";
    text-decoration: none;
    font-size: 20px;
}

.footer p2 {
    float: right;
    font-family: "Comic Sans MS";
    text-decoration: none;
    font-size: 20px;
}</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("button").click(function(){
        $("p").toggle();
    });
});
</script>
</head>
<body>
<div class="topnav">
<p id="panel">
<?php
require 'db.php';
$username = "dev_gb";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);
$name = $my_data['name'];
$img = $my_data['image_filename'];
$username =$my_data['username'];
?>
  <img src= "<?php echo $img;?>" style="width:100%; height:100px;" alt=""/>
  <br/>
  <name>name: <?php echo $name;?></name><br/>
  <username>slack:@ <?php echo $username;?></username> 
</p>

<button id="flip"><img src="http://res.cloudinary.com/devgeaks/image/upload/v1523745296/if_menu-alt_134216.png" style="width:40px; height:25px;" alt=""/></button>

  <a href="#">Home</a>
  <a href="#">Projects</a>
  <a href="#">Services</a>
  <a href="#">About</a>
  <a href="#">More</a>
</div>

<div class="content">

<div class="w3-container w3-lobster font-effect-brick-sign">
  <h2>Welcome to dev_geaks</h2>
</div>  
</div>

<div class="footer">
  <p1>designed by: devgeaks.club</p1>
  <p2><?php
    date_default_timezone_set("Africa/Lagos");
  echo  "Today is " . date("l"). ", ". date("Y/m/d") . "     and time is " . date("h:i"). " WAT";
?></p2>
</div>
</body>
</html>
