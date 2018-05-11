<?php 
   if(isset($_GET['answer'])){

		require_once '../../config.php';
    
       try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
		
		

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

	}else if($_GET['question']){
	   require_once '../../config.php';

	   	$question = safeInput($_GET['question']);
		try {
		    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
		    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
		$result = $conn->query("SELECT answer FROM chatbot WHERE question LIKE '%{$question}%' ORDER BY rand() LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
        $answer = $result->answer;//bot_answer($_GET['question']);
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
	        background-attachment: fixed;
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
	      #profile-box img {
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

<section id="app" class="mt-4">
	<div id="menu">
		<a href="#">Profile</a>
		<a href="#">Chat Bot</a>
	</div>
  <div id="main">
  	<div id="profile-box" class="px-4">

  	   <span  id="img-container">
  	   <img src="https://res.cloudinary.com/naera/image/upload/v1525932431/Photo_on_1-26-18_at_2.57_PM_2_xpnojm.jpg" class="img-fluid">
  	</span>
  		<h3 class="mt-4"><?= $user->name ?></h3>
  		<p class="mt-0 text-primary"><strong>Laravel and VueJS fanatic</strong></p>
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
  	<div id="chat-box" >
  		<header>
  			<h4 class="text-center text-success">BORI BOT</h4>
  		</header>
  		<main ref="chat-msgs" id="chat-msgs">
  			<p v-for="msg in messages" :class="msg.human ? 'human-msg': 'bot-msg'" v-html="msg.text"></p>

  			<div class="mx-auto bg-info w-50 text-white rounded" v-show="zoneList == null" v-html="info"></div>
  		</main>
  		<ul class="suggestion" v-show="suggestedCommands" ref="list">
  			<p class="my-0">Available commands <small>Click on any to choose</small></p>
  			<command-item v-for="(command, index) in suggestedCommands" :command="command" :key="command.key" :on-item-click="handleCommandClick"></command-item>
  		</ul>
  		<input type="text" v-model="humanMessage" :disabled="zoneList == null" placeholder="Type # followed by command you want to give e.g. #train" id="human-text" @keyup.enter="handleSubmit" />
  	</div>
  </div>
  
</section>


<script type="text/javascript">
	var app = new Vue({
	  el: '#app',
	  data: {
	    commands: [
	               {key: 'train', description: 'This command is to train the bot', format: '[question] [answer] [password]'}, 
	               {key: 'currenttime', description: 'This command is to get the current time in any of the location of the world', format: '[location]'},
	               {key: 'dayofweek', description: 'This command is get the day of the weeks a date falls on', format: '[yyyy-mm-dd]'},
	               {key: 'aboutbot', description: 'This command is tells you about me', format: ''},
	               {key: 'popularcities', description: 'Show all popular city that starts with an alphabet', format: '[a], or [b],... [z]'}
	              ],
        humanMessage: '',
        zoneList: null,
        choice: {command: '', message:''},
        messages: [
                    {
                    	human: false, 
                    	text: `Hi, I am Bori Bot, I can do many things. To get list of commands you can use on me just type # in the textbox`
                    }
                  ],
        info: '<h4 class="text-center">Bot is currently preparing data</h4><p class="text-center">Please wait...</p>'
      },
	  computed: {
	  	suggestedCommands: function(){
	  	  let command;
	  	  let suggestion = null;  
	  	  if(this.humanMessage.startsWith('#')){
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
	  	  this.humanMessage = '#' + c.key + ' ' + c.format;
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

	  		if(this.choice.message.indexOf('#') == 0 && !this.choice.command){
              return "I can't help with that please, give me a correct command";
	  		}
			switch(this.choice.command){
			  case 'aboutbot':
			    return 'Bori Bot Version 1.0, I tell day of the week from date, and I can tell time in any location too.';
			  case 'dayofweek':
			    return this.getDayOfWeek();
			  case 'currenttime':
			    return this.getCurrentTime();
			  case 'train':
			    return this.doTrainBot();
			  case 'popularcities':
			    return this.getAllCities();
			  default:
			    return this.doChat();
			}


            
	  	},
	  	getDayOfWeek: function(){
	  		var date;
	  		try{
	          date = this.choice['message'].match(/\[(\d{4}-\d{2}-\d{2})\]/)[1];
	  		}catch(ex){
	  		  return "Follow the correct syntax #dayofweek [yyyy-mm-dd]";
	  		}

	  		date = new Date(date);
            let days = ['Sunday', 'Monday', 'Tuesday', 'Wednessday', 'Thursday', 'Friday', 'Saturday'];
            return `${date} - <strong>${days[date.getDay()]}</strong>`;


	  	},
	  	getCurrentTime: async function(){
	  		var location;
	  		try{
              location = this.choice['message'].match(/\[(.*?)\]/)[1];
	  		}catch(ex){
	  		  return "Follow the correct syntax #timeofday [location]";
	  		}
	  	    let zones = this.zoneList.filter(function(zone){
                          location = location.charAt(0).toUpperCase() + location.slice(1);
                          return zone.zoneName.indexOf(location) != -1
	  	                });
	  	    if(zones.length < 1){
	  	      return `Time can not be found for your location can you use a popular city around that location. For example for Nigeria use #timeofday [Lagos]<br /><span class="text-success">Tip: Use <strong>#popularcities [${location.charAt(0)}]</strong> to check correct spelling for ${location}</span>`;
	  	    }
	  	    let output = '<h4>Time for ' + location + '</h4>';
	  	    for (zone of zones) {
	  	      const response = await fetch(`http://api.timezonedb.com/v2/get-time-zone?key=DXHGYWUAFA3S&format=json&by=zone&zone=${zone.zoneName}`);
	  	      const json = await response.json();

	  	      const formatted = json.formatted;
	  	      
	  	      const splitted = formatted.split(' ');
        	  output += `${zone.zoneName} <strong>${zone.countryName}</strong><ul><li>Time: ${splitted[1]}</li><li>Date: ${splitted[0]}</li></ul>`;
	  	    }

	  	    return output;

	  	},
	  	doChat: function(){
          let question = this.choice['message']; /*.match(/\[(.*?)\]/)[1];
	  	  }catch(ex){
            return "Follow the correct syntax #chitchat [question]";
	  	  } */
	  	  

	  	  return axios.get('profiles/olubori.php?question='+ question)
	  	    .then(function (response) {

	  	      let chatResponse = response.data.answer || 'I cannot find you a valid answer, go ahead and train me. Use #train [question] [answer] [password]';
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
	  	  	return "Follow the correct syntax #train [question] [answer] [password]";
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
	  	getAllCities: function(){
	  		let char;
	  	  try{
            char = this.choice['message'].match(/\[[a-zA-Z]{1}\]/)[0];
            
	  	  }catch(ex){
            return "Follow the correct syntax #popularcities [a], or #popularcities [b], ... #popularcities [z]";
	  	  }
	  		char = char.charAt(1).toUpperCase();
	  		let cities = [];
            
            val = `<p>Cities that starts with <strong>${char}</strong></p><ul>`;
	  	    for (zone of this.zoneList) {
	  	      const arr = zone.zoneName.split('/');
	  		  city = arr[arr.length-1];
              if(city.indexOf(char) === 0)
              	val += `<li><strong>${city}</strong> - ${zone.countryName}</li>`;
	  	    }

	  		val += `</ul>`;

	  		return val;
	  	},
	  	processUnexpectedInput: function(){
	  		commands = ['aboutbot', 'currenttime', 'dayofweek', 'train', 'popularcities'];
	  		mycommand = this.choice.message.split(' ')[0];
	  		mycommand = mycommand.substring(1);
	  		for(cmd of commands){
	  		  if(cmd == mycommand){
	  		  	this.choice.command = cmd;
	  		  }
	  		}
	  	}
	  },
	  created: async function(){
	  	try{
	  	  const response = await fetch('http://api.timezonedb.com/v2/list-time-zone?key=DXHGYWUAFA3S&format=json');
	  	  const json = await response.json();
	  	  this.zoneList = json.zones;
	  	}catch(ex){
	  	  this.info = '<h4 class="text-center text-danger">OOPS!!! APOLOGY</h4><p class="text-center">Something went wrong while I was trying to get data, Please reload your page and check your internet connection and firewall.</p>'
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
			       <span class="title">#{{command.key}}</span> <span class="format">{{command.format}}</span>
			       <span class="description d-block">{{command.description}}</span>	
		        </li>`
	})
</script>
</section>

