<?php
try {
	$query = $conn->prepare("SELECT * FROM secret_word LIMIT 1");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$data = $query->fetch();
	$secret_word = $data['secret_word'];
} catch (PDOException $e) {
	throw $e;
}

try {
	$query = $conn->prepare("SELECT * FROM interns_data WHERE username='funsholaniyi' LIMIT 1");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_OBJ);
	$user = $query->fetch();
	
} catch (PDOException $e) {
	throw $e;
}

?>

<style>
	
	.my-container {
		margin-bottom: 100px;
		margin-top: 200px;
		position: relative;
	}
	
	div.profile {
		width: 100%;
		max-width: 500px;
		background: #fff;
		margin: auto;
		padding-top: 100px;
	}
	
	div.avatar {
		background: url(<?php echo $user->image_filename; ?>) center no-repeat;
		background-size: 100% 100%;
		border-radius: 100%;
		width: 200px;
		height: 200px;
		box-shadow: 0 0 10px inset rgba(1,1,1,0.8);
		margin-left: auto;
		margin-right: auto;
		margin-top: -200px;
		right: 0;
		left: 0;
		position: absolute;
	}
	
	.skills i {
		font-size: 25pt;
		cursor: pointer;
	}
	
	.skills i:hover {
		filter: brightness(150%);
	}
</style>

<main class="my-container">
	<div class="profile">
		<div class="avatar"></div>
		<br/>
		<ul class="list-group">
			
			<li class="list-group-item">
				<i class="fa fa-user"></i>
				&emsp;
				<strong>
					<?php echo $user->name; ?>
				</strong>
			</li>
			<li class="list-group-item">
				<i class="fa fa-envelope"></i>
				&emsp;
				<strong>
					<a href="mailto:funsholaniyi@gmail.com">funsholaniyi@gmail.com</a>
				</strong>
			</li>
			<li class="list-group-item">
				<i class="fa fa-phone-square"></i>
				&emsp;
				<strong>
					<a href="tel:+2347085827380">+2347085827380
				</strong>
			</li>
			
			<li class="list-group-item text-center">
				<a target="_blank" href="https://facebook.com/funsholaniyi/"><i class="fa fa-facebook"></i></a> &emsp;
				<a target="_blank" href="https://twitter.com/funsholaniyi/"><i class="fa fa-twitter"></i></a> &emsp;
				<a target="_blank" href="https://quora.com/profile/Funsho-Olaniyi/"><i class="fa fa-quora"></i></a> &emsp;
				<a target="_blank" href="https://github.com/funsholaniyi/"><i class="fa fa-github"></i></a> &emsp;
				<a target="_blank" href="https://ng.linkedin.com/in/funsholaniyi"><i class="fa fa-linkedin"></i></a>
			</li>
		</ul>
	
	</div>
</main>

