<?php
require 'db.php';
$username = "adamucodes";

$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sql0 = "SELECT * FROM `secret_word` LIMIT 1";
$stmt0 = $conn->prepare($sql0);
$stmt0->execute();
$data = $stmt0->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>adamucodes | web apps developer</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
    }
    .header {
      background-image: url("http://res.cloudinary.com/adamucodes/image/upload/v1523741962/coding7.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 50% 50%;
      background-attachment: fixed;
      height: 100vh;
    }
    .header_overlay {
      background-color: rgba(31,31,31,0.75);
      height: 100vh;
    }
    .profile_image img {
      width: 200px;
      border: 2px solid #fff;
      border-radius: 5px;
      margin: 120px 0 20px;
    }
    .profile_details h2 {
      font-size: 45px;
      color: #fff;
      margin: 0;
      text-shadow: 2px 4px 8px #000;
    }
    .profile_details p {
      font-size: 25px;
      color: #fff;
    }
    .profile_icons i {
      font-size: 25px;
      color: #fff;
      border: 1px solid #fff;
      padding: 20px;
      margin-right: 10px;
      transition: all 0.5s;
    }
    .profile_icons i:hover {
      background-color: #129cf3;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <section class="header">
      <div class="header_overlay">
        <center>
          <div class="profile_image">
            <img src="<?php echo $result["image_filename"] ?>">
          </div>
          <div class="profile_details">
            <h2><?php echo $result["name"] ?></h2>
            <p>"Freelance Web Applications Developer with huge passion for creating Mobile and Web Applications"</p>
          </div>
          <div class="profile_icons">
            <a href="http://www.facebook.com/adamucodes"><i class="fa fa-facebook"></i></a>
            <a href="http://www.twitter.com/adamucodes"><i class="fa fa-twitter"></i></a>
            <a href="http://www.linkedin.com/adamucodes"><i class="fa fa-linkedin"></i></a>
          </div>
        </center>
      </div>
    </section>
  </div>
</body>
</html>
