
<?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
		$result2 = $conn->query("Select * from interns_data_ where username = 'lekan.koku'");
        $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user->name ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<style>
	html { 
   
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
div{
	margin-top: 250px;
	text-align: center;
	color: red;
	font-size: 50px;

}
div p{
	font-family: 'Roboto', sans-serif;
    
}
</style>
<body>
    <div>
    	<p>Hello Code Reviewer,My name is <?php echo $user->name ?></p><br>
    	<p>My username is <?php echo $user->username ?></p><br>
    	<p>The time <?php echo date("l h:i  d F o");?></p>
    	<img src="<?php echo $user->image_filename ?>">
    </div>
</body>
</html>