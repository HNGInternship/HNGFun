<!-- Header -->
<?php

$sql = "SELECT * FROM interns_data WHERE username = 'jim'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$jim = array_shift($data);

// Secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$words = $q->fetch();
$secret_word = $words['secret_word'];
?>

<div class="Jim profile-wrap">
<div class="about">
	<?php if (empty($jim)): ?>
	<h1>Jim is supposed to be here</h1>
	<?php else: ?>
	<div class="photo-wrap">
		<img src="<?php echo $jim['image_filename']; ?>" alt="" />
	</div>
	<h1><?php echo $jim['name']; ?></h1>
	<h3>Pro. Web Developer</h3>
	
	<div class="social-icons">
	    <a href="https://twitter.com/nzesalem" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>  
	    <a href="https://github.com/nzesalem" class="github" target="_blank"><i class="fa fa-github"></i></a>
	    <a href="https://linkedin.com/in/nzesalem" class="linkedin" target="_blank"><i class="fa fa-linkedin-square"></i></a>  
	    <a href="https://fb.me/nzesalem" class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a> 
	</div>
	<?php endif; ?>
</div>
</div>