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

<?php
require 'db.php';
require 'profiles/' . $profile_name. '.php';

try {
    $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {

    throw $e;
}
?>
<!-- Page Content -->
<body class = 'profile'>
<div class="container">
    <?php if(!isset($secret_word) || $secret_word != $data['secret_word']) { echo "<div class='alert alert-danger'>Secret key mismatch. Insert your secret key</div>"; }?>
    <?php include_once('profiles/' . $profile_name. '.php'); ?>
</div>
</body>


<!-- Footer -->
<?php
include_once('footer.php');
?>
