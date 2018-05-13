<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'kizzy'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!Doctype html>
<html>
<style>

body {
  margin: 0;
}
.main{
 margin-left: 200px;
    
    padding: 1em;
    overflow: hidden;
}
.img{
  margin-top: 75px;
}
img{
  width: 200px;
  height: 230px;
  float: left;
  border: 2px solid blue;
    padding: 5px;
    border-radius: 50px 20px;
}  



</style>
<body>

<div class="img">
  <img src="<?php echo $user->image_filename?>" alt="my photo">
</div>
   

<div class="main">
  <p>My name is Kizito .U. Okafor, I am a Mechanical Engineer. I love the fascinating world of computers and programming.. So am learning how to code.
  Hope to be really good at it.</p>
  <?php
  echo $user->name . "<br>";
  echo $user->username . "<br>";
?>

</div>

</body>
</html>
