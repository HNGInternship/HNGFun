<?php


try {
    $sql = "SELECT * FROM interns_data WHERE username ='Olusegun'";

    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $name = $data['name'];
	$username = $data['username'];
	$image_filename = $data['image_filename'];
} catch (PDOException $e) {
    throw $e;
}

try {
    $sql2 = 'SELECT * FROM secret_word';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $data2 = $q2->fetch();
    $secret = $data2['secret_word'];
} catch (PDOException $e) {
    throw $e;
}




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Olusegun's Profile</title>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal">
    
</head>
<body>
	<table border="0">
	 <tr>
			<td class="pic">
				<img src="<?php echo($image_filename); ?>" class="avatar">
			    <h2><?php echo $name ?></h2>
			    <h3><?php echo '@'.$username ?></h3>
			    <div class="skills">
			    	<p>Frontend Developer || UI/UX Enthusiast</p>
			    </div>
		</td>
		<td class="info">
			<div class="subinfo">
    	     <p style="margin-top: 0px;">
    	     	<span class="glyphicon glyphicon-house"><h2>Abilities</h2></span>
    	     </p>
    	     <ul style="float: left; padding-bottom: 20px; list-style: none;">
    	      <li>
					 <div class="progress">
					  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
					  aria-valuemin="0" aria-valuemax="100" style="width:95%">
					    HTML/CSS
					  </div>
				    </div>
			  </li><br>
    	      <li>
    	      			<div class="progress">
						  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
						  aria-valuemin="0" aria-valuemax="100" style="width:82%">
						    Javascript
						  </div>
						</div>
    	      </li><br>
    	      <li>
    	      	<div class="progress">
					  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
					  aria-valuemin="0" aria-valuemax="100" style="width:73%">
					    PHP 
					  </div>
				</div>
			  </li><br>
    	      <li>
    	      	<div class="progress">
						  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
						  aria-valuemin="0" aria-valuemax="100" style="width:87%">
						    React JS
						  </div>
				</div>
    	      </li>
    	      <li>
    	      	<!--  <div class="accounts">
					<a href="#"><i class="fa fa-facebook fb"></i></a>
					<a href="#"><i class="fa fa-github git"></i></a>
					<a href="#"><i class="fa fa-twitter twi"></i></a>
		         </div>
 -->
    	      </li>
    	   </ul><br>
    	     
            </div><br>
            
        </td>

	</tr>
		
	
	</table>

	<!-- <div class="chatbot">
		<p class="bot-name">Spartan</p>
		<div class="text-area">
			<p class="mytext">Hi! My name is Spartan. Ask me anything! :)</p>
			<div class="input">
				<input type="text" name="message" id="message" placeholder="Ask Spartan">
				<input type="button" name="" id="send" value="Go" method= "POST">
			</div>
			

		</div>
		
	</div> -->


<style type="text/css">

     body{
     	padding-left: 300px;
     	padding-top: 100px;
     	background-color: #C1C8E4;
     	font-family: Remachine Script Personal Use;
		font-style: normal;
		font-weight: normal;
		line-height: normal;
        font-size: 20px;
     }
	.avatar{
		border-radius: 300px;
		height: 250px;
		padding: 10px 20px 10px 20px;
	}
	.info{
		background-color: #F64C72;
		width: 400px;
		text-align: center;
		color: white;
		font-family: Tajawal;
		font-style: normal;
		font-weight: 800;
		line-height: normal;
	}
	.pic{
		width: 400px;
		text-align: center;
		background-color: rgba(0,0,0,0.5);
		color: white;
	}
	table{
		border-style: none;
		outline-width: 0px;
		height: 500px;
		border-collapse: collapse;
		border-radius: 5px;

	}
	.accounts{ padding-top: 40px; }
	.accounts a {padding-left: 20px; height: 50px; }
	.fb { color: #00aced; background-color: white; width: 25px; border-radius: 105px; float: center; }
	.twi { color:  #1dcaff; background-color: white; width: 25px; border-radius: 105px; float: center;}
	.git { color: #4078c0; background-color: white; width: 25px; border-radius: 105px; float: center;}
	.subinfo { width: 400px; }
	.progress {width: 300px;}
	.chatbot {background-color: rgba(0,0,0,0.5); margin-left : 230px; height: 600px; width: 350px; border-radius: 10px; }
	.bot-name { text-align: center; color: white; margin-top: 10px; font-size: 30px; }
	.text-area {background-color: white; height: 500px; width: 320px; margin-left: 15px; }
	 #message {  margin-left: 10px; height: 25px; width: 240px; border-radius: 15px; border-bottom-color: red;border: 1px solid black; margin-bottom: 20px; vertical-align: bottom;}
	 #send { height: 30px; width: 30px; margin-left: 10px; background-color: green; border-radius: 15px; color: white; border: none; }
	 .mytext {background-color: #F64C72; color: white; height: 25px; border-radius: 10px;}
	 .input { vertical-align: bottom; background-color: black; position: relative; }
</style>	
    

</body>
</html>