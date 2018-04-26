<?php
$file = realpath(__DIR__ . '/..') . "/db.php" ;
include $file;
global $conn;
    
    try {
        $sql = "SELECT * FROM interns_data WHERE username='{$_GET['id']}'";
    
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }

    $name = $data['name'];
    $username = $data['username'];
    $image = $data['image_filename'];

    try {
        $sql = 'SELECT * FROM secret_word';
        $q= $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>HNG 4.0 | <?php echo $name; ?></title>
    
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style type="text/css">
		
		.center{
			margin:auto;
		}
		.Lrow{
			margin-right:  300px;
			margin-left:  300px
		}
		.item{
			margin:.1em;
            display: inline-block;
		}
		
	</style>
</head>
<body class="blue lighten-3">
	<div class="container">
	   
	    <div class="card" >
		    <div class="card-image waves-effect waves-block waves-light">
		       <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class=" activator" height="">
		    </div>
		    <div class="card-content">
		    <div class="center-align">
		     <span class="card-title grey-text text-darken-4"><h3><?php echo $name; ?></h3></span>
		      <p>A Python/PHP enthusiast. </p>
		      <p>A Programming Hobbyist</p>
		  </div>
		      <div><h5 class="center-align">Connect with me on:</h5></div>
		     <div class="Lrow">
		     	<ul class="list-inline text-center">
		      <li class="list-inline-item"> <a href="https://twitter.com/hyunglere"><i class="fa fa-twitter fa-lg item"></i></a></li>
		      <li class="list-inline-item"><a href="https://www.facebook.com/olaitan.ibrahim.923"><i class="fa fa-facebook fa-lg item"></i></a></li>
		      <li class="list-inline-item"><a href="https://www.linkedin.com/in/ibrahim-olaitan-562a24160/"><i class="fa fa-linkedin fa-lg item"></i></a></li>
		      <li class="list-inline-item"><a href="https://www.instagram.com/hyunglere/"><i class="fa fa-instagram fa-lg item"></i></a> </li>
		      <li class="list-inline-item"><a href="https://www.github.com/hyunglere/"><i class="fa fa-github fa-lg item"></i></a></li>
		  </ul>
		  	</div>

		    </div>
		    
	  	</div>
	</div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

</body>
</html>

