<?php

if (!defined('DB_USER')){
            
  require "../../config.php";
}
try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

 global $conn;


    //fetch-store results
    try {

        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="elizabeth"';
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


<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
  max-width: 350px;
  margin: 10% auto;
  padding: 2% 0;
  text-align: center;
  font-family: arial;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.social {
	margin: 20px 0;
	word-spacing: 15px;
}
</style>
</head>
<body>
  
<div class="card">
   <h1><?php echo $name ?></h1>
  <img src="<?php echo $image_addr; ?>" alt="ELizabeth" style="width:100%" width="250" height="250">
  
  <p>UI/UX Designer and Developer</p>
  
  <div class="social">
    <a href="twitter.com/elizabetholic"><i class="fa fa-twitter"></i></a>  
    <a href="linkedin.com/in/elizabeth-okoro-79a87810b"><i class="fa fa-linkedin"></i></a>  
    <a href="facebook.com/elizabeth.okoro"><i class="fa fa-facebook"></i></a> 
 </div>
</div>

</body>
</html>
