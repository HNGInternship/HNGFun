	  <?php 
  if(!isset($_GET['id'])){
     require '../db.php';
   }else{
      require 'db.php';
   }
 

  try {
        $sql = 'SELECT * FROM interns_data, secret_word WHERE username ="'.'dapetoo'.'"';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
        
    } catch (PDOException $e) {
        throw $e;
    }


  ?><!DOCTYPE html>
<html lang="en">
<head>
	<title>HNG FUN: DAPETOO</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom styles for this template -->
      <link href="../css/style2.css" rel="stylesheet">
      <link href="../css/style1.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
	  <link href="../css/carousel.css" rel="stylesheet">
	<style type="text/css">
		a:hover{
		  text-decoration: none;
		}
	</style>

</head>
<body style='background-color:#3f4447;'>
	
<div class='container'>
	<br><br>
	<div class='row'>
		<div class='col-sm-6' >
			<center><img height='100%' class='img-responsive' src="http://res.cloudinary.com/dapetoo/image/upload/v1524107557/photo/IMG_20180211_145414.jpg" alt="my_display_picture"></center>
		</div>
		<div class='col-sm-6'>
			<div>
				<br><br><br><br><br><br>
				<h1 style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; text-transform: uppercase;'><?php echo ($data['username']) ?></h1>
				<h2 style='font-family: "proxima-nova"; color:#a3a3a3; font-size: 22px; line-height: 1.15em; text-transform: none;letter-spacing: .01em; margin-bottom:26px; text-align:left;'>I am a tech enthusiast, I love to explore anything in the world of technology. I develop Android apllications and Web Applications</h2>
				<div>
					<h4>Connect with me on Social Media</h4>
					<a href="https://instagram.com/iamdapetoo"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/instagram-icon-white.png"></a>
					<a href="https://twitter.com/dapetoo"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/icon-twitter-white-1.png"></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Custom scripts for this template -->
    <script src="../js/hng.min.js"></script>
</body>
</html>