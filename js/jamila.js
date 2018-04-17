$(document).ready(function(){



	$('.btn').ripples();

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
								
								`+e.responseText+`
							</li>	
						</ul>
					`);
				return;
				$('#messages .message-block').append(`<ul>							
							<li>
								
								Your connection seems to be down. Try again?

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
