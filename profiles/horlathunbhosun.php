<!DOCTYPE html>
<html>
<head>
<title>	Horlathunbhosun</title>
<link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
@import url('https://fonts.googleapis.com/css?family=Lato');

#boh1{
  text-align: center;
  font-family:'Lato', sans-serif;
  width: 300px;
}
body{

background: grey;
}
p {
  color: black;
  font-size: 20px;
}
.containerb{
  list-style-type: none;
  color: white;
  padding: 30px;
  padding-top: 200px;
  display: inline-flex;
  background: grey;
}

.contain{
  padding: 10px;
  margin: 50px;
  border-radius: 2px;
  margin-left: 80px;
}
.socialicons{
    text-align: justify;
    padding-top: 10px;
}


/****************************************chat Bot style ****************************/
.chatbox {
	width: 500px;
	min-width: 390px;
	height: 600px;
	background: #fff;
	padding: 25px;
	margin: 20px auto;
	box-shadow: 0 3px #ccc;
}

.chatlogs {
	padding: 10px;
	width: 100%;
	height: 450px;
	overflow-x: hidden;
	overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
	width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: rgba(0,0,0,.1);
}

.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: flex-start;
	margin-bottom: 10px;
}


.chat .user-photo {
	width: 60px;
	height: 60px;
	background: #ccc;
	border-radius: 50%;
}

.chat .chat-message {
	width: 80%;
	padding: 15px;
	margin: 5px 10px 0;
	border-radius: 10px;
	color: #fff;
	font-size: 20px;
}

.friend .chat-message {
	background: #1adda4;
}

.self .chat-message {
	background: #1ddced;
	order: -1;
}

.chat-form {
	margin-top: 20px;
	display: flex;
	align-items: flex-start;
}

.chat-form textarea {
	background: #fbfbfb;
	width: 75%;
	height: 50px;
	border: 2px solid #eee;
	border-radius: 3px;
	resize: none;
	padding: 10px;
	font-size: 18px;
	color: #333;
}

.chat-form textarea:focus {
	background: #fff;
}

.chat-form button {
	background: #1ddced;
	padding: 5px 15px;
	font-size: 30px;
	color: #fff;
	border: none;
	margin: 0 10px;
	border-radius: 3px;
	box-shadow: 0 3px 0 #0eb2c1;
	cursor: pointer;

	-webkit-transaction: background .2s ease;
	-moz-transaction: backgroud .2s ease;
	-o-transaction: backgroud .2s ease;
}

.chat-form button:hover {
	background: #13c8d9;
}



</style>
</head>


<?php 
   require_once ('db.php');
    $query = $conn->query("SELECT * FROM secret_word");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];


    $result2 = $conn->query("SELECT * FROM interns_data WHERE  username = 'horlathunbhosun'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
   // $user = $result2->fetch();


 ?>


<div class="container" style="padding-top: 100px;">
		<div class="row">	
	<div class="col-md-6">
		<div class="chatbox" id="boh1">
			<img src="<?php echo $user->image_filename; ?>" alt="2boh" width= "300" height="300" class="img-circle">
					<h1 style="color: black;"><?php echo  $user->name; ?></h1>
					<p style=" font-size: 30px;">(<?php echo $user->username; ?>) </p>
							<p>	(Web Developer)</p>
						<p>I love tech stuff and cools things</p>
						 <h6 style="font-size: 20px;"><b>Skills:</b>PHP(Code Igniter, Laravel)</h6>
						 <p><a href="https://github.com/horlathunbhosun" target="_blank"><i class="fa fa-github"></i></a>	</p>
						<a href="https://github.com/horlathunbhosun" target="_blank" style="color: black;" class="btn btn-success"><i class="fa fa-github"></i> Github</a>
						<a href="https://twitter.com/@horlathunbhosun" target="_blank" style="color: black;" class="btn btn-info"><i class="fa fa-github"></i> Twitter</a>
						<a href="https://www.linkedin.com/in/olulode-olatunbosun-458927135/" target="_blank" style="color: black;" class="btn btn-warning"><i class="fa fa-github"></i> Linkedin</a>
						<a href="https://web.facebook.com/olaolulode" target="_blank" style="color: black;" class="btn btn-primary"><i class="fa fa-github"></i>Facebook</a>
						
			</div>
				</div>
			<div class="col-md-6">			
			<div class="chatbox">
				<div class="chatlogs">
			<div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">What's up, Brother ..!!</p>	
			</div>
			<div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">What's up, Brother ..!!</p>	
			</div>
			<div class="chat self">
				<div class="user-photo"></div>
				<p class="chat-message">What's up ..!!</p>	
			</div>
			<div class="chat self">
				<div class="user-photo"></div>
				<p class="chat-message">A única área que eu acho, que vai exigir muita atenção nossa, e aí eu já aventei a hipótese de até criar um ministério. É na área de... Na área... Eu diria assim, como uma espécie de analogia com o que acontece na área agrícola.</p>	
			</div>
			<div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">No meu xinélo da humildade eu gostaria muito de ver o Neymar e o Ganso. Por que eu acho que.... 11 entre 10 brasileiros gostariam. Você veja, eu já vi, parei de ver. Voltei a ver, e acho que o Neymar e o Ganso têm essa capacidade de fazer a gente olhar.

				Todos as descrições das pessoas são sobre a humanidade do atendimento, a pessoa pega no pulso, examina, olha com carinho. Então eu acho que vai ter outra coisa, que os médicos cubanos trouxeram pro brasil, um alto grau de humanidade.
				</p>	
			</div>
		</div>
		<div class="chat-form">
			<textarea></textarea>
			<button>Send</button>
		</div>
	</div>


</div>

		
		</div>
	</div>	
</body>
</html>