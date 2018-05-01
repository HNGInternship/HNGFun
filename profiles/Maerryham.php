 <html>
 <?php 
 
 require 'config.php';
 
 try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

try {
$sql = "SELECT * FROM interns_data where username = 'Maerryham'";
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data2 = $q->fetchAll();
} catch (PDOException $e) {

    throw $e;
} 
 
 try {
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {

    throw $e;
}?>
    <head>
        <title>My Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<?php foreach($data2 as $data2){ ?>
        <div align="center"  style="width: 100%;    text-align: center; height: 1000px;  padding: 40px 20px; font-weight: 18px; color:blue;  background-image:url('http://res.cloudinary.com/maerryham/image/upload/v1524249303/ph-10240.jpg'); background-repeat: repeat;">
		
		<center><div  style="float: left; margin-left:150px; margin-top: 200px;  background: rgba(50, 50, 10, 0.2); min-height: 100px; padding: 40px 25px; visibility: visible; animation-duration: 2s; animation-name: fadeInRight;">
		<h1 style="font-family: 'Monotype Corsiva'; font-size: 48px ; text-align: center">My Name is <?= $data2['name'] ?></h1
		<h1 style="font-family: 'Monotype Corsiva'; font-size: 48px ; text-align: center">My Username is <?= $data2['username'] ?></h1>
		<p style="color:white">I am a Web Developer passionate to learning new technology. Meet you soon</p>
		
		<?php //foreach($data as $data){ ?>
		<p style="font-family: arial; font-size: 64px; text-align: center"> <?php $secret_word = $data['secret_word']?></p>
		</div> </center>
		<div style="border-radius:30px; overflow:hidden; height:auto; border: 2px solid blue;">
			<img src="<?= $data2['image_filename'] ?>" height="auto" width="100%"/>
		</div>
		
		<? //} 		?>
		</div>
		<?php } ?>
		
    </body>
</html>
