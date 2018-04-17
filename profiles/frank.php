
<?php
$select_username = "SELECT * FROM interns_data WHERE username = 'frank'";
$q = $conn->query($select_username);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();
$frank = array_shift($data);

$select_key = "SELECT * FROM secret_word";
$q = $conn->query($select_key);
$q->setFetchMode(PDO::FETCH_ASSOC);
$key = $q->fetch();
$secret_word = $key['secret_word'];
?>

<div class="frank profile-wrap">
<div class="about">
	<?php if (empty($frank)): ?>
	<h1>FRANK</h1>
	<?php else: ?>
	<div class="photo-wrap">
		<img src="<?php echo $frank['image_filename']; ?>" alt="" style="width:400px;height:400px; />
	</div>
	<h1><?php echo $frank['name']; ?></h1>
	<h3>HNG INTERNSHIP 4 #STAGE3 TASK</h3>
	
	
	<?php endif; ?>
</div>
</div>
