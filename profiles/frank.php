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
margin-top: 50px;
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
 
</style>   
</head>
<body>

<div class="container" >
    <span class="title">HNG INTERNSHIP 4 #STAGE3 TASK
                 </span>
    
  
 </br>   </br>    
  <?php 
  $query=mysqli_query($conn,"SELECT * FROM secret_word ");
    if(!$query){
        echo "Selecting code from secret word failed";
         } else{
            while($row=mysqli_fetch_array($query)){
             $secret_word=$row['secret_word'];
              }
       
             $sel =mysqli_query($conn,"SELECT * FROM interns_data where username='frank'");
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
