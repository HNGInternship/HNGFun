<?php
require '../db.php';
  try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();


    $sql_query = "SELECT * FROM interns_data";
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }

  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
?>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.profile-h1 {
  text-align: center;
  margin-top: 40px;
  margin-bottom: -30px;
}
.profile-card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top: 70px;
}
.profile-image {
  height: 50%;
  width: 100%;
}
.profile-title {
  color: black;
  font-size: 30px;
  font-family: 'Open Sans Condensed';
  margin-top: 15px;
}
.profile-name {
  font-family: 'Open Sans Condensed';
  font-size: 30px;
}
.prop-username {
  letter-spacing: 1px;
  font-size: 15px;
}
.prop-name {
  padding-bottom: 40px;
  letter-spacing: 1px;
  font-size: 15px;
}
.social-buttons {
  padding-bottom: 20px;
}
  </style>
</head>
<body>
<main id="profileContainer" class="container">
          <h1 class="profile-h1">My Profile</h1>
          <div class="profile-card">
            <img src="<?php echo $image_url ?>" alt="John" class="profile-image" />
            <p class="profile-title">Username</p>
            <p>
            <?php
              echo $username;
            ?>
            </p>
            <p class="profile-name">Name</p>
            <p class="prop-name"><?php
              echo $name;
            ?>  </p>
            <div class="social-buttons">
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
          </div>
        </main>
</body>
</html>