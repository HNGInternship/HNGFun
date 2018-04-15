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

<?php
  
  // require("../db.php");

  // $emat_host =  "localhost";
  // $emat_db   =  "hng_db";
  // $emat_user =  "root";
  // $emat_pass =  "";

  define ('DB_USER', "root");
define ('DB_PASSWORD', "");
define ('DB_DATABASE', "hngfun");
define ('DB_HOST', "localhost");

  // start connection to mysql
  $conn2 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

  // check for errors
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // insert matthew 
  $sql = " INSERT INTO interns_data_ (name, username, image_filename) VALUES('Matthew Bernard', 'ematthew', 'http://res.cloudinary.com/hng/image/upload/v1523623156/mat1.png')";
  $run_insert = mysqli_query($conn2, $sql);
  if(!$run_insert){
    echo 'Fail to insert user data';
  }else{
    echo 'Information has been inserted successfully';
  }


  // get secret keyword
  $query1 = " SELECT secret_word FROM secret_word ";
  $secret_result = mysqli_query($conn2, $query1);
  while($result_data = mysqli_fetch_assoc($secret_result)){
    $secret_word = $result_data['secret_word'];
  }

  // fetch my information
  $query2 = " SELECT name, username, image_filename FROM interns_data_ WHERE(username = 'ematthew') ";
  $results = mysqli_query($conn2, $query2);
  while($data = mysqli_fetch_assoc($results)){
    $username = $data['username'];
    $name = $data['name'];
    $image_filename = $data['image_filename'];
  }
?>
 


<div class="container">
 <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $image_filename; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
    <h5>slack username: <?php echo $username; ?> </h5>

    <p>My secret word: <?php echo $secret_word; ?> </p>
    <p class="card-text">very little is needed to make a happy life thanks HNG for give us the chance!!</p>
  </div>
</div>
</div>

      

</body>
</html>