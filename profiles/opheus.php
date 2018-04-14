<<<<<<< HEAD
<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
<?php
=======
<<<<<<< HEAD
=======
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
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
<<<<<<< HEAD
=======
>>>>>>> fbd43a63fbf0c5feacb53eddbb5b144fa663d942
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96

include("config.php"); 

>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
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
}
<<<<<<< HEAD
=======
<<<<<<< HEAD

>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
mysqli_close($conn);
?> 

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

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
=======
<<<<<<< HEAD
?> 
=======
<<<<<<< HEAD
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
=======
>>>>>>> fbd43a63fbf0c5feacb53eddbb5b144fa663d942
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
</style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>

<div class="card">
<<<<<<< HEAD
<<<<<<< HEAD
  <img src="<?php if (isset($imagelink)) { echo $imagelink; } ?>" alt="ima" style="width:100%">
  <h1><?php if (isset($name)) { echo $name; } ?></h1>
  <h2>@<?php if (isset($username)) { echo $username; } ?></h2>
=======
  <img src="<?php echo $imagelink; ?>" alt="John" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2>
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
=======
  <img src="http://res.cloudinary.com/opheus/image/upload/v1523622319/IMG_20180404_091302_600.jpg" alt="ima" style="width:100%">
  <h1>Ominiabohs Efemena David</h1>
  <h2>@opheus</h2>
<<<<<<< HEAD
>>>>>>> be3fa7c29f997825de9ad279b33f11df3eb052fc
=======
>>>>>>> fbd43a63fbf0c5feacb53eddbb5b144fa663d942
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
</div>

</body>
=======
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
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
<<<<<<< HEAD
=======
<html>
<<<<<<< HEAD
>>>>>>> be3fa7c29f997825de9ad279b33f11df3eb052fc
=======
>>>>>>> d039ea6fe2e9940840acefca3e5657651bb79029
<<<<<<< HEAD
>>>>>>> 5fc60e16824b56e1a303866380259ded44d6b077
=======
>>>>>>> fbd43a63fbf0c5feacb53eddbb5b144fa663d942
>>>>>>> 6a78543c1d309f12152fc8dccbc6bd6d4f12ea96
