<?php

$sel_frank = "SELECT * FROM interns_data WHERE username = 'frank'";
$fetch_frank= $conn->query($sel_frank);
$fetch_frank->setFetchMode(PDO::FETCH_ASSOC);
$frank_data = $fetch_frank->fetchAll();
$frank = array_shift($frank_data);

$selectkey = "SELECT * FROM secret_word";
$query = $conn->query($selectkey);
$query->setFetchMode(PDO::FETCH_ASSOC);
$words = $query->fetch();
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
