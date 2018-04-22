<?php
error_reporting(-1);
include realpath(__DIR__ . '/..') . "/db.php" ;
global $conn;
 try {
    $sql = "SELECT * FROM interns_data WHERE username ='avatechng'";

    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$name = $data['name'];
$username = $data['username'];
$image = $data['image_filename'];

try {
    $sql2 = 'SELECT * FROM secret_word';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $data2 = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data2['secret_word'];


$conf = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
function showtime($location){
    date_default_timezone_set($location);
  $da= date('Y-m-d H:i:s') ;
  $re =  '<div class="out"> ';
  $re .= "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>The time is</b></div>";
  $re .=  $da;
  $re .= '</div>';
  // echo $da;
  echo $re;
  }

if(isset($_POST['input'])){
    $msgg=$_POST['input'];
    if($msgg == 'aboutbot'){?>
     <div class="in">
     <?php echo  "$msgg";?>
     </div>
     <?php 
     echo '<div class="out">';
     echo 'Current Version is 1.0';
     echo '</div>';
     
    }else{
$msg=strtolower($msgg);
$length=strlen($msg);
// $msg = "train: hdgudd ifh #hiiii";
$flag=0;
$us = explode(":",$msg);
$train = $us[0];
$qa = $us[1];
$q = explode("#", $qa);
$qu = $q[0];
$an = $q[1];
$pass = $q[2];
if($train == 'train'&& $pass != 'password'){
    echo "Wrong Password, You need my pass word before you can train me.";
  }elseif($train == 'train' && $pass == 'password'){
  $in = "INSERT INTO `chatbot`(`question`, `answer`)
     VALUES ('$qu','$an')";
  $tr = mysqli_query($conf, $in);
 echo '<div class="out"> Thank You For Training Me.';
 echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>Question: $qu</b></div>";

echo "Answer: ".$an;
echo '</div>';
}else{
    $ti = explode(" ", $msg);
    $time = $ti[3];
    $location = $ti[0];
    $loc =  "'.$location.'";
      if($time == 'time'){
        ?>
        <div class="in">
         <?php echo "$msgg"; ?>
            </div>
            <?php
        $result = showtime($loc);
       
      }else{
$sql="SELECT DISTINCT question, answer  FROM chatbot WHERE question LIKE '$msg%' ORDER BY RAND() LIMIT 1";
$send=mysqli_query($conf,$sql);

$u = 'hello';

?>

     <div class="in">
     <?php echo "$msgg"; ?>
        </div><br>

    <div class="out">
    <?php
    function make_links_clickable($text){
                  return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<br><a href="$1" target="_blank">Click Here</a><br>', $text);
        }
    
         while($row=mysqli_fetch_array($send))
        {
   
          $flag=1;
          $qu = $row['question'];
          $output=$row['answer'];
          $title=$row['question'];
          $result = make_links_clickable($output);
        if(!empty($title))
          {
                 
               echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>$title</b></div>";

          }
           echo "$result";

         }if($flag==0)
        {
        	 $output="Sorry I have no knowledge of ".$msgg." yet. You can train me by typing train:Question #Answer #Password";
        	 $result = make_links_clickable($output);
        	 echo "$result";
          	 
        }    
      }
    }
     ?>

  

     </div>
    <?php
exit();
 }
 exit();
 }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>HNG Internship 4</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    


    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
* {
    margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body {
	background: #2d2c41;
	font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
}

.avatechng-pic {
    position: relative;
}
.username {
    bottom: 0;
    color: #ffffff;
    padding: 30px 15px 4px;
    position: absolute;
    width: 100%;
    text-shadow: 1px 1px 2px #000000;
    
background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, #2d2c41 100%); 
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%, #2d2c41 100%);
background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, #2d2c41 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a64d4d4d',GradientType=0 ); 
}
.avatech {
    border-radius: 4px 4px 0 0;
}
.username > h2 {
    font-family: oswald;
    font-size: 27px;
    font-weight: lighter;
    margin: 31px 0 4px;
    position: relative;
    text-shadow: 1px 1px 2px #000000;
    text-transform: uppercase;
}
.username > h2 small {
    color: #ffffff;
    font-family: open sans;
    font-size: 13px;
    font-weight: 400;
    position: relative;
}
.username .fa{
    color: #ffffff;
    font-size: 14px;
    margin: 0 0 0 4px;
    position: static;
}
.edit-pic a {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 1px solid #ffffff;
    border-radius: 50%;
    color: #ffffff;
    font-size: 21px;
    height: 39px;
    line-height: 38px;
    margin: 8px;
    text-align: center;
    width: 39px;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
	transition: all 0.4s ease;
    text-decoration: none !important;
     display: list-item;
     background-color: rgba(255, 255, 255, 0.1)
}
.edit-pic a:hover {
   font-size: 17px;
   opacity: 0.9;
  }
.edit-pic a:focus {
   background:#b63b4d;
    color: #fff;
    border: 1px solid #b63b4d;
}
a:focus {
    outline: none;
    outline-offset: 0px;
}
.edit-pic {
    position: absolute;
    right: 0;
    top: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.tags {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 2px;
    display: inline-block;
    font-size: 13px;
    margin: 4px 0 0;
    padding: 2px 5px;
     -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.tags:hover {
    background: rgba(255, 255, 255, 0.3) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2px;
    display: inline-block;
    font-size: 13px;
    margin: 4px 0 0;
    padding: 2px 5px;
}
#accordion:hover .edit-pic {
    opacity: unset;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}


.btn-o {
    
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2px;
    color: #ffffff !important;
    display: inline-block;
    font-family: open sans;
    font-size: 15px !important;
    font-weight: normal !important;
    margin: 0 0 10px;
    padding: 5px 11px;
    text-decoration: none !important;
    text-transform: uppercase;
    
   background-color: rgba(255, 255, 255, 0.1);
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.btn-o:hover {
  background-color: rgba(255, 255, 255, 0.4);
    color: #fff !important;
  }
.btn-o:focus {
   background:#b63b4d;
    color: #fff;
    border: 1px solid #b63b4d;
}
.submenu .avatech {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0 !important;
    border-radius: 50%;
    height: 60px;
    padding: 2px;
    width: 60px;
}
.photosgurdeep > a {
    background: #ffffff none repeat scroll 0 0;
    border-radius: 50%;
    display: inline-block !important;
    padding: 0 !important;
}
.view-all {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0 !important;
    border: 1px solid;
    float: right;
    font-family: oswald;
    font-size: 26px;
    height: 60px;
    line-height: 61px;
    text-align: center;
    width: 60px;
}
.photosgurdeep {
    padding: 10px 9px 4px 35px;
}
ul {
	list-style-type: none;
}

a {
	color: #b63b4d;
	text-decoration: none;
}

/** =======================
 * Contenedor Principal
 ===========================*/
h1 {
 	color: #FFF;
 	font-size: 24px;
 	font-weight: 400;
 	text-align: center;
 	margin-top: 40px;
 }

h1 a {
 	color: #c12c42;
 	font-size: 16px;
 }

 .accordion {
 	width: 100%;
 	max-width: 360px;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

.accordion .link {
	cursor: pointer;
	display: block;
	padding: 15px 15px 15px 42px;
	color: #4D4D4D;
	font-size: 14px;
	font-weight: 700;
	border-bottom: 1px solid #CCC;
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}

.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #b63b4d;
}

.accordion li.open i {
	color: #b63b4d;
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}

.accordion li.default .submenu {display: block;}
/**
 * Submenu
 -----------------------------*/
 .submenu {
 	display: none;
 	background: #444359;
 	font-size: 14px;
 }

 .submenu li {
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	display: block;
 	text-decoration: none;
 	color: #d9d9d9;
 	padding: 12px;
 	padding-left: 42px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	background: #b63b4d;
 	color: #FFF;
 }

.nav.navbar-nav .dropdown-toggle {
    padding: 0 !important;
}

.dropdown-toggle span {
    background: rgba(255, 255, 255, 0.1) none repeat scroll 0 0;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 50px;
    font-size: 23px !important;
    height: 38px;
    line-height: 40px;
    margin: 0 !important;
    padding: 0 !important;
    text-align: center;
    width: 38px;
    text-shadow:none !important;
}

.nav.navbar-nav {
    bottom: 10px;
    position: absolute;
    right: 12px;
    transition: all 0.4s ease 0s;
}

.navbar-nav > li > .dropdown-menu {
    border-radius: 2px !important;
    margin-top: 10px;
    min-width: 101px;
    padding: 0;
}
.navbar-nav > li > .dropdown-menu li a {
    color: #333333 !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    padding: 2px 8px !important;
    text-align: right !important;
    text-shadow:none !important;
}
.dropdown-toggle {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important;
    font-size: 15px !important;
}

.dropdown {
  -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.dropdown-menu>li>a {
    color:#428bca;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.dropdown ul.dropdown-menu {
    border-radius:4px;
    box-shadow:none;
}
.dropdown ul.dropdown-menu:before {
    content: "";
    border-bottom: 10px solid #fff;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    top: -8px;
    right: 8px;
    z-index: 10;
}

/** bot **/
.chat
   {
   
     position:fixed;
     bottom:0;
     right:0;
     margin-right: 20px;
     max-width:300px;
     z-index:999;
     box-shadow: 4px 4px 4px 4px;
     border: : 2px solid rgb(22,118,134);
   }



     #sc
     {
      background-color: rgb(22,118,134);
      padding:15px;
      color:white;
      font-size: 16px;
      width:300px;
      height: 45px;


     }

     #panel
     {
       
        background-color: white;
        display: none;
        margin:0;
        width:300px;
        height: 300px;

     }

     #div
     {
        padding:10px;
        height: 240px;
        position: relative;
        overflow-y: auto;
        
     }
  
     input[type=text] 
     {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
     }

     .out
     {
        background-color:rgb(241,240,240);
        color:black;
        padding:10px; 
        left:5; 
        
        text-align: center;
        height:auto;
        border-radius: 15px;
  
      }
      .stt
      {
         margin-top:5px;
        
      }
      .in{
                background-color:rgb(64,128,255);
                color:white;
            padding:10px; 
                right:0;
                width:130px;
                text-align: center;
                height:auto;
                border-radius: 5px;
                margin-left: 120px;
                margin-bottom: 5px;
                
            }

    .out{
        background-color:rgb(241,240,240);
        color:black;
        padding:10px; 
        left:5; 
       
        text-align: left;
        height:auto;
        border-radius: 15px;
        
    }

    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
	<div class="row">
	
        
    <h1>HNG Internship 4<br><small></small></h1>
	
	<ul id="accordion" class="accordion">
    <li>
<div class="col col_4 avatechng-pic">
<img class="img-responsive avatech" alt="avatechng" src="<?php echo $image?>" width="360px" height="480px">
<div class="edit-pic">
<a href="https://web.facebook.com/avatechng" target="_blank" class="fa fa-facebook"></a>
<a href="https://www.instagram.com/mravatech/" target="_blank" class="fa fa-instagram"></a>
<a href="https://twitter.com/iam_avatech" target="_blank" class="fa fa-twitter"></a>
<a href="https://github.com/mravatech" target="_blank" class="fa fa-github"></a>




</div>
<div class="username">
    <h2><?php echo $name?>  <small><i class="fa fa-map-marker"></i> Nigeria</small></h2>
    <p><i class="fa fa-briefcase"></i> Web And Mobile Development.</p>
    
    <a href="https://web.facebook.com/avatechng" target="_blank" class="btn-o"> <i class="fa fa-facebook"></i> Add Friend </a>
    <a href="https://www.instagram.com/mravatech/" target="_blank"  class="btn-o"> <i class="fa fa-instagram"></i> Follow </a>
    
    
  
   
</div>
    
</div>
        
    </li>
		<li class="default open">
			<div class="link"><i class="fa fa-globe"></i>About<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#">Address : Lagos,Nigeria</a></li>
				<li><a href="mailto:techissued@gmail.com">Email : techissued@gmail.com</a></li>
				<li><a href="#">Phone : +23407015120757</a></li>
				<li><a href="#">Professional Skill </br><span class="tags">Angular</span> <span class="tags">Node.Js</span> <span class="tags">CSS</span> <span class="tags">Css 3</span> 
                <span class="tags">Java</span> <span class="tags">PHP</span> <span class="tags">HTML5</span> <span class="tags">JavaScript</span> 
                <span class="tags">bootstrap</span> <span class="tags">User Interface Design</span> <span class="tags">Wordpress</span><span class="tags">Drupal</span> </li></a>
			
			</ul>
		</li>
		
		
		
	</ul>
	</div>
    
    
    
 
    
</div>
<div class="container">



<div class="row">




<div class="col-sm-7">





<div class="chat">
<a style="text-decoration:none;" href="#"><div id="sc"><center >
   
    <b>Chat With MrAvatech</b></center></div></a>
<div id="panel">
  

<script>

$(function(){

    var i=0;
    var st;

    $("#sc").click(function(){

         
          i++;

          $("#panel").slideToggle();

          if(i==1)
          {
              $('#div').html("<div class=\"ou\"> Welcome, My master is not around but you can chat with me i will deliver to him.<br>You can know the time by asking <b>What is the time</b><br>You can train me by typing train:Question #Answer #Password,  <br>Thanks </div><br>");

          }
          

           

        });



});



</script>


<script type="text/javascript">
  
  $(function(){

     $("#st").click(function(){

           var str=$("#tt").val();
  
           $("#div").html(str);



     });

  });


</script>

<script>

$(function(){

 window.alreadySubmit = false;

  $('#tt').keypress(function(f){

     
     if(f.which == 13 && !alreadySubmit) {
        window.alreadySubmit = true;

   

    $('form').on('submit', function(e){
     e.preventDefault();
        $.ajax({
            type: "POST",
            cache: false, 
            url: "#", 
            datatype: "html",
            data: $('form').serialize(), 
            success: function(result) { 
            $('#div').append("<div class=\"stt\""+result+"</div>");

                $('#tt').val("");

            }
        });
    });
  }
    
       
  
    });

    
    });
    window.setInterval(function(){
        var elem = document.getElementById('div');
        elem.scrollTop = elem.scrollHeight;
    }, 10000);
               
</script>

<div id='div' name="output" >
  
  <div id="div1"></div>


</div>
<br>

<!--<script>
"use strict";
function submitForm(oFormElement)
{
  var xhr = new XMLHttpRequest();
  var display=document.getElementById('div');
  xhr.onload = function(){ display.innerHTML=xhr.responseText; }
  xhr.open (oFormElement.method, oFormElement.action, true);
  xhr.send (new FormData (oFormElement));
  return false;
}
</script>-->
<!--<label for="out">Output</label>
<textarea id='div' class="form-control" name="output" rows="10" cols="50"></textarea><br><br>-->

<div class="form-group">
<form action="process.php" id="form" name="f2" method="POST" >

<input type="textarea" id="tt" name="input" placeholder="Type Your Message" style="position:absolute; bottom:0; height:30px; width:100%; height:50px;" required />


</form>


</div>




</div></div>

</div>

</div>

</div>


</body>
</html>

