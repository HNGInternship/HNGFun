<?php 
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	$result2 = $conn->query("Select * from interns_data where username = 'olubori'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

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
	  	height: 80vh;
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
	  	background: rgba(255, 255, 255, 0.5);
	  	width: 100%;
	  	margin-bottom: 0px;
	  	list-style: none;
	  	padding: 1rem 0 1rem 0;
	  }

	  .suggestion li {
	  	font-size: 18px;

	  }

	  .suggestion li:hover{
	  	background-color: #2d9ee0;
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

	  @media only screen and (min-width: 993px) {
	  	#main > div {
	  	  width: 50%;
	    }

	    #menu {
	      display: none;
	    }

	  }
		/*html, body{
			height: 100%;
			margin: 0px;
		}

		
		header > h3, footer > p {
			margin: auto;
		}

		footer > p {
          font-size: 18px;
          font-weight: bold;
		}
		header {
			flex-grow: 2;
			margin-top: 3rem;
		}
		header > h3 {
			font-size: 32px;
			
		}
		main {
			flex-grow: 3;
			flex-direction: column;
			align-items: center;
			padding-top: 4rem;
		}
		main > h4 {
			color: #B02A2A;
			font-size: 18px;
			font-weight: bold;
		}
		.flex {
			display: flex;
		}
		.bg-grey{
		 background: #EEEEEE;
		}

		.time-box {
			justify-content: space-between;
			margin-top: 3rem;
		}
		.time-element {
			background-color: #C4C4C4;
		}

		.time-box div > p {
			font-size: 54px;
			font-weight: bolder;
			margin: 2rem;
		}

		img{
			width: 30rem;
			height: 30rem;
			border-radius: 50%;
		 }

		*/
	</style>

<section id="app" class="mt-4">
	<div id="menu">
		<a href="#">Profile</a>
		<a href="#">Chat Bot</a>
	</div>
  <div id="main">
  	<div id="profile-box">
  		Profile
  	</div>
  	<div id="chat-box" >
  		<header>
  			<h4>HNG assist</h4>
  		</header>
  		<main ref="chat-msgs">
  			<p v-for="msg in messages" :class="msg.human ? 'human-msg': 'bot-msg'" v-html="msg.text"></p>
  		</main>
  		<ul class="suggestion" v-show="suggestedCommands" ref="list">
  			<command-item v-for="(command, index) in suggestedCommands" :command="command" :key="command.key" :on-item-click="handleCommandClick"></command-item>
  		</ul>
  		<input type="text" v-model="humanMessage" placeholder="Type # followed by command you want to give e.g. #train" id="human-text" v-on:keyup.enter="handleSubmit" />
  	</div>
  </div>
  
</section>


<script type="text/javascript">
	var app = new Vue({
	  el: '#app',
	  data: {
	    commands: [
	               {key: 'train', description: 'This command is to train the bot', format: '[question] [answer]'}, 
	               {key: 'timeofday', description: 'This command is to get the current time of day in any of the world location', format: '[location]'},
	               {key: 'chitchat', description: 'This command is get the current time of day in any of the world location', format: '[question]'},
	               {key: 'dayofweek', description: 'This command is get the current time of day in any of the world location', format: '[dd-mm-yyyy]'},
	               {key: 'aboutbot', description: 'This command is get the current time of day in any of the world location', format: ''}
	              ],
        humanMessage: '',
        zoneList: null,
        choice: {command: '', message:''},
        messages: [
                    {
                    	human: false, 
                    	text: `Hi, I am Bori Bot, I can do many things. To get list of commands you can use on me just type # in the textbox`
                    }
                  ]
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
	  	handleSubmit: async function(){
	  	  this.choice.message = this.humanMessage;
	  	  this.humanMessage = '';
          this.messages.push({human: true, text: this.choice.message});
          let chatBox = this.$refs['chat-msgs'];
          let answer = await this.getAnswer();
          this.messages.push({human: false, text: answer});
          //chatBox.scrollTop = chatBox.scrollHeight;
          chatBox.scrollTop = chatBox.scrollHeight + 60;
	  	},
	  	getAnswer: function(){
			switch(this.choice.command){
			  case 'aboutbot':
			    return 'Bori Bot Version 1.0, I tell day of the week from date, and I can tell time in any location too.';
			  case 'dayofweek':
			    return this.getDayOfWeek();
			  case 'timeofday':
			    return this.getTimeOfDay();
			  case 'chitchat':
			    return this.doChat();
			  case 'train':
			    return this.doTrainBot();
			  default:
			    return "I can't help with that please, give me a correct command";
			}
            
	  	},
	  	getDayOfWeek: function(){
	  	  return 'This is the day of the week';
	  	},
	  	getTimeOfDay: async function(){
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
	  	      return "Time can not be found for your location can you use a popular city around that location. For example for Nigeria use #timeofday [Lagos]";
	  	    }
	  	    let output = '<h3>Time for ' + location + '</h3>';
	  	    for (zone of zones) {
	  	      const response = await fetch(`http://api.timezonedb.com/v2/get-time-zone?key=DXHGYWUAFA3S&format=json&by=zone&zone=${zone.zoneName}`);
	  	      const json = await response.json();

	  	      const formatted = json.formatted;
	  	      
	  	      const splitted = formatted.split(' ');
        	  output += `${zone.zoneName}<ul><li>Time: ${splitted[1]}</li><li>Date: ${splitted[0]}</li></ul>`;
	  	    }

	  	    return output;

	  	},
	  	doChat: function(){
	  	  return 'You want to chat';
	  	},
	  	doTrainBot: function(){
	  	  return 'You can train me';
	  	}
	  },
	  created: async function(){
	  	const response = await fetch('http://api.timezonedb.com/v2/list-time-zone?key=DXHGYWUAFA3S&format=json');
	  	const json = await response.json();
        this.zoneList = json.zones;
        console.log(this.zoneList);
	  	  /*.then(function(response) {
	  	    return response.json();
	  	  })
	  	  .then(function(myJson) {
	  	    console.log(myJson);
	  	  });*/
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
	<!--<header class="bg-grey flex">
		<h3><?php echo $user->name ?> <small>(@<?php echo $user->username ?>)</small></h3>
	</header>
	<main class="flex">
	  <h4>Full stack Developer</h4>
	  <div class="flex time-box">
	  	<img src="<?php echo $user->image_filename ?>" />
	  </div>		
	</main>-->


