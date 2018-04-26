<?php   
    try {
         $query = $conn->query("SELECT * from interns_data WHERE username = 'Gwinyai'");
            $user = $query->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
?>
<?php
    try {
         $data = $conn->query("SELECT * from secret_word LIMIT 1");
            $result = $data->fetch(PDO::FETCH_OBJ);
            $secret_word = $result->secret_word;
    } catch (PDOException $e) {
        throw $e;
    }
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <title>Gwinyai</title>
    <style>


        /*==========================
                General           */
        body {
            margin: 0;
            padding: 0;
            line-height: 1.6;
            font-family: Arail, Helvetica, sans-serif;
            
        }

        button {
            border: none;
            background: none;
            outline: none;

        }

      

        #container {
            position: relative;
            min-height: 55vw;
            overflow: hidden;
            margin-top: 80px;
            padding-top: 0;
            width: auto;
 
        }

        .white {
            color: #fff;
        }

        .layer {
            position: absolute;
            width: 100vw;
            min-height: 55vw;
            overflow: hidden;
        }

        .layer .content-wrap {
            position: absolute;
            width: 100vw;
            min-height: 55vw;

        }

        .layer .content-body {
            width: 25%;
            position: absolute;
            top: 50%;
            text-align: center;
            transform: translateY(-50%);
            color: #fff
        }

        .layer img.img {
            position: absolute;
            width: 24%;
            top: 0%;
            left: 40%;
            transform: translate(-50%, 50%);
            

        }
        .social a {
            padding-left: 10px;
        }

        /*==========================
                Anmation           */

        .ball  {
            
            width: 40px;
            height: 40px;
            animation: bounce 0.5s;
            animation-direction: alternate;
            animation-timing-function: cubic-bezier(.5,0.05,1,.5);
            animation-iteration-count: infinite;
            }

            @keyframes bounce {
            from { transform: translate3d(0, 0, 0);     }
            to   { transform: translate3d(0, 20px, 0); }
            }

            
            ball {
            -webkit-animation-name: bounce;
            -webkit-animation-duration: 0.5s;
            -webkit-animation-direction: alternate;
            -webkit-animation-timing-function: cubic-bezier(.5,0.05,1,.5);
            -webkit-animation-iteration-count: infinite;
            }

            @-webkit-keyframes bounce {
            from { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
            to   { -webkit-transform: translate3d(0, 20px, 0); transform: translate3d(0, 20px, 0); }
            }

        .img {
          
        border-radius: 100%; 
        border: 2px solid #fff; 
        
        }

        .layer h1 {
            font-size: 2em;
        }

        .bottom {
            background: #222;
            z-index: 1;
        }

        .bottom .content-body {
            right: 22%;
        }

        .bottom h1 {
            color: #fdab00;
        }

        .top {
            background: #fdab00;
            color: #222;
            z-index: 2;
            width: 50vw;
        }

        .top .content-body {
            left: 1%;
            color: #222;
        }

        .slack{
            position: absolute;
            top: 0;
            left: 0;
        }
        
        .skew .handle {
            top: 50%;
            transform: rotate(30deg) translateY(-50%);
            height: 200%;
            transform-origin: top;
        }

        .skew .top {
            transform: skew(-30deg);
            margin-left: -1000px;
            width: calc(40vw + 1000px);
        }

        .skew .top .content-wrap {
            transform: skew(30deg);
            margin-left: 1000px;
        }


        /*==========================
                Chatbot           */
        
  
         #chatbox {
             font-family: tahoma;
             background: #fff;
             display: inline-block;
             position: absolute;
             bottom: 0;
             left: 0px;
             background: transparent;
             padding: 0;
              z-index: 3; 
              
            
         } 


         .chat {
             ::-webkit-scrollbar {
                display: none;
                }
         }

         .app {
            position: relative;
            width: 310px;
            height: 470px;
            background: #c1b4ff;
            background: #222;
            margin-top: 30px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            transform: translateY(422px);
          
         }


        


         .app:before {
             content: '';
             position: absolute;
             left: 0;
             width: 100%;
             height: 100px;
             display: inline-block;
             box-shadow: inset 0 80px 85px -35px #3c33b0;
             z-index: 0;

         }

         .app:after {
             content: '';
             position: absolute;
             left: 0;
             width: 100%;
             height: 100px;
             display: inline-block;
             bottom: 0;
             box-shadow: inset 0 -80px 85px -35px #3c33b0;
             z-index: 0;


         }

         .app .head {
             z-index: 1;
             position: relative;
             display: block;
             width: 100%;
             height: 50px;
             line-height: 48px;
             text-align: center;
             text-transform: uppercase;
             letter-spacing: 2px;
             color: rgba(255,255,255,0.7);
             background: #271c5d;
             border-bottom: 1px solid rgba(255,255,255,0.35);
             box-shadow: inset 0 -15px 35px -5px rgba(0,0,0,0.3);
           
            
         }

         .head span.title {
             position: absolute;
             width: 100%;
             display: inline-block;
             left: 0;
             font-size: 16px;
             font-weight: 500;
             margin-top: 2px;
             color: #fff;
             
            
         }

         .head span.messages {
             position: relative;
             float: left;
             font-size: 18px;
             font-weight: normal;
             margin-left: 15px;
             color:#fff;
             margin-top: 2px;
         }

    

         .head span.create-new {
             float: right;
             font-size: 17px;
             font-weight: normal;
             margin-right: 15px;
             color: #fff;
             margin-top: 2px;

         }

       

         .clearfix:after {
             content: '';
             clear: both;
             display: table;
             z-index: 1;

         }
        

         .chat-messages {
             position: relative;
             margin-top: 15px;
             z-index: 2;
         }

         .chat-messages .chat {
             position: relative;
             width: 299px;
             height: 400px;
             background: #fcfcfe;
             left: 50%;
             margin-left: -150px;
             padding: 20px;
             padding-bottom: 42px;
             border-radius: 5px;
             font-size: 15px;
             overflow: hidden;
             overflow-y: auto;
         }


     

         .chat .chat-content > span {
             margin-bottom: 12px;
         }

         .chat .chat-content span.user-input {
             position: relative;
             width: 80%;
             height: auto;
             display: inline-block;
             background: #fff;
             padding: 10px;
             padding-bottom: 25px;
             box-shadow: 2px 2px 20px -2px rgba(60,51,176,0.2);
             color: rgba(60,51,176,1);
         }

         .chat .chat-content span.user-input.first {
             border-radius: 15px 15px 15px 2px;
         }

         .chat .chat-content span.user-input.last {
             border-radius: 2px 15px 15px 15px;
         }

         .chat .chat-content span.user-input span.time {
             position: absolute;
             display: block;
             right: 0;
             margin-top: 5px;
             margin-right: 10px;
             font-size: 10px;
             font-weight: 500;
             color: rgba(60,51,176,0.5;)
         }

        .chat .chat-content span.user-input span.user {
             position: absolute;
             display: block;
             left: 10;
             margin-top: 6px;
             margin-right: 10px;
             font-size: 10px;
             font-weight: 900;
             color: rgba(255,169,58,0.7);
         }

         .chat .chat-content span.bot {
             position: relative;
             float: right;
             width: 80%;
             height: auto;
             background: rgb(40,30,89);
             display: inline-block;
             padding: 10px;
             padding-bottom: 25px;
             color: #fff;
             box-shadow: 2px 2px 20px rgba(60,51,176,0.2),
                         inset -10px -10px 55px rgba(255,255,255,0.1);

         }

         .chat .chat-content span.bot span.time {
             position: absolute;
             display: block;
             right: 0;
             margin-top: 5px;
             margin-right: 10px;
             font-size: 10px;
             font-weight: 500;
             color: rgba(255,255,255, 0.5);
         }

           .chat .chat-content span.bot span.user {
             position: absolute;
             display: block;
             left: 10;
             margin-top: 6px;
             margin-right: 10px;
             font-size: 10px;
             font-weight: 900;
             color: rgba(255,169,58,0.7);
         }

         .chat .chat-content span.bot.first {
             border-radius: 15px 15px 2px 15px;

         }

          .chat .chat-content span.bot.last {
             border-radius: 15px 2px 15px 15px;
             
         }

         .msg-box {
             position: fixed;
             width: 100%;
             bottom: 0;
             left: 0;
             border: none;
             border-top: 1px solid rgba(60,51, 176, 0.1);
             overflow: hidden;
             background: #fff;
           
               
         }

       

         .msg-box .ip-msg {
             width: 80%;
             font-size: 14px;
             padding: 15px;
             padding-right: 8%;
             color: #444;
             border: none;
             border-right: 3px solid #eee;
             outline: none;
             background: #fff;
             
         }

         .msg-box .ip-msg:placeholder {
             color: rgba(60,51,176,0.4);
         }

         .msg-box span.btn-group {
             position: absolute;
             right: 4;
             top: 0;
             margin-top: 14px;
             display: inline-block;
             
         }

         .msg-box span.btn-group i {
             color: rgba(60,51,176,1);
             font-size: 18px;
             padding: 0;
             padding-left: 15px;
             cursor: pointer;
           
         }

         span.btn-group .chat-button {
             
            outline: none;
            border: none;
            background: transparent;
         }

      
        /*==========================
            Chatbot interactivity   */
        

          .chatbot-is-visible {
                visibility: visible;
                 -webkit-transition: visibility 0s 0s;
                transition: visibility 0s 0s;
          }

            i.fa.fa-chevron-up.clicked {
             transform: rotate(180deg);
             transition: transform 800ms ease-in-out 100ms;
         }


         i.fa.fa-chevron-up.chat-closed {
           
             transition: transform 800ms ease-in-out 100ms;
         }

         .head.clicked, .app.clicked {
             transform: translateY(0px);
             transition: transform 800ms ease-in-out;
          }

            .head.chat-closed, .app.chat-closed {
           
             transition: transform 800ms ease-in-out;
          } 

      
        /*==========================
                Responsiveness           */

        @media(max-width: 768px) {
            body {
                font-size: 75%;
            }
            .ball {
                width: 20px;
                height: 20px;
            }

                   .slack {
                position: absolute;
                top: 0;
                left: 0;
                height: 20px; width: 20px;
            }

            h1.lead {
                font-size:16px;
                line-height: 1.2;
            }
           
        }
        @media(min-width: 675px) and (max-width: 767px) {

          
            .slack {
                position: absolute;
                top: 2%;
                left: 16%;
                height: 20px; width: 20px;
            }

            h1.lead {
                font-size:22px;
                line-height: 1.2;
            }

            .layer img.img {
                position: absolute;
                width: 20%;
                top: 4%;
                left: 35%;
                transform: translate(-50%, 50%);
            
            }

            .skew .top {
                transform: skew(-30deg);
                margin-left: -1000px;
                width: calc(35vw + 1000px);
            }
              
            .bottom .content-body {
                right: 32%;
            }
        }

    

        @media(min-width: 767px) and (max-width: 977px) {
           

            .slack {
                position: absolute;
                top: 2%;
                left: 16%;
                height: 20px; width: 20px;
            }

            h1.lead {
                font-size:22px;
                line-height: 1.2;
            }

            .layer img.img {
                position: absolute;
                width: 24%;
                top: 0%;
                left: 37%;
                transform: translate(-50%, 50%);
            
            }

            .skew .top {
                transform: skew(-30deg);
                margin-left: -1000px;
                width: calc(37vw + 1000px);
            }
              
            .bottom .content-body {
                right: 26%;
            }
        }

         @media(min-width: 978px) and (max-width: 991px) {
                .slack {
                position: absolute;
                top: 2%;
                left: 16%;
                height: 20px; width: 20px;
            }

            h1.lead {
                font-size:22px;
                line-height: 1.2;
            }

            h1.lead + p {
                font-size: 80%;
            }

            .layer img.img {
                position: absolute;
                width: 24%;
                top: 0%;
                left: 39%;
                transform: translate(-50%, 50%);
            
            }

            .skew .top {
                transform: skew(-30deg);
                margin-left: -1000px;
                width: calc(39vw + 1000px);
            }
              
            .bottom .content-body {
                right: 28%;
            }
         }


    </style>
</head>

<body>
<section id="container" class="skew">
    <div class="layer bottom">
        <div class="content-wrap">
            <div class="content-body">
                <h1 class="lead">Drop me a line</h1>
                <p>Stay in touch </p>

                <span class="social">
                    
                <a class="ball" href="https://twitter.com/gtchax">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524514541/twitter-2430933_640.png" 
                             alt="twitter">
                    </a> 
                <a href="https://web.facebook.com/gwinyai.chakonda">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524514540/facebook-2429746_640.png" 
                     alt="facebook">
                    </a>
                <a href="https://www.linkedin.com/in/rodney-gwinyai-0a570115a/">
                        <img class="ball" src="https://res.cloudinary.com/itzimlabs/image/upload/v1524520392/linkedin.png" 
                        alt="linkedin">
                    </a>
                </span>
            </div>
                <img class="img" src="<?php echo $user->image_filename; ?>" alt="profile photo">
        </div>
    </div>

    <div class="layer top">
        <div class="content-wrap">
            <div class="content-body">
                <h1 class="lead">@<?php echo $user->username?></h1>
                <p>Hi, <?php echo $user->name?> here, welcome to my profile</p>
                <p><span id="typed"></span></p>
                <p>
                    <img class="slack"src="https://res.cloudinary.com/itzimlabs/image/upload/v1524516425/slack.png" height="40" width="40" alt="slack">
                
                </p>
            </div>
            <img class="img" src="<?php echo $user->image_filename; ?>" alt="profile photo">
        </div>
    </div>

  
        <section id="chatbox">
            <article class="app">
                <div class="head clearfix">
                
                    <span class="messages">
                        <i class="fa fa-comments-o"></i>
                    </span>
                    <span class="title">Ubuntu Bot</span>
                    <span class="create-new">
                     <button data-panel="main" id="chatbox-toggle" data-hide="minimize">
                        <i class="fa fa-chevron-up white"></i>
                     </button>
                       
                    </span>
                
                </div>

                <section id="chat-body" class="chat-is-not-visible">
                    <div class="chat-messages">
                        <div class="chat">
                            <div class="chat-content clearfix">
                                <span class="bot first">
                                     Hi, my name is Ubuntu I'm a bot?
                                    <span class="time">
                                        <?php echo(date("h:i")); ?>
                                    </span>
                                     <span class="user">
                                        Ubuntu Bot
                                    </span>
                                </span>
                                <span class="bot first">
                                     To train me enter #train #answer #password
                                    <span class="time">
                                        <?php echo(date("h:i")); ?>
                                    </span>
                                    <span class="user">
                                        Ubuntu Bot
                                    </span>
                                </span>
                                <span class="bot last">
                                    For a List of my commands enter 'List commands' 
                                    <span class="time">
                                        <?php echo(date("h:i")); ?>
                                    </span>
                                    <span class="user">
                                        Ubuntu Bot
                                    </span>
                                </span>
                                      
                            </div>

                            <div class="msg-box">
                                <input type="text" class="ip-msg" placeholder="Say hi,">
                                <span class="btn-group">
                                    <button type="submit" class="chat-button">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
    
</section>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
       <script>
         /* Configure auto typing*/
        //  document.addEventListener("DOMContentLoaded", ready);
      
           (function ready() {
                var typed = new Typed('#typed', {
                    strings: ["I'm a Chemical Engineer... ", 'Entrepreneur ...', 'and web developer ...', 'Hope bot enjoy the show :)'],
                    typeSpeed: 32,
                    backSpeed: 40,
                    startDelay: 1000,
                    loop: true,
                    loopCount: Infinity,
                });


                /* Variables */
                let chat = document.querySelector('.app');
                let chatBoard = document.querySelector('.chat-content');
                let chatHeader = document.querySelector('.head');
                let chatInput = document.querySelector('input.ip-msg');
                let chatSubmit = document.querySelector('.btn-group');
           
              
                let check = 1;
                let chatNumber = 0;
                let chevron = document.querySelector('.fa-chevron-up');
                let span = document.createElement('span');
               
             
                
                /* Toggle Chat */
              
            if(chatHeader) {
                chatHeader.addEventListener('click', function(e) {
                    // e.stopPropagation();
                    
                    chatHeader.classList.toggle('clicked');
                    chat.classList.toggle('clicked');
                    chevron.classList.toggle('clicked');
                   
                    if (check % 2 == 0) {
                        chatHeader.classList.add('chat-closed');
                        chat.classList.add('chat-closed');
                        chevron.classList.add('chat-closed');
                    } else {
                        chatHeader.classList.remove('chat-closed');
                        chat.classList.remove('chat-closed');
                        chevron.classList.remove('chat-closed');
                        check += 1;
                    }
                });

            } 

          


           

             /* Clean user text */
             function cleanText(str) {
                 
                 return str.trim().replace('-','').toLowerCase();
             }



                    /* Handle user chat bubbles */
                    function chatResponse() {
                        var userInput = chatInput.value
                        var userBubble = ''
                        let span = document.createElement('span');
                        span.classList.add('user-input', 'last');
                        var today = new Date();
                        var h = today.getHours();
                        var m = today.getMinutes();
                        
                        h.toString();
                        m.toString();
                   
                        userBubble += `
                                    ${userInput}
                                    <span class="time">
                                        ${h}:${m}
                                    </span>
                                    <span class="user">You</span>
                            `
                        span.innerHTML = userBubble;
                        chatBoard.appendChild(span);
                       chatInput.value = '';
                        chatBoard.lastChild.scrollIntoView({ behavior: "smooth"});
                    }

                      /* Handle user chat bubbles */
                      function botResponse(){
                        
                            var botBubble = ''
                            let span = document.createElement('span');
                            span.classList.add('bot', 'first');
                            var today = new Date();
                            var h = today.getHours();
                            var m = today.getMinutes();
                          
                            h.toString();
                            m.toString();
                            
                            botBubble += `
                                        Version 0.1
                                        <span class="time">
                                            ${h}:${m}
                                        </span>
                                        <span class="user">Ubuntu Bot</span>
                                `
                            span.innerHTML = botBubble;
                            chatBoard.appendChild(span);
                        chatInput.value = '';
                        chatBoard.lastChild.scrollIntoView({ behavior: "smooth"});
                      }

                    function showResponse() {
                        var userInput = cleanText(chatInput.value);
                        
                        switch(userInput) {
                            case 'about me':
                                chatResponse();
                                setTimeout(botResponse, 2000);
                            break;
                            case 'aboutme':
                                chatResponse();
                                setTimeout(botResponse, 2000);
                            break;
                            case "":
                                alert('blank input not allowed')
                            break;
                            case 'hello':
                                chatResponse();
                            break;
                            default:
                                chatResponse();
                        }
                     
                    }

            /* Handle user chat bubbles */
            if(chatSubmit) {
                
                chatSubmit.addEventListener('click', function(e) {
                    e.stopPropagation();
                    showResponse();
        
                   
                }) 

              document.body.addEventListener( 'keyup', function (e) {
                if ( e.keyCode == 13 ) {
               
                    chatSubmit.click();
                }
            });
              
            };
            
    
           })();
           
       </script>
     
       
</body>

</html>