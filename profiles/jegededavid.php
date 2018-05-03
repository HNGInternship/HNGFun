<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>JEGEDE DAVID- Hng Intern</title>
		<script type="text/javascript">
				var i = 0;
        var text = "Jegede David, i am a Web Developer";
        var speed = 50;
        var j = text.length;
        
        function textType() {
          if (i < text.length) {
            document.getElementById("typingEffect").innerHTML += text.charAt(i);
            i++;
            setTimeout(textType, speed);
          }
        }
		</script>
		<style type="text/css">
			body{
				background-color: #FF0000;
				background: linear-gradient(to bottom right, #87ceeb, #ffffff);
			}
			footer {
				padding-top: 200px;
				text-align: center;
				font-size: 30px;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 70px;
			}
			#socialMedia {
				padding-top: 40px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}
           
            
           
            
            
             .chat-window {
           
            background-color: #444;
            max-height: 100vh;
            display: flex;
            flex-direction: column;
          
            /* display: none; */
        }
        
        .chats {
            flex: 1;
            padding: .5em;
            max-height: 65vh;
        
        }

        .chat {
            font-size: 80%;
            position: relative;
            padding: 8px;
            margin: .5em 0 2em;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .received {
            color: #fff;
            background: #075698;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#2e88c4), to(#075698));
            background: -moz-linear-gradient(#2e88c4, #075698);
            background: -o-linear-gradient(#2e88c4, #075698);
            background: linear-gradient(#2e88c4, #075698);
            
        }

        .sent {
            color: #075698;
            background: #fff;
            /* background: -webkit-gradient(linear, 0 0, 0 100%, from(#2e88c4), to(#075698));
            background: -moz-linear-gradient(#2e88c4, #075698);
            background: -o-linear-gradient(#2e88c4, #075698);
            background: linear-gradient(#2e88c4, #075698); */
        }

        .sent:after {
            content: "";
            position: absolute;
            top: -20px;
            right: 50px;
            bottom: auto;
            left: auto;
            /* border-width: 20px 20px 0 0; */
            border-width: 20px 0 0 20px;
            border-style: solid;
            border-color: transparent #fff;
            display: block;
            width: 0;
        }

        .received:after {
            content: "";
            position: absolute;
            bottom: -20px;
            left: 50px;
            border-width: 20px 0 0 20px;
            border-style: solid;
            border-color: #075698 transparent;
            display: block;
            width: 0;
        }

        #chat-input {
            width: 100%;
            margin-top: .5em;
            padding: .5em 1em;
            font-size: 80%;
            color: #444;
        }


        .chat-trigger {
            position: absolute;
            bottom: 2em;
            right: 2em;
            background-color: white;
            border-radius: 50%;
            padding: .5em .7em;
            box-shadow: 2px 2px 1px #222;
            border-width: 0px;
            color: #222;
        }

        .chat-trigger:hover {
            background-color: #222;
            color: white;
        }

        @media screen and (max-width: 360px) {
            .content {
                flex-direction: column;
            }

            .avatar {
                width: 8em;
                border: 1px solid #333;
                border-radius: 50%;
            }

            .chat-trigger {
                position: fixed;
                bottom: 0em;
                right: 0em;
                margin-top: 2em;
            }
        }
            
		</style>
	</head>
	<body class="container" onload="textType()">

		<main >
			<section id="typingEffect"></section>
			<section></section>
			<section id="socialMedia">
				<div>Social Media</div>
				<div id="socialicons">
                    <a href="https://facebook.com/david_jegede91@yahoo.com"><i class="fa fa-facebook"></i></a>
				</div>
                
                <div class ="col-md-6" id="imgblock">
                    <img class = "img img-circle" src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg">
                </div>
			</section>
            
           
		</main>
        
        
         <div class="chat-window" id="chat-window">
                <div class="chats" id="chats">
                    <p class="chat received">Weldone o. I am David's BOt. How far</p>
                </div>
                <input type="text" id="chat-input" placeholder="Type and hit enter to send a message"/>
            </div>
            <button class="chat-trigger" id="chat-trigger"><i class="fa fa-comments"></i></button>
        
        <footer> Jegede David @ 2018</footer>
         <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#chat-window").toggle();
            var chatTrigger = $("#chat-trigger");
            chatTrigger.on('click', function() {
                $("#chat-window").toggle(1000);
            });

            $('#chat-input').on('keypress', function (e) {
                if(e.which === 13){
                    //Disable textbox to prevent multiple submit
                    $(this).attr("disabled", "disabled");
                    if(this.value !== '') {
                        //send message
                        $("#chats").append(`<p class="chat sent">${this.value}</p>`);
                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                        sendMessage(this.value);
                        this.value = '';
                        
                    }

                    //Enable the textbox again if needed.
                    $(this).removeAttr("disabled");
                }
            });

            function sendMessage(message) {
                $.ajax({
                    method: 'POST',
                    url: 'profiles/jegededavid.php',
                    data: {message: message},
                    success: function(response) {
                        $("#chats").append(`<p class="chat received">${response}</p>`);
                        $("#chats").animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                    },

                    error: function(error) {
                        $("#chats").append(`<p class="chat received">Sorry, I cannot give you a response at this time.</p>`);
                        $("#chats").animate({scrollTop: $('#chats').prop("scrollHeight")}, 1000);
                    }
                });
            }
        });
    </script>

      
	</body>
</html>
