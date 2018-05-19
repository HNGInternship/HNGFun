<?php
$file = realpath(__DIR__ . '/..') . "/db.php";
include $file;
global $conn;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    require_once("../answers.php");
    if (preg_match("/^(help)/i", $_POST['req'])) {
        echo json_encode("available commands are: 'aboutbot',\n 'time',\n'train:[question]#[answer]#password");
        return;
    }
    if ($_POST['req'] == "aboutbot") {
        echo json_encode("I am Amity.I dont have a current version, i am constantly being trained!");
    } else if (preg_match("/time/i", $_POST['req'])) {
        echo json_encode(get_time());
    } else if (strpos(" " . $_POST['req'], 'train')) {
        $te = str_replace(" ", "", $_POST['req']);

        if (!preg_match("/^train:(\w){1,}#(\w){1,}#(\w){1,}$/", $te)) {
            echo json_encode("the training format is 'train: question#answer#password'");
            return;
        }
        $exploded = preg_split("/[:#]+/", $_POST['req']);
        $question = trim($exploded[1]);

        $answer = trim($exploded[2]);

        $password = trim($exploded[3]);
        if ($password == "password") {
            $sql3 = "INSERT INTO  `chatbot` (`question`, `answer`) VALUES ('" . $question . "','" . $answer . "')";
            $query = $conn->query($sql3);
            echo json_encode("Thank you for that, trust me, i wont turn into Skynet!!!");
        } else {
            echo json_encode("You cant access me! " . $password);
        }
    } else {
        $text = $_POST['req'];
        $sql3 = "SELECT * FROM chatbot WHERE question='$text ' ORDER BY RAND() LIMIT 1";
        $query = $conn->query($sql3);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result3 = $query->fetch();
        $ans = $result3['answer'];

        if (isset($ans)) {
            echo json_encode($ans);
        } else {
            echo json_encode("Good to know");
        }
    }


    exit();
}
?>

//////////////////////////////////////////////////////////////////


<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!defined('DB_USER')) {

        require "../../config.php";
    }
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }

    global $conn;


    //fetch-store results
    try {

        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="mustapha"';
        $query_my_intern_db = $conn->query($sql_queryname);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
    } catch (PDOException $exceptionError) {
        throw $exceptionError;
    }

    $secret_word = $query_result['secret_word'];
    $name = $intern_db_result['name'];
    $username = $intern_db_result['username'];
    $image_addr = $intern_db_result['image_filename'];
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Mustapha Yusuff</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
                body {
                    background-image: url(https://res.cloudinary.com/macspace/image/upload/v1524240795/1.jpg);
                    background-size : cover;
                }

                .card {
                    background-color:white;
                    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.2);
                    max-width: 400px;
                    margin: auto;
                    text-align: center;
                }

                .title {
                    color: grey;
                    font-size: 18px;
                }

                .butt{
                    border:none;
                    display: inline-block;
                    font-size:10px;
                    text-align: right;

                }

                button {
                    border: none;
                    outline: 0;
                    display: inline-block;
                    padding: 8px;
                    color: white;
                    background-color: #000;
                    text-align: center;
                    cursor: pointer;
                    width: 100%;
                    font-size: 18px;
                }

                a {
                    text-decoration: none;
                    font-size: 22px;
                    color: black;
                }
                button:hover, a:hover {
                    opacity: 0.7;
                }


                /////////////////////////////////////////////////
                @charset "utf-8";
                /* CSS Document */

                /* ---------- GENERAL ---------- */

                body {
                    background: #e9e9e9;
                    color: #9a9a9a;
                    font: 100%/1.5em "Droid Sans", sans-serif;
                    margin: 0;
                }

                a { text-decoration: none; }

                fieldset {
                    border: 0;
                    margin: 0;
                    padding: 0;
                }

                h4, h5 {
                    line-height: 1.5em;
                    margin: 0;
                }

                hr {
                    background: #e9e9e9;
                    border: 0;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    height: 1px;
                    margin: 0;
                    min-height: 1px;
                }

                img {
                    border: 0;
                    display: block;
                    height: auto;
                    max-width: 100%;
                }

                input {
                    border: 0;
                    color: inherit;
                    font-family: inherit;
                    font-size: 100%;
                    line-height: normal;
                    margin: 0;
                }

                p { margin: 0; }

                .clearfix { *zoom: 1; } /* For IE 6/7 */
                .clearfix:before, .clearfix:after {
                    content: "";
                    display: table;
                }
                .clearfix:after { clear: both; }

                /* ---------- LIVE-CHAT ---------- */

                #live-chat {
                    bottom: 0;
                    font-size: 12px;
                    right: 24px;
                    position: fixed;
                    width: 300px;
                }

                #live-chat header {
                    background: #293239;
                    border-radius: 5px 5px 0 0;
                    color: #fff;
                    cursor: pointer;
                    padding: 16px 24px;
                }

                #live-chat h4:before {
                    background: #1a8a34;
                    border-radius: 50%;
                    content: "";
                    display: inline-block;
                    height: 8px;
                    margin: 0 8px 0 0;
                    width: 8px;
                }

                #live-chat h4 {
                    font-size: 12px;
                }

                #live-chat h5 {
                    font-size: 10px;
                }

                #live-chat form {
                    padding: 24px;
                }

                #live-chat input[type="text"] {
                    border: 1px solid #ccc;
                    border-radius: 3px;
                    padding: 8px;
                    outline: none;
                    width: 234px;
                }

                .chat-message-counter {
                    background: #e62727;
                    border: 1px solid #fff;
                    border-radius: 50%;
                    display: none;
                    font-size: 12px;
                    font-weight: bold;
                    height: 28px;
                    left: 0;
                    line-height: 28px;
                    margin: -15px 0 0 -15px;
                    position: absolute;
                    text-align: center;
                    top: 0;
                    width: 28px;
                }

                .chat-close {
                    background: #1b2126;
                    border-radius: 50%;
                    color: #fff;
                    display: block;
                    float: right;
                    font-size: 10px;
                    height: 16px;
                    line-height: 16px;
                    margin: 2px 0 0 0;
                    text-align: center;
                    width: 16px;
                }

                .chat {
                    background: #fff;
                }

                .chat-history {
                    height: 252px;
                    padding: 8px 24px;
                    overflow-y: scroll;
                }

                .chat-message {
                    margin: 16px 0;
                }

                .chat-message img {
                    border-radius: 50%;
                    float: left;
                }

                .chat-message-content {
                    margin-left: 56px;
                }

                .chat-time {
                    float: right;
                    font-size: 10px;
                }

                .chat-feedback {
                    font-style: italic;	
                    margin: 0 0 0 80px;
                }

            </style>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            <script type="text/javascript">
                (function () {

                    $('#live-chat header').on('click', function () {

                        $('.chat').slideToggle(300, 'swing');
                        $('.chat-message-counter').fadeToggle(300, 'swing');

                    });

                    $('.chat-close').on('click', function (e) {

                        e.preventDefault();
                        $('#live-chat').fadeOut(300);

                    });

                });
            </script>

        </head>
        <body>
            <h1 style="text-align:center; color: springgreen; " >Who is this?</h1>
            <div class="card" id="app">
                <img src="<?php echo $image_addr; ?>" alt="Yusuff Mustapha" style="width:98%">
                <h1><?php echo $name; ?></h1>
                <p class="title">Mediocre Developer & Python Evangelist</p>
                <p>Of course, I'm Social!</p>
                <p>
                    <a href="https://www.facebook.com/mustaphee94"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.twitter.com/iam_oluwamusty"><i class="fa fa-twitter"></i></a> 
                    <a href="https://www.linkedin.com/in/yusuff-mustapha/"><i class="fa fa-linkedin"></i></a> 
                    <a href="https://www.instagram.com/iam_oluwamusty"><i class="fa fa-instagram"></i></a> 
                </p>
                <hr/>
                <i class="fa fa-cloud"> <a href="https://mustaphee.github.io"> See me here!</a></i>
                <hr/>
                <p><button type="button"><i class="fa fa-thumbs-up">Chat with my Bot</a></i></button></p>
                <p><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span></p>
            </div>
            <div id="live-chat">

                <header class="clearfix">

                    <a href="#" class="chat-close">x</a>

                    <h4>Talk to Amity</h4>

                    <span class="chat-message-counter">3</span>

                </header>

                <div class="chat">

                    <div class="chat-history">

                        <div class="chat-message clearfix" v-for="chat in chats">

                            <img v-if="chat.sender == 'bot'" src="https://res.cloudinary.com/hnginternship4/image/upload/v1525955602/amity.jpg" alt="" width="32" height="32">

                            <div class="chat-message-content clearfix">

                                <span class="chat-time">{{Date()}}</span>

                                <h5>{{chat.sender}}</h5>

                                <p>{{chat.message}}</p>

                            </div> <!-- end chat-message-content -->
                            <hr>
                        </div> <!-- end chat-message -->
                    </div> <!-- end chat-history -->



                    <fieldset>

                        <input type="text" v-model="question" placeholder="Type your message…" autofocus>
                        <button class="butt" v-on:click="sendUserQuestion" v-bind:class="{disabled:isDis}">Send</button>

                    </fieldset>



                </div> <!-- end chat -->

            </div> <!-- end live-chat -->

            <script>


                var app = new Vue({
                    el: '#live-chat',
                    data: {
                        bot: false,
                        question: "",
                        chats: [
                            {sender: "bot", message: "hi, welcome to my interface"},
                            {sender: "bot", message: "reply 'help' to get the list of commands available"}
                        ],

                    },
                    computed: {
                        isDis: function () {
                            return this.question === ""
                        }
                    },
                    methods: {
                        togglebot: function () {
                            this.bot = !this.bot
                        },
                        sendUserQuestion: function () {
                            var vm = this
                            if (this.question !== "") {
                                chat = {sender: "you",
                                    message: this.question
                                }
                                this.chats.push(chat)

                                $.ajax({
                                    type: "POST",
                                    url: "profiles/mustapha.php",
                                    data: {"req": vm.question},
                                    success: function (res) {
                                        chat2 = {
                                            sender: "bot", message: res
                                        }
                                        vm.chats.push(chat2)
                                    },
                                    dataType: 'json'
                                });
                                this.question = ""
                            }
                        }

                    }
                })

            </script>
        </body>
</html>

            <?php
        }
        ?>