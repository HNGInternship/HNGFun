<head>

<style>

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
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
    font-size: 22px;
    color: black;
}

button:hover, a:hover {
    opacity: 0.7;
}
</style>
 
</head>




<?php
   try {  //query to select intern data
    $myname = "SELECT * FROM interns_data WHERE username='Noel_Obaseki'" ; 
    $q = $conn->query($myname);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $name=$data['name'];
    $username=$data['username'];
   
} 
catch (PDOException $e) {

    throw $e;
} 
 try {  //query to get secret word
    $word = "SELECT * FROM secret_word" ; 
    $q = $conn->query($word);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word=$data['secret_word'];
   
}

catch (PDOException $e) {

    throw $e;
}
?>

<div class="card">
  <img src="http://res.cloudinary.com/dqnhgax9d/image/upload/v1525107042/Snapshot_20150201_2.jpg" alt="Noel" style="width:100%">	
  <?php
  echo "<h1>" .$name. "</h1>";
  ?>
  <p class="title">Android Developer</p>
  <p>Hotels.ng Internship</p>
  <?php
  $data1 = "Username :";
  $result = "$data1 $username";
  echo "<p>" .$result. "<p>";
  ?>
  <p>Slack : @Noel Obaseki </p>
  
  <a href="https://twitter.com/N0e_1"><i class="fa fa-twitter"></i></a> 
  <a href="https://www.linkedin.com/in/noel-obaseki-511799127/"><i class="fa fa-linkedin"></i></a> 
  <a href="#"><i class="fa fa-facebook"></i></a> 
  <p><button>Contact</button></p>
</div>