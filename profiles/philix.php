<!DOCTYPE html>
<html>
<head>
  <title>Okigbo Chinedu Felix</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'philix'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
  <style type="text/css">
    body{
     background-color:#0085A1;
    }
     @import url(https://fonts.googleapis.com/css?family=Lato);
  </style>
</head>
<body>
  <div width="100%" align="center" style="margin-bottom: 50px; margin-top: 100px;">
    <img src="http://res.cloudinary.com/dlb33ndhf/image/upload/v1523621332/pic.jpg" alt="Profile picture" height="250px" width="250px" border="7px" style="border-radius: 200px; border-color: #F3E0FA;">
  </div>
  <div width="50%" align="center">
    <div style="font-size: 36px; color:#fff;" font-family="Lato, Arial"> Hi! I"m <?php echo $user->name ?>, want to know about me? Hit the Icons below...</div>
  </div>
</body>
</html>