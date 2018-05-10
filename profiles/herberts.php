


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<!--<div id="google_translate_element">
						
					</div>
					<select onchange="googleTranslateElementInit()">
						<option>English</option>
						<option>Igbo</option>
						<option>Hausa</option>
						<option>Yoruba</option>
					<h4 class="modal-title" id="myModalLabel">Trask</h4>
					</select>-->
					<button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">×</button>
				</div>

				<div class="modal-body">
					<div class="chats" id="chats">
					</div>
				</div>

				<div class="modal-footer">
					<div class="input-group">
						<input type="text" id="message" class="form-control" placeholder="Enter Message" autofocus>

						<!--<span class="input-group-btn">
							<button class="btn btn-success" id="send" type="button" onclick="sender()"><i class="fa fa-send"></i></button>
						</span>-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {

	        $("#modalButton").click(function() {
	            $(".chats").html('');
	            intro();
	        });


	        $('#message').keydown(function(e){
	            if(e.which == 13){
	            	var message = $("#message").val().trim();

	            	var HtimeNow = "Karfe nawa?";
					var Hnigeria = "Game da Nigeria.";
					var Hhow = "Ya ka ke?";
					var HmyIp = "Mene ne IP na?";
					var Hanything = "Me zan samu ne?";
					var Hexit = "Kashe";

					// Igbo version
					var ItimeNow = "Gini n'a ku?";
					var Inigeria = "Maka Nigeria.";
					var Ihow = "Kedu?";
					var ImyIp = "Gini bu IP m?";
					var Ianything = "O nwere ihe i choro i nye m?";
					var Iexit = "Mechie";

					// Yoruba version
					var YtimeNow = "Kila'agon so?";
					var Ynigeria = "Nipa ilu Nigeria.";
					var Yhow = "Bawo ni?";
					var YmyIp = "Kini IP mi?";
					var Yanything = "Sai oni inkokon fummi?";
					var Yexit = "Ti";

					// English version
					var timeNow = "What time is it?";
					var nigeria = "About Nigeria.";
					var how = "How are you?";
					var myIp = "What is my IP?";
					var anything = "Do you have anything for me?";
					var exit = "Exit";
					var Eexit = "Close";

					var answer;

		function train(message) {
			if (message.length > 7) {
				answer = "Thank you for training me. I won't forget this in a hurry.";
				
			} else {
				answer = "Sorry i couldn't be trained at this time. I would have loved it but something is wrong somewhere.";
			}
		}

					if (message.length < 1) {
	                	//alert("Your command is empty, please enter something for me.");
	                    answer = "Your command is empty, please enter something for me.";
	                } else if (message.length > 0) {
	                	if (message.toUpperCase() == timeNow.toUpperCase() || message.toUpperCase() == HtimeNow.toUpperCase() || message.toUpperCase() == ItimeNow.toUpperCase() || message.toUpperCase() == YtimeNow.toUpperCase()) {
		                    var hour = "<?= $hour = date('H', time())?>";
		               		var minute = "<?= $minute = date('i', time())?>";
		               		var now = "<?= $time = $hour.':'.$minute?>"
		               		var time = "<?= date('h:i a', strtotime(date($time)));?>";

		                    if (message.toUpperCase() == timeNow.toUpperCase()) {
		                    	answer = "The time is " + time;
		                    } else if (message.toUpperCase() == HtimeNow.toUpperCase()) {
		                    	answer = "Yanzu karfe " + time;
		                    } else if (message.toUpperCase() == ItimeNow.toUpperCase()) {
		                    	answer = "Ihe n'a ku bu " + time;
		                    } else if (message.toUpperCase() == YtimeNow.toUpperCase()) {
		                    	answer = "Merin abo " + time;
		                    }
	                    } else if (message.toUpperCase() == nigeria.toUpperCase() || message.toUpperCase() == Inigeria.toUpperCase() || message.toUpperCase() == Hnigeria.toUpperCase() || message.toUpperCase() == Ynigeria.toUpperCase()) {
	                    	if (message.toUpperCase() == nigeria.toUpperCase()) {
							 	answer = "Nigeria is a multilingual West African country with a population of over 170 million people. The current president of Nigeria is Muhammadu Buhari and his Vice President is Yemi Osibanjo. Nigeria has three major languages which are Igbo, Hausa and Yoruba.";
							 } else if (message.toUpperCase() == Inigeria.toUpperCase()) {
								answer = "Naijiria bu mba nwere otutu asusu di na odida anyanwu nke Afirika, onu ogugu ya di njere nari na iri-asaa (170 million). Aha onye na-achi obodo Naijiria bu Muhammadu Buhari. O nwere asusu ato kachasi isi nkea bu Igbo, Awusa na Yoruba.";
							} else if (message.toUpperCase() == Hnigeria.toUpperCase()) {
								answer = "Nijeriya kasa ce me yarurruka da dama a cikin Africa to yamma, ta na da mutane na kimanin million dari da saba'in (170 million). Shugaban Nijeriya a yanzu shine Muhammadu Buhari da mataimakin sa Yemi Osibanjo. Nijeriya ta na da manyan yarurruka guda uku Igbo, Hausa da Yoruba.";
							} else if (message.toUpperCase() == Ynigeria.toUpperCase()) {
								answer = "Ilu Nigeria ge multilingual West Africa orilede toni opolopo awon eniyon bi 170 million. Asiwaju orilede isinyi ne Muhammadu Buhari ilu Nigeria ni ede meta toje Igbo, Hausa, Yoruba.";
							}
	                    } else if (message.toUpperCase() == how.toUpperCase() || message.toUpperCase() == Ihow.toUpperCase() || message.toUpperCase() == Hhow.toUpperCase() || message.toUpperCase() == Yhow.toUpperCase()) {
							if (message.toUpperCase() == how.toUpperCase()) {
								answer =  "I am fine thank you.";
							} else if (message.toUpperCase() == Ihow.toUpperCase()) {
								answer = "Addim mma.";
							} else if (message.toUpperCase() == Hhow.toUpperCase()) {
								answer = "Lafiya na lau.";
							} else if (message.toUpperCase() == Yhow.toUpperCase()) {
								answer = "Alafiya ni mowa, oshun.";
							}
						} else if (message.toUpperCase() == myIp.toUpperCase() || message.toUpperCase() == ImyIp.toUpperCase() || message.toUpperCase() == HmyIp.toUpperCase() || message.toUpperCase() == YmyIp.toUpperCase()) {
							if (message.toUpperCase() == myIp.toUpperCase()) {
								answer = "Your IP address is: <?= $_SERVER['REMOTE_ADDR']?>";
							} else if (message.toUpperCase() == ImyIp.toUpperCase()) {
								answer = "IP address gi bu: <?= $_SERVER['REMOTE_ADDR']?>";
							} else if (message.toUpperCase() == HmyIp.toUpperCase()) {
								answer = "IP address din wanan yanar-gizo shi ne: <?= $_SERVER['REMOTE_ADDR']?>";
							} else if (message.toUpperCase() == YmyIp.toUpperCase()) {
								answer = "IP address se re ni: <?= $_SERVER['REMOTE_ADDR']?>";
							}
						} else if (message.toUpperCase() == anything.toUpperCase() || message.toUpperCase() == Ianything.toUpperCase() || message.toUpperCase() == Hanything.toUpperCase() || message.toUpperCase() == Yanything.toUpperCase()) {
							switch (message.toUpperCase()) {
								case anything.toUpperCase():
									answer = "Sorry, i don't have anything for you at this time but i may have something for you later.";
									break;
								case Ianything.toUpperCase():
									answer = "Iwe ewela gi, onweghi ihe m nwere m aga-enye gi ugbua mana enere m ike i nwe ihe m ga-enye gi emesia.";
									break;
								case Hanything.toUpperCase():
									answer = "Yi hakuri da ni, a yanzu kam ba ni da wani abin da zan iya bayarwa amma bari da jimawa zan iya samun wani abu.";
									break;
								case Yanything.toUpperCase():
									answer = "Ma binu, mini inkokon lasiko yi.";
									break;
								
								default:
									return "I have no idea what you mean.";
									break;
							}
						} else if (message.indexOf('train:#') >= 0 || message.indexOf('train: #')>=0){
					        train(message);
					    } else if (message.toUpperCase() == exit.toUpperCase() || message.toUpperCase() == Iexit.toUpperCase() || message.toUpperCase() == Hexit.toUpperCase() || message.toUpperCase() == Yexit.toUpperCase() || message.toUpperCase() == Yexit.toUpperCase() || message.toUpperCase() == Eexit.toUpperCase()) {
					    	$("#myModal").modal('hide');
					    } else {
	                    	answer = "I have no idea what you mean. Why don't you train me to understand this command for next time using this format <strong>train: question # answer # password</strong>";
	                    }
	                    $(".chats").append(humanMessage(message));
	                } else {
	                   	answer = "Enter a command i understand.";
	                    $(".chats").append(humanMessage(message));
	               	}

	               	$(".chats").append(botMessage(answer));
	               	$("#message").val('');
	               	$(".modal-body").animate({ scrollTop: $(".modal-body")[0].scrollHeight }, 1000);



	               	if (message.toUpperCase() == "cls".toUpperCase()) {
	               		$(".chats").html('');
	               		intro();
					} 
	            }
	        });

		});

		function intro() {
			$(".chats").append(botMessage("Hi, i am <strong>Trask</strong>. <br> I am a multilingual chat-bot created by John Herbert. I speak five (5) languages but there are things i don't know so you can train me as well. <br><strong>My commands are not case sensitive but you must use the punctuation marks.</strong>"));
		}

		function botMessage(message) {
			return "<div class=\"by-bot pull-right\"><em>Trask</em>: <br>" + message + "</div>";
		}

		function humanMessage(message) {
			return "<div class=\"by-me pull-left\"><em>User</em>: <br>" + message + "</div>";
		}
	</script>


		<style type="text/css">
			
			body{
				margin: 0 auto;
				background: #f3f3f3;
				font-size: 1.1em;
				line-height: 1.5;
			}

			a:hover {
				text-decoration: none;
			}

			br {
				margin-bottom: 10px;
			}

			ol {
				margin-top: 10px;
			}

			ol li {
				padding-top: 5px;
				padding-left: 10px;
			}

			.wrapper {
				width: 100%;
				background: transparent;
				min-height: 950px;
			}

			.profyle {
				margin: 0 auto;
				width: 90%;
				background: rgba(255, 255, 255, 0.9);
				box-shadow: 5px 5px 10px rgba(73, 78, 92, 0.5);
			}

			.prof {
				width: 100%;
				height: 250px;
				padding: 10px;
				margin: 30px 0 30px 0;
			}

			.prof .pic {
				width: 25%;
				height: 100%;
				text-align: center;
				padding: 5px;
				float: left;
				margin: 0 30px 0 0;
			}

			.pic img {
				width: 180px;
				height: 190px;
				max-width: 180px;
				max-height: 190px;
				margin-top: 10px;
				border: 5px solid rgba(73, 78, 92, 0.1);
				border-radius: 10%;
				padding: 1px;
			}

			.pic .name {
				width: 60%;
				float: right;
			}

			.name .bio {
				width: 90%;
				padding: 10px;
			}

			.left {
				width: 45%;
				float: left;
				padding: 5px;
			}

			.intros {
				width: 100%;
				background: rgba(171, 177, 22, 0.5);
				border-radius: 8px 8px 10px 10px;
				margin: 0 0 30px 0;
				box-shadow: 8px 8px 10px rgba(73, 78, 92, 0.5);
				margin-top: 20px;
				font-size: 0.8em;
			}

			.intro {
				border-radius: 0 0 10px 10px;
			}

			.body {
				padding: 5px 10px 5px 20px;
			}

			.intro-heading {
				background: rgba(255, 255, 255, 0.8);
				border-radius: 8px 8px 0 0;
				padding: 20px 0 5px 20px;
			}

			.right {
				width: 55%;
				float: right;
				padding: 10px;
				margin-top: 23px;
				max-height: 600px;
				overflow: auto;
			}

			.right .chat {
				width: 80%;
				background: rgba(171, 177, 22, 0.5);
				margin: 0 auto;
				border-radius: 5px 5px 5px 5px;
				margin-bottom: 35px;
				padding: 15px 15px 1px 15px;
				box-shadow: 8px 8px 10px rgba(73, 78, 92, 0.5);
			}

			.right .chat-hold {
				margin-top: -5px;
			}

			.right .action {
				width: 100%;
				background: #f3f3f3;
			}

			.right .chat ul li {
				display: inline-block;
				padding: 2.3% 10% 2.3% 10%;
				border-right: 3px solid rgba(171, 177, 22, 0.5);
			}

			.right .chat ul li:last-child {
				border-right: none;
			}

			.action ul {
				list-style: none;
				margin-top: 20px;
				padding: 0;
			}

			footer {
				background: rgba(73, 78, 92, 0.3);
				height: 110px;
				padding: 10px;
			}

			.by-me {
			    width: 70%;
			    height: auto;
			    padding: 10px;
			    -webkit-border-radius: 5px;
			    -moz-border-radius: 5px;
			    border-radius: 5px;
			    position: relative;
			    border: 1px solid rgba(73, 78, 92, 0.3);
			    font-size:14px;
			    margin-bottom: 20px;
			    margin-left: 3%;
			}

			.by-mee:after {
			    top: 5%;
			    left: -6%;
			    border: solid transparent;
			    content: " ";
			    position: absolute;
			    border-right-color: rgba(73, 78, 92, 0.4);
			    border-width: 10px;
			    margin-top: 15px;
			}

			.by-bot {
			    width: 70%;
			    height: auto;
			    padding: 10px;
			    -webkit-border-radius: 5px;
			    -moz-border-radius: 5px;
			    border-radius: 5px;
			    position: relative;
			    border: 1px solid rgba(73, 78, 92, 0.3);
			    font-size:14px;
			    margin-bottom: 20px;
			    margin-right: 3%;
			}

			.by-bott:after {
			    top: 5%;
			    right: -6%;
			    border: solid transparent;
			    content: " ";
			    position: absolute;
			    border-left-color: rgba(73, 78, 92, 0.4);
			    border-width: 10px;
			    margin-top: 10px;
			}

			/*===================================
				Style for chat button and panel
				08037092146!
			====================================*/

			@keyframes bounce {
				0% {
			    -webkit-transform: translateY(0);
			       -moz-transform: translateY(0);
			        -ms-transform: translateY(0);
			         -o-transform: translateY(0);
			            transform: translateY(0);
				}

				50% {
			    
			    -webkit-transform: translateY(-3px);
			       -moz-transform: translateY(-3px);
			        -ms-transform: translateY(-3px);
			         -o-transform: translateY(-3px);
			            transform: translateY(-3px);
				}

				100% {
			    -webkit-transform: translateY(0);
			       -moz-transform: translateY(0);
			        -ms-transform: translateY(0);
			         -o-transform: translateY(0);
			            transform: translateY(0);
				}
			}

			.modal input {
				font-weight: 600;
				border: none;
				border-bottom: 2px solid #4cae4c;
				border-top-right-radius: 0;
				border-bottom-right-radius: 0;
			}

			.form-control:focus {
				border-color: #4cae4c;
			  	-webkit-box-shadow: none;
			  	box-shadow: none;
			}

			.modal-footer button {
				height: 50px;
				width: 70px;
				font-weight: 600;
				border-top-right-radius: 5px;
				border-bottom-right-radius: 5px;
			}

			.modal-footer button .fa-send {
				font-size: 1.4em;
			    position: relative;
			    top: 0;
    
			    -webkit-transform: translateX(0);
			       -moz-transform: translateX(0);
			        -ms-transform: translateX(0);
			         -o-transform: translateX(0);
			            transform: translateX(0);

			    -webkit-transition: all 0.3s ease 0.2s;
			       -moz-transition: all 0.3s ease 0.2s;
			        -ms-transition: all 0.3s ease 0.2s;
			         -o-transition: all 0.3s ease 0.2s;
			            transition: all 0.3s ease 0.2s;
			}

			.modal-footer button:focus .fa-send {
			    position: relative;
			    top: -40px;

			    -webkit-transform: translateX(30px);
			       -moz-transform: translateX(30px);
			        -ms-transform: translateX(30px);
			         -o-transform: translateX(30px);
			            transform: translateX(30px);
			}

			.button {
				position: fixed;
				right: 6%;
				bottom: 10%;
			}

			.button button {
				border-radius: 50%;
				height: 60px;
				width: 60px;
				padding-left: 25%;

			    -webkit-transition: all ease 0.2s;
			       -moz-transition: all ease 0.2s;
			        -ms-transition: all ease 0.2s;
			         -o-transition: all ease 0.2s;
			            transition: all ease 0.2s;
			}

			.button button i {
				font-size: 2em;
				animation: bounce 2s;
				animation-iteration-count: 200000;
			}

			.button button:hover i {
				font-size: 2.1em;
				animation: bounce 2s;
				animation-iteration-count: 0;
			}

			.button button:focus i {
				animation: bounce 2s;
				animation-iteration-count: 0;
			}

			.modal-body {
				min-height: 420px;
				max-height: 420px;
				overflow: auto;
			}

			@media (max-width: 1089px) {

				.right .chat ul li {
					padding: 2.3% 8% 2.3% 8%;
				}

				.wrapper {
					min-height: 1080px;
				}

				.right {
					max-height: 740px;
				}
			}

		    @media (max-width: 991px) {

				.profyle {
					width: 100%;
				}

				.prof .pic {
					width: 20%;
					margin-right: 60px;
				}

				.pic img {
					width: 160px;
					height: 170px;
					max-width: 160px;
					max-height: 170px;
				}

				.left {
					width: 100%;
				}

				.right {
					width: 100%;
					float: none;
					max-height: 600px;
					margin-bottom: 40px;
				}

				.intros {
					width: 100%;
					margin-top: 10px;
				}

				.right .chat {
					width: 90%;
				}

				.right .chat ul li {
					padding: 2.3% 10% 2.3% 10%;
				}
		    }

			@media (max-width: 767px) {

				.prof .pic {
					width: 100%;
				}

				.name {
					width: 100%;
				}

				.name h1 {
					font-size: 1.8em;
				}

				.name .bio {
					width: 100%;
					padding: 5px;
				}

				.prof {
					height: 100%;
				}

				.right .chat ul li {
					padding: 2.3% 8% 2.3% 8%;
				}
			}

			@media (max-width: 470px) {

				.right .chat ul li {
					padding: 2.3% 6% 2.3% 6%;
				}

				.right {
					max-height: 400px;
				}
			}

			@media (max-width: 399px) {

				.right .chat {
					width: 100%;
				}

				.right .chat ul li {
					padding: 2.3% 4% 2.3% 4%;
				}
			}

			@media (max-width: 328px) {

				.right .chat ul li {
					padding: 2.3% 3% 2.3% 3%;
				}
			}

		</style>

		<div class="wrapper">
			<div class="container">
				<div class="content">
					<div class="profyle">
						<div class="prof">
							<div class="pic">
								<img src="http://res.cloudinary.com/dsitzw8mp/image/upload/v1523798919/face.png" onerror="this.src='images/default.jpg'" alt="Herberts" title="@herberts">
							</div>
							<div class="name">
								<h1>Herbert John</h1>
								<h3>@herberts</h3>
								<div class="bio">
									<small>
										Hardcore developer with genuine passion for coding. I love coding so much that even codes i don't know what they do gives me joy.
										<?
											$secret_word = "sample_secret_word";
										?>
									</small>
								</div>
							</div>
						</div>
					</div>

					<div class="left">
						<div class="carrier">
							<div class="intros">
								<div class="intro-heading">
									<h3>Commands</h3>
								</div>

								<div class="intro">
									<div class="body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover">
												<thead>
				                                    <tr>
				                                        <th>#</th>
				                                        <th>English</th>
				                                        <th>Igbo</th>
				                                        <th>Hausa</th>
				                                        <th>Yoruba</th>
				                                    </tr>
				                                </thead>

                                				<tbody>
                                					<tr>
                                						<td>1</td>
                                						<td>What time is it?</td>
                                						<td>Gini n'a ku?</td>
                                						<td>Karfe nawa?</td>
                                						<td>Kila'agon so?</td>
                                					</tr>
                                					<tr>
                                						<td>2</td>
                                						<td>About Nigeria.</td>
                                						<td>Maka Nigeria.</td>
                                						<td>Game da Nigeria.</td>
                                						<td>Nipa ilu Nigeria.</td>
                                					</tr>
                                					<tr>
                                						<td>3</td>
                                						<td>How are you?</td>
                                						<td>Kedu?</td>
                                						<td>Ya ka ke?</td>
                                						<td>Bawo ni?</td>
                                					</tr>
                                					<tr>
                                						<td>4</td>
                                						<td>What is my IP?</td>
                                						<td>Gini bu IP m?</td>
                                						<td>Mene ne IP na?</td>
                                						<td>Kini IP mi?</td>
                                					</tr>
                                					<tr>
                                						<td>5</td>
                                						<td>Do you have anything for me?</td>
                                						<td>O nwere ihe i choro i nye m?</td>
                                						<td>Me zan samu ne?</td>
                                						<td>Sai oni inkokon fummi?</td>
                                					</tr>
                                					<tr>
                                						<td>6</td>
                                						<td>Exit or Close</td>
                                						<td>Mechie</td>
                                						<td>Kashe</td>
                                						<td>Ti</td>
                                					</tr>
                                					<tr>
                                						<td>7</td>
                                						<td>Cls</td>
                                						<td>Cls</td>
                                						<td>Cls</td>
                                						<td>Cls</td>
                                					</tr>
                                				</tbody>
                                			</table>
                                		</div>
                                	</div>
								</div>
							</div>

						</div>
					</div>

					<div class="right">
						<div class="chat-hold">
							<div class="chat">
								I am a software developer with specialty in <i>Mobile app</i>, <i>Web app</i>, <i>Desktop app</i> and <i>Embedded Systems</i>. For Desktop app i use Java, Visual Basic 6 and VB.Net; for Web app i use Php, Java and Ruby on Rails.
								<div class="action">
									<ul>
										<li><a href="#">Like</a></li>
										<li><a href="#">Comment</a></li>
										<li><a href="#">Share</a></li>
									</ul>
								</div>
							</div>
							<div class="chat">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								<div class="action">
									<ul>
										<li><a href="#">Like</a></li>
										<li><a href="#">Comment</a></li>
										<li><a href="#">Share</a></li>
									</ul>
								</div>
							</div>
							<div class="chat">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								<div class="action">
									<ul>
										<li><a href="#">Like</a></li>
										<li><a href="#">Comment</a></li>
										<li><a href="#">Share</a></li>
									</ul>
								</div>
							</div>
							<div class="chat">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								<div class="action">
									<ul>
										<li><a href="#">Like</a></li>
										<li><a href="#">Comment</a></li>
										<li><a href="#">Share</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="button pull-right">
						<button class="btn btn-primary" id="modalButton" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-comments-o"></i></button>
					</div>
				</div>
			</div>
		</div>