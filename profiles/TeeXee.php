<?php 
  try {
      $sql = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE intern_id = \'YemKay\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['name'] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		body {
			background-size: cover;
		}
		
		.fa:hover {
    		color: #536DFE;
		}
		
		.card {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			}

		.title {
			  color: Black;
			  font-size: 50px;
			}
		.fa {
			float: right;
			font-size: 25px;
			color: #ccc;
			padding: 10px;
		}
		
		.profile{
			text-align:center;
			margin-bottom:50px
			}
		.profile img{
			height:225px;
			width:225px;
			border:7px solid #fff
			}
		.profile h4{
			margin-top:25px;
			margin-bottom:0;
			text-transform:none
		}
		.profile p{
			margin-top:0
			}		
				
	</style>
</head>

<body>

<div class="card">
                    <div class="profile">
                        <img src="<?php echo $data['image_filename'] ?>" alt="Franklin" class="mx-auto rounded-circle" >
                        <h4><?php echo $data['name'] ?></h4>
                        <p class="text-muted">Software Developer</p>
						<div class="card-text"><b>username</b>: <?php echo $data['username'] ?></div>
						<div class="card-text"><b>Phone</b>: +234 706 826 6229</div>
                            <a href="https://github.com/TeeXee19"><i class="fa fa-github"></i></i></a>
                            <a href="https://twitter.com/TochukwuFE"><i class="fa fa-twitter"></i></i></a>
                            <a href="https://medium.com/@teec3000"><i class="fa fa-medium"></i></i></a>
                            <a href="https://web.facebook.com/franktochukwu.eneh"><i class="fa fa-facebook"></i></i></a>
					</div>

</div>
	
   
	
</body>
</html>