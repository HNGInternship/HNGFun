<!DOCTYPE html>
<html>
<head>
	<title>Nelson's Profile</title>
</head>
<body style="text-align: center; font-family: cursive;">

	<!--      ====================           CONNECTION    AND QUERY  ============                 -->
<?php
include ('../config.example.php');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$link){
  echo "couldn't connect";
}
else{
  echo "connected";
}


$qq = "select * from interns_data";
$result = mysqli_query($link, $qq);
$row2 = mysqli_fetch_array($result);


?>

	<table align="center" width="100%">
		<tr>
			<td>
				
		<div  style="margin:30px 0 0 20%; border:1px solid gray; width: 60%; height: 500px; min-width: 300px; min-height: 300px" align="left" class="whole-content">
		<img style="max-width: 200px; max-height: 200px; border-radius: 8px; margin:30px 0 0 30px;" src="profile.jpg">

		<div style="padding-left: 30px">
			<h1>Nelson Bassey</h1>
							<!--       ==================          SECOND QUERY      ================                 -->
				    <p> <?php

				   $q = "select secret_word from secret_word";
				      $result = mysqli_query($link, $q);
				      $row = mysqli_fetch_array($result);
				      $secret_word = $row['secret_word'];

				      echo 'Secret Code is:  '. $secret_word;
				    ?></p>
			<p><b>Country:</b> Nigeria</p>
			<p style="width: 250px"><b>Education:</b>Computer Science student at African Leaderahip University, Rwanda.</p>
			<p><b>Interest:</b> Technology | Music</p>
			<p><b>Skills:</b> Python | HTML/CSS | JavaScript</p>

		</div>
	</div>

	</td>

	<td align="right">
		<div>
			
			<div  style="margin:30px 20% 0 0; border:1px solid gray; width: 50%; height: 500px; min-width: 300px; min-height: 300px" align="center" class="whole-content">
				<h3 style="margin-left: 15px; color: navy">I'm Alice, Nelly's smart bot</h3>
				<p>(Are you bored? chat with me)</p>
				<hr>

				<div id="bot-display" style="background-color:; height: 300px; width: 90%; overflow: scroll;">
					<p>To train me: <br>
					Tell me the question first by typing: <em><b>#your question</b></em><br>
					Tell me the answer by typing: <em><b>@the answer</b></em><br>
					Then see if I am smart as I said: Ask by typing <br><em><b>?your question</b></em></p>
				</div>

				<div style="width: 100%; position: relative; top: 30px;">
					<table>
						<tr>
							<td style=" width: 80%">					
								<input id="input" style="width: 100%; height: 30px" type="text" name="input">
							</td>
							<td >
								<button id="send" style="width: 100%; height: 35px; background-color: navy; color: white; border:none;">Send</button>
							</td>
						</tr>
					</table>
				</div>
		
			</div>
		</div>
	</td>
		</tr>
	</table>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#send').click(function(){
				//
				var input = $('#input').val();
				//alert(input);
				$('#bot-display').load('bot-load.php', {
					question: input
				});

			});

		});
	</script>
</body>
</html>