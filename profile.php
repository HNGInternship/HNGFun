<!-- head here  -->
<?php
include_once("header.php");

$profile_name = $_GET['id'];
?>
<!-- Page Content -->
    <?include_once('profiles/' . $profile_name. '.php'); ?>

<!-- Footer -->
<?php
   include_once('footer.php');
?>
