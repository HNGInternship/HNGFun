<?php

	session_start();


	spl_autoload_register(function($className){

		$className = strtolower(str_replace('.', '', str_replace('..', '', $className)));
		require_once 'classes/class.'.$className.'.php';


	});

	if(isset($_POST['action'])){


		Jamila::handleMessage($_POST['message']);
		exit;
	}


	session_unset();


        $sql = DB::prepare('SELECT intern_id, name, username, image_filename FROM interns_data WHERE username="mercyikpe"');
        $sql->execute();
        extract($sql->fetch(PDO::FETCH_ASSOC));



?>




















	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jamila.js"></script>


	<?php
	$sql = DB::prepare('SELECT secret_word FROM secret_word');
        $sql->execute();
       $secret_word = $sql->fetch(PDO::FETCH_ASSOC)['secret_word'];


	?>
</body>
</html>
