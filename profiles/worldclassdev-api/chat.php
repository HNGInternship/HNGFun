<?php


/*
 split text into words
 check database for the best match, with the words apearing in the questio
 check for the best fit
 return response

*/
// echo fopen("db.php");
require_once("./conn/dxcon.php");
require_once("regex.php");
var_dump($dbc);
$regex = new regex($dbc); 
$emails = $regex->fetchanswer($_POST['chat']);
$dd = json_encode($emails);  

if($dd == "null"){ echo "Please train me, i do not have a response for this."; }
else { echo $dd;}
