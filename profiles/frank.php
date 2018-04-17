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
	<h1>Jim is supposed to be here</h1>
	<?php else: ?>
	<div class="photo-wrap">
		<img src="<?php echo $frank['image_filename']; ?>" alt="" style="width:170px;height:170px;/>
	</div>
	<h1><?php echo $frank['name']; ?></h1>
	<h3>HNG INTERNSHIP 4 #STAGE3 TASK</h3>
	
	
	<?php endif; ?>
</div>
</div>
