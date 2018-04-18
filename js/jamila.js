$(document).ready(function(){

	document.write(`

<!DOCTYPE html>
<html>
<head>
	<title>Mercy Ikpe | Jamila</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="../css/jamila.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>








	<div class="col-md-12  no-padding">
		




















	<div class="col-md-8 no-padding">
			




		<header class="col-md-12">

			<div class="col-md-6" id="imgBlock" >
				

				<!-- <img class="img img-circle" src="../img/bg2.png"> -->
				<img class="img img-circle" src="https://res.cloudinary.com/mercyikpe/image/upload/w_400,h_400,c_crop,g_face,r_max/w_200/v1517443922/mercy_ownuvy.jpg">

			</div>


			<div class="col-md-6">
				

		 		<h1 class="ubuntu">Mercy Ikpe</h1>

			</div>

		  <img src="../img/divider.png" class="divider" />
		</header>

		<section>

		 	<div class="col-md-8 col-md-offset-2">
		 		
		 		
			<h3>@mercyikpe</h3>
			<p class="title">Web Designer &amp; Developer, Article writer
			<br>Uyo, Aks
			<br>Nigeria
			
			</p>

		 	</div>



			 <div class="col-md-4 col-md-offset-4" style="display:flex;justify-content: center">
				<a href="https://github.com/mercyikpe"><i class="fa fa-github" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://twitter.com/mercyikpee"><i class="fa fa-twitter"style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://medium.com/@mercyikpe"><i class="fa fa-medium" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://web.facebook.com/mercy.ikpe.79"><i class="fa fa-facebook" float style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>	
			</div>



		 	<div class="col-md-8 col-md-offset-2">

		 		<button class="btn center-block no-show" id="letsChat">
		 			
		 			Let's Chat

		 	</button>

		 	</div>


		 	


		</section>














		</div>


































		<div class="col-md-4 no-padding">



			<div class="mobile-hide" id="botBox">
				

				<!-- MESSAGES -->

				<div id="messages">
					
					<div class="col-md-12"> 
						<button class="btn visible-xs" id="closeButton" onclick="$('#botBox').addClass('mobile-hide')">
						
						 <i class="material-icons">arrow_back</i>

						</button>

					</div>

					<div class="message-block left">
					
						<ul>
							
							<li>
								
								Hi, I'm Jamila.

							</li>
							<li>And you are?</li>

							
						



						</ul>




						<ul style="opacity: 0;margin: 0;padding: 0;height: 0">
							<!-- CAN'T SEEM TO GET THE FIRST LIST TO SHOW FULLY WITHOUT THIS ONE. REMEMBER TO FIZ -->
							
							<li style="height: 0;margin: 0">
								
								Hi, I'm Jamila.nwodno wjdkowne oinwjo fiwjeo wjfio

							</li>

						</ul>

						

					</div>

					<div class="col-md-12">

							<div class="no-show" id="pendingMessageBox">
							
								<img src="../img/three-dots.svg">

							</div>

						</div>





				</div>



				<!-- MESSAGES END -->













				<!-- INPUT BOX -->


				<div id="messageInputContainer">
					



					<textarea type="text" onkeyup="autosize()" placeholder="Type a message..." id="messageInput"></textarea>

					<button class="btn" id="sendButton">
						
						 <i class="material-icons">send</i>

					</button>

				</div>





				<!-- INPUT BOX -->






















			</div>

		</div>


	</div>`)


	$('#messageInputContainer').css('width', $('#botBox').css('width'));

	$(window).resize(function(){

		$('#messageInputContainer').css('width', $('#botBox').css('width'));
	})




	$('#messageInput').keyup(function(e){



		if(e.key.toLowerCase() == 'enter'){

			$('#sendButton').click();
			e.preventDefault();
			e.stopPropagation();
			return false;

		}

	})





	$('#sendButton').click(function(){

		var message = $('#messageInput').val();

		if(message.trim() == '') return false;
		$('#messageInput').val('');
		$('#sendButton').removeClass('btn-warning');

		$('#messages .message-block').append(`<ul class="right">							
							<li>
								
								`+message+`

							</li>	
						</ul>
		`)

		$('#pendingMessageBox').show();
		message.replace("\n",' ');



		$.ajax({
			url: 'answers.php',
			type: 'POST',
			data: {
				message: message,
				action: 'newMessage'
			},
			dataType: 'json',
			success: function(data){


			$('#pendingMessageBox').hide();
				if(typeof data.message != 'undefined'){

					$('#messages .message-block').append(`<ul>							
							<li>
								
								`+data.message+`

							</li>	
						</ul>
					`)


				}


			},
			error: function(e){

				$('#pendingMessageBox').hide();
				
				$('#messages .message-block').append(`<ul>							
							<li>
								
							I encountered an error. Try again?

							</li>	
						</ul>
					`);

			}

		})


	});

















	$('#letsChat').click(function(){


		$('#botBox').removeClass('mobile-hide')


	})




})






function autosize(e){

	if($('#messageInput').val().trim() == ''){

		$('#messageInput').css({
			'height': '60px' 
		});
		$('#sendButton').removeClass('btn-warning');
		return false;

	} else {


		$('#sendButton').addClass('btn-warning');


	}

	let elem = document.getElementById('messageInput');


	let newHeight = elem.scrollHeight;

	newHeight = newHeight >= 60 ? newHeight : 60;

	console.log(newHeight)



	if(newHeight <= 200){

		newHeight = newHeight+'px';


	} else {

		newHeight = '120px';

	}


		$('#messageInput').css({
			'height': newHeight ,
			'overflow': 'hidden'
		});

	}
