<?php
// Get my profile


try {
    $sql = "SELECT * FROM interns_data WHERE username = '$profile_name'";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $prof = $q->fetch();
} catch (PDOException $e) {

    throw $e;

}


try {
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $result = $q->fetch();
} catch (PDOException $e) {

    throw $e;
}
 
$secret_word = $result['secret_word'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $prof['name']; ?> - HNG Internship</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #fff; /* White */
      color: #555555;
  }
  </style>
</head>
<body>

<div class="container-fluid bg-1 text-center">
  <h1><?php echo $prof['name']; ?></h1>
  <img src="<?php echo $prof['image_filename']; ?>" class="img-circle" alt="profile picture" width="200" height="200">
  
  <h3>PHP, PYTHON WEB DEVELOPER</h3>
  <h4>Username : <?php echo $prof['username']; ?></h4>

</div>

<div class="container-fluid bg-2 text-center">
  <h3>What Am I?</h3>
  <p>Web Developer, specialising in creating custom solutions using PHP or Python. Loves building in the cloud. HNG Intern </p>
</div>

</body>
</html>
