<?php
//Fetch User Details
if(!defined('DB_USER')){
  require "../../config.php";		
  try {
	  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } 
  catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}
 global $conn;


if ($_SERVER['REQUEST_METHOD'] === "GET") {
		try {
		    $query = "SELECT name,username,image_filename,secret_word FROM secret_word, interns_data WHERE username ='john'";
		    $resultSet = $conn->query($query);
		    $result = $resultSet->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e){
		    throw $e;
		}
		$username = $result['username'];
		$fullName = $result['name'];
		$picture = $result['image_filename'];
		//Fetch Secret Word
		$secret_word =  $result['secret_word'];
	}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


// to if the post request is not empty 
	function before ($thiss, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $thiss));
}
 function after ($thiss, $inthat)
{
    if (!is_bool(strpos($inthat, $thiss)))
    return substr($inthat, strpos($inthat,$thiss)+strlen($thiss));
 }
 function between ($thiss, $that, $inthat)
    {
    return before ($that, after($thiss, $inthat));
    }
function after_last ($thiss, $inthat)
     {
        if (!is_bool(strrevpos($inthat, $thiss)))
        return substr($inthat, strrevpos($inthat, $thiss)+strlen($thiss));
    }
   //use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
}
function training($check)
{
    $password="password";
    $newquestion= between(':', '#', $check);
    $newanswer= between('#', '#', $check);
    $newpassword= after_last('#', $check);
    if ($password==$newpassword)
        {
            try {
                    $sql = "INSERT INTO chatbot (id, question, answer) VALUES ('', '$newquestion', '$newanswer')";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    $res = "Thanks for training me";
                    return $res;
                }
            catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage();
                    }
        }
    else
        {
            $res = "Please enter a password and train me using train:question#answer#password this should be without space";
            return $res;
        }
}
function getAns($check)
 {
    $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question= '$check' ORDER BY rand() LIMIT 1");
    $stmt->execute();
    if($stmt->rowCount() > 0)
    {
      while($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
            $res=$row["answer"];
            return $res;
      }
    }
    else {
        $res="I don't seem understand what you asked. But you can train me.<br>Type<br>train:question#answer#password";
        return $res;
    }
}

  try{
        if(!isset($_POST['question'])){
          echo json_encode([
            'status' => 1,
            'answer' => "Please provide a question"
          ]);
          return;
        }

        require '../answers.php';
      
        $questions = $_POST['question'];
        $question = strtolower($questions);

        $question = preg_replace( '/\s+/','', $question);


        if (preg_match("/^train:/", $question)) 
        {

            $res = training($question);
            echo json_encode([
            'status' => 1,
            'answer' => $res
            ]);
//             return;
           
        }

        elseif (preg_match("/^about/", $question)|| preg_match('/^version/',$question)) 
        {
           echo json_encode([
            'status' => 1,
            'answer' => "ChatBuddyv1.0"
            ]);
            return;      
        }

        elseif (preg_match("/^currency/", $question)){

            $from_currency= between("(", "," , "$question");
            $to_currency= between(",", "," , "$question");
            $amt= between(",", ")" , "$question");
            $amount= (float)$amt;
            $res= currencyConverter($from_currency,$to_currency,$amount);
            echo  json_encode([
                'status'=>1,
                'answer'=> $res
            ]);
            return;
        }

        elseif(preg_match("/^weather/", $question))
        {

            $country=between("(", ",", $question);
            $city= between(",", ")", $question);
            $res= weather($country,$city);
            echo json_encode([
                'status'=>1,
                'answer' =>$res
            ]);
            return;
        }
        elseif(preg_match("/^citytime/", $question))
        {

        	$city =between("(",")",$question);
        	$res= cityTime($city);
            echo json_encode([
                'status'=>1,
                'answer' =>$res
            ]);
            return;


        }

        elseif(preg_match("/^help/", $question))
        {
        	echo json_encode([
                'status'=>1,
                'answer' =>`The following are the available commands<br>
                To Train: train:question#answer#password<br>
                To convert currency: currency(fromCurrency,toCurrency,amount)<br>
                To check weather: weather(country,city)<br>
                To check time of any city: cityTime(Continent/city)`
            ]);
            return;
        }

        else{

            $res= getAns($question);
            echo json_encode([
            'status' => 1,
            'answer' => $res
            ]);
            
            return;  

        
        }
	}


     catch (Exception $e)
    {

       return $e->message ;
  
    }


  }
?>



<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<style>
			.card {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			}

			.title {
			  color: grey;
			  font-size: 18px;
			}

			a {
			  text-decoration: none;
			  font-size: 22px;
			  color: black;
			}

			 a:hover {
			  opacity: 0.7;
			}
			#modalbtn{
				position: absolute;
				display: fixed;
				top:50%;
			}
			 .modalButton {
		      border-radius: 6px;
		      background-color: #008080;
		      border: none;
		      color: #ffffff;
		      text-align: center;
		      font-size: 20px;
		      padding:20px;
		      margin-right: 20px;
		      transition: all 0.6s;
		      cursor: pointer;
		      bottom: 5%;
		      right: 0;
		      position: fixed;
		      z-index: 1;
		      box-shadow: 0 2px 3px 0 rgba(0,0,0,0.2);
		    }

    .modalButton:hover {
      background-color: #ffffff;
      color: #008080;
    }

    .convoArea {
      position: relative;
      overflow: auto;
      overflow-x: hidden;
      padding: 0 35px 92px;
      border: none;
      max-height: 300px;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      -webkit-flex-direction: column;
      flex-direction: column;
    }

    .bubble {
      font-size: 16px;
      position: relative;
      display: inline-block;
      clear: both;
      margin-bottom: 8px;
      padding: 13px 14px;
      vertical-align: top;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }
    .bubble:before {
      position: absolute;
      top: 19px;
      display: block;
      width: 8px;
      height: 6px;
      content: '\00a0';
      -moz-transform: rotate(29deg) skew(-35deg);
      -ms-transform: rotate(29deg) skew(-35deg);
      -webkit-transform: rotate(29deg) skew(-35deg);
      transform: rotate(29deg) skew(-35deg);
    }
    .bubble.you {
      float: left;
      color: #fff;
      background-color: #00b0ff;
      -webkit-align-self: flex-start;
      align-self: flex-start;
      -moz-animation-name: slideFromLeft;
      -webkit-animation-name: slideFromLeft;
      animation-name: slideFromLeft;
    }
    .bubble.you:before {
      left: -3px;
      background-color: #00b0ff;
    }
    .bubble.me {
      float: right;
      color: #ffffff;
      background-color: #008080;
      -webkit-align-self: flex-end;
      align-self: flex-end;
      -moz-animation-name: slideFromRight;
      -webkit-animation-name: slideFromRight;
      animation-name: slideFromRight;
    }
    .bubble.me:before {
      right: -3px;
      background-color: #008080;
    }

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6" style="background-color: #f9f9f9">
				<h2 style="text-align:center; padding-top: 50px; padding-bottom: 10px">My Profile Card</h2>

				<div class="card">
				  <img src="http://res.cloudinary.com/digitalstead/image/upload/v1523614823/john.jpg" alt="John picture" style="width:100%; height: 250px">
				  <h3 style="padding-top: 10px;"><?php echo $fullName ?></h3>
				  <h6><?php echo 'Slack name:  '. $username ?></h6>
				  <p class="title">FrontEnd Developer</p>
				  <p>Bootstrap, Materialize and Angular</p>
				  <div style="margin: 24px 0; padding-bottom: 20px">
				    <a href="#"><i class="fab fa-twitter-square"></i></a>  
				    <a href="#"><i class="fab fa-linkedin-square"></i></a>  
				    <a href="#"><i class="fab fa-facebook-square"></i></a> 
				    <a href="#"><i class="fab fa-github-square"></i></a>
				  </div>
				</div>		
			</div>
			
					 <!-- convoArea dialog -->
		    <button class="btn modalButton" data-toggle="modal" data-target="#exampleModal"><i class="fab fa-android" style="font-size: 48px"></i></button>
		    <!-- Modal -->
		    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		      <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">
		          <div class="modal-header" style="background-color:#008080">
		            <h5 class="modal-title" style="color: white;">ChatBuddy<i class="fab fa-android" style="font-size: 20px"></i></h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <div class="convoArea">
		              <div class="bubble you">
		                  Hello, hi there?
		              </div>
		              <div class="bubble you">
		                  You can ask me question, get facts or time?
		              </div>
		              <div class="bubble me">
		                  To see a list of things i can do type help
		              </div>
		            </div>
		          </div>
		          <div class="modal-footer">
		            <form class="form-inline" id="senderRequest">
		              <div class="form-group mx-sm-3 mb-2">
		                <input type="text" class="form-control" id='que' name="question" placeholder="Say Something ..." style=" float:left;width: 350px">
		              </div>
		              <button type="submit" class="btn btn-primary mb-2" name="submit" style="margin-left: 20px;">Send</button>
		            </form>
		          </div>
		        </div>
		      </div>
		   
			</div>
		</div>
	</div>
	

 <script src="../vendor/jquery/jquery.min.js"></script>

  <script>
	$(document).ready(function(){
		let questionForm = $('#senderRequest');
		questionForm.submit(function(e){
			e.preventDefault();
			let question = $('input[name=question]').val();
      let convoAreabox = $('.convoArea')

			//display question in the message frame as a convoArea entry
			let newMessage = `<div class="bubble me">
                  ${question}
              </div>`;

			convoAreabox.html(`${convoAreabox.html()} ${newMessage}`);
      		convoAreabox.scrollTop(convoAreabox[0].scrollHeight);
			//send question to server
			$.ajax({
				url: '/profiles/john.php',
				type: 'POST',
				data: {question: question},
				dataType: 'json',
				success: (response) => { 
          let newMessage = `<div class="bubble you">
                          ${response.answer}
                      </div>`;

          convoAreabox.html(`${convoAreabox.html()} ${newMessage}`);
          convoAreabox.scrollTop(convoAreabox[0].scrollHeight);
          $('#que').val("");						
				},
				error: (error) => {
          alert('error occured')
					console.log(error);
				}
			})
		});
	});
</script>	


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>
</html>
