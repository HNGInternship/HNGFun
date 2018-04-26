<?php
    //error_reporting(0);

require_once('../../../../config.php');
	$dbc = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or $error = mysqli_error($dbc);
	mysqli_select_db($dbc,$DB_DATABASE) or $error = mysqli_error($dbc);
	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
	if(@$error){ die($error);}
