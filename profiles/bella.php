 <?php


try {
   $profile = 'SELECT * FROM interns_data_ WHERE username="bella"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://res.cloudinary.com/mfonobong/image/upload/v1523621316/Me.jpg">
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
</style>
</head>
<body>

<h2 style="text-align:center">Bella's Profile Card</h2>

<div class="card">
  <img src="https://res.cloudinary.com/mfonobong/image/upload/v1523621316/Me.jpg" alt="Bella" style="width:100%">
  <h1>Mfonobong Umondia</h1>
  <p class="title">HNG Intern</p>
  <p>University of Uyo</p>
  <div style="margin: 24px 0;">
    <a href="twitter.com/mfonobongumondia"><i class="fa fa-twitter"></i></a>  
    <a href="linkedin.com/mfonobongumondia"><i class="fa fa-linkedin"></i></a>  
    <a href="facebook.com/mfonobongumondia"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Email me at: umondiamfonobong@gmail.com</button></p>
</div>




</body>
</html>
