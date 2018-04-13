<!-- head here  -->
<?php
include_once("header.php");

$profile_name = $_GET['id'];

//require 'db.php';
//
//$sql = 'SELECT * FROM interns_data';
//$q = $conn->query($sql);
//$q->setFetchMode(PDO::FETCH_ASSOC);
//$data = $q->fetchAll();
//
//var_dump($data);

?>
<!-- Page Content -->
<body class = 'profile'>
    <div class="container">
        <?php include_once('profiles/' . $profile_name. '.php'); ?>
    </div>
</body>


<!-- Footer -->
<?php
   include_once('footer.php');
?>
