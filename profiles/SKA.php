<?php

	if(!defined('DB_USER')){
		require "../../config.php";
		try {
			 $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			 die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
    }

    function get_location($ip_address){
		$arr = array();
        $arr = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_address));
		if(is_array($arr)){
			if($arr['geoplugin_status']  == 404)return Null;
			return ($arr['geoplugin_city'] . " " . $arr['geoplugin_countryName']);
		}else return Null;
    }
    
    function askQuestion($que){
		// include "config.php";
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$sql = "SELECT answer FROM chatbot where question = '".$que."';";
		// $que_query = $conn->query($sql);
        // $que_query->setFetchMode(PDO::FETCH_ASSOC);
		// $que_result = $que_query->fetch();
		// if(isset($que_result['answer'])){
		// 	$numRes = $que_query->rowCount();
		// 	if($numRes > 1)$ans = "Multiple answers found!";
		// 	else $ans = $que_result['answer'];			
		// }else $ans = "No answer found. Please train me.";
		
		$result = $conn->query($sql)->fetchAll();
		$num = count($result);
		if($num > 0){
			if($num > 1){
				$ran = random_int(0, $num-1);
				$ans = $result[$ran]['answer'];
			}
			else $ans = $result[0]['answer'];			
		}else $ans = "No answer found. Please train me.";
		return $ans;
	}

	function saveTraining($question, $answer){
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$sql = "INSERT into chatbot (question, answer) VALUES (:question, :answer);";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':question', $question);
		$stmt->bindParam(':answer', $answer);
		$stmt->execute();
		echo "Saved Successfully....";
    }

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$que = $_POST['que'];
		// aboutbox
		if($que === 'aboutbot'){
			echo "Skybot 1.2";
			return;
        }
        // set secret word
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();
		// train
		if(strncasecmp($que, "train:", 6) == 0){
			// check for nonempty and #
			$qa = trim(substr($que, 6));
			// echo stristr($qa, "#", true);
			// return;
			if(strlen($qa) == 0 || stristr($qa, "#") === FALSE) {
				echo "Incorrect train format.<br/>Pls use train:question#answer#password";
				return;
			}
			$question = trim(stristr($qa, "#", true));
			$ans_pass = substr(trim(stristr($qa, "#")), 1);
			if(stristr($ans_pass, "#") === FALSE){
				echo "Incorrect train format.<br/>Pls use train:question#answer#password";
				return;
			}
			$answer = trim(stristr($ans_pass, "#", true));
			$password = substr(trim(stristr($ans_pass, "#")), 1);
			// check for non-empty que, ans  and password
			if(strlen($question) === 0 || strlen($answer) === 0 || strlen($password) === 0){
				echo "Incorrect train format.<br/>Pls use train:question#answer#password";
				return;
			}
			if($password !== 'password'){
				echo "Incorrect training password<br/>Use 'password'";
				return;
			}
			// strip ? (question mark)
			$len = strlen($question);
			if(substr($question, $len-1) == "?"){
				$question = substr($question, 0, $len-1);
			}
			saveTraining($question, $answer);			
			return;
		}
		// strip ? (question mark)
		$len = strlen($que);
		if(substr($que, $len-1) == "?"){
			$que = substr($que, 0, $len-1);
		}
		// direct responses
		$myname = array("what is your name","name", "your name", "who are you");
		if(array_search($que, $myname)){
			echo "My name is Skybot.<br/><br/>What is yours?";
			return;
        }
        
        // find visitor location
        if(stristr($que, "where am i")){
			$location = get_location($_SERVER['REMOTE_ADDR']);
            if(!is_null($location))echo "You are in ". $location;
            else echo "Sorry, I couldn't get that...";
            return; 
        }

		// find location of ip
		if(stristr($que, "where is")){
            $que = strtolower($que);
			$ip = trim(str_replace("where is", "", $que));			
			$location = get_location($ip);
			if(!is_null($location))echo $location;
            else echo "Sorry, I couldn't get that...";
			return;
        }
		
		// check from db
		echo askQuestion($que);
		return;
	}
		
	
	// $sql = "SELECT * FROM secret_word LIMIT 1";
    // $q = $conn->query($sql);
    // $q->setFetchMode(PDO::FETCH_ASSOC);
    // $data = $q->fetch();
	// $secret_word = $data['secret_word'];
	
	// $sql2 = "SELECT * from interns_data WHERE username = 'SKA'";
    // $q2 = $conn->query($sql2);
    // $q2->setFetchMode(PDO::FETCH_ASSOC);
    // $row = $q2->fetch();
	
	// $name = $row['name'];
	// $username = $row['username'];
	// $imageUrl = $row['image_filename'];
	try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="SKA"';
        $query_my_intern_db = $conn->query($sql_queryname);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
    }
    catch (PDOException $exceptionError) {
        throw $exceptionError;
   }

        $secret_word = $query_result['secret_word'];
        $name = $intern_db_result['name'];
        $username = $intern_db_result['username'];
        $imageUrl = $intern_db_result['image_filename'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>STAGE 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<style type="text/css">
            html{height: 95%}
            body { height: 100%; display: flex; flex-flow: column nowrap;   }
            #header, #footer{ height: 110px; flex:0 0 auto; padding-top: 60px;  display: flex; flex-flow: row nowrap; justify-content: center; }
            #middle{ width: 100%;}
            #image{ width: 300px; height: 250px; flex:1 1 auto; }
			.flex{display: flex; flex-flow: row nowrap; justify-content: space-between; width: 100%}
			.label{width: 40%;}
			.value{width: 60%;}
			.msgDiv{display: flex; flex-flow: row nowrap; margin-bottom: 2px;}
			.msgText{float: left; width:350px; margin-right: 10px}
			.msgTime{float: right; min-width: 100px; max-width: 100px; font-style: italic; text-align: right;}
            #profile{
				width: 300px; margin: auto;
			}
			#chatbot{
				width: 400px; margin: auto;
			}
			@media only screen and (min-width : 700px){
				#middle{ 
					width: 400px; height: auto; margin-right: auto; margin-left: auto; display: flex;
				flex-flow: row nowrap; justify-content: center; }				
			}
        </style>
		<script type="text/javascript">
			
			var inputFld;
			var chatArea;

			function sendQue(que){

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						addMsg(this.responseText, 1);
					}
				}
				xhttp.open("POST", "http://old.hng.fun/profiles/SKA.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("que="+que);

			}

			function keydown(e){
				var code = (e.keyCode ? e.keyCode : e.which);
				if(e.keyCode == 13){
					var msg = inputFld.value.trim();
					if(msg.length === 0)return false;
					else {
						//add to chatArea
						addMsg(msg, 0);
						
						//make ajax request
						sendQue(msg);
						return true;
					}
					return false;
				}								
			}

			function getCurrentTime(){
				d = new Date();
				time = d.toLocaleTimeString().slice(0,5);
				hr = time.split(":")[0] * 1;
				if(hr >= 12){
					ampm = "pm";
					if(hr > 12) {
						hr = hr - 12; 
					}
				}else{
					ampm = "am";
					if(hr === 0){
						hr = 12;
					}
				}
				return hr + ":" + time.split(":")[1] +" "+ampm;
			}

			function addMsg(msg, type){
				row = document.createElement('div');
				row.setAttribute("class", "msgDiv");
				if(type === 1)row.setAttribute("style", "background-color: lightgray");
				msgText = "<div class=\"msgText\">"+msg+"</div>";	
				
				msgTime = "<div class=\"msgTime\">"+ getCurrentTime()+"</div>";		
				row.innerHTML = msgText + msgTime;
				chatArea.appendChild(row);
				chatArea.scrollTop = chatArea.scrollHeight;
				inputFld.value = "";
			}

			function resReceived(msg){
				addMsg(msg, 1);
			}
		
		</script>
    </head>
    <body>
		<br/>
        <div id="header">
            <h3 style="">HNG INTERNSHIP 4</h3>              
        </div>
		<div id="middle">
			<div class="profile" >
				<div id="image"  style="background-image: url(<?php echo $imageUrl ?>); background-size: cover; background-repeat:   no-repeat;
						 background-position: center center; -webkit-background-size: cover; -moz-background-size: cover;
						 -o-background-size: cover; width: 250px; margin-right: auto; margin-left: auto;"  >           
				</div>
				<br/>
				<div class="flex">
					<div class="label">Names:</div>
					<div class="value"><?php echo $name; ?></div>
				</div>
				<div class="flex">
					<div class="label">Username:</div>
					<div class="value"><?php echo $username; ?></div>
				</div>
			</div>
			<div class="chatbot" style="border: 1px solid green; padding: 1px;">
				<div id="chatArea" style="width: 100%; background-color: cream; height: 365px;  overflow: auto" >
					
				</div>
				<div id="inputDiv" style="height: 30px;" >
					<input id="inputFld" style="width: 100%; border: 1px dashed;" onKeydown="keydown(event);">

					</input>
				</div>
			</div>
		</div>        		
			
        <div id="footer">
            
		</div> 
		<script type="text/javascript">
			inputFld = document.getElementById("inputFld");
			chatArea  = document.getElementById("chatArea");
			welcome = "Welcome, my name is Skybot.<br/>Ask me any question and I will do my best to provide"+
			" an answer.<br/>Type \"where am i\" and i will try and locate you.<br/> Type where is {ip_address} and I will try "+
            " to find the location of the IP Address provided.<br/>Train me using <span style=\"color: blue\">train:question#answer#password</span>";
			addMsg(welcome, 1);
		</script>
    </body>
</html>