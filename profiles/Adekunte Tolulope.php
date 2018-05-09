<?php
require 'db.php';
try {
    $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'Adekunte Tolulope'");
    $intern_data->execute();
    $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
    $result = $intern_data->fetch();
  
    $secret_code = $conn->prepare("SELECT * FROM secret_word");
    $secret_code->execute();
    $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
    $code = $secret_code->fetch();
    $secret_word = $code['secret_word'];
 } catch (PDOException $e) {
     throw $e;
    }
  $result = $conn->query("SELECT * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
  $result2 = $conn->query("Select * from interns_data where username = 'Adekunte Tolulope'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
}









?>

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
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
    .chat-box{
    position: absolute;
    bottom: 0;
    right: 0;
	
	font-size:36px;
	color:#CCC;
}
.box{
    transition: height 1s ease-out;
    width: 300px;
    height: 0px;
    background:#003;
    z-index: 9999;
	
}
.open:hover>.box{
  height:400px;
      transition: height 1s ease-out;
	 
}
.open {
    text-align: center;
    font-size: 20px;
    border: 2px solid #3F51B5;
    background:#666;
    color:#999;
}


 

    
</style>
<body>



<div class="card">
  <img src="http://res.cloudinary.com/de8awjxjn/image/upload/v1525561300/26219902_1872730456371316_8732891365608479809_n_1.jpg" alt="Profile Pic">
  <h1>Adekunte Tolulope David</h1>
  <p class="slack username">Adekunte Tolulope</p>
  <p class="title">Programmer</p>
  <p>HNG Internship</p>
  <div style="margin: 24px 0;">
  
    <a href="#"><i class="fa fa-whatsapp"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-instagram"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>


</div>
</div>

<div class="chat-box">
  <div class="open">ChatBot
  <div class="box">
    <br>
    
</body>
</html>
