<head>

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
 
</head>




 <!--
   // try {  //query to select intern data
   //  $myname = "SELECT * FROM interns_data WHERE username='Dan'" ; 
   //  $q = $conn->query($myname);
//     $q->setFetchMode(PDO::FETCH_ASSOC);
//     $data = $q->fetch();
//     $name=$data['name'];
//     $username=$data['username'];
   
// } 
// catch (PDOException $e) {

//     throw $e;
// } 
//  try {  //query to get secret word
//     $word = "SELECT * FROM secret_word" ; 
//     $q = $conn->query($word);
//     $q->setFetchMode(PDO::FETCH_ASSOC);
//     $data = $q->fetch();
//     $secret_word=$data['secret_word'];
   
// }

// catch (PDOException $e) {

//     throw $e;
// }
//?> -->

<div class="card">
  

  <?php
  echo "<h1>" .$name. "</h1>";
  ?>
  <p class="title">Android Developer</p>
  <p>Hotels.ng Internship</p>
  <p align="center"> <img width="150px" height="150px" src="https://res.cloudinary.com/danuluma/image/upload/v1525636698/hng.jpg"></p>


<br>
  <?php
  $data1 = "Username :";
  $result = "$data1 $username";
  echo "<p>" .$result. "<p>";
  ?>
  <p>Slack : @Dan </p>
  <br>
  <p>Github <a href="https://github.com/danuluma">danuluma</a></p>
  
  
  <p><button>Contact</button></p>
</div>
