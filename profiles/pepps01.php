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

<div class="profile-bar" style="border:1px soild blue;">
		
	<img src="https://res.cloudinary.com/pepps01/image/upload/v1523816522/sunny.jpg" class="profile_image"  width="260" height="250">
		<h4 style="margin-top: 5px;"><?php echo $user->username;?></h4>
		 Backend and Android
		<p>@<?= $user->username;?></p>	
		<p style="font-size: 15px;font-weight: bolder;">Secret Word: <?php echo $secret_word; ?></p>


		<a href="" class="btn btn-success">Holla</a>
</div>
</body>

<?php
include_once('footer.php');
?>