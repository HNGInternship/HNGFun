<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>

<title> @frank HNG Internship 4 #stage3 </title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
* {
    margin: 0;
    padding: 0;
}
body{
 background-color:#E5E5E5;
}
 .container{
position: relative;
margin-top: 100px;
width: 300px;
height: 300px;
margin-left: 300px;
padding-right: 200px;
background: #132B38;
color: white;
padding-left: 20;
 }
 .container .title{
position: absolute;
width: 300.1px;
height: 300.11px;
left: 180px;
top: 79.22px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
line-height: normal;
font-size: 25px;
text-align: center;
color: #F2F2F2;
 }
 
 .header-fixed {
    background-color:#292c2f;
    box-shadow:0 1px 1px #ccc;
    padding: 20px 40px;
    height: 100px;
    color: #ffffff;
    box-sizing: border-box;
    top: -6px;
   position: fixed;
   width:100%;
   z-index: 10;
    -webkit-transition:top 0.3s;
    transition:top 0.3s;
    
}

.header-fixed .header-limiter {
    max-width: 1200px;
    text-align: center;
    margin: 0 auto;
}

/*    The header placeholder. It is displayed when the header is fixed to the top of the
    browser window, in order to prevent the content of the page from jumping up. */

.header-fixed-placeholder{
    height: 80px;
    display: none;
}

/* Logo */

.header-fixed .header-limiter h1 {
    float: left;
    font: normal 28px Cookie, Arial, Helvetica, sans-serif;
    line-height: 40px;
    margin: 0;
}

.header-fixed .header-limiter h1 .schname {
    color: #5383d3;
    margin-top: 100px;
}

.header-fixed .header-limiter h1 a img {
    color: #5383d3;
    margin-top:1px;
}
/* The navigation links */

.header-fixed .header-limiter a {
    color: #ffffff;
    text-decoration: none;
}

.header-fixed .header-limiter nav {
    font:16px Arial, Helvetica, sans-serif;
    line-height: 70px;
    float: right;
    background-color:#292c2f;
    margin-top:-12px;
    
}

.header-fixed .header-limiter nav a{
    display: inline-block;
    padding: 0 5px;
    text-decoration:none;
    color: #ffffff;
    opacity: 0.9;
}

.header-fixed .header-limiter nav a:hover{
    opacity: 1;
}

.header-fixed .header-limiter nav a.selected {
    color: #608bd2;
    pointer-events: none;
    opacity: 1;
}

/* Fixed version of the header */

body.fixed .header-fixed {
    padding: 10px 40px;
    height: 50px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1;
}

body.fixed .header-fixed-placeholder {
    display: block;
}

body.fixed .header-fixed .header-limiter h1 {
    font-size: 24px;
    line-height: 30px;
}

body.fixed .header-fixed .header-limiter nav {
    line-height: 28px;
    font-size: 13px;
}


/* Making the header responsive */

@media all and (max-width: 600px) {

    .header-fixed {
        padding: 20px 0;
        height: 75px;
    }

    .header-fixed .header-limiter h1 {
        float: none;
        margin: -8px 0 10px;
        text-align: center;
        font-size: 24px;
        line-height: 1;
    }

    .header-fixed .header-limiter nav {
        line-height: 1;
        float:none;
    }

    .header-fixed .header-limiter nav a {
        font-size: 13px;
    }

    body.fixed .header-fixed {
        display: none;
    }

}
</style>   
</head>
<body>
<header class="header-fixed">

    <div class="header-limiter">

        
        <nav>
            <a href="#">Home</a>
            <a href="">Learning PHP </a>
            <a href="#"></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="">HNG INTERNSHIP 4 #STAGE3 TASK </a>
            <a href="#"></a>
        </nav>

    </div>

</header>

<div class="container" >
    <span class="title">HNG INTERNSHIP 4 #STAGE3 TASK
                 </span>
    
  
         <?php
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "hngfun");     
$connection=mysqli_connect(DB_SERVER,DB_USER,"",DB_NAME);
if(mysqli_connect_errno()){
    die("database connection failed: ".mysqli_connect_error());
}
?>
 </br>   </br>    
  <?php 
  $query=mysqli_query($connection,"SELECT * FROM secret_word ");
    if(!$query){
        echo "Selecting code from secret word failed";
         } else{
            while($row=mysqli_fetch_array($query)){
             $secret_word=$row['secret_word'];
              }
       
             $sel =mysqli_query($connection,"SELECT * FROM interns_data where username='frank'");
     ?>
        <?php   WHILE($row=mysqli_fetch_array($sel)) {?>
        <?php
           $picture=$row['image_filename']."<br/>"; 
           echo "Full Name: ".  $name= $row['name']."<br/>"; 
           ?>
       
           <img src="<?php echo $row['image_filename']; ?>" alt="@frank" style="width:170px;height:170px; />   
       
  <?php } ?>
 <?php } ?>
         
  </br>    
  <img src="<?php echo $picture; ?>
 
 
  </div>
</body>
</html>
