
<!DOCTYPE html>
<?php
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
  margin-top: 50px;
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
    width: 100px;
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
  <div class="title">Web and Mobile Developer</div>
  <div>Hotels.ng Internship</div>
  <div align="center"> <img width="200px" height="200px" src="https://res.cloudinary.com/danuluma/image/upload/v1525636698/hng.jpg"></div>
  <?php
  echo "<div> Username :" .$username. "<div>";
  ?>
  <div>Slack: @Dan</div>
  <div>Github: <a href="https://github.com/danuluma" target="_blank">danuluma</a></div>
  <div><a class="button" href="mailto:anericod@gmail.com" target="_blank"><button>Contact</button> </a></div>
</div>
</body>
</html>