<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile page</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style media="screen">
    .mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:450px;
    overflow:hidden;
    padding:0;
}
.frame > div:last-of-type{
    position:absolute;bottom:0;width:100%;display:flex;
}
body > div > div > div:nth-child(2) > span{
    background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;
}
body > div > div > div.msj-rta.macro{
    margin:auto;margin-left:1%;
}
ul {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:47px;
    display:flex;
    flex-direction: column;
    top:0;
    overflow-y:scroll;
}
.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}  
    body{
  background-image: url("https://res.cloudinary.com/gyrationtechs/image/upload/v1526053526/bg.jpg");
  
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin: 0px;
  padding: 0px;
 }
.navbar{
  width: 100%
  padding: 20px;
  position: fixed;
  top: 0px;
  transition: .5s;
}
.navbar ul li{
  list-style-type: none;
  display: inline-block;
  padding: 10px 15px;
  color: white;
  font-size: 24px;
  font-family: sans-serif;
  cursor: pointer;
  float: right;
  border-radius: 10px;
  transition: .5s;
}
.navbar ul li:hover{
  background: orange;
}
.navbar,
.text-center{
  text-align: center;
}
      .personal-image img{
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }
      .personal-image p{
        border-left: 3px black;
        border-right: 3px black;
        font-size: 20px;
        text-align: center;
        font-family: Playball;
        margin: 0;
        padding: 0;
      }
      .personal-image h4{
        font-size: 35px;
        text-align: center;
        margin-top: 0em;
      }
      .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
      margin-top: 10%;
      }
      .personal-image h4 {
        font-family:  sans-serif;
        margin-bottom: 0em;
      }
      .personal-image p{
        font-family: Arial;
        margin-top: 0em;
        padding-top: 0em;
        color: #a90909;
	font-weight: bold;
        margin-bottom: 0em;
      }
      .social-page{
        margin-top: 0em;
      }
      .social-page img{
        width: 30px;
        height: 30px;
        padding-bottom: 0;
      }
.text-center{
  text-align: center;
}
.box{
  display: inline-block;
  background-color: grey;
  width: 100%;
  height: 50px;
}
.box p{
  font-size: 16px;
  text-align: center;
  padding-top: 10px;
  color: #430f0f;
}

.box span {
text-align: center;
  padding-top: 10px;
  color: #430f0f;
}
p {
font-size: 18px;
color: #430f0f
}

.personal-image span {
font-size: 14px;
text-align: center;
font-family: verdana;
color: #fff;
left: 30%; 
right: 30%;

}
</style>
  </head>
  <body>
<div class="personal-image">
  <img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526012343/David.jpg" alt="my image" class="center">
        
        <h4 style="color: #fff">David Ozokoye</h4>
        <p>Front End Web developer / AI (chabot) developer / HNG Intern </p><br>
        <div class="social-page text-center">
	<span> What's up, I'm David a Web developer based in Nigeria. I am a fan of technology, design and entrepreneurship. <br> I'm also interested in web development and programming. Get in touch with me via any of my social handle below.</span> <br><br>
          <a href="https://www.facebook.com/davis5nd"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051537/fb.png"></a>
          <a href="https://www.twitter.com/gyrationtech"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051669/twitter.png"></a>
          <a href="https://www.linkedin.com/in/david-ozokoye"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051162/link.jpg" ></a>
          <a href="https://www.github.com/gyrationtechs"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526052030/git.png"></a>
 </div>
      </div>
<center>
<div class="col-sm-3 col-sm-offset-4 frame">
            <ul></ul>
            <div>
                <div class="msj-rta macro">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 

                </div>
                <div style="padding:10px;">
                    <span class="glyphicon glyphicon-share-alt"></span>
                </div>                
            </div>
        </div>       
</center>

<script type="text/javascript">
var me = {};
me.avatar = "https://lh6.googleusercontent.com/-lr2nyjhhjXw/AAAAAAAAAAI/AAAAAAAARmE/MdtfUmC0M4s/photo.jpg?sz=48";

var you = {};
you.avatar = "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +                                
                  '</li>';
    }
    setTimeout(
        function(){                        
            $("ul").append(control).scrollTop($("ul").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $("ul").empty();
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);              
            $(this).val('');
        }
    }
});

$('body > div > div > div:nth-child(2) > span').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

//-- Clear Chat
resetChat();

//-- Print Messages
insertChat("me", "Hello Tom...", 0);  
insertChat("you", "Hi, Pablo", 1500);
insertChat("me", "What would you like to talk about today?", 3500);
insertChat("you", "Tell me a joke",7000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
insertChat("you", "LOL", 12000);


//-- NOTE: No use time on insertChat.
</script>
<?php

$result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'david'");
  $user = $result2->fetch(PDO::FETCH_OBJ);

  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }

?>

</body>
</html>
