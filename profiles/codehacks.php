<?php

  date_default_timezone_set('Africa/Lagos');
  $result = $conn->query("SELECT * FROM secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'codehacks'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?php echo $user->name?></title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
    <style>

      body {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333;
        background: linear-gradient(90deg,#fff,hsla(0,0%,62%,.2));
      }
      .mdl-layout__header-row {
        padding: 10px;
        height: 100%;
      }
      h1 {
        margin-right: 10px;
      }
      .job-role {
        font-size: 16px;
      }
      .mdl-layout-spacer {
        margin-right: 10%;
        text-align: right;
      }
      hr {
        border: 1px thin #fff;
        margin-left: 5px;
        margin-right: 5px;
        width: 98%;
      }
      .social-media {
        display: flex;
        padding: 10px;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
      }
      a:link {
        text-decoration: none;
      }
      .short-description {
        display: flex;
        padding: 10px;
        justify-content: space-between;
      }
      .short-description img {
        width: 250px;
        height: 250px;
        border-radius: 50%;
      }
      h3 {
        color: #a7adb2;
        text-align: center;
      }
      .bot {
        position: fixed;
        bottom: 50px;
        right: 10px;
        background-color: red;
        padding: 15px;
        width: 50%;
        height: 50vh;
      }
      .bot-chat {
        position: relative;
        overflow-y: scroll;
        width: 100%;
        height: 100%;
        background-color: white;
      }
      .bot-chat p {
        position:
      }
      .bot-actions {
        position: absolute;
        bottom: 0;
        right: 0;
      }

      @media (max-width: 600px) {

        .mdl-layout__header-row{
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
        }
        .job-role {
          display: block;
          margin: 10px;
        }
        .short-description {
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
          align-items: center;
        }
        h2 {
          text-align: center;
        }

      }

    </style>

    </head>

    <body id="top">

      <!-- Always shows a header, even in smaller screens. -->
      <div class="mdl-layout--no-desktop-drawer-button mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <h1 class="">Kelvin Gobo</h1>
            <span class="job-role">Front-End Developer</span>
            <!-- Add spacer, to align navigation to the right -->
            
          </div>

          <hr>

          <div class="social-media">
            <div>
              <span>Facebook: <a href="https://www.facebook.com/kelvin.gobo">Kelvin Gobo</a></span>
            </div>

            <div>
              <span>Twitter: <a href="https://twitter.com/kelvingobo">@kelvingobo</a></span>
            </div>

            <div>
              <span>Github: <a href="https://github.com/kelvingobo">Kelvin Gobo</a></span>
            </div>
            <div>
              <span>Linkedin: <a href="https://www.linkedin.com/in/kelvingobo">Kelvin Gobo</a></span>
            </div>
          </div>

          <hr>

          <div class="short-description">
            <div>
              <img src="http://res.cloudinary.com/codehacks/image/upload/v1524262578/moi.jpg">
            </div>

            <div>
              <p>I am a passionate Front-End Developer at <a href="https://dewbicon.com" target="_blank">Dewbicon Technologies</a>, standing on the shoulders of giants to build cutting edge web applications.</p>
              <h2>Core Skills</h2>
              <ul>
                <li>Polymer</li>
                <li>Firebase</li>
                <li>Vue.js</li>
                <li>Javascript</li>
              </ul>
            </div>
          </div>

        </header>

        <main class="mdl-layout__content">
          <div class="page-content">
            <!-- Your content goes here -->
            <!--<div class="bot">
              <div>
                <h3>codehacks bot</h3>
                <hr>
              </div>
               <div class="bot-chat">
                <div id="chat-area">
                  
                </div>
                <div class="bot-actions">
                <input id="message" type="text" placeholder="Ask Me Anything">
                <button onclick="askQuestion();">Send</button>
                </div>
                
              </div> 
            </div>-->

          </div>

        </main>

      </div>

      <script>
        function askQuestion() {
          var chatArea = document.getElementById('chat-area');
          var message = document.getElementById('message').value;
          var text = document.createElement('p');
          text.innerText = message;
          chatArea.appendChild(text);
          console.log(message);
        }
      </script>

    </body>

  </html>