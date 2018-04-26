<?php 

  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Oluwafemi'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Oluwafemi profile</title>
    <style type="text/css">
body{background-color: grey;
    font-family: Arial, Helvetica, sans-serif;
    margin: auto;
    overflow-x:hidden;
    background-image: url("https://res.cloudinary.com/oluwafemi/image/upload/v1524580280/background.jpg.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
.large{
    position: relative;
    width:100%;
    height:30%;
    float:left;
    text-align: center;
    z-index:1;
}
.slarge ul{
    list-style:none;
    display:inline-block;
    width:75%;
}
.slarge li{
    display:inline;
    margin-right:2em;
    padding:2%;
}
.slarge li a{
    color:black;
    line-height: 1.4em;}
#my-pix img{
  height: 225px;
  width: 50%;
}
h1{text-align: center;}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}


</style>
</head>
<body>
  <h1>WELCOME TO MY WEBPAGE</h1>
<div id="my-pix"><img src="https://res.cloudinary.com/oluwafemi/image/upload/v1524574790/oluwafemi.jpg.jpg" class="center" alt="A picture of Oluwafemi" id="my-pic"></div>
<div class="large">
    <div class="slarge">
            <ul>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Designs</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
    </div>
  <h1><?php echo $user->name ?></h1>
  <h3>Front End  Developer</h3>
  <footer>
                &copy;Oluwafemi 2018
  </footer>
</div>
</body>
</html>
