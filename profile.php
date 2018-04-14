<!-- head here  -->
<?php
include_once("header.php");

$profile_name = $_GET['id'];

require 'db.php';

?>
<!-- Page Content -->
<div class='alert alert-danger ' id="secret">Secret key mismatch. Insert your secret key</div>
</div>
<body class = 'profile'>

<div class="container">
    <?php include_once('profiles/' . $profile_name. '.php');
    try {
        $sql = "SELECT * FROM secret_word";
        $q = $conn->query($sql);
        $data = $q->fetch_assoc();
    } catch (PDOException $e) {

        throw $e;
    }?>
</div>
<?php if(!isset($secret_word) || $secret_word != $data['secret_word']) { ?>
    <script type="text/javascript">document.getElementById('secret').style.display = 'block';</script>
<?php } else {  ?>
    <script type="text/javascript">document.getElementById('secret').style.display = 'none';</script>
<?php }?>

</body>


<!-- Footer -->
<?php
include_once('footer.php');
?>
