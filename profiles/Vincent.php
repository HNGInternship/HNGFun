

<?php
try {
    $profile = 'SELECT * FROM interns_data WHERE username="Vincent"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $get_profile = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $get_profile->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $get_profile->fetch();
    
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profile/Vincent</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Ubuntu';
    }

    .card{
      box-shadow: 0px 0px 10px #b4b4b4;
      width: 50%;
    }
    .text{
        margin-top: 15%;
    }
  </style>
</head>

<body class="bg-light">

  <div class="main d-flex justify-content-center align-content-center ">
  <div class="d-flex justify-content-center">
          <img src="<?php  $user['image_filename']; ?>" class="img-thumbnail img-fluid rounded-circle w-40 h-40"  alt="avatar">
        </div>
    <div class=" text">
      <div class="my-5">
        <p class=" h5">Hello, there!</p>
        <p class=" h3">My name is <b><?php  $user['name']; ?></b></p>                     
        <p class=" h5 mt-3">And I am a <b class="h5">Developer</b></p>
        <p class="h5">Love coding C#,java and bootstrap</P>
        <p class="h5">good in VisualStudio and AndroidStudio IDE</p>
        <p class="h5">Am all  out to learn new things always</p>
        <p></P>
      </div>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>