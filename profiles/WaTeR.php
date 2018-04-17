<?php 
 require 'db.php';
     $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;
$query1 = "SELECT * FROM interns_data_ WHERE username='WaTeR'";;

$stmt = $conn->query($query1);

$stmt->execute();








      
?>

<!DOCTYPE html>
<html>
<head>
	<title>HNG INternship Task 3</title>
	<style type="text/css">
		*{
	padding: 0px;
	margin:0px auto;
	max-width: 100%;
	font-size: 100%;
}

.head{
	margin-top: 30px;
	padding: 20px;
	max-width: 90%;
	background: #5ED490;
	color: #002610;

}

.head h1{
	font-size: 40pt;
	text-align: center;
}
.compliment{
	padding: 20px;
	background: #0B4A26;
	max-width: 90%;
	font-size: 20pt;
	color: #FDFDF8;
	text-align: center;
}
.content{
	margin-top:  5px;
	padding: 20px;
	background:#6FCF97;
	max-width: 90%;
	
	color: #FDFDF8;
	text-align: center;
}
.content .header{
	color: #4D0909;
	font-size: 30pt;
	text-align: left;
	
	
}
.content .phead{
	width: 90%;
	background: green;
	padding: 10px;
	color: #4D0909;
	font-size: 20pt;
	text-align: left;
}
.content .sub{
	color: #4D0909;
	font-size: 20pt;
	text-align: left;
	padding-left: 35px;	
}


	</style>
}
</head>
<body>

<div class="head">
	<h1>Hi,</h1>
	<h1>I am WATER from AndroidNGR, EKITI</h1>
</div>

<div class="compliment">
	<p> a member of the HNG Internship 4.0 </p>
</div>

<div class="content">
	<div class="compliment">
	<p> MY PROFILE </p>

</div>
<p> <br/></p>
	<div style="float: left; width: 40%;">
		<?php while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
		<p class="phead">Profle Name:</p>
		<p class="sub"><?php echo $data['name']; ?></p>
		<hr>
		<p class="phead">Profle Name:</p>
		<p class="sub"><?php echo $data['username']; ?></p>

	</div>

	<div style="float: left;width: 50%;">
<img src="<?php echo $data['image_filename']; ?>"  width="300" height="300" alt="<?php echo $data['image_filename']; ?>"/>
	</div>
	<?php } ?>
<br/><br/>

<div style="clear: both;">
		
		</div>

</body>
</html> 
