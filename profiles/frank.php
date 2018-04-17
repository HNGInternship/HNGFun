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
	<span>what's wrong</SPand>
	<?php else: ?>
	<br/><br/><br/>
	
	<div class="photo-wrap">
		<img src="<?php echo $frank['image_filename']; ?>" alt="" width="300" height="300" />
	</div>
	
	<h3>HNG INTERNSHIP 4 #STAGE3 TASK</h3>
	<h2><?php echo $frank['name']; ?></h2>
	
	<?php endif; ?>
</div>
</div>
