<?php
// first we require the database connection. this file declares a variable called $conn,
// and we will use it.
require __DIR__.'/../db.php';

if (isset($_POST['question'])) {
    $userQuestion = $_POST['question'];
    // set a header so we can return a json response to the client side.
    header('Content-type: application/json');

    if (substr($_POST['question'], 0, 7) === 'train: ') {
        $questionAndAnswer = explode('#', substr($_POST['question'], 7));

        if (count($questionAndAnswer) !== 3) {
            echo json_encode([
            'status' => 'failed',
            'message' => 'Wrong training format provided to train me.',
          ]);

            exit;
        }

        if (trim($questionAndAnswer[2]) !== 'trainpwforhng') {
            echo json_encode([
              'status' => 'failed',
              'message' => 'Wrong password provided to train me.',
            ]);

            exit;
        }

        $trainSql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer);';

        $trainQuery = $conn->prepare($trainSql);

        if ($trainQuery->execute([
          'question' => $questionAndAnswer[0],
          'answer' => $questionAndAnswer[1],
        ]) === true) {
            echo json_encode([
            'status' => 'success',
            'message' => 'I have been trained successfully.',
          ]);
            exit;
        } else {
            echo json_encode([
          'status' => 'error',
          'message' => 'Something went wrong with the training.',
        ]);

            exit;
        }
    }

    // check if the database has a row with that question.
    $questionSql = 'SELECT * FROM chatbot WHERE  question LIKE "%'.$_POST['question'].'%" ORDER BY RAND()';
    // initiate the database query
    $questionQuery = $conn->query($questionSql);
    $questionQuery->setFetchMode(PDO::FETCH_ASSOC);
    $question = $questionQuery->fetch();
    if ($question) {
        // if a question is found that matches our query, we return it.
        echo json_encode([
        'status' => 'success',
        'question' => $question,
      ]);
    } else {
        // this is executed if there is no question found.

        // first, we'll try to use our special functions. if not we'll return question not found.
        require __DIR__.'/../answers.php';
        if (substr($userQuestion, 0, 13) === 'show avatar: ') {
            $userAvatar = getUserAvatar(trim(explode(':', $userQuestion)[1]));
            echo json_encode([
              'status' => 'success',
              'message' => $userAvatar,
            ]);
            exit;
        }

        if (substr($userQuestion, 0, 17) === 'show user repos: ') {
            $userNumberOfRepos = getNumberOfGithubRepos(trim(explode(':', $userQuestion)[1]));
            echo json_encode([
            'status' => 'success',
            'message' => $userNumberOfRepos,
          ]);
            exit;
        }

        if ($userQuestion === 'show number of interns') {
            $count = getNumberOfInterns();
            echo json_encode([
            'status' => 'success',
            'message' => $count,
          ]);
            exit;
        }

        if ($userQuestion === 'show custom commands') {
            echo json_encode([
            'status' => 'success',
            'message' => getNeneRaeBotCustomCommands(),
          ]);
            exit;
        }

        echo json_encode([
          'status' => 'error',
          'message' => 'Sorry I don\'t quite get that.',
        ]);
    }

    // exit so that the php script stops executing.
    exit;
}
// u can print the connection just to see what it is

// next we define our query like the task said. we select all database rows from the "secret_word" table
$sql = 'SELECT * FROM secret_word';

// this is executing our query
$q = $conn->query($sql);

// this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
$q->setFetchMode(PDO::FETCH_ASSOC);

// this is finally sending the query to the database
$data = $q->fetch();

// just to see the data from the database
//  var_dump($data);

// finally we create the variable they said we should create in the task, and assign this variable to our secret word

$secret_word = $data['secret_word'];

// just to see the secret work
//var_dump($secret_word);

// let's define a query to get our personal user data from the database
// remember after registering, our details are now saved.
$sqlForUser = "SELECT * FROM interns_data WHERE interns_data.username = 'rachel' LIMIT 1";

// this is executing our query
$qForUser = $conn->query($sqlForUser);

// this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
$qForUser->setFetchMode(PDO::FETCH_ASSOC);

// this is finally sending the query to the database#9b4247
$userData = $qForUser->fetch();
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open
      +Sans|Kaushan+Script"> -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <style type="text/css">
      h1 {
        font-family: Advent Pro;
        font-weight: bold;
      }
      body{
        font-family: Advent Pro !important;
        letter-spacing: 2px;
        background-color: transparent !important;
      }
      a {
        color:black;
        font-size: 25px;
        padding: 5px
      }
      h5, h6 {
        font-weight: bold;
        font-family: Advent Pro;
      }
      h1 {
        color: white;
      }
      .card {
        box-shadow: 0 4px 8px 0 rgba(225, 225, 225, 0.5), 0 6px 20px 0 rgba(225, 225, 225, 0.5);
      }
      .card-body {
        height: auto !important;

      }
      .bg {
        background: linear-gradient(rgba(0, 0, 0, 0.816), rgba(0, 0, 0, 0.816)),url('<?=$userData['image_filename']; ?>') no-repeat center center fixed !important; 
          -webkit-background-size: cover !important;
          -moz-background-size: cover !important;
          -o-background-size: cover !important;
          background-size: cover !important;
        width: 100% !important;
        height: auto !important;
        top: 0 !important;
        left: 0 !important;
      }
      .main-section {
        width: auto;
        position: fixed;
        right:50px;
        bottom:-350px;
      }
      .first-section:hover{
        cursor: pointer;
      }
      .open-more{
        bottom:0px;
        transition:2s;
      }
      .border-chat{
        border:1px solid #9b4247;
        margin: 0px;
      }
      .first-section{
        background-color:#9b4247;
      }
      .first-section p{
        color:#fff;
        margin:0px;
        padding: 10px 0px;
      }
      .first-section p:hover{
        color:#fff;
        cursor: pointer;
      }
      .right-first-section{
        text-align: right;
        width: auto;
        position: absolute;
        right: 0;
      }
      .left-first-section{
        width: auto;
      }
      .right-first-section i{
        color:#fff;
        font-size: 13px;
      }
      .right-first-section i:hover{
        color:#fff;
      }
      .chat-section ul li{
        list-style: none;
        margin-top:10px;
        position: relative;
      }
      .chat-section{
        overflow-y:scroll;
        height:300px;
      }
      .chat-section ul{
        padding: 0px;
      }
      .left-chat img,.right-chat img{
        border-radius: 25px;
        width:50px;
        height:50px;
        float:left;
        margin:0px 10px;
      }
      .right-chat img{
        float:right;
      }
      .second-section{
        padding: 0px;
        margin: 0px;
        background-color: #F3F3F3;
        height: 300px;
      }
      .left-chat,.right-chat{
        overflow: hidden;
        width:320px;
      }
      .left-chat p,.right-chat p{
        background-color:#9b4247;
        padding: 5px;
        color:#fff;
        border-radius: 5px; 
        float:left;
        width:60%;
        margin-bottom:20px;
      }
      .left-chat span,.right-chat span{
        position: absolute;
        left:70px;
        top:60px;
        color:#B7BCC5;
        font-size: 15px;
        color:black;
      }
      .right-chat span{
        left:245px;
        
      }
      .right-chat p{
        float:right;
        background-color: #FFFFFF;
        color:#9b4247;
      }
      .third-section{
        border-top: 1px solid #EEEEEE;
      }
      .text-bar input{
        width:85%;
        margin-left:-15px;
        padding:10px 10px;
        border:1px solid #fff;
        margin-right:7px;
        color:black;
      }
      .text-bar a i {
        color:#9b4247;
        width:30px;
        height:30px;
        padding:5px 0px;
        border-radius: 50%;
        text-align: center;
        position: absolute;
        right: 2px;
      }
      .left-chat:before{
        content: " ";
        position:absolute;
        top:0px;
        left:55px;
        bottom:150px;
        border:15px solid transparent;
        border-top-color:#9b4247; 
      }
      .right-chat:before{
        content: " ";
        position:absolute;
        top:0px;
        right:55px;
        bottom:150px;
        border:15px solid transparent;
        border-top-color:#fff; 
      } 
      .send {
        background-color: white;
      } 
      .fa-arrow-right{
        text-align: right;
        font-size: 30px;
      }
      @media (max-width: 576px) {
        .main-section {
          text-align: center;
          position: fixed;
          margin-left: 25px;
          margin-right: 25px;
          left: 0;
          right: 0;
        }
      }
    </style>
    <title>Rachel's Profile</title>
  </head>

  <body>
    <div class="bg"> 
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1><?=$userData['name']; ?></h1>
      </div>
      <div class="container row mt-4 justify-content-center mx-auto">
        <div class="text-center col-sm-5">
          <div class="card mb-4 box-shadow text-center">
            <img class="card-img-top" src='<?=$userData['image_filename']; ?>' alt="Card image cap">
            <div class="card-body">
              <h6 class="mt-2">BIO</h6>
              <p class="card-text">I found fufilment in programming and I've been stuck on ever since, I'm a full stack web developer and an aspiring 'badass' designer. I love photograpy and I believe the only constant thing in life should be learning.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h6>SLACK USERNAME</h6>@<?=$userData['username']; ?></li>
              <li class="list-group-item">
                <h6>CONNECT</h6>
                <a href="https://github.com/RachelAbaniwo"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/rachel-abaniwo/"><i class="fa fa-linkedin"></i></a>
                <a href="https://twitter.com/raeabaniwo"><i class="fa fa-twitter"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="chat-bot"></div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $('.profile>.container').removeClass('container')
    </script>
    <script>
      $(document).ready(function(){
        $(".left-first-section").click(function(){
          $('.main-section').toggleClass("open-more");
        });
      });
      $(document).ready(function(){
        $(".fa-minus").click(function(){
          $('.main-section').toggleClass("open-more");
        });
      });
    </script>
    <!-- include react -->
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <!-- include react-dom -->
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
    <!-- include babel so we can use jsx and other es6+ stuff -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.js"></script>
    <!-- notice the script type, this is important so that babel transpiles everything written inside here.-->
    <script type="text/babel">
      // Basic message component.
      const Message = ({ message }) => (
        <li>
          <div className={message.sender === 'user' ? 'right-chat' : 'left-chat'}>
            <img
              className="message-avatar"
              src={message.sender === 'user' ? 'http://res.cloudinary.com/rachelabaniwo/image/upload/v1523880255/me_kz3ge3.png': 'https://res.cloudinary.com/rachelabaniwo/image/upload/v1523880426/6tag_010118-020231_nu2vyr.jpg'}
              alt="rachelBot"
            />
            {
              /<[a-z][\s\S]*>/i.test(message.body) &&
              <p dangerouslySetInnerHTML={{ __html: message.body }}></p>
            }
            {
              !/<[a-z][\s\S]*>/i.test(message.body) &&
              <p>{message.body}</p>
            }
          </div>
        </li>
      );
      // we create a basic component that renders the jsx of the chat bot
      class ChatComponent extends React.Component {
        constructor() {
          super();

          this.state = {
            question: '',
            messages: []
          };

          this.addMessage = this.addMessage.bind(this);
          this.askQuestion = this.askQuestion.bind(this);
          this.handleChange = this.handleChange.bind(this);
          this.handleKeyPress = this.handleKeyPress.bind(this);
        }
        componentDidMount() {
          // just to dummy test the askQuestion function, let's call it when component is mounted.
          this.addMessage({
            body: `<small>Hey there! I'm rachelbot, how are you doing today? to train me type <b>'train: question #answer #password'</b>. <br /><br /> To see a list of commands I can respond to, type: <br /><b>'show custom commands'</b></small>` ,
            sender: 'bot'
          });
        }

        addMessage(message) {
          this.setState({
            messages: [
              ...this.state.messages,
              message
            ],
            question: ''
          });
          $('.chat-section').scrollTop(1E10);
        }
        handleKeyPress(event) {
          if(event.key == 'Enter') {
            this.askQuestion();
          }
        }

        askQuestion() {
          const url = window.location.hostname === 'localhost' ? 'http://localhost:8000/profiles/rachel.php': 'https://hng.fun/profiles/rachel.php'
            // here we are using jquery ajax to make an api request to our php file.
          this.addMessage({
            body: this.state.question,
            sender: 'user'
          });

          $.ajax({
            url,
            method: "POST",
            data: { question: this.state.question },
            success: (res) => {
              if (res.status === 'success') {
                this.addMessage({
                  body: (res.question && res.question.answer) || res.message,
                  sender: 'bot'
              });
              } else {
                this.addMessage({
                  body: res.message || 'Train me',
                  sender: 'bot'
                });
              }
            },
            failure: function(err) {
              console.log(err)
            }
          });
        }

        handleChange(event) {
          this.setState({
            question: event.target.value
          });
        }

        render() {
          return(
            <div className="main-section">
              <div className="row border-chat">
                <div className="col-md-12 col-sm-12 first-section">
                  <div className="row">
                    <div className="col-md-3 col-sm-3 left-first-section">
                      <p>rachelBot</p>
                    </div>
                    <div className="col-md-9 col-sm-9 right-first-section">
                      <a href="#"><i className="fa fa-minus" aria-hidden="true" /></a>
                    </div>
                  </div>
                </div>
              </div>
              <div className="row border-chat first">
                <div className="col-md-12 col-sm-12 second-section">
                  <div className="chat-section">
                    <ul>
                      {this.state.messages.map((message, index) => <Message message={message} key={index} />)}
                    </ul>
                  </div>
                </div>
              </div>
              <div className="row border-chat send">
                <div className="col-md-12 col-sm-12 third-section">
                  <div className="text-bar">
                    <input onChange={this.handleChange} value={this.state.question} onKeyPress={this.handleKeyPress} type="text" placeholder="Write messege"/><a href="#"onClick={this.askQuestion}><i className="fa fa-arrow-right" aria-hidden="true" /></a>
                  </div>
                </div>
              </div>
            </div>
          );
        }
      }
      // we mount our component on the element with id of chat-bot.
      ReactDOM.render(<ChatComponent />, document.getElementById('chat-bot'))
    </script>
  </body>
</html>