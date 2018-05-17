<?php

if(!defined('DB_USER')){
     require "../../config.php";
     try {
         $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
     } catch (PDOException $pe) {
         die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
     }
   }
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$question;

global $pass;
	$pass = "password";

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
	
	function botAnswer($message){
		$botAnswer = '<div class="chat bot chat-message">
					<img src="data:image/jpeg;base64,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" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>' . $message . '</p>';
			return $botAnswer;
	}


	function train($dbcon, $data){
		$trainCheck = $dbcon->prepare("SELECT * FROM chatbot WHERE question LIKE :question and answer LIKE :answer");
		$trainCheck->bindParam(':question', $data['question']);
		$trainCheck->bindParam(':answer', $data['answer']);
		$trainCheck->execute();
		$result = $trainCheck->fetch(PDO::FETCH_ASSOC);
		$rows = $trainCheck->rowCount();
			if($rows === 0){
			$trainQuery = $dbcon->prepare("INSERT INTO chatbot (id, question, answer) VALUES(null, :q, :a)");
			$trainQuery->bindParam(':q', $data['question']);
			$trainQuery->bindParam(':a', $data['answer']);
			$trainQuery->execute();
			$bot = botAnswer("Thanks for helping me be better.");

		}elseif($rows !== 0){
			$bot = botAnswer("I already know how to do that. You can ask me a new question, or teach me something else. Remember, the format is train: question # answer # password");
		}
		echo $bot;
	}
	
		
	
	 	$userInput = strtolower(trim($_POST['question']));
	 	if(isset($userInput)){
	 		$user = $userInput;
	 		 //array_push($_SESSION['chat-log'] , $user);
	 	}
	 	
	 	if(strpos($userInput , 'train:') ===0){
	 		list($t, $r ) = explode(":", $userInput);
			list($trainquestion, $trainanswer, $trainpassword) = explode("#", $r);
			$data['question'] = $trainquestion;
	 		$data['answer'] = $trainanswer;
	 		if($trainpassword === $pass){
	 			$bot = train($conn, $data);
	 			//array_push($_SESSION['chat-log'] , $bot);
	 		}else{
	 			$bot = botAnswer("You have entered a wrong password. Let's try that again with the right password, shall we?");
	 			//array_push($_SESSION['chat-log'] , $bot);
	 		}
	 		
	 	}elseif($userInput === 'about' || $userInput === 'aboutbot'){
	 		$bot = botAnswer("Version 1.0");
     		//array_push($_SESSION['chat-log'] , $bot);
	 	}else{
			 $userInputQuery = $conn->query("SELECT * FROM chatbot WHERE question like '".$userInput."' ");
		     $userInputs = $userInputQuery->fetchAll(PDO::FETCH_ASSOC);
		    $userInputRows = $userInputQuery->rowCount();
		     if($userInputRows == 0){
		     	$bot = botAnswer("I am unable to answer your question right now. But you can train me to answer this particular question. Use the format train: question #answer #password");
		     //	array_push($_SESSION['chat-log'] , $bot);

		     }else{
		     	$botAnswer = $userInputs[rand(0, count($userInputs)-1)]['answer'];
		     	$bot = botAnswer($botAnswer);
		     	//array_push($_SESSION['chat-log'] , botAnswer($botAnswer));
		     }
     	}
     	echo $bot;

     	exit();
     }

?>

<!DOCTYPE html>
<html lang ="en-US"> 
<head>
    <title>Tonistacks Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Federant" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
   
    <style>

    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}

       .header-top{
           height: 500px;
           background-color: #0A356F;

       }

          /* Custom, iPhone Retina */ 
    @media only screen and (min-width : 320px) {
        .header-top{
            height: 400px;
        }
}

/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
    .header-top{
            height: 400px;
        }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
    .header-top{
            height: 480px;
        }
}



       .top-5{
        margin-top: 5rem!important;
       }

       
       .full-bio{
        position: absolute;
        width: 80%;
        /* margin-top: 10rem; */
        text-align: center;
       }
       

       .profile img{
           height: 200px ;
           width: 200px ;
           border: 6px solid rgba(0, 0, 0, 0.4);
       }

                /* Custom, iPhone Retina */ 
        @media only screen and (min-width : 320px) {
            .profile img {
        height: 120px;
        width: 120px ;
    }
}
       .full-name {
        font-family: Federant;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 50px;
        color: #FFFFFF;
     }


        @media only screen and (min-width : 320px) {
            .full-name {
           font-size: 25px;
    }
        }

     .ux{
        font-family: Didact Gothic;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 25px;
        color: #FFFFFF;
     }
     .location{
        font-family: Galada;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 20px;

        color: #FFFFFF;
     }
     .about{

     }

     .about p{
         padding: 5px;
     }

     .title{
        font-family: Franklin Gothic Medium;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 30px;
        color: #000000;
        border-bottom: 0px dotted #000000;
        border-bottom-width: 6px;
        text-align: center;
     }
/***********************
CHAT CSS

**************/

/* .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 400px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

div.panel-heading#accordion {
    background-color: #007bff;
    text-align: center;
    color: white;
}

span.chat-img img {
    width: 100px !important;
    border-radius: 100%;
} */

	/* ---------- chat-box ---------- */

        ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

    #chat-box {
			bottom: 0;
			font-size: 12px;
			right: 24px;
			position: fixed;
			width: 300px;
		}
		#chat-box header {
			background: #0572ce;
			border-radius: 5px 5px 0 0;
			color: #fff;
			cursor: pointer;
			padding: 16px 24px;
		}
		#chat-box h4, #chat-box h5{
			line-height: 1.5em;
			margin: 0;
		}
		#chat-box h4:before {
			background: #12c53b;
			border-radius: 50%;
			content: "";
			display: inline-block;
			height: 8px;
			margin: 0 8px 0 0;
			width: 8px;
		}
		#chat-box h4 {
			font-size: 12px;
		}
		#chat-box h5 {
			font-size: 10px;
		}
		#chat-box form {
			padding: 10px;
		}
		#chat-box input[type="text"] {
			border: 1px solid #ccc;
			border-radius: 3px;
			padding: 8px;
			outline: none;
			
		}
		header h4{
			color: #fff;
		}
		.chat {
			background: #fff;
					
		}
			.hide{
			display: none;
		}
		.chatlogs {
			height: 252px;
			padding: 5px 5px;
			overflow-y: scroll;
		}
		.chat-message {
			margin: 16px 0;
		}
		.bot img {
        border-radius: 50%;
        float: left;
        width: 45px;
        height: 45px;
        border: 4px solid #878c90;
        }
		.bot .chat-message-content{
			margin-left: 40px;
			border-radius:0  15px 15px 15px;
			background: #e4e4e4;
			padding: 15px 10px;
		}
		.user .chat-message-content {
            margin-right: 40px;
            border-radius: 15px 15px 0 15px;
            background: #0572ce;
            padding: 15px 10px;
            color: white;
        }
		.user img{
			border-radius: 50%;
			float: right;
            width: 45px;
            height: 45px;
            border: 4px solid #878c90;
		}
		.chat-message-content {
			/*margin-left: 56px;*/
		}
		.bot .chat-time {
			float: right;
			font-size: 10px;
		}
		.user .chat-time {
			float: right;
			font-size: 10px;
		}

    </style>
    
</head>

<body>

<div class="container-fluid header-top">

<div class="full-bio">
<div class="d-flex justify-content-center top-5">
                    <img src="http://res.cloudinary.com/tonistack/image/upload/c_scale,h_150,w_150/v1526118744/32186506_190330148270134_8580498699174543360_n.jpg" class="rounded-circle w-25 h-25 img-fluid profile">              
                </div>


   <h1 class="full-name">Mcdonald Aladi </h1>

<div class="ux">Frontend Developer, UI & UX Developer</div>
 <div class="location"> <i class="fa fa-map-marker-alt"></i> Lagos,Nigeria</div>

</div>

</div>


<div class="container-fluid mt-5 card">
<div class="title">About Me</div>
<div class="about ">
<p> A UI and UX designer with an eye for design, development and a strong desire to learn and create.</p>
<p>I firmly believe in life long learning and I'm constantly exploring new ideas and technologies. MOOC's have enabled me to update my skills and keep abreast of the latest trends in design and coding.</p>
</div>

</div>

<!-- <div class="top-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"><i class="fa fa-comment"></i></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span>  </span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse show" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form action="profiles/tonistack.php"  method="post">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <!-- <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button> -->
                                <!-- <input class="btn btn-warning btn-sm"  id="btn-chat" type="submit" value="Submit">
                        </span>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>  -->
<div id="chat-box">	
		<header class="clearfix" onclick="change()">
			<h4>Online</h4>
		</header>
		<div class="chat hide" id="chat">
			<div class="chatlogs" id="chatlogs">
				<div class="chat bot chat-message">
					<img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHMAcwMBIgACEQEDEQH/xAAbAAEAAgIDAAAAAAAAAAAAAAAABQYBBAIDB//EADgQAAEDAwIDBgQDBwUAAAAAAAEAAgMEBRESIQYxURNBYXGBoRQiMkIHUtEVFmJykbHBI0RTwuH/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAhEQEBAAIDAAICAwAAAAAAAAAAAQIRAyExBBIiQQUyYf/aAAwDAQACEQMRAD8A9xREQERdNTURUsD553hkUY1Oce4Jboc5pWQxOllcGRsBLnHkAoqZ81SxtRUVDqClDtTGDaR4/izy/lG/XoK+3jSjvF0+EpqOpfSU4Mr5nBoY9w+kc84zv5gdyxLUy3Go1zybHkCdvRTUyiN268dW+hqDTxU89RIBvpw0e/6LatXEzq+nE7rbPExx+X5w4kde5QN5p7LaqR1bcKcPkfsxgJDpHdP/AFV2O+8UVrA6z0j4aVnysbBCzQAO7U/n6LGMz+1+16SbenzfDXVjYxNLFIx2puk6XA4PXnzXbRTyiV1JV47dg1NeBgSt/MB3HqO7yIXnFBxxUxVAoeJaR0bhuJhEY5I/4tP3Dxb7qbv/ABlb7JHSOuMj5KprxJTmFmrto9g7fkNj13OFvUl20vKLStN0pbtRx1dE8uieARkYI8wt1JZZuG9iIioIiIMoiICgeObbUXfhG6UNECamWA9iA7Tl43aM+YCnl1zu0QyP/K0n2QeGmWfhfg2BsjC24z47QPH0PcM4I/hAxjqF1TcG3H4eCru9fCyepcAyKQOe/JxgE7AHcbeI8lv8YUFVd6SRlFG6WeCUTBjeZABB/oDn0UzQ8VcM8QWiJl8nbTzx7vY92ktdgasZGCDgFZz+2vx9T9dIqi4VuFLxFR22+O7SnbG6SMtlLmFrd3NGfp7sjxBBKuIv8dLeKa109NCXvcIy6Q6WjbOGgDYAKlXLjej/AHlt8tujcbbQsdENWcyB+A4778hzO+5PRWs260357K6GoMrThxMWkn1BBLXe2yxyfez8S7/SR/EOy09w4dqJ4o2CqpmulgcMDD2gnGehxpPgfJeTcQUdXduDaKvoQ6WW3TSROYBlzoTh2w79ORt0z0V44+4mo7fYXWO3uHbyxfDsihdqMLXDBc4jk7BIA5kkHGF1W20/szhqjbVZZVtlDwwfnfnU0/yx8/H0XWK2fwOjr3WerqasSCme5jKYv2BDc6sdRuBn07l6YoHgiczWFjScmKV7PfI/up9SYzHqJJJOhERVRERACIiAuEukxuD/AKSMHyWZJGRMc+RwaxoyXOOAAqpfeImVVHNT26KocD/u/oY0tIO2dyfIY8UHl944qk4e4rr6KeKdrIZXCKRwIL2dztue3gtF0nBtzm7WSZ1HK85cIpg0E/yuG3or7R1hvEL6e801NWMYdu1iaf8AGFwqOAOGKw6xbGwuP/FI9o/oDj2QRlnh4KpaWWFrYqjtm6XyTSte7Hgc7emFGVXDvDhkLqS/TU8Z+x5Y/HrqHupiT8J7HI7VH27PATfq0rEf4QWxzzpnk2GTql6+TPBBpWn9zeHpRUfHMqqpv0SzzM+Q9WtBxnx3K1rtxxbGh4pHunkwdxlxPrsArBB+EtnY7L3nbxef8hSEXA1htjDJHFl4Gchob77n3QWTgRtKywQilqO2e89pOTsWyOAJbjuxy9FYlXeDmRR09SIGNYwvGMeSsSAiIgIiIMLKwsoKvxP8VXV8FBCwmnjb2suTgPdk6WnqNs48QkdnYbZM+s+ap7IhjMnTFgHAHXzXZUTH9qTtkJDg7YHp3KShljLMOwRjCDz+zs0zTt6DKs9McsaoKKP4W9Swnk7I/RTdNs0Dog34ytK/V8luo31EWNQDRv0LwP8AstuMrQ4hpWVtKKaRzmtlaRqbzBDmuHuFjkmVwsx9S+dN2lqjJTNe7GXMaTheW8cXqSpu8sEut8ELgyOBrsB7zyz6r0OD/RgbFqLtLA3J78BU/iThCS8VhloiO0eclpON+ue5am9dq5/h7VXSw1Uz6yildQzs3ipnNk0vDgA7GfMeO3ReoW27UVzYTSTBzm/UwjDm+YKqXDfBht1qaytrKh1dq1doxw0sHcMd/Vca233KhdFXwCN9TTnIMZ+aRve0g88qi+ouunlbPBHNHuyRoc3yO67EBERBhZWFlBG3a3fFs7SLAnaNjy1eB/VQ2m4RtOukl254CtaIKFe6Ooip47qBqa1w1Fo5DHPy8VvU0jZY2Ss+l4yMK3EAjBG3RU7i2KltNE+pt8Ignc8NaGEhhOcnLRtyB5LGecwm6uONt1EhGV1XQZp2O/I/J9QR+irNBfLhJSumkYzA5Y+7dZN/q6s/DCNrdf3Ag4x4Y8F5L/I/Gm95ef5XafG5brpKOfspK3MEDyHn5yA5U2Ctqm3WGK4Fhp9QD2jI1NPr3K7V8AihZLTtbG1g0ho5HoPZd+L5HHy/0c8+PLD1JmoaWjOFF1szdyT7rSfUzMGHxSNJ2wW7rdt9qkq3CWsa5kXMMOxP6f3XdhM2txfb4HOzuwc+nctpYaA1oa0AAbABZQEREGFlYQIMoiIC0bnbqS4RiKrhbI3O2ruW8utwBdh3opZL6bs8VK42OOjpH09L8sZ9lCWyzOFY2TL9TTsS9X+rpjINnHHitSnoXNdzA36L43L8bXJZJ69vHzSYd+uukslGHCplhjdL1Iz/AHU01jQ0ABcGx4ADiSubDkL6vDxY8eMkeTLK5XtyREXVkREQEREGEREBZREBcPlI+ZJNWNloTiQE4JRG6dI5PwsAgcnj+ih5DUdwSM1GdwU0JsAHm7K5ciMKNiMvQrehDvuQdqIiKIiICIiDCBZRAREQFgtB5gIiDj2bD9oQRsH2hEQctIHILKIgIiICIiAiIg//2Q==" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>Welcome.</p>
						<span class="chat-time"> </span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAHMAcwMBIgACEQEDEQH/xAAbAAEAAgIDAAAAAAAAAAAAAAAABQYBBAIDB//EADgQAAEDAwIDBgQDBwUAAAAAAAEAAgMEBRESIQYxURNBYXGBoRQiMkIHUtEVFmJykbHBI0RTwuH/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAhEQEBAAIDAAICAwAAAAAAAAAAAQIRAyExBBIiQQUyYf/aAAwDAQACEQMRAD8A9xREQERdNTURUsD553hkUY1Oce4Jboc5pWQxOllcGRsBLnHkAoqZ81SxtRUVDqClDtTGDaR4/izy/lG/XoK+3jSjvF0+EpqOpfSU4Mr5nBoY9w+kc84zv5gdyxLUy3Go1zybHkCdvRTUyiN268dW+hqDTxU89RIBvpw0e/6LatXEzq+nE7rbPExx+X5w4kde5QN5p7LaqR1bcKcPkfsxgJDpHdP/AFV2O+8UVrA6z0j4aVnysbBCzQAO7U/n6LGMz+1+16SbenzfDXVjYxNLFIx2puk6XA4PXnzXbRTyiV1JV47dg1NeBgSt/MB3HqO7yIXnFBxxUxVAoeJaR0bhuJhEY5I/4tP3Dxb7qbv/ABlb7JHSOuMj5KprxJTmFmrto9g7fkNj13OFvUl20vKLStN0pbtRx1dE8uieARkYI8wt1JZZuG9iIioIiIMoiICgeObbUXfhG6UNECamWA9iA7Tl43aM+YCnl1zu0QyP/K0n2QeGmWfhfg2BsjC24z47QPH0PcM4I/hAxjqF1TcG3H4eCru9fCyepcAyKQOe/JxgE7AHcbeI8lv8YUFVd6SRlFG6WeCUTBjeZABB/oDn0UzQ8VcM8QWiJl8nbTzx7vY92ktdgasZGCDgFZz+2vx9T9dIqi4VuFLxFR22+O7SnbG6SMtlLmFrd3NGfp7sjxBBKuIv8dLeKa109NCXvcIy6Q6WjbOGgDYAKlXLjej/AHlt8tujcbbQsdENWcyB+A4778hzO+5PRWs260357K6GoMrThxMWkn1BBLXe2yxyfez8S7/SR/EOy09w4dqJ4o2CqpmulgcMDD2gnGehxpPgfJeTcQUdXduDaKvoQ6WW3TSROYBlzoTh2w79ORt0z0V44+4mo7fYXWO3uHbyxfDsihdqMLXDBc4jk7BIA5kkHGF1W20/szhqjbVZZVtlDwwfnfnU0/yx8/H0XWK2fwOjr3WerqasSCme5jKYv2BDc6sdRuBn07l6YoHgiczWFjScmKV7PfI/up9SYzHqJJJOhERVRERACIiAuEukxuD/AKSMHyWZJGRMc+RwaxoyXOOAAqpfeImVVHNT26KocD/u/oY0tIO2dyfIY8UHl944qk4e4rr6KeKdrIZXCKRwIL2dztue3gtF0nBtzm7WSZ1HK85cIpg0E/yuG3or7R1hvEL6e801NWMYdu1iaf8AGFwqOAOGKw6xbGwuP/FI9o/oDj2QRlnh4KpaWWFrYqjtm6XyTSte7Hgc7emFGVXDvDhkLqS/TU8Z+x5Y/HrqHupiT8J7HI7VH27PATfq0rEf4QWxzzpnk2GTql6+TPBBpWn9zeHpRUfHMqqpv0SzzM+Q9WtBxnx3K1rtxxbGh4pHunkwdxlxPrsArBB+EtnY7L3nbxef8hSEXA1htjDJHFl4Gchob77n3QWTgRtKywQilqO2e89pOTsWyOAJbjuxy9FYlXeDmRR09SIGNYwvGMeSsSAiIgIiIMLKwsoKvxP8VXV8FBCwmnjb2suTgPdk6WnqNs48QkdnYbZM+s+ap7IhjMnTFgHAHXzXZUTH9qTtkJDg7YHp3KShljLMOwRjCDz+zs0zTt6DKs9McsaoKKP4W9Swnk7I/RTdNs0Dog34ytK/V8luo31EWNQDRv0LwP8AstuMrQ4hpWVtKKaRzmtlaRqbzBDmuHuFjkmVwsx9S+dN2lqjJTNe7GXMaTheW8cXqSpu8sEut8ELgyOBrsB7zyz6r0OD/RgbFqLtLA3J78BU/iThCS8VhloiO0eclpON+ue5am9dq5/h7VXSw1Uz6yildQzs3ipnNk0vDgA7GfMeO3ReoW27UVzYTSTBzm/UwjDm+YKqXDfBht1qaytrKh1dq1doxw0sHcMd/Vca233KhdFXwCN9TTnIMZ+aRve0g88qi+ouunlbPBHNHuyRoc3yO67EBERBhZWFlBG3a3fFs7SLAnaNjy1eB/VQ2m4RtOukl254CtaIKFe6Ooip47qBqa1w1Fo5DHPy8VvU0jZY2Ss+l4yMK3EAjBG3RU7i2KltNE+pt8Ignc8NaGEhhOcnLRtyB5LGecwm6uONt1EhGV1XQZp2O/I/J9QR+irNBfLhJSumkYzA5Y+7dZN/q6s/DCNrdf3Ag4x4Y8F5L/I/Gm95ef5XafG5brpKOfspK3MEDyHn5yA5U2Ctqm3WGK4Fhp9QD2jI1NPr3K7V8AihZLTtbG1g0ho5HoPZd+L5HHy/0c8+PLD1JmoaWjOFF1szdyT7rSfUzMGHxSNJ2wW7rdt9qkq3CWsa5kXMMOxP6f3XdhM2txfb4HOzuwc+nctpYaA1oa0AAbABZQEREGFlYQIMoiIC0bnbqS4RiKrhbI3O2ruW8utwBdh3opZL6bs8VK42OOjpH09L8sZ9lCWyzOFY2TL9TTsS9X+rpjINnHHitSnoXNdzA36L43L8bXJZJ69vHzSYd+uukslGHCplhjdL1Iz/AHU01jQ0ABcGx4ADiSubDkL6vDxY8eMkeTLK5XtyREXVkREQEREGEREBZREBcPlI+ZJNWNloTiQE4JRG6dI5PwsAgcnj+ih5DUdwSM1GdwU0JsAHm7K5ciMKNiMvQrehDvuQdqIiKIiICIiDCBZRAREQFgtB5gIiDj2bD9oQRsH2hEQctIHILKIgIiICIiAiIg//2Q==" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>I am here to help you.</p>
						<span class="chat-time"></span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="data:image/jpeg;base64,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" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>You can ask me questions, and I will do my best to answer. You can train me to answer specific questions. Just make use of the format train: question # answer # password.</p>
						<span class="chat-time"></span>
					</div> 
				</div>

				
				 
				<div id="chat-content"></div>
				
			</div> <!-- end chat-history -->
			<form action="#" method="post" class="form-data">
				<fieldset>
					<input type="text" placeholder="Type your message…" name="question" id="question" autofocus>
					<input type="submit" class=" btn-primary" name="bot-interface" value="SEND"/>
				</fieldset>
			</form>
		</div> <!-- end chat -->
	</div> <!-- end chat-box -->


	<script >
		
		
		function change(){
			document.getElementById("chat").classList.toggle('hide');
			
    }
     var btn = document.getElementsByClassName('form-data')[0];
		var question = document.getElementById("question");
		var chatLog = document.getElementById("chatlogs");
		var chatContent = document.getElementById("chat-content");
		var myTime = new Date().toLocaleTimeString(); 
		document.getElementsByClassName('chat-time')[0].innerHTML = myTime;
		document.getElementsByClassName('chat-time')[1].innerHTML = myTime;
		document.getElementsByClassName('chat-time')[2].innerHTML = myTime;
		btn.addEventListener("submit", chat);


		function chat(e){
		    if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
			     var xhttp = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 6 and older
			  var  xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		   
			xhttp.onreadystatechange = function() {
	          if(this.readyState == 4 && this.status == 200) {
	          	// console.log(this.response);
	          	 userChat(question.value, this.response);
     			e.preventDefault();
	            question.value = '';
	          }
      	    }
        xhttp.open('POST', 'profiles/tonistack.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ question.value);
        e.preventDefault();
		}

		function userChat(chats, reply){
			if(question.value !== ''){
				var chat = `<div class="chat user chat-message">
					<img src="http://placehold.it/45/000000/fff&text=ME" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>` + chats + `</p>
						<span class="chat-time">` + new Date().toLocaleTimeString(); + `</span>
					 </div>
				</div>`;
			}
			chatContent.innerHTML += chat;
		     
		    setTimeout(function() {
			    chatContent.innerHTML += reply + `<span class="chat-time">`+ new Date().toLocaleTimeString(); +` </span>
					</div> 
				</div>`;
				document.getElementById('chatlogs').scrollTop = document.getElementById('chatlogs').scrollHeight;	
			}, 1000);
		}
	</script>
	
</body>
</html>