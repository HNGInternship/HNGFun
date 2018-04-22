<?php

$select = $conn->query("SELECT * FROM secret_word LIMIT 1");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$result= $select->fetch();
		$secret_word = $result['secret_word'];


		$result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'praiz'");
		$result2->setFetchMode(PDO::FETCH_ASSOC);
		$user = $result2->fetch();

// $query = "SELECT * FROM secret_word LIMIT 1";
// $result = mysqli_query($conn, $query);
// while($secret_word= mysqli_fetch_assoc($result))

// $query2= "SELECT * FROM interns_data WHERE username = 'praiz'";    
// $result2 = mysqli_query($conn, $query2);
// while ($user = mysqli_fetch_assoc($result2));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Praise Adanlawo </title>
	<style type="text/css">
	
	</style>
</head>
<body>
<div>
	<header><center>
		<img src=<?php echo $user['image_filename']?> alt="praiz profile picture">
		<p class="title">
			<?php echo "Hi, I'm ". $user['name']?>
		</p>
		<p class="sub">A Tech Enthusiast, Budding Web Developer (Front-End, Back-End), Efficient Team Player, Designer and everything in betweeen</p>
		<p class="sub">Connect with me:</p>
	</header> </center>
</div>
<div id="social">
			<center>
				<a href="https://twitter.com/praiz_damilola?s=08" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://facebook.com/praisedamilola.adanlawo" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://github.com/praizz" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a href="https://www.linkedin.com/in/praiseadanlawo/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                     </span>
            </a></center>		        
		 </div>
</body>
</html>