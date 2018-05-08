<?php

if(!isset($_GET['id'])){
   require '../db.php';
 }else{
    require 'db.php';
 }

  try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();

    $sql_query = 'SELECT * FROM interns_data WHERE username="obate"';
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

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .card{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
    }

    .title{
      color:grey;
      font-size:18px;
    }

    .profile-image {
      height: 70%;
      width: 100%;

    button{
      border:none;
      outline:0;
      display: inline-block;
      padding:20px;
      color:white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    a {
      text-decoration: none;
      font-size: 2px;
      color: black;
    }

    .fa {
    padding: 5px;
    font-size: 30px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

}


    button:hover, a:hover{
      opacity:0.7;
    }
    </style>
    <title>Obasi Uchechukwu | Software developer</title>
  </head>
  <body>

    <div class="card">
      <img src="<?php echo $image_url ?>" alt="obate" class="profile-image" style="width:100%"/>
      <p>Username</p>
      <p>
      <?php
        echo $username;
      ?>
      </p>

      <h1>Name</h1>
      <p><?php
        echo $name;
      ?></p>
      <p class="title">CEO & Founder, Software Developer, Data Scientist</p>
      <p>Obdesign Technologies Ltd</p>
      <a href="#" class="fa fa-medium"></a>
      <a href="#" class="fa fa-linkedin"></a>
      <a href="#" class="fa fa-github"></a>
      <p><button>Contact: +2348188587683</button></p>
    </div>

  </body>
</html>
