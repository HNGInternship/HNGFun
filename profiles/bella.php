<<<<<<< HEAD
 <!-- <?php
=======
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bella's Profile Card</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <!-- This is the main css file for the default Alta theme -->
<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>

<!-- RequireJS file -->
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>
  <style>
    body {
      font-family: 'Ubuntu';
    }

    .card{
      box-shadow: 0px 0px 10px #b4b4b4;
      width: 50%;
    }
    .mr-auto {
            margin-right: auto;
        }

        .ml-auto {
            margin-left: auto;
        }

        .m-auto {
            margin: auto;
        }

        .chat-holder {
            width: 35%!important;
            /*padding-top: 100px*/
        }

        .chat-space {
            border: 1px solid rgba(0, 0, 0, 0.15);
            width: 100%;
            border-radius: 2px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
        }

        .chat-space-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px 0;
        }

        .user-name {
            font-size: 14px;
            font-weight: bold;
        }

        .acc-icon {
            vertical-align: middle;
            font-weight: bolder;
            color: grey;
            font-size: 20px;
        }

        .chat-box {
            min-height: 250px;
            position: relative;
            padding-bottom: 40px;
        }

        .messages-area {
            max-height: 220px;
            overflow: auto;
            padding: 10px;
        }

        .sent-message {
            display: flex;
            justify-content: flex-end;
            margin: 0 0 4px;
        }
>>>>>>> 0666a979f477c620f8719af8ba7c8704aef96707

        .received-message {
            display: flex;
            justify-content: flex-start;
            margin: 0 0 4px;
        }

        .message {
            padding: 5px 15px;
            border-radius: 30px;
            line-height: 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .sent {
            background: #9BC5F1;
            color: white;
        }

        .received {
            background: #F2F2F2;
            color: #C4C4C4;
        }

        .message-input-area {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            background: #E0E0E0;
            align-items: center;
            height: 40px;
        }

        .message-input {
            color: #c8c8c8;
            width: 85%;
            border: none;
            background: #2B303A;
            height: 100%;
            padding: 0 10px;
        }

        .message-input-area{
            background:#2B303A;
        }

        .message-input:focus {
            border: none;
            box-shadow: none;
            outline: none;
            outline-offset: 0;
        }

        .message-submit {
            margin-left: 10px;
            color: #828282;
            cursor: pointer;
        }

        .show-typing {
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 15px;
        }

        .mlo{
    margin-left:27%;
}
<<<<<<< HEAD
$secret_word = $get['secret_word'];
?> -->
=======
>>>>>>> 0666a979f477c620f8719af8ba7c8704aef96707

.mro{
    margin-right: 10%;
}

img{
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin-left: 20%;
}
.name{
    font-size: 24px;
    font-weight: bold;
    color:#F7F0F0;
}
.p1{
    font-size: 15px;
    margin-left:%;
}

.p2{
    line-height: 2px;
    margin-left: 30%;
}

li{
    list-style-type: none;
    display: initial;
    font-size: 24px;
    margin-left: 5%;
    
}

.social{
    margin-top: 10%;
    margin-left: 12%;
}

.lol{
    margin-top: -30%;
}

.hr_2{
    width: 100%;
    height: 5px;
}
.card-subtitle{
    font-weight: bold;
    font-size: 20px;
    letter-spacing: 5%;
    margin-top:60%;
}

.not{
    margin-top: 25%;
}

.qwer{
    margin-left:15%;
    color:#F7F0F0;
}

.p_2{
    margin-top:4%;
}

.card-subtitle2{
    font-weight: bold;
    font-size: 20px;
    letter-spacing: 5%;
    margin-top:-8%;
}

.p_3{
    margin-top:-8%;
}

.container{
    
}

.oj-panel{
    background-color:#2B303A;
}

.btn{
    width:20%;
    background-color:#5EFC8D;
    color:#fff;
}
  </style>
</head>
<body class="oj-web-applayout-body">
    <div class=" ">
       <header role="banner" class="oj-web-applayout-header">
         <div class="oj-web-applayout-max-width oj-flex-bar oj-align-items-center">
           <div data-bind="css: smScreen() ? 'oj-flex-bar-center-absolute' : 'oj-flex-bar-middle oj-sm-align-items-baseline'">
           </div>
           <div class="oj-flex-item">
               
           </div>
           <div class="oj-flex-bar-end">
           </div>
         </div>
       </header>
         
            <div id="container">
              <div class="demo-flex-display">
                <div id="panelPage">
                        
                  <div >
                    <div class="oj-flex demo-panelwrapper">
                
                      <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6">
                        <div class="oj-flex-item oj-panel demo-mypanel">
                        <div class="container">
                        <img src="https://scontent.flos2-1.fna.fbcdn.net/v/t1.0-9/30742158_2512542218971646_4577195154707841024_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeGBNG5hCyk3fsL66q8wbmYN5VPgvjjRJtI4xqd7s07rX-OWWBVAjXIAhZJoMx4fTCn9feX1g-2Wxgh_Vo1G6FZJgV-UlesOliIjigae3jh6Bg&oh=1e01703a2daee66704c6f2337337d230&oe=5B548B56" alt="">
                         <div class="row qwer">
                            <div class="oj-md-6">
                             <h2 class="name mt-3 text-center">MFONOBONG UMONDIA</h2>
                             <p class="text-center p1">Android Developer, UI/UX Designer & Technical Writer</p>
                           <hr>
                            </div>
                           
  
                            <div class="lol">
                                <div class=" " style="width: 18rem;">
                                    <div class="">
                                        <div class="">
                                            <h6 class="card-subtitle mb-2 text-bold">DESCRIPTION</h6>
                                            <p class="p1">Currently I'm working at Hotels.ng as a Software Development Intern</p>
                                            <p class="p1">Email ID : Umondiamfonobong@gmail.com</p>
                                            <p class="p1">Contact : +2348146498258</p>
                                          </div>
                                          <hr>
                                            <div class="not">
                                              
                                              <h6 class="card-subtitle2 mb-2 text-bold">SOFTWARE</h6>
                                              <p class="p1">Android Studio, Figma, Medium ,<br>Steem, Eclipse</p>
                                            </div>
                        </div>

                        
                      </div>
                 
                    </div>
                  </div>
                </div>
        
              </div>
            </div>

            <div class="oj-flex-item oj-flex oj-sm-flex-items-1 oj-sm-12 oj-md-6 oj-lg-6 oj-xl-6 ">
                        <div class="oj-flex-item  demo-mypanel">
                            <!-- Start from here to copy. This is main chat box -->
                            <div class="chat-space">
                                <!--Chat header-->
                                <div class="chat-space-header">
                                    <!--User name-->
                                    <h5 class="text-left user-name">Bella's Sofia(Bot)</h5>
                                    <!-- <i class="fa fa-angle-down acc-icon"></i> -->
                                </div>
                                <hr style="margin: 10px 0">
                                <div class="chat-box">
                                    <!--Area where all the messages will be. Has a max-height. Can be altered-->
                                    <div class="messages-area">
                                        <!--sent message from the user-->
                                        <div class="sent-message text-left">
                                            <p class="message sent">
                                               Hi, How are you doing ?
                                            </p>
                                        </div>
                                        <!--Message received-->
                                        <div class="received-message text-left">
                                            <p class="message received">
                                                Seems I am doing <span class=""> Perfectly Ok</span>
                                            </p>
                                        </div>
                                    </div>
                                    <!--Form to add new messages-->
                                    <div class="message-form">
                                        <div class="message-input-area">
                                            <label for="user-message"></label>
                                            <!--Input area for message-->
                                            <input type="text" class="message-input" name="user-message" id="user-message"
                                                   placeholder="Write a message" required>
                                            <!--Submit button-->
                                            <button class="btn" type="button" onclick="sendMsg()">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                      </div>


         
     </div>



</body>




 
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script> -->
<script>
    window.addEventListener("keydown", function(e){
    if(e.keyCode ==13){
        if(document.querySelector("#user-message").value==""||document.querySelector("#user-message").value==null){
            //console.log("empty box");
        }else{
            //this.console.log("Unempty");
            sendMsg();
        }
    }
    });
    function sendMsg(){
    var ques = document.querySelector("#user-message");
    displayOnScreen(ques.value, "sent");

    //console.log(ques.value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState ==4 && xhttp.status ==200){
            processData(xhttp.responseText);
        }
    };
    xhttp.open("POST", "https://hng.fun/profiles/bella.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("message="+ques.value);
    }
    function processData (data){
    data = JSON.parse(data);
    console.log(data);
    var answer = data.response;
    //Choose a random response from available
    if(Array.isArray(answer)){
        if(answer.length !=0){
            var res = Math.floor(Math.random()*answer.length);
            displayOnScreen(answer[res][0], "received");
        }else{
            displayOnScreen("Sorry I don't understand what you said <br>But You could help me learn<br> Here's the format: train: user-message # response","received");
        }
    }else{
        displayOnScreen(answer,"received");
    }



    }
    function displayOnScreen(data,align){
    //console.log(data);

    var main= document.querySelector(".messages-area");
    var div = document.createElement("div");
    div.classList = align+"-message text-left";
    var p = document.createElement("p");

    p.classList = "message "+align;
    p.innerHTML = data;
    div.appendChild(p);
    main.appendChild(div);
    //console.log(data);
    }
</script>
</html>
