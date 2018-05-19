
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>

.in
{
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

.out
{
    background-color:rgb(241,240,240);
    color:black;
    padding:10px; 
    left:5; 
    width:130px;
    text-align: center;
	  height:auto;
	  border-radius: 15px;
	
}






</style>


<body>


<?php

error_reporting(-1);
include realpath(__DIR__ . '/..') . "/config.php" ;
$conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
function showtime($location){
  date_default_timezone_set('Africa/Lagos');
$da= date('Y-m-d H:i:s') ;
echo '<div class="out"> ';
echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>The time in'.$location</b></div>";
echo $da;
echo '</div>';
// echo $da;
}

$msgg=$_POST['input'];
// $msg=strtolower($msgg);
// $length=strlen($msg);
$msg = "what time is it at Africa/Lagos";
$flag=0;
$us = explode(":",$msg);
$train = $us[0];
$qa = $us[1];
$q = explode("#", $qa);
$qu = $q[0];
$an = $q[1];
//$p = explode("|", $ans);
// $an = $p[0];
$pass = $q[2];
if($train == 'train' && $pass != 'asdfgh'){
  echo "Wrong Password, You need my password before you can train me.";
}elseif($train == 'train' && $pass == 'asdfgh'){
  $in = "INSERT INTO `user`(`input`, `output`, `title`)
     VALUES ('$qu','$an','$qu')";
  $tr = mysqli_query($conn, $in);
 echo '<div class="out"> Thank You For Training Me.';
 echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>Question: $qu</b></div>";

echo "Answer: ".$an;
echo '</div>';
}else{
  $ti = explode(" ", $msg);
$time = $ti[1];
$location = $ti[5];
  if($time == 'time'){
    $result = showtime($location);
   
  }else{
$sql="SELECT * FROM user WHERE input LIKE '$msg%' ";
$send=mysqli_query($conn,$sql);

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
          $qu = $row['input'];
          $output=$row['output'];
          $title=$row['title'];

   

          $result = make_links_clickable($output);


          if(!empty($title))
          {
                 
               echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>$title</b></div>";

          }

           echo "$result";

         }

        if($flag==0)
        {
          // i want to explode here then get the data and insert it imto database
        

        	 $output="Sorry I have no knowledge of ".$msgg." yet.";
        	 $result = make_links_clickable($output);
        	 echo "$result";
          	 
        }
      } 
          
      }
         

          

     ?>

  

     </div><br>

</body>
</html>
