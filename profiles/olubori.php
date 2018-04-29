<?php 
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	$result2 = $conn->query("Select * from interns_data where username = 'olubori'");
	$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<style type="text/css">
	  #main {
	  	width: 100%;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	  }
	  #main > div {
	  	border: 1px solid red;
	  	width: 100%;
	  	height: 100vh;
	  }

	  #chat-box {
	  	position: relative;
	  }

	  @media only screen and (min-width: 993px) {
	  	#main > div {
	  	  border: 1px solid red;
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

<section id="app">
	<div id="menu">
		<a href="#">Profile</a>
		<a href="#">Chat Bot</a>
	</div>
  <div id="main">
  	<div id="profile-box">
  		Profile
  	</div>
  	<div id="chat-box">
  		Chat Bit
  	</div>
  </div>
  
</section>


<script type="text/javascript">
	var app = new Vue({
	  el: '#app',
	  data: {
	    message: 'Hello Vue!'
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


