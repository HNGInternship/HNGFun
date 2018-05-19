<?php
date_default_timezone_set('Africa/Lagos');

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
	$query = $conn->prepare("SELECT * FROM interns_data WHERE username='Boss_Baby' LIMIT 1");
	$query->execute();
	$query->setFetchMode(PDO::FETCH_OBJ);
	$user = $query->fetch();
	
} catch (PDOException $e) {
	throw $e;
}

?>


<main class="my-container">
	<header class="header">
        <span class="date">
          <?php echo date("D M d, Y"); ?>
        </span> |
        <span class="time">
          <?php echo date("g:i a"); ?>
        </span>
      </header>
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
				<i class="fa fa-info"></i>
				&emsp;
                    <p>I am a Software Developer and an Android Enthusiast. You can follow me on twitter <a target="_blank" href="https://twitter.com/dfrank300/"><i class="fa fa-twitter"></i></a> </p>
			</li>
			
		</ul>
	
	</div>
</main>

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

