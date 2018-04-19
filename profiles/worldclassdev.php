  <?php 
    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }?>

<!DOCTYPE html>
<html>
<head>
	<title>Justine Philip</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style type="text/css">
		body{
            background-image: url(http://res.cloudinary.com/worldclassdev/image/upload/v1523643996/topography.svg),
                    linear-gradient(110deg,  #F7DF1E, #FF9020);
            background-size: 340px, auto;
            background-position: fixed;
			font-family: 'Poppins';
            width: 100%;
            height: 100vh;
		}
        ::selection {
          background:  #ffc600; /* WebKit/Blink Browsers */
         }
         ::-moz-selection {
         background:  #ffc600; /* Gecko Browsers */
         }
		.twcd-container{
			width: 100%;
			padding: 20px;
		}
		h1{
			color: #828282;
		}
		.twcd-name{
			text-align: center;
		}
		.twcd-profile{
			width: 350px;
			margin: 30px auto;
			height: 340px;
		}
		.twcd-twitter{
			width: 100%;
			margin: 30px auto;
		
		}
		.twcd-profile-img{
			width: 50%;
			border-radius: 50%;
			height: 50%;
		}
		.twcd-about{
            width: 100%;
			text-align: center;
			line-height: 1.5;
		}
	</style>
</head>
<body>
	<div class="twcd-container">
		<div class="twcd-name">
			<h1>Justine Philip</h1>
		</div>
		<div class="twcd-profile">
			<img class="twcd-profile-img" src="http://res.cloudinary.com/worldclassdev/image/upload/v1523643285/16845555.png" alt="my-profile">
			
		</div>
		<div class="twcd-about">
			<div class="twcd-twitter">
			<a id="twitter-button" href="https://twitter.com/worldclassdev?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @worldclassdev</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
        I like to call myself a developer of all things JS. But basically i love to build stuff that solves a problem irrespective of the technology involved. I'm more about the impact than the money, but somehow i find both. When im not coding, i write, game and play the guitar.
		</div>
	</div>
</body>
</html>
