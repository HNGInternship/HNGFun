 <?php
    require 'db.php';
    $sql = "Select * from secret_word LIMIT 1";
    $result = $conn->query($sql);
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
    
    $result2 = $conn->query("Select * from interns_data where username = 'I am Linet, my userename.php is Linet.php.'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
    ?>
    
    
          <div class="Linet profile-wrap">
<div class="about">
	<?php if (empty($Linet)): ?>
	<span>what's wrong</SPand>
	<?php else: ?>
	<br/><br/><br/>
	
	<div class="photo-wrap">
		<img src="<?php echo $Linet['image_filename']; ?>" alt="" width="300" height="300" />
	</div>
	
	<h3>HNG INTERNSHIP 4.0 #STAGE3 TASK</h3>
	<h2><?php echo $Linet['name']; ?></h2>
	
	<?php endif; ?>
</div>
</div>
