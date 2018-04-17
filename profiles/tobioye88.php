<<<<<<< HEAD

<div class="row my-4">
	<div class="col-md-3 mx-auto">
		<div class="card">
			<div class="card-body">
				<img class="rounded-circle img-fluid border border-primary" src="http://res.cloudinary.com/tobioye88/image/upload/v1523627884/tobioye88.jpg" alt="">
				<div class="card-text mt-5">
					<ul class="list-unstyled text-center">
						<li class="list-item"><small><b>USERNAME</b></small><br> @tobioye88</li>
						<li class="list-item"><small><b>PHONE</b></small><br> 08034006567</li>
						<li class="list-item"><small><b>PHONE</b></small><br> <?=date("h:i:s a");?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
=======
<?php

require_once '../config.php';

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die(DB_DATABASE . ": " . $pe->getMessage());
}
//user
$username = $_GET['id'];
$sql = "SELECT * FROM interns_data WHERE username = '$username'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetch();

//secret word
$sql = "SELECT * FROM secret_word";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$word = $q->fetch();
$secret_word = $word['secret_word'];

?>


<div class="row my-4">
	<div class="col-md-3 mx-auto">
		<div class="card">
			<div class="card-body">
				<img class="rounded-circle img-fluid border border-primary" src="<?= $data['image_filename'] ?>" alt="">
				<div class="card-text mt-5">
					<ul class="list-unstyled text-center">
						<li class="list-item"><small><b>USERNAME</b></small><br> @<?= $data['username'] ?></li>
						<li class="list-item"><small><b>NAME</b></small><br><?= $data['name'] ?></li>
						<li class="list-item"><small><b>PHONE</b></small><br> <?=date("h:i:s a");?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
