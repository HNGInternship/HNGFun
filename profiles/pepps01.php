<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'pepps01'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
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