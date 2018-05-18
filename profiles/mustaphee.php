<?php
$file = realpath(__DIR__ . '/..') . "/db.php" ;
include $file;
global $conn;
?>

<?php

if ($_SERVER['REQUEST_METHOD']  === "POST"){
	require_once("../answers.php");
		if(preg_match("/^(help)/i",$_POST['req'])){
			echo json_encode("available commands are: 'aboutbot',\n 'time',\n'train:[question]#[answer]#password");
			return;
		}
		if($_POST['req'] == "aboutbot"){
			echo json_encode("I am BOTGil. Current Version: 1.0");
		}else if(preg_match("/time/i",$_POST['req'])){
			echo json_encode(get_time());
		}
		else if(strpos(" ".$_POST['req'],'train')){
			$te = str_replace(" ","",$_POST['req']);
			
			if(!preg_match("/^train:(\w){1,}#(\w){1,}#(\w){1,}$/",$te) ){
				echo json_encode("the training format is 'train: question#answer#password'");
				return;
			}
			$exploded =preg_split("/[:#]+/",$_POST['req']);
			$question = trim($exploded[1]);

			$answer = trim($exploded[2]);

			$password = trim($exploded[3]);
			if($password == "password"){
				$sql3 = "INSERT INTO  `chatbot` (`question`, `answer`) VALUES ('". $question ."','". $answer ."')";
				$query = $conn->query($sql3);
				echo json_encode("I am learning, thank you for training me ");
					
			}else{
				echo json_encode("wrong password ".$password);
			}

		

		}
		else{
			$text=$_POST['req'];
			$sql3="SELECT * FROM chatbot WHERE question='$text ' ORDER BY RAND() LIMIT 1";
			$query = $conn->query($sql3);
			   $query->setFetchMode(PDO::FETCH_ASSOC);
			   $result3 = $query->fetch();
			$ans=$result3['answer'];

			if(isset($ans)){
				echo json_encode($ans);
			}else{
				echo json_encode("Good to know");
			}

		}

		
	   
	
exit();
}

?>


<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
    
    try {
        $sql = "SELECT * FROM interns_data WHERE username='{$_GET['id']}'";
    
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }

    $name = $data['name'];
    $username = $data['username'];
    $image = $data['image_filename'];

    try {
        $sql = 'SELECT * FROM secret_word';
        $q= $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mustapha Yusuff</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        var clicks =0 ;
        function onClick() {
            clicks += 1;
            document.getElementById("clicks").innerHTML = clicks;
        };
        </script>
    <style type="text/css">
        body {
            background-image: url(https://res.cloudinary.com/macspace/image/upload/v1524240795/1.jpg);
            background-size : cover;
        }
       
        .card {
            background-color:white;
            box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: auto;
            text-align: center;
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

    </style>


</head>
<body>
        <h1 style="text-align:center; color: springgreen; " >Who is this?</h1>
        <div class="card">
                <img src="<?php echo $image_addr; ?>" alt="Yusuff Mustapha" style="width:98%">
                <h1><?php echo $name; ?>Mustapha Yusuff</h1>
                <p class="title">Mediocre Developer & Python Evangelist</p>
                <p>Of course, I'm Social!</p>
                <a href="https://www.facebook.com/mustaphee94"><i class="fa fa-facebook"></i></a>
                <a href="https://www.twitter.com/iam_oluwamusty"><i class="fa fa-twitter"></i></a> 
                <a href="https://www.linkedin.com/in/yusuff-mustapha/"><i class="fa fa-linkedin"></i></a> 
                <a href="https://www.instagram.com/iam_oluwamusty"><i class="fa fa-instagram"></i></a> 
                <p><button type="button" onClick="onClick()"><i class="fa fa-thumbs-up">Rate My Design</i></button></p>
                <p><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span></p>
              </div>
