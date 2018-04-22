<?php



	class Jamila {


		private static $_states = [

			'hasName',
			'trainVerify',
			'trainMode'

		];






		public static function handleMessage($message){


			self::checkStates();

			self::_profanityCheck($message);


			$state = self::_getCurrentState();
			if($state == 'hasName'){


				self::_replyToName($message);



			} elseif($state == 'trainVerify'){

				if(trim($message) != 'trainpwforhng'){


					$response = [
						"Nope. Try again?",
						"Nope. Try again?",
						"Nope. Try again?",
						"Chai, na wa ooo",
						"Chai, na wa ooo",
						"Keep trying. You'll probably get it when you get gray hairs",
						"Keep trying. You'll probably get it when you get gray hairs",
						"Keep trying. You'll probably get it when you get gray hairs",
						"Keep trying. You'll probably get it when you get gray hairs"
					];

					self::_reply($response[rand(0, count($response) - 1)]);


				} else {


					$_SESSION['trainVerify'] = 'set';
					self::_reply("Hehe. It was you, after all (*winks). Now, enter train # question # answer to teach me something new, And hey, keep your keyboard plugged in. ");
					

				}




			} elseif($state == 'trainMode') {


				if(strstr($message, '#')){

					$bits = explode('#', $message);

					if(count($bits) != 3){


						self::_reply("You're certainly missing something. The format is train # question # answer. Try again?");

					} else {






					foreach ($bits as $index => $bit) {


						if($index == 1) $bit = str_replace('?', '', $bit);						
						$bits[$index] = trim($bit);






					}


					if($bits[0] != 'train'){

						self::_reply('You need to sart your training command with "train", without the quotes of course. Go again?');


					}




					$sql = DB::prepare('INSERT INTO 
						chatbot(id, question, answer)
							VALUES
						("jamila",:question, :answer)

						');
					$sql->execute([
						'question' => $bits[1],
						'answer' => $bits[2]

					]);

					if($sql->rowCount() == 1){


						$response = [
							"Thanks, I got that.",
							"Great! Now simply ask your question and see how I perform.",
							


						];

						self::_reply($response[rand(0, count($response) - 1)]);

					} else {


						self::_reply(" I couldn't save that. Please try again in a moment.");


					}
 	









				} 

				


			}   else {





					//Use trained functions

				$sql = DB::prepare('SELECT answer FROM chatbot WHERE question = :question AND id = "jamila"');
					$sql->execute([
						'question' => $message

					]);

					if($sql->rowCount() == 1){


						self::_reply(ucfirst($sql->fetch(PDO::FETCH_ASSOC)['answer']));

					} else {

						$response = [
							"Um...is that a new command? If so, enter \"train # question # answer\" so I can store it in my warehouse, ahem, storage space.",
							"Sorry, But I don't know how to answer that. Train me, maybe?",
							"I no sabi. Teach me how to answer that,"
							


						];

						self::_reply($response[rand(0, count($response) - 1)]);


						self::_reply();


					}






				}


			} else {

				self::_reply("I'll pretend I didn't see that");

			}


		}

















		private static function _profanityCheck($message){


			$badWords = implode(',', Badwords::getBadWords());
			$message = strtolower($message);
			$bits = explode(' ', $message);


			foreach ($bits as $word) {
				if(strstr($badWords, $word)){

					$replies = [

						'Hey! Watch your mouth!',
						'The way you talk, yo mama would be ashamed. I\'m sure she taught you better',
						'Yuck! So dirty.',
						"I'll reply I didn't see that"

					];

					self::_reply($replies[rand(0, count($replies) - 1)]);





				}

			}


		}


























		private static function _replyToName($name){

			$name = trim($name);

			if(strlen(trim($name)) > 15){

					self::_reply('Look look look. Long names like yours give me headaches. Sit quietly for 5 minutes, then try a shorter name. I don\'t want to take headache pills, eh?');


			} elseif(strstr(trim($name), ' ')) {

			
				$response = `Is that really a name? If it is, a single word will do. If it's not, that'll be N50 for time wasting. Gimme your wallet or...just try again.`;

				self::_reply($response);


			} else {


				if(strtolower($name) == 'jamila'){

					$begin = 'Hmmm...Namesake. If';
					$name = 'namesake';

				} else {

					$begin = 'Hi '.ucfirst($name).'. If';

				}

				$_SESSION['hasName'] = $name;
				self::_reply($begin.' you would like to train me...wait a minute. I need to know you\'re not a ghost (there\'s a chill in the air, isn\'t there?). Please enter your training password.');


			}


		}
















		private static function checkStates(){


			foreach (self::$_states as $state) {

				if(!isset($_SESSION[$state])) $_SESSION[$state] = false;


			}


		}















		private function _getCurrentState(){

			foreach (self::$_states as $key => $state) {
				
				if($_SESSION[$state] === false) return  $state;

			}



		}


















		private function _reply($message){

			die(json_encode([


				'message' => $message

			]));

		}






	}