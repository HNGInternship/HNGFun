<?php


/*
 split text into words
 check database for the best match, with the words apearing in the questio
 check for the best fit
 return response

*/

require_once($_SERVER['SERVER_NAME']."/db.php");
require_once("regex.php");


$regex = new regex($conn); 
$emails = $regex->fetchanswer($_POST['chat']);
$dd = json_encode($emails);  

if($dd == "null"){ echo "Please train me, i do not have a response for this."; }
else { echo $dd;}
