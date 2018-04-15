<?php
 
try {
   $profile = 'SELECT * FROM interns_data_ WHERE username="matthew"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0000FF;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}

.c{
 padding:5px;
 margin-left:800px;
 margin-top:10px;
 margin-button:5px;
}

</style>
</head>
<body>

<div>
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
   <li> <a href <input type="text" placeholder="Search.."> </a> </li>  
   <li><input class="c" type="text" placeholder="search..">search</li>
</ul>
</div>

<?php
echo "<br>";
echo "hello world!";
echo "<br>";
echo "The time is " . date("h:i:sa"); "<br>";
?>
<div class="container">
 <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="http://res.cloudinary.com/hng/image/upload/v1523623156/mat1.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Matthew Bernard</h5>
    <p class="card-text">very little is needed to make a happy life thanks HNG for give us the chance!!</p>
  </div>
</div>
</div>

      

</body>
</html>