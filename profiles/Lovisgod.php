
<?php





  $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
  $secret_word = $data['secret_word'];
  
  //get my details    
    $sql = "SELECT * FROM `interns_data` WHERE username = 'lovisgod' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
  $image_filename = $data['image_filename'];
  

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://res.cloudinary.com/psirius-eem/image/upload/a_auto_right/v1523901966/lovisgod.jpg">
<style>
.the_card {
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
  opacity: 0.8;
}
</style>
</head>
<body>


<div class="the_card">
  <img src="http://res.cloudinary.com/psirius-eem/image/upload/a_auto_right/v1523901966/lovisgod.jpg" alt="Bella" style="width:100%">
  <h1>Ayooluwa Olosunde</h1>
  <p class="title"> HNG INTERN  | ANDROID DEVELOPER | BUSINESS DEVELOPER </p>
   <p>Akwa Ibom, Nigeria</p>
 <p><button>Email me at: olifedayo94@gmail.com</button></p>
</div>




</body>
</html>