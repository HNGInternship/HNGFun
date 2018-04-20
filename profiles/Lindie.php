
<head>
<meta charset="UTF-8"/>
 <meta name="viewport" content="width=device-width"/>
<title>Lindie profile</title>
<style type="text/css">
body{
    font-family: Arial, Helvetica, sans-serif;
    margin: auto;
    overflow-x:hidden;
}
#show-pic{
    height:986px;
    width:50%;
    float:left;
}
#pro-pic{
  width:100%; 
  height:100%;
  z-index:-5; 
}
.half2{
    position: relative;
    background-color:rgb(19, 12, 80);
    width:50%;
    height:986px;
    float:left;
    text-align: center;
    z-index:1;
}
.nav ul{
    list-style:none;
    display:inline-block;
    width:80%;
}
.nav li{
    display:inline;
    margin-right:2em;
    padding:1%;
}
.nav li a{
    text-decoration:none;
    color:#FFFFFF;
    line-height: 1.4em;
}
h1,h3{
    font-size:2rem;
    color:#FFFFFF;
}
h1{
    margin: 12rem 0rem 0rem 0em;
}
</style>
</head>
<body>
<?php
    try {
        $result=$conn->query("SELECT * FROM secret_word LIMIT 1");
        $result=$result->fetch(PDO::FETCH_OBJ);
        $secret_word=$result->secret_word;

        $result2=$conn->query("SELECT * FROM interns_data WHERE username='Lindie'");
        $user=$result2->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
<div id="show-pic"><img src="http://res.cloudinary.com/lindiek/image/upload/v1523884437/Linda.jpg" alt="A picture of Linda" id="pro-pic"></div>
<div class="half2">
<div class="nav">
            <ul>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">Contact Me</a></li>
            </ul>
</div>    
<h1><?php echo $user->name ?></h1>
<h3>Web Developer</h3>
</div>
<body>
