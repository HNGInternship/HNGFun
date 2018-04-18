<?php
<<<<<<< HEAD
	if(!isset($_GET['id'])){
	require "../config.php";
     require '../db.php';
   }else{
	require "config.php";
      require 'db.php';
   }

 try {

      $sql = 'SELECT * FROM interns_data,secret_word WHERE username ="'.'pepps01'.'"';
      $stmt = $conn->query($sql);
      $r = $stmt->fetch(PDO::FETCH_ASSOC);
      $secret_word = $r['secret_word'];
  } catch (PDOException $e) {
      throw $e->getMessage();
  }
=======
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'pepps01'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
>>>>>>> 52b67053e12fb654879ade8c1a3050d1578a8623
?>
<!-- Page Content -->

<div class="profile-bar" style="margin: 0 auto;text-align: center;width: 100%;border-radius: 10px;font-family: 'Lora';">
	<div class="me" style="background:#007BFF;border-radius: 10px; padding: 20px 20px">
    
  <img src="https://res.cloudinary.com/pepps01/image/upload/v1523816522/sunny.jpg" width="200" height="200" style="border-radius: 50%; border:5px solid white;outline: none;">
    <h4 style="margin-top: 10px;color: white;font-family: 'Lora';"><?php echo $user->name;?></h4>
  </div>
  <div style="padding: 5px 10px;">
    
     <p>Backend and Android Developer</p>
    <p>@<?= $user->username;?></p>  
    <p style="font-size: 15px;font-weight: bolder;">Secret Word: <?php echo $secret_word; ?></p>


    <a href="" class="btn btn-success">Holla</a>
  </div>
</div>
</body>

<?php
include_once('footer.php');
?>