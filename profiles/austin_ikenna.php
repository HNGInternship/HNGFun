<?php
	require 'db.php';
	$username = "austin_ikenna";
 
	$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
	$sql0 = "SELECT * FROM `secret_word` LIMIT 1";
	$stmt0 = $conn->prepare($sql0);
	$stmt0->execute();
	$data = $stmt0->fetch(PDO::FETCH_ASSOC);
	$secret_word = $data['secret_word'];
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://res.cloudinary.com/ikeyy2000/image/upload/v1524732786/austin.jpg">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
  max-width: 350px;
  margin: 5% auto;
  padding: 2% 0;
  text-align: center;
  font-family: arial;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.social {
	margin: 20px 0;
	word-spacing: 15px;
}
</style>
</head>
<body>
  
<div class="card">
  <h2 class="margin"> <?php echo $result["name"]; ?> </h2>
  <h6>@<?php echo $result["username"]; ?></h6>
  <img src="<?php echo $result['image_filename']; ?>" class="img-responsive img-circle margin" style="display:inline" alt="Me" width="350" height="350">
  
  <p>UI/UX Designer, and Front-end Developer</p>
  
  <div class="social">
    <a href="twitter.com/Austin_ikenna"><i class="fa fa-twitter"></i></a>  
    <a href="linkedin.com/in/augustine-ikenna-aku-782448a3"><i class="fa fa-linkedin"></i></a>  
    <a href="facebook.com/Austin.Ikenna"><i class="fa fa-facebook"></i></a> 
 </div>
</div>

</body>
</html>

