<?php
if (!defined('DB_USER'))
	{
	require "../../config.php";
	}
try
	{
	$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	}
catch(PDOException $pe)
	{
	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
global $conn;

$diffAns ='';
if (isset($_POST['bot_adekunte'])) {
	
	$data = $_POST['bot_adekunte'];

	if ($data == 'aboutbot') {
		echo "V 1.0";
		exit();
	}else if(strstr($data, 'train:') && strstr($data, '#')){
		$exp = explode(':', $data);
		$exp = explode('#', $exp[1]);
		if (count($exp) == 3) {
			if ($exp[2] == 'password') {
				//PDO INSERT
				try{
					$sql = "INSERT INTO chatbot(question,answer)VALUES('$exp[0]','$exp[1]')";
					$conn -> query($sql);
					echo "Training Successful. Now i know $exp[0]";
					exit();

				}catch(PDOException $e){
					echo "I refused to be trained!".$e->getMessage();
					exit();
				}
			
		}else{
			echo "Your password is incorrect.<br>Try again later!";
				exit();
		}
		}else{
			echo "Invalid strings!<br><br><b><i>train:question #answer #password</i></b>";
			exit();
		}
	}
	else{
		try{
			$sql = "SELECT answer FROM chatbot WHERE question LIKE '%$data%' ";

			$query = $conn -> query($sql);

			if (count($query -> fetchAll()) > 0) {
				$query2 = $conn -> query($sql);
				while ($val = $query2 -> fetch()) {
					$diffAns .= $val[0].',';

			}
			$diff = explode(',', $diffAns);
			if (count($diff) > 1) {
				//$rand = array_rand($diff);
				$rand = rand(0, count($diff)-1);
				$shwval =$diff[$rand];
				echo $shwval;
				exit();
			}else{
				echo $diff[0];
				exit();
			}			
		}else{
			echo "Sorry I do not have that command  but you can train by entering the following <br><b><i>train:question #answer #password</i></b>";
			exit();
		}			
		}catch(PDOException $e){
			echo "Error 002".$e->getMessage();
			exit();
		}
		
	}

}
?>

<?php

$result = $conn->query("SELECT * FROM secret_word LIMIT 1");
 $res = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $res->secret_word;

 $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'Adekunte Tolulope'");
 $user = $result2->fetch(PDO::FETCH_OBJ);
$name = $user-> name;
$image = $user-> image_filename;
$username = $user-> username;

?>


<!Doctype html>
<html>
   <head>
       <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
	margin-top:70px;
  text-align: center;
  font-family: arial;
}
.title {
  color: grey;
  font-size: 18px;
}
button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
button:hover, a:hover {
  opacity: 0.7;
}
#Chatbot-holder{
		position: fixed;
		right:5px;
		bottom:-345px;
		z-index: 4;
		height:410px;
		transition: 1s;
		
	}
	#Chatbot-holder:hover{
		bottom:5px;
	}
	#botImg{
		border-radius:100%;
		padding:6px;
		width:50px;
		height:50px;
		text-align: center;
		margin: auto;
	}
	#botImg > img{
		width:inherit;
		height: inherit;
		border:solid 1px black;
		border-radius: 100%;
	}

	#content{
		
		padding:10px 8px;
		margin-top: 2px;

	}
	#content > #head {
		background-color: #cccccc;
		color:black;
		text-align: center; 
		padding:10px;
	}
	#content > #head > span{
		text-shadow: 0px 0px 2px white;
		font-size: 20px;
		
		
	}
	#content > #body{
		background-color: #cccccc;
		color:black;
		text-align: center; 
		padding:10px;
	}
	#body > div{
		border:1px ridge gray;
		padding:10px auto; 
	}
	#body div code{
		text-shadow: 0px 1px 2px red;
	}
	#body #inpBut{
		display: flex;
	}
	#body #ans{
		padding: 10px 2px;
		overflow-y: auto;
		height:100px;
	}
	#body .ques{
		width:50%;
		background-color:rgba(50,70,200,0.8); 
		padding: 4px 0px;
		text-align: left;
		border-radius: 8px;
		text-indent: 3px;
	} 
	#body .ans{
		width:50%;
		background-color:rgba(50,200,70,0.8); 
		padding: 4px 0px;
		margin-left:50%;
		text-align: right;
		border-radius: 8px;
		padding-right: 1px;

	}
	#body #inpBut input{
		width:100%;
		border:none;
		padding:10px;
		background-color: rgba(0,0,0,0.7);
		color:white;
		text-shadow: 0px 0px 1px navy;
	}
	#body #inpBut button {
		padding:10px;
		color:navy;
		text-shadow: white;
		background-color: rgba(200,200,200,0.8);
		box-shadow: 0px 0px 4px 2px black;
	}
	#foot{
		text-align: center;
		letter-spacing: 3px;
		font-weight:bolder;
		background-color: #cccccc;
		color:black;
		text-shadow: 0px 0px 2px black;
		padding:10px;
	}
	
       
</style>
    </head>
<body>



<div class="card">
  <img src="<?php echo $image; ?>" alt="Profile Pic">
  <h1><?php echo $name; ?></h1>
  <p class="slack username"><?php echo $username; ?></p>
  <p class="title">Programmer</p>
  <p>HNG Internship</p>
  <div style="margin: 24px 0;">
  
    <a href="#"><i class="fa fa-whatsapp"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-instagram"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>


<div id="Chatbot-holder">
	<div id="botImg">
		<img src="http://pitdesk.com/vi/jkh/images/top-img.png">
	</div>
	<div id="content">
		<div id="head">
			<span>CHATBOT</span>
		</div>
		<div id="body">
			<div>STRINGS TO TRAIN:<br>
				<small>
					<code>train:questions #answers #password</code>
				</small>
			</div>

			<div id="ans">
			
				
			</div>
			<div id="inpBut">
				<input type="text" id="botInp" placeholder="Enter Question">
				<button onclick="processR()">Submit</button>
			</div>
		</div>
		<div id="foot">
		<kbd>ADTREX</kbd>
		</div>
	</div>
</div>

<script type="text/javascript">
var no = 0;
	function processR(){
		
		if (document.getElementById('botInp').value != '') {
			var x = new XMLHttpRequest();
		var url = 'profiles/Adekunte Tolulope.php';
		var data = document.getElementById("botInp").value;
		var vars = "bot_adekunte="+data;no++;
		document.getElementById('ans').innerHTML+='<div><div class="ques">'+data+'</div></div>';
		document.getElementById('ans').innerHTML+='<div><div class="ans" id="id'+no+'"></div></div>';
		x.open("POST", url, true);
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		x.onreadystatechange = function(){
			if (x.readyState == 4 && x.status == 200) {
				var return_data = x.responseText;
				setTimeout(function(){
					document.getElementById("id"+no).innerHTML= return_data;
				document.getElementById("botInp").value = '';
				},1000);
				
			}
		}
			x.send(vars);

			document.getElementById("id"+no).innerHTML="loading..."
		}
}
</script>	
</body>
</html>
