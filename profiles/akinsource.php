<?php 
	if(!defined('DB_USER')){
	require "../../config.php";
	try {
		$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("<br><br><br>Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
		}
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

   	$result2 = $conn->query("Select * from interns_data where username = 'akinsource'");
   	$user = $result2->fetch(PDO::FETCH_OBJ);
}
?>

<?php

	function tryout($str,$dbcon) {
		$tryout = $dbcon->query("Select * from chatbot where question='$str'");
		$tryout = $tryout->fetch(PDO::FETCH_OBJ);
		return $tryout;
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
			require "../answers.php";
			$name = test_input($_POST["inputw"]);
		
	// collect value of input field
    try {
	if (empty($name)) {
        $reply = "Ask me a valid question";
		echo json_encode($reply);
		return;
	} elseif (strtolower($name) === 'aboutbot'){
        $reply = "Alfred version 1.05";
		echo json_encode($reply);
		return;	
	} elseif (strtolower($name) == 'alfred'){
        $reply = "Yes. How may I be of assistance?";
		echo json_encode($reply);
		return;
	} elseif (stripos($name, 'countdown') === 0 ) {
		 $dater = substr(strstr($name," "), 1);
		echo json_encode(count_akin($dater));
		return;
    } elseif (stripos($name, "Train")===0 && count(explode(':',$name))==2 && count(explode('#',$name))==3) {
		$bits1 = substr(strstr($name,":"), 1); //fixed the training spec
		$bits = explode('#',$bits1);
		$que = trim($bits[0]);
		$answ = trim($bits[1]);
		if (trim($bits[2])=== 'password') {
			$sqlins = "Insert into chatbot (question, answer) values ('$que', '$answ')";
			$sqlins = $conn->prepare($sqlins);
			$sqlins->bindParam(':question', $que);
			$sqlins->bindParam(':answer', $answ);
			$sqlins->execute();
			$reply = "New record created successfully";
			echo json_encode($reply);
			return;
		} else {
			$reply = "Your password is incorrect!";
			echo json_encode($reply);
			return;
			}
	} elseif (stripos($name, "Train")===0) {
		$reply = "You have entered an invalid command";
		echo json_encode($reply);
		return;
	} elseif (tryout($name, $conn)) {										
		$stuff =  $conn->query("select count(question) as cnt from chatbot where question = '$name'");
		$stuff = ($stuff->fetch(PDO::FETCH_OBJ));
		if (($stuff->cnt)>1) {// fixed random choice for questions with multiple answers
			$ans = ($conn->query("SELECT answer FROM chatbot WHERE question LIKE '$name' order by rand() LIMIT 1" ))->fetch(PDO::FETCH_OBJ);
			$ans = $ans->answer;
			echo json_encode($ans);
			return;
		} else {
			$ans = $conn->query("Select answer from chatbot where question = '$name'");
			$ans = $ans->fetch(PDO::FETCH_OBJ);
			$reply = tryout($name, $conn)->answer;
			echo json_encode($reply);
			return;
		}
	} else {	
		$reply = "It appears I do not know the answer!";
		echo json_encode($reply);
		return;			
	}
	} catch (PDOException $e){
		$e->getMessage();
	}

	}
	?>

<!DOCTYPE html>
<html>
<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
<style>
.scroll 
{
	width: 600px;
    	height: 300px;
    	overflow-y:auto;
	display:block;
	padding: 10px;
	background-color: #9cec9c;
	border: 5px solid;
	border-color: white;
	border-radius: 12px;
	box-shadow:5px 5px 5px grey;
	
}
.contain{
	padding: 20px 20px 0px 20px;
	width: 100%;
	height: 380px;
	background-color:#ce9fe8;
	border-radius: 12px;
	margin:auto;
	font:roboto;
}
.hid{
	display:none;
}
.text_input{
	width: 520px;
	padding:10px;
	border-radius: 12px;
	font:20px roboto;
}
.butto{
	background-color:#9cec9c;
	border:none;
	padding:10px;
	text-align:center;
	display:inline-block;
	border-radius: 12px;
	border: 2px solid #4CAF50;
	color:white;
}
.divid{
	height:2px;
}
.butto:hover {
    	color:green;
	border: 2px solid #ff5733;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.butto:active {
  <!--background-color: #3e8e41;-->
  	box-shadow: 0 5px #666;
  	transform: translateY(4px);
}
.message {
	margin-bottom: 5px; 
	border-radius: 5px;
	min-height: 60px;
	
}
.chat2 {
	background-color: #99ff33;
	padding: 10px;
	text-align: left;
	border-radius: 12px;
	width: 75%;
	box-shadow:5px 5px 5px grey;
	display:block;
	float: left;
}
.chat1 {
	background-color: #6699ff;
	padding: 10px;
	text-align: right;
	border-radius: 12px;
	width: 75%;
	box-shadow:5px 5px 5px grey;
	display:block;
	float: right;
}	
</style>
<body style="padding:0; margin:0;">
<div div class="oj-panel oj-panel-alt4 oj-sm-margin-2x demo-mypanel oj-panel-shadow-md">
<table border="0" cellpadding="0" cellspacing="0" style="margin: 0; padding: 0;" width="100%">
    <tr>
        <td align="center" valign="top" bgcolor="#fff">
			<table width="640" cellspacing="0" cellpadding="0" bgcolor="#" class="100p">
                <tr>
                    <td background="images/header-bg.jpg" bgcolor="#f6546a" width="640" valign="top" class="100p">
                                <div class="oj-flex">
								    <table width="640" border="0" cellspacing="0" cellpadding="20" class="100p">
                                        <tr>
                                            <td valign="top">
                                                
                                                <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="color:#FFFFFF; font-size:24px;">
                                                            <font face="'Roboto', Arial, sans-serif">
                                                                <span style="font-size:44px;">Akinsource</span><br />
                                                                <br />
                                                                <Span style="font-size:24px;">Coder Extraordinaire!<br />
                                                                HNG Intern</Span>
                                                                <br /><br />
																

                                                                <table border="0" cellspacing="0" cellpadding="10" style="border:2px solid #FFFFFF;">
                                                                    <tr>
                                                                        <td align="center" style="color:#FFFFFF; font-size:16px;"><font face="'Roboto', Arial, sans-serif"><a href="https://github.com/akinsource" style="color:#FFFFFF; text-decoration:none;">Portfolio</a></font></td>
                                                                    </tr>
                                                                </table>

                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
													<tr> 
													<td>
													<img width="600" src="<?php echo $user->image_filename ?>" alt="Akinsource"><br/>
													</td>
													</tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<script>

function showHint(str) {//display training hint
	if (str.length == 0) { 
        document.getElementById("ask").innerHTML = "";
        return;
    } else {
        document.getElementById("ask").innerHTML = "Hint: To train me <b>'Train: Question # Answer # Password'</b>";

    }
}
function placeHolder() {//display Ask me questions in textBox
  document.getElementById("add").placeholder = "";
}
function hide() {//hide chat interface
	var s = document.getElementById("siri");
	var d = document.getElementById("deep");
    if (s.style.display === "block") {
	s.style.display = "none";
	d.innerHTML = " Collective knowledge of a lot of bots!";
    } else {
	s.style.display = "block";
	d.innerHTML = " I can show you time from present moment till any date! Try 'countdown January 1 2019'";
    }
}
</script>
<button onclick="hide(3000)" class="butto">Click Me</button><span id="deep"> Collective knowledge of a lot of bots!</span>
<div class="oj-panel oj-panel-alt4 oj-sm-margin-2x demo-mypanel oj-panel-shadow-md hid" align="center" id="siri">
<code>Meet my butler!</code>
<div class="scroll oj-selected" id="view">
<p class="message chat2"><b>Hello my name is Alfred!</b><br>I can show you time from present moment till any date! Try 'countdown January 1 2019'</p>
<p class="message chat2">To train me <b>'Train: Question # Answer # Password'</b></p>
   </div>
   <div class="divid"></div>
   <div id="ioi">
<form id="input-form">
   <input type="text" id="add" class="text_input" name="userinputs" onkeyup="showHint(this.value)" placeholder="Ask me questions" onfocus="placeHolder()">
   <button type="submit" id="btn" class="butto">Send</button>
 </form>
	</div>
	</div>
<p><span id="ask"></span></p>
<!--<?php print_r('$user') ?>-->


<h3><i>Time is of the essence!</i></h3>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

   
<script>
$(document).ready(function(){
	$("#input-form").submit(function(e){
		e.preventDefault();
		var inputw = $("#add").val();
		$( "#view" ).append('<p class = "chat1">'+inputw+'</p>');
		$.post("profiles/akinsource.php",
			{inputw:inputw},
			function(response, status){
				//alert(response);
				var replies = response.replace(/\"/g, "");
				$( "#view" ).append('<p class = "chat2">'+'<b>Alfred: </b>'+replies+'</p>');
				$("#view").scrollTop($("#view")[0].scrollHeight);
            }//,
			//function(error){
			//	alert(error);}
				);
        });
	});
</script>
</body>
</html>
