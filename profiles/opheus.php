<<<<<<< HEAD
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
=======

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
>>>>>>> d039ea6fe2e9940840acefca3e5657651bb79029

include("config.php"); 

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT intern_id, name, username, image_filename FROM interns_data_ WHERE username='opheus' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$name = $row["name"];
		$username = $row["username"];
		$imagelink = $row["image_filename"];
    }
} else {
    echo "NO USER FOUND";
}



mysqli_close($conn);


$sql2 = "SELECT secret_word FROM secret_word";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		$secret_word = $row["secret_word"];
    }
} else {
    echo "NO SECRET KEY";
}
<<<<<<< HEAD
?> 
=======
</style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>

<div class="card">
  <img src="http://res.cloudinary.com/opheus/image/upload/v1523622319/IMG_20180404_091302_600.jpg" alt="ima" style="width:100%">
  <h1>Ominiabohs Efemena David</h1>
  <h2>@opheus</h2>
  <p class="title">Web Designer & Developer, UI/UX Designer</p>
  <p>Delta State Univeristy (B.Sc Physics)</p>
  <p>Nigeria</p>
  <div style="margin: 24px 0;">
    <a href="https://t.me/opheus"><i class="fa fa-telegram"></i></a> 
    <a href="https://twitter.com/orpheusohms"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/orpheusohms/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/j.ominiabohs"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
 <?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>
</div>

</body>
<html>
>>>>>>> d039ea6fe2e9940840acefca3e5657651bb79029
