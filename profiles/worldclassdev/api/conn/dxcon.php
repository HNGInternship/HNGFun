<<<<<<< HEAD
<?php
    //error_reporting(0);

require_once("../../../config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if (!$dbc) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
// 	mysqli_select_db($dbc,DB_DATABASE) or $error = mysqli_error($dbc);
// var_dump("DBC: ". $dbc);
// 	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
// 	var_dump("error:". $error);
// 	if(@$error){ die($error);}
=======
<?php
    //error_reporting(0);

require_once("../../../config.php");
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if (!$dbc) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
// 	mysqli_select_db($dbc,DB_DATABASE) or $error = mysqli_error($dbc);
// var_dump("DBC: ". $dbc);
// 	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
// 	var_dump("error:". $error);
// 	if(@$error){ die($error);}
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
