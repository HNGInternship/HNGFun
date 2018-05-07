
<!DOCTYPE html>

<?php

    //fetch-store results
    try {

        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="Dan"';
        $query_my_intern_db = $conn->query($sql_queryname);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
    }
    catch (PDOException $exceptionError) {
        throw $exceptionError;
   }

        $secret_word = $query_result['secret_word'];
        $name = $intern_db_result['name'];
        $username = $intern_db_result['username'];
        $image_addr = $intern_db_result['image_filename'];
?>

<html>


  <style>

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 3000px;
    margin: auto;
    text-align: center;
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
    font-size: 18px;
    color: blue;
}

button:hover, a:hover {
    opacity: 0.7;
}
  </style>

  <head>
  <title>My Profile</title>
 
  </head>



<body>
 

<div class="card">
  

  <?php
  echo "<h1>" .$name. "</h1>";
  ?>
  <p class="title">Android Developer</p>
  <p>Hotels.ng Internship</p>
  <p align="center"> <img width="150px" height="150px" src="https://res.cloudinary.com/danuluma/image/upload/v1525636698/hng.jpg"></p>


<br>
  <?php
  
  echo "<p> Username :" .$username. "<p>";
  ?>
  <p>Slack : @Dan </p>
  <br>
  <p>Github <a href="https://github.com/danuluma">danuluma</a></p>
  
  
  <p><button>Contact</button></p>
</div>

</body>
</html>