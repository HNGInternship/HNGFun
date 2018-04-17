<!-- Header -->
<?php

$sql = "SELECT * FROM interns_data WHERE username = 'frank'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$frank = array_shift($data);

// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];
?>

<div class="frank profile-wrap">
<div class="about">
	<?php if (empty($frank)): ?>
	<h1>FRANK</h1>
	<?php else: ?>
	<div class="photo-wrap">
		<img src="<?php echo $frank['image_filename']; ?>" alt="" />
	</div>
	<h1><?php echo $frank['name']; ?></h1>
	<h3>HNG INTERNSHIP 4 #STAGE3 TASK</h3>
	
	<div class="social-icons">
	    <a href="https://twitter.com/nzesalem" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>  
	    <a href="https://github.com/nzesalem" class="github" target="_blank"><i class="fa fa-github"></i></a>
	    <a href="https://linkedin.com/in/nzesalem" class="linkedin" target="_blank"><i class="fa fa-linkedin-square"></i></a>  
	    <a href="https://fb.me/nzesalem" class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a> 
	</div>
	<?php endif; ?>
</div>
</div>
