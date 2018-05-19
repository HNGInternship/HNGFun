<?php 
   if(isset($_GET['answer'])){
		require_once '../db.php';

		$question = safeInput($_GET['question']);
		$answer = safeInput($_GET['answer']);

		$params = array(':question' => $question, ':answer' => $answer);

		$sql = 'INSERT INTO chatbot ( question, answer )
		      VALUES (:question, :answer);';

		try {
		    $q = $conn->prepare($sql);
		    if ($q->execute($params) == true) {
		        echo json_encode([
		        	'success' => true,
		            'message' => "Thanks for training me, I can now respond to you better"
		        ]);
		    };
		} catch (PDOException $e) {
			echo json_encode([
			    'success' => false,
			    'message'    => "Error training me: "
			]);
		    throw $e;
		}
        return;
	}else if(isset($_GET['question'])){

	   require_once '../../config.php';

	   	$question = safeInput($_GET['question']);
		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
		$result = $conn->query("SELECT answer FROM chatbot WHERE question LIKE '%{$question}%' ORDER BY rand() LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
        $answer = $result->answer;
		if($answer === false){
		  $data = ['answer'=>null];
		}else
		  $data = ['answer'=>$answer];


		
		header('Content-Type: application/json');
		echo json_encode($data);
		return;
	}else {
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'olubori'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	}


		function safeInput($data){
		  $data = trim($data);
	      $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<style type="text/css">
		  #app{
		  	font-family: "Source Sans Pro", sans-serif;
		  }
		  #main {
		  	width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
		  }
		  #main > div {
		  	/*border: 1px solid red;*/
		  	width: 100%;
		  	min-height: 80vh;
		  	margin-top: 5rem;
		  }
		  #chat-box {
		  	position: relative;
		  	background: url('../img/banner-image-1.png');
		  	background-repeat: no-repeat;
	        background-position: center;
	        background-size: cover;
		  }
		  #chat-box > #human-text {
		  	position: absolute;
		  	bottom: 0;
		  	width: 100%;
		  }
		  #chat-box > header {
		  	position: absolute;
		  	top: 0;
		  	background: #F5F5F5; /* rgba(184, 196, 196, 0.5); */
		  	width: 100%;
		  }
		  #chat-box > main {
		  	overflow-y: scroll;
		  	display: flex;
		  	flex-direction: column;
		  	margin-top: 35px;
		  	position: absolute;
		  	bottom: 30px;
		  	height: 90%;
		  	width: 100%;
		
		  }
		  #chat-box > main > p{
		  	border-radius: 20px;
		  	padding: 10px;
		  	margin-top: 0.5rem;
		  	margin-bottom: 0.5rem;
		  	font-size: 15px;
		  	
		  }
		  #chat-box .human-msg {
		  	max-width: 65%;
		  	align-self: flex-end;
		  	background: #F5F5F5;
		  	margin-right: 1rem;
		  	color: #32465a;
		  }
		  #chat-box .bot-msg {
		  	background: #435f7a;
		  	color: #F5F5F5;
		  	max-width: 65%;
		  	margin-left: 1rem;
		  }
		  .suggestion {
		  	position: absolute;
		  	bottom: 30px;
		  	background: rgba(255,248,220, 0.9);
		  	width: 100%;
		  	margin-bottom: 0px;
		  	list-style: none;
		  	padding: 1rem 0 1rem 0;
		  }
		  .suggestion li {
		  	font-size: 18px;
		  }
		  .suggestion li:hover{
		  	background-color: #435f7a;
		  	cursor: pointer;
		  	color: white !important;
		  }
		  .suggestion li:hover .description {
		  	color: white;
		  }
		  .suggestion .title {
		  	font-weight: bold;
		  }
		  .suggestion .description {
		  	display: block;
	   		overflow: hidden;
	    	color: #717274;
	    	text-overflow: ellipsis;
		  }
		  ul:focus {
		  	background: #ff122d;
		  }
	      #img-container {
	      	width: 90%;
	      }
	      #profile-box {
	      	display: flex;
	      	flex-direction: column;
	      	align-items: center;
	      }
	      #profile-box a {
	      	color: #0085A1;
	      }
	      #img-container img {
	      	border-radius: 2rem;
	      }
		  @media only screen and (min-width: 993px) {
		  	#main > div {
		  	  width: 50%;
		    }
		    #menu {
		      display: none;
		    }
		    #img-container {
	      	  width: 70%
	        }
		  }
		</style>

<section id="app" class="mt-4 d-flex flex-column align-items-center">
	<!--<div id="menu">
		<a href="#">Profile</a>
		<a href="#">Chat Bot</a>
	</div>-->
     <span  id="img-container" class="col-md-5 col-sm-8 col-xs-10">
     		<img src="https://res.cloudinary.com/naera/image/upload/v1525932431/Photo_on_1-26-18_at_2.57_PM_2_xpnojm.jpg" class="img-fluid">
  	</span>
  	<h2 class="mt-4"><?= $user->name ?></h2>
  	<ul class="row justify-content-between col-md-5 col-sm-6 col-xs-9">
  		<li>
  			I KNOW GOD
  		</li>

  		<li>
  			I LOVE HUMANITY
  		</li>

  		<li>
  			I INSTRUCT COMPUTERS
  		</li>
  	</ul>
  	<p class="mt-0 text-primary"><strong>Laravel and VueJS fanatic</strong></p>
  <div id="main" class="container row flex-wrap">

  	<div id="profile-box" class="px-4 col-md-6">
  		<h4 style="align-self: flex-start;" class="mt-3">Links to some of my works</h4>
    <div class="w-100">
  		<ol>
  			<li>
				<a href="http://old.fecolartow.edu.ng/">Federal College of Land And Resources' Portal</a> - College Portal that handles admission, course registration, result checking and many other tasks
				Built with <span class="badge badge-warning">Codeigniter (PHP)</span> and <span class="badge badge-warning">Bootstrap CSS framework</span>.
  			</li>
  			<li>
				<a href="http://www.fecolartow.edu.ng/">Newer FECOLART website</a> - with additional features and more security.
				Built with <span class="badge badge-warning">Laravel (PHP)</span>, <span class="badge badge-warning">Vue.js (JavaScript)</span>, <span class="badge badge-warning">Bootstrap CSS framework.</span>
  			</li>
  			<li>
				<a href="http://bothofus.se/internal/ReimbursementForm/index.html#/">Reimbursement Form</a> - An app that aids employees to generate invoice of expenses made.
				Built with <span class="badge badge-warning">Vue.js (JavaScript).</span>
  			</li>
  			<li>
				<a href="http://zhillsystems.com/">Zhill Systems' company website</a> - Built with <span class="badge badge-warning">Bootstrap 4.</span>
  			</li>
  			<li>
  				<a href="http://naera.zhillsystems.com/">An artisan recruitment system</a> - An ongoing project for recruiting artisans within Nigeria.
  		Built with <span class="badge badge-warning">Laravel (PHP)</span>, <span class="badge badge-warning">Vue.js (JavaScript)</span>, and <span class="badge badge-warning">Vuetify.</span></li>
  		    <li>
  		       <a href="https://weconnect-ng.herokuapp.com/docs/">WeConnect</a> - An app that connects businesses and customers together. Built with <span class="badge badge-warning">Node.js</span> and <span class="badge badge-warning">REACT</span>.
  		    </li>
  		</ol>
  	</div>
  	</div>
  	<div id="chat-box" class="col-md-5">
  		<header>
  			<h4 class="text-center text-success">BORI BOT</h4>
  		</header>
  		<main ref="chat-msgs" id="chat-msgs">
  			<p v-for="msg in messages" :class="msg.human ? 'human-msg': 'bot-msg'" v-html="msg.text"></p>
  		</main>
  		<ul class="suggestion" v-show="suggestedCommands" ref="list">
  			<p class="my-0">Available commands <small>Click on any to choose</small></p>
  			<command-item v-for="(command, index) in suggestedCommands" :command="command" :key="command.key" :on-item-click="handleCommandClick"></command-item>
  		</ul>
  		<input type="text" v-model="humanMessage" class="border" placeholder="Type / followed by command you want to give e.g. /train" id="human-text" @keyup.enter="handleSubmit" />
  	</div>
  </div>
  
</section>


<script type="text/javascript">
	var app = new Vue({
	  el: '#app',
	  data: {
	    commands: [
	               {key: 'train', description: 'You can train me with this', format: '[question] [answer] [password]'}, 
	               {key: 'currenttime', description: 'I will get the current time in any location in this world', format: '[location]'},
	               {key: 'dayofweek', description: 'I will tell you the day of the week a date falls on', format: '[yyyy-mm-dd]'},
	               {key: 'aboutbot', description: 'I will tell you about me', format: ''}
	              ],
        humanMessage: '',
        choice: {command: '', message:''},
        messages: [
                    {
                    	human: false, 
                    	text: `Hi, I am Bori Bot, I can do many things. To get list of commands you can use on me just type / in the textbox`
                    }
                  ],
        info: '<h4 class="text-center">Bot is currently preparing data</h4><p class="text-center">Please wait...</p>',
        googlekey: 'AIzaSyA0W2GMiWvp-Jm7ZbpthWIoyamHpJFarts',
      },
	  computed: {
	  	suggestedCommands: function(){
	  	  let command;
	  	  let suggestion = null;  
	  	  if(this.humanMessage.startsWith('/')){
	        command = this.humanMessage.substr(1).toLowerCase();
	        if(command.length > 0){
  	          suggestion = this.commands.filter(function(cmd){
                return cmd['key'].indexOf(command) !== -1;
  	          });

  	          suggestion.length == 0 && (suggestion = null)
	        }else
	          suggestion = this.commands;
	  	  }
	  	  
          return suggestion;
	  	}
	  },
	  methods: {
	  	handleCommandClick(item){
	  	  let c = this.commands.find(function(cmd){
	  	  	        return cmd.key === item
	  	          });
	  	  this.choice.command = c.key;
	  	  this.humanMessage = '/' + c.key + ' ' + c.format;
	  	},
	  	handleSubmit: function(){
	  	  this.choice.message = this.humanMessage;
	  	  this.humanMessage = '';
          this.messages.push({human: true, text: this.choice.message});
          this.handleAnswer();
	  	},
	  	handleAnswer: async function(){
          let answer = await this.getAnswer();
          this.messages.push({human: false, text: answer});
          this.choice = {command: '', message:''};          
          $("#chat-msgs").animate({ scrollTop: $("#chat-msgs").height() }, "fast");
	  	},
	  	getAnswer: async function(){
	  		if(!this.choice.command){
	  		  this.processUnexpectedInput();
	  		}

	  		if(this.choice.message.indexOf('/') == 0 && !this.choice.command){
              return "I can't help with that please, give me a correct command";
	  		}
			switch(this.choice.command){
			  case 'aboutbot':
			    return 'Bori Bot Version 1.0, I tell day of the week from date, and I can tell time in any location too.';
			  case 'dayofweek':
			    return this.getDayFromDate();
			  case 'currenttime':
			    return this.getCurrentTime();
			  case 'train':
			    return this.doTrainBot();
			  default:
			    return this.doChat();
			}


            
	  	},
	  	getDayFromDate: function(){
	  		var date;
	  		try{
	          date = this.choice['message'].match(/\[(\d{4}-\d{2}-\d{2})\]/)[1];
	  		}catch(ex){
	  		  return "Follow the correct syntax /dayofweek [yyyy-mm-dd]";
	  		}

	  		date = new Date(date);
	      
	      	return `<h4>${this.getDayOfWeek(date.getDay())}</h4><p class="my-0">${this.getMonthOfYear(date.getMonth())} ${date.getDate()},  ${date.getFullYear()}</p>`;
	  	},
	  	getDayOfWeek: function(index){
	  	  let days = ['Sunday', 'Monday', 'Tuesday', 'Wednessday', 'Thursday', 'Friday', 'Saturday'];
	  	  return days[index];
	  	},
	  	getMonthOfYear: function(index){
          let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
          return months[index];
	  	},
	  	formatAMPM: function(date) {
	  	  let hours = date.getHours();
	  	  let minutes = date.getMinutes();
	  	  let ampm = hours >= 12 ? 'PM' : 'AM';
	  	  hours %= 12;
	  	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  	  var strTime = hours + ':' + minutes + ' ' + ampm;
	  	  return strTime;
	  	},
	  	getLocationFromAddress: async function(address){
	  		
	  		let url  = "https://maps.googleapis.com/maps/api/geocode/json?address=" + address + "&key=" + this.googlekey;
	  		try {
	  		  const response = await fetch(url);
	  		  
	  		  const json = await response.json();
	  		  switch(json.status){
	  		    case "OK":
                  return json.results[0];
                default:
                  return {error: "Address not found"};
	  		  }
	  		}catch(ex){
	  		  return {error: 'Sorry something went wrong in getting your address'};
	  		}
	  	},
	  	getTimeFromLocation: async function(location){
	  	  	let targetDate = new Date() // Current date/time of user computer
	  	  	let timestamp = targetDate.getTime()/1000 + targetDate.getTimezoneOffset() * 60 // Current UTC date/time expressed as seconds since midnight, January 1, 1970 UTC
	  	  	let url = `https://maps.googleapis.com/maps/api/timezone/json?location=${location.lat}, ${location.lng}&timestamp=${timestamp}&key=${this.googlekey}`;

	  	  	try{
	  	  	  const response = await fetch(url);
	  	  	    
	  	  	  const json = await response.json();
	  	  	  let offsets = json.dstOffset * 1000 + json.rawOffset * 1000 // get DST and time zone offsets in milliseconds
	  	  	  return new Date(timestamp * 1000 + offsets) // Date object containing current time of location (timestamp + dstOffset + rawOffset)
	  	  	}catch(ex){
	  	  	  return {error: true};
	  	  	}
	  	    
	  	},
	  	getCurrentTime: async function(){
			let address, time, output;
			try{
	          address = this.choice['message'].match(/\[(.*?)\]/)[1];
			}catch(ex){
			  return "Follow the correct syntax /currenttime [location]";
			}

	  		output = await this.getLocationFromAddress(address);
	  		if(output.error){
	  		  return output.status;	
	  		}

            let { formatted_address } = output;
            output = await this.getTimeFromLocation(output.geometry.location);

            if(output.error){
              return "Something went wrong while trying to get the time";
            }
            time = output;
            return `<h4>${this.formatAMPM(time)}</h4><p class="my-0">${this.getDayOfWeek(time.getDay())}, ${time.getDate()} ${this.getMonthOfYear(time.getMonth())} ${time.getFullYear()}</p><p class="my-0">Time in ${formatted_address}</p>`;

	  	},
	  	doChat: function(){
          let question = this.choice['message'];
	  	  return axios.get('profiles/olubori.php?question='+ question)
	  	    .then(function (response) {

	  	      let chatResponse = response.data.answer || 'I cannot find you a valid answer, go ahead and train me. Use /train [question] [answer] [password]';
	  	      return chatResponse;
	  	    })
	  	    .catch(function (error) {
	  	      console.log(error);
	  	      return 'Something went wrong, try again please';
	  	    });

	  	},
	  	doTrainBot: function(){
          let params, password;
	  	  try{
	  	  	params = this.choice['message'].match(/\[(.*?)\] \[(.*?)\] \[(.*?)\]/);
	  	  	password = params[3];
	  	  }catch(ex){
	  	  	return "Follow the correct syntax /train [question] [answer] [password]";
	  	  }

	  	  if(password != 'password')
	  	  	  return 'You cannot train me, input correct password';
	  	  return axios.get('profiles/olubori.php',
	  	   {
	  	   	 params: { question: params[1], answer: params[2] }
	  	   })
		  	  .then(function (response) {
		  	        return response.data.message;
		  	    })
		  	    .catch(function (error) {
		  	      console.log(error);
		  	      return 'Something went wrong, try again please';
		  	    });
	  	  
	  	  
	  	},
	  	processUnexpectedInput: function(){
	  		commands = ['aboutbot', 'currenttime', 'dayofweek', 'train'];
	  		mycommand = this.choice.message.split(' ')[0];
	  		mycommand = mycommand.substring(1);
	  		for(cmd of commands){
	  		  if(cmd == mycommand){
	  		  	this.choice.command = cmd;
	  		  }
	  		}
	  	}
	  }
	})

	Vue.component('command-item', {
	  props: ['command', 'onItemClick'],
	  data: function () {
	    return {
	      count: 0
	    }
	  },
	  template: `<li class="my-2 px-2" @click="onItemClick(command.key)">
			       <span class="title">/{{command.key}}</span> <span class="format">{{command.format}}</span>
			       <span class="description d-block">{{command.description}}</span>	
		        </li>`
	})
</script>
</section>

