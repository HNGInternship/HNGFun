<<<<<<< HEAD
<?php
    //error_reporting(0);

require_once('../../../../config.php');
	$dbc = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or $error = mysqli_error($dbc);
	mysqli_select_db($dbc,$DB_DATABASE) or $error = mysqli_error($dbc);
	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
	if(@$error){ die($error);}
=======
<?php
    //error_reporting(0);

require_once("../../../config.php");
// var_dump(DB_HOST." ". DB_USER." ". DB_PASSWORD." ".DB_DATABASE);
	$dbc = mysqli_connect(DB_HOST, DB_USER, "29gE9t*dJ2#2f-BS",DB_DATABASE);
if (!$dbc) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
// 	mysqli_select_db($dbc,DB_DATABASE) or $error = mysqli_error($dbc);
// var_dump("DBC: ". $dbc);
// 	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
// 	var_dump("error:". $error);
	
	
// 	if(@$error){ die($error);}
>>>>>>> 6b14b11843aade32f1a22dd411259d2b04d4fc3d
