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
	  	height: 87%;
	
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
  	<div id="chat-box">
  		<header>
  			<h4>HNG assist</h4>
  		</header>
  		<main >
  			<p v-for="n in 20" :class="{ 'bot-msg': n%2==0, 'human-msg': n%2!=0}">These are text {{n}}</p>
  		</main>
  		<input type="text" @onchange="suggestCommand" id="human-text" />
  	</div>
  </div>
  
</section>


<script type="text/javascript">
	var app = new Vue({
	  el: '#app',
	  data: {
	    commands: ['train', 'timeofday', 'chitchat', 'dayOfWeek']
	  },
	  methods: {
	  	suggestCommand(){
	  		console.log('I was changed');
	  	}
	  }
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


