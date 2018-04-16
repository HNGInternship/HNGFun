<?php
  $date_time = new DateTime('now', new DateTimezone('Africa/Lagos'));

  try {
    $sql = 'SELECT * FROM secret_word';
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $secret_word_result = $secret_word_query->fetch();

    $sql = 'SELECT * FROM interns_data WHERE username = "the_ozmic"';
    $intern_data_query = $conn->query($sql);
    $intern_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data_result = $intern_data_query->fetch();
  } catch (PDOException $e) {
      throw $e;
  }

  $secret_word = $secret_word_result['secret_word'];
  $name = $intern_data_result['name'];
  $img_url = $intern_data_result['image_filename'];
?>

  <div class="bot-container">
    <div class="messages-container">
      <div>
        <div class="message bot">
          <span class="content">Hi! I'm a bot and you can ask me various questions and give me different commands.</span>
        </div>
      </div>
      <div>
        <div class="message bot">
          <span class="content">Type <code>"show: List of commands"</code> to see what the list of commands I understand.</span>
        </div>
      </div>
    </div>
    <div class="send-message-container">
      <input class="message-box" placeholder="Type question here"/>
      <button class="send-message-btn">
        <div>
          <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </div>
      </button>
    </div>
  </div>
  <div class="time-container">
    <div>Hello, my name is <?php echo $name; ?> and I'm interning at Hotels.ng</div>
    <div class="time"><?php echo $date_time->format('g:i:s a'); ?></div>
  </div>
  <div class="img-container">
    <img src="<?php echo $img_url; ?>"/>
  </div>

<style>

  .bot-container {
    margin-top: 100px;
    margin-bottom: 50px;
    border-bottom: 1px solid #bbbfbf;
    padding-bottom: 50px;
  }

  .messages-container {
    background-color: white;
    color: #3A3A5E;
    padding: 10px;
    overflow: auto;
    width: 100%;
    border-top: 1px solid #f1f1f1;
    padding-bottom: 50px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .messages-container > div {
    display: inline-block;
    width: 100%;
  }

  .message {
    float: left;
    font-size: 16px;
    background-color: #edf3fd;
    padding: 10px;
    display: inline-block;
    border-radius: 3px;
    position: relative;
    margin: 5px;
  }

  .message:before {
    position: absolute;
    top: 0;
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
  }

  .message.bot:before {
    border-color: transparent #edf3fd transparent transparent;
    border-width: 0 10px 10px 0;
    left: -9px;
  }

  .message.you:before {
    border-width: 10px 10px 0 0;
    right: -9px;
    border-color: #edf3fd transparent transparent transparent;
  }
  
  .message.you {
    float: right;
  }

  .content {
    display: block;
  }

  .send-message-container {
    display: inline-grid;
    background-color: #2b7ae3;
    grid-column-gap: 10px;
    grid-template-columns: 1px auto auto 40px 1px;
    /* position: fixed; */
    width: 100%;
    left: 0;
    bottom: 0px;
    box-sizing: border-box;
    padding: 10px 0px;
    box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.25);
    height: 60px;
  }

  .message-box {
    border-radius: 3px;
    border: none;
    padding: 5px 10px;
    grid-column-start: 2;
    grid-column-end: 4;
  }

  .send-message-btn {
    background-color: #fff;
    padding: 0px;
    border-radius: 50%;
    border: none;
    font-size: 16px;
    grid-column-start: 4;
  }

  .send-message-btn > div {
    margin-top: 0px;
    margin-right: 2px;
  }

  .img-container {
    margin-left: 85px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #fff;
    padding: 5px;
    top: 150px;
    left: 175px;
  }

  .img-container > img {
    height: 190px;
    width: 190px;
    border-radius: 50%;
  }

  .time {
    padding: 10px;
    text-transform: uppercase;
    font-size: 60px;
    width: 100%;
  }

  .time-container {
    display: flex;
    height: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
  }

  .container {
    height: 100%;
  }

  body, html {
    /* height: 100%!important; */
  }
</style>
<script>
  window.onload = function() {
    $(document).keypress(function(e) {
      if(e.which == 13) {
        getResponse(getQuestion());
      }
    });

    $('.send-message-btn').on('click', function () {
      getResponse(getQuestion());
    });
  }

  function isUrl(string) {
    var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);
    var t = string;

    if (t.match(regex)) {
      return true;
    } else {
      return false;
    }
  }

  function stripHTML(message){
    var re = /<\S[^><]*>/g
    return message.replace(re, "");
  }

  function getResponse(question) {
    updateThread(question);
    showResponse(true);

    if (question.trim() === "") {
      showResponse(':)');
      return;
    } 

    if (question.toLowerCase().includes("open: ") && isUrl(question.toLowerCase().split("open: ")[1].trim())) {
      var textToSay = question.toLowerCase().split("open: ")[1];
      showResponse('Okay, opening: <code>'+ textToSay + '</code>');
      window.open("http://" + textToSay);
      return;
    }

    if (question.toLowerCase().includes("say: ")) {
      var textToSay = question.toLowerCase().split("say: ")[1];
      var msg = new SpeechSynthesisUtterance(textToSay);
      window.speechSynthesis.speak(msg);
      showResponse('Okay, saying: <code>'+ textToSay + '</code>');
      return;
    }

    if (question.toLowerCase().trim() === "show: list of commands") {
      return showResponse(`
        Type <code>"show: List of commands"</code> to see a list of commands I understand.<br/>
        Type <code>"open: www.google.com"</code> to open Google.com<br/>
        Type <code>"say: Hello bot"</code> to get me to say "Hello bot"<br/>
        Type <code>"train: Your question # My reply"</code> to train me to understand how to reply to more things
      `);
    }

    if (question.toLowerCase().trim() === "what is the time?" || question.toLowerCase().trim() === "what time is it?") {
      return showResponse("The time is "+ (new Date()).toLocaleString().split(",")[1].trim());
    }

    $.ajax({
      url: "answers.php",
      method: "POST",
      data: { question },
      success: function(res) {
        if (res.trim() === "") {
          showResponse(`
          I don\'t understand that question. If you want to train me to understand,
          please type <code>"train: your question? # The answer."</code>
          `);
        } else {
          showResponse(res);
        }
      }
    });
  }

  function showResponse(response) {
    if (response === true) {
      $('.messages-container').append(
        `<div>
          <div class="message bot temp">
            <span class="content">Thinking...</span>
          </div>
        </div>`
      );
      return;
    }

    $('.temp').parent().remove();
    $('.messages-container').append(
      `<div>
        <div class="message bot">
          <span class="content">${response}</span>
        </div>
      </div>`
    );
    $('.message-box').val("");

  }

  function getQuestion() {
    return $('.message-box').val();
  }

  function updateThread(message) {
    message = stripHTML(message);
    $('.messages-container').append(
      `<div>
        <div class="message you">
          <span class="content">${message}</span>
        </div>
      </div>`
    );
  }

  var options = { hour12: true };
  var time = "";
  function updateTime() {
    var date = new Date();
    time = date.toLocaleString('en-NG', options).split(",")[1].trim();
    document.querySelector(".time").innerHTML = time;
  }
  setInterval(updateTime, 60);
</script>
