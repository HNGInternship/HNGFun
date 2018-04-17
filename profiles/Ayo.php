
<?php


include realpath(__DIR__ . '/..') . "/db.php"  ;
global $conn;

  try {
      $sql = "SELECT * FROM interns_data WHERE username ='Ayo'";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $name = $data['name'];
  $username = $data['username'];


  try {
      $sql2 = 'SELECT * FROM secret_word';
      $q2 = $conn->query($sql2);
      $q2->setFetchMode(PDO::FETCH_ASSOC);
      $data2 = $q2->fetch();
  } catch (PDOException $e) {
      throw $e;
  }
  $secret_word = $data2['secret_word'];

  ?>
<html lang="en">
<meta charset="UTF-8">
<title>Ayomide Apantaku</title>
<meta name="theme-color" content="#2f3061">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 2);
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: Arial,sans-serif;
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
.footer {
    position: 100padleftright;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: grey;
    color: white;
    text-align: center;
}

</style>
</head>
<body>

<h2 style="text-align:center">HNG Internship Profile</h2>

<div class="card">
  <img src="http://res.cloudinary.com/onesiphorus/image/upload/v1523619252/IMG_20171023_180642_440.jpg" alt="Ayomide Apantaku" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <p class="title">Student, UI/UX designer, Web Developer</p>
  <p><a href="#">HNG Internship 4.0</a></p>
  <div style="margin: 24px 0;">
    <a href="dribbble.com/onesiphorus"><i class="fa fa-dribbble"></i></a>
    <a href="twitter.com/onesiphorus"><i class="fa fa-twitter"></i></a>
    <a href="linkedin.com/onesiphorus"><i class="fa fa-linkedin"></i></a>
    <a href="github.com/onesiphorus"><i class="fa fa-github"></i></a>
 </div>
 <p><button>Phone Contact</button></p>
 <div class="footer">
  <p>© 2018 Ayomide Apantaku.</p>
</div>
</div>

</body>
</html>
