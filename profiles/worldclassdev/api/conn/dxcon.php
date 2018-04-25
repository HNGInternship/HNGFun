<?php
    //error_reporting(0);
    $DB_USER = 'root';
	$DB_PASSWORD = '';
	$DB_HOST = 'localhost';
	$DB_NAME = 'hng_fun';
	$dbc = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or $error = mysqli_error($dbc);
	mysqli_select_db($dbc,$DB_NAME) or $error = mysqli_error($dbc);
	mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
	if(@$error){ die($error);}