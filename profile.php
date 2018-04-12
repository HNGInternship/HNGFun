<!-- head here  -->
<?php
include_once("header.php");

$profile_name = $_GET['id'];
?>
<!-- Page Content -->
<div class="container">
    <?php include_once('profiles/' . $profile_name. '.php'); ?>

</div>

<!-- Footer -->
<?php
   include_once('footer.php');
?>
