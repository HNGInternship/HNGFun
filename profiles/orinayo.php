<?php
if (!defined('DB_USER')) {
    require "../../config.php";
}
try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE, DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

try {
    $sql = "SELECT * FROM secret_word";
    $query = $conn->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetch();
    $secret_word = $result['secret_word'];
           
    $sql2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="orinayo"';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $me = $q2->fetch();
}
catch (PDOException $e) {
    throw $e;
}
global $conn, $user_input_array2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function Validate_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_input = Validate_input($_POST["userInput"]);

    function Is_Training_question($user_input)
    {
        if (strpos($user_input, 'train:') === 0) {
            return true;
        }
        return false;
    }

    if (Is_Training_question($user_input)) {
        function Split_Training_question($user_input)
        {
            $user_input = substr_replace($user_input, '', 0, 6);
            $training_statement = explode("#", $user_input);
            $training_statement = array_map('trim', $training_statement);
            return $training_statement;
        }

        $training_statement = Split_Training_question($user_input);
        
        function Validate_Training_question($training_statement)
        {
            $password = 'password';
            if ($password == $training_statement[2]) {
                global $conn;
                $sql = "INSERT INTO chatbot (question, answer) VALUES ('".$training_statement[0]."', '".$training_statement[1]."')";                    
                $conn->exec($sql);
                $answer = array("answer"=>"New record created successfully");
                return $answer['answer'];
            } else {
                $answer = array("answer"=>"I would love to learn something new, I just need you to put in my password.");
                return $answer['answer'];                
            }                    
        }
        $answer = Validate_Training_question($training_statement);
        echo $answer;
        exit();
    } else {
        function Random_Question_Or_answer($q_or_a) 
        {
            $q_or_a_count = count($q_or_a);
            $random_q_or_a_index = rand(0, ($q_or_a_count - 1));
            $result = $q_or_a[$random_q_or_a_index];
            return $result;
        }

        function Answer_Is_A_function($answer)
        {
            if ($answer['answer'] == "Get_Hotelsng_wikipage(") {
                return true; 
            }
            return false;
        }
        
        function Encode_answer($answer)
        {
            if (Answer_Is_A_function($answer)) {
                return Get_Hotelsng_wikipage();        
            } else {
                return $answer['answer'];
            }
        }
        
        function Get_answer($user_input) 
        {
            global $conn;
            $stmt = $conn->prepare("SELECT answer FROM chatbot WHERE question='".$user_input."'"); 
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $answers = $stmt->fetchAll();
            return $answers;
        }

        $answers = Get_answer($user_input);

        if (count($answers) > 1) {
            $answer = Random_Question_Or_answer($answers);
            $answer = Encode_answer($answer);
            echo $answer;
            exit();     
        } elseif (count($answers) == 1) {
            $answer = $answers[0];
            $answer = Encode_answer($answer);
            echo $answer;
            exit();
        } 
        

        function Key_Word_search($user_input_array, $and_or)
        {      
            foreach ($user_input_array as &$value) {
                $value = 'question LIKE "%'.$value.'%" '.$and_or;
            }
            unset($value);
            $user_input_modified = implode(" ", $user_input_array);
            return $user_input_modified;
        }

        function Get_Possible_question($question_modified, $empty_string, $index)
        {
            global $conn;
            $question_selector = substr_replace($question_modified, $empty_string, $index);
            $stmt = $conn->prepare("SELECT question FROM chatbot WHERE ".$question_selector); 
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $questions = $stmt->fetchAll();
            return $questions;    
        }
        
        function Sort_Array_By_count($a, $b) 
        {
            return (count($b) - count($a));
        }

        function Sort_Possible_questions($questions, $user_input)
        {
            $possible_questions = array();    
            foreach ($questions as $each) {
                $each_question = explode(" ", $each['question']);           
                $common_words = array_intersect($each_question, $user_input);
                array_push($possible_questions, $common_words);
            }
            usort($possible_questions, 'sort_array_by_count'); 
            return $possible_questions;
        }
    
        function Best_Matching_question($possible_questions)
        {
            $sorted_possible_questions = array();
            foreach ($possible_questions as $val) {
                if (count($possible_questions[0]) > count($val)) {
                    array_push($sorted_possible_questions, $val);
                }
            }
            $possible_questions = array_filter(
                $possible_questions, function ($item) use ($sorted_possible_questions) {
                    return !in_array($item, $sorted_possible_questions);
                }
            );
            return $possible_questions;
        }

        function Possible_question($user_input)
        {
            global $user_input_array2;
            $user_input_array = $user_input_array2 = explode(" ", $user_input);
            $user_input_modified = Key_Word_search($user_input_array, "or");
            $questions = Get_Possible_question($user_input_modified, '', -3);
            return $questions;
        }

        $questions = Possible_question($user_input);

        if ($questions == false) {
            $answer = array('answer' => 'Sorry, I do not know this question. Train me maybe?');
            echo $answer;
            exit();
        } else {
            global $user_input_array2;
            $possible_questions = Sort_Possible_questions($questions, $user_input_array2);
            $possible_questions = Best_Matching_question($possible_questions);
            if (count($possible_questions) == 1) {
                $possible_question_modified = Key_Word_search($possible_questions[0], "and");
                $question = Get_Possible_question($possible_question_modified, '', -4);
                $question = $question[0];
                $answer = Get_answer($question);
                $answer = Encode_answer($answer);
                echo $answer;
                exit(); 
            } elseif (count($possible_questions) > 1) {
                $question = Random_Question_Or_answer($possible_questions);
                $question_modified = Key_Word_search($question, "and");
                $questions = Get_Possible_question($question_modified, '', -4);
                $question = Random_Question_Or_answer($questions);
                $question = $question['question'];
                $answers = Get_answer($question);
                $answer = Random_Question_Or_answer($answers);
                $answer = Encode_answer($answer);
                echo $answer;
                exit();
            }
        }
    }         

} else {
?> 
<?php 
function Get_Hotelsng_wikipage() 
{
    $api = "https://en.wikipedia.org/w/api.php?action=opensearch&search="."hotels.ng"."&format=json&callback=?";
    $result = file_get_contents($api);
    $result = substr_replace($result, "", 0, 5);
    $result = substr_replace($result, "", -1);
    $result = json_decode($result, true);
    $result = array("answer"=>"<a href=".$result[3][0].">".$result[1][0]."</a><p>".$result[2][0]."</p>");
    return $result;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Roboto|Spectral+SC" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
</head>
<body>
<div class="container-fluid content">
                <h3 class="text-center text-dark display-5">Hello, I'm
                    <span class="display-4" id=name style="color: #f4511e">
                        <?php echo $me['name'] ?> </span>
                </h3>
                <br/>
                <?php echo '<img class="d-block rounded-circle profile-pic img-fluid mx-auto" style="height: 18em" 
     src="'.$me['image_filename'].'" alt="Orinayo Oyelade" />' ?>
                </br>
                <h5 class="text-dark bio"> I'm an Android &amp; Full-stack developer from Nigeria. I love complete software design and development,
                    specialize in creating custom-built applications for clients with a passion for creating intuitive, dynamic
                    user experiences.</h5>
                <br/>
                <a href="#portfolio" class="btn btn-light checkwork mt-4 mb-4" role="button">VIEW MY WORK</a>
            </div>
            <div class='container fixed-bottom' id='chat-window'>
                <button type="button" class="btn-sm btn-success chat-btn">
                    Chat
                </button>
                <div class='container' id='chat-bot'>
                    <div id='chat-bot-messages'>
                        <p class='chat-text'>
                            <i class="fa fa-user"></i> Hello, I am Orinayo's bot.</p>
                        <p class='chat-text'>
                            <i class="fa fa-user"></i> Commands
                            <br>
                            <kbd>aboutbot</kbd> returns my version number.
                            <br>
                            <kbd>What is your name</kbd> returns my name
                            <br>
                            <kbd>How were you made</kbd> returns how I was created
                            <br>
                            <kbd>Hotelsng wiki page</kbd> returns a link to Hotelsng wiki page
                            <br> .
                        </p>
                        <p class='chat-text'>
                            <i class="fa fa-user"></i>
                            My training format is:
                            <kbd>train Your question # The answer # my password</kbd>.
                            <br> I prefer questions beginning with an uppercase letter. I don't need a question mark at the end
                            either.
                            <br> I'm also able to try and find answers using keywords.
                        </p>
                    </div>
                    <form id='chatBotForm' method="post">
                        <div class='form-row'>
                            <label for="userInput" class="col-form-label">Your Message</label>
                            <br>
                            <input name="userInput" type="text" id='userInput' class="form-control" required="required" placeholder="Type your message"
                            />
                        </div>
                        <div class='text-center submitInput'>
                            <button type='submit' class="btn btn-light">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <div class="container-fluid content" id="portfolio" style="background-color: #f4511e">
                <h3 class="text-center text-white display-4 mt-4" style="font-family: 'Spectral SC', serif;">PROJECTS</h3>
                <br/>
                <div class="row">
                    <div class="col-sm-10 mx-auto pb-5">
                        <div id="carouselControls" class="carousel slide" data-pause="hover" data-wrap=true>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523639851/cbtapp.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523634850/webpage2.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523638233/android.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://res.cloudinary.com/orinayo/image/upload/v1523639348/contactmanager.png" alt="Fourth slide">
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--About-->
            <div class="container-fluid content mb-5">
                <h3 class="text-center display-4 mt-4" style="font-family: 'Spectral SC', serif;">ABOUT</h3>
                <br/>
                <div class="container mt-4 pb-2">
                    <div class="row self-eval mx-auto">
                        <div class="col-sm-5">
                            <!--measurement chart-->
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    HTML
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:72%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:8%">
                                    90%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    JavaScript
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:64%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:16%">
                                    80%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    Bootstrap
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:64%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:16%">
                                    80%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    CSS
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:56%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:24%">
                                    70%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    XML
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:56%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:24%">
                                    70%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    Java
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:48%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:32%">
                                    60%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    TypeScript
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:40%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:40%">
                                    50%
                                </div>
                            </div>
                            <div class="progress col self-eval">
                                <div class="progress-bar bg-danger" role="progressbar" style="width:20%">
                                    Node.js
                                </div>
                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:40%">
                                </div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width:40%">
                                    50%
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <!-- strength icons-->
                        <div class="col-sm-3">
                            <div class="row">
                                <dl>
                                    <i class="col fa fa-bolt self-eval strengths text-warning"></i>
                                    <span class="icon-desc">
                                        <strong>Quick</strong>
                                        <br/>Fast load times is of importance.
                                    </span>
                                    <i class="col fa fa-exchange self-eval strengths text-success"></i>
                                    <span class="icon-desc">
                                        <strong>Responsive</strong>
                                        <br/> Layout works on any device.
                                    </span>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <dl>
                                    <i class="col fa fa-rocket self-eval strengths text-info"></i>
                                    <span class="icon-desc">
                                        <strong>Dynamic</strong>
                                        <br/>Make pages come alive.
                                    </span>
                                    <i class="col fa fa-heart self-eval strengths text-danger"></i>
                                    <span class="icon-desc">
                                        <strong>Invested</strong>
                                        <br/> Built with love.
                                    </span>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--contact-->
            <div class="container-fluid content bg-primary text-white">
                <h3 class="text-center display-4 mt-4" style="font-family: 'Spectral SC', serif;">CONTACT</h3>
                <br/>
                <p class="text-center" style="font-family: 'Roboto', sans-serif; font-size: xx-large;">HAVE A QUESTION OR SOME COOL PROJECT TO WORK ON TOGETHER?</p>
                <p style="font-family: 'Roboto', sans-serif;">Just send me a direct message or contact me through social sites listed below.</p>
                <a href="mailto:orinayooyelade@gmail.com" class="btn btn-dark directMessage mt-4 mb-4" role="button" style="font-family: 'Roboto', sans-serif;">GET IN TOUCH
                    <i class="fa fa-envelope text-danger"></i>
                </a>
                <div class="container-fluid socialMedia mx-auto">
                    <div class="row mx-auto align-items-center">
                        <div class="col">
                            <a href="https://www.facebook.com/segun.oyelade" target="_blank" class="fa fa-facebook text-dark mr-2"></a>
                            <a href="https://twitter.com/IamPattern" target="_blank" class="fa fa-twitter text-dark mr-2"></a>
                            <a href="https://github.com/orinayo/" target="_blank" class="fa fa-github text-dark mr-2"></a>
                            <a href="https://www.linkedin.com/in/oluwasegun-oyelade-b4973ba7/" target="_blank" class="fa fa-linkedin text-dark mr-2"></a>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .content {
                    padding-top: 10px;
                    text-align: center;
                }

                .profile-pic {
                    width: 18em !important;
                }

                .bio {
                    text-align: center;
                    margin: 0px 10px;
                    font-family: 'Roboto', sans-serif;
                }

                #chat-window,
                #chat-bot,
                .chat-text,
                .chat-btn,
                .submitInput {
                    display: none;
                }

                @media (min-width: 48em) {
                    .bio {
                        text-align: center;
                        margin: 0px 150px;
                        font-family: 'Roboto', sans-serif;
                    }

                    #chat-window,
                    #chat-bot,
                    .chat-text,
                    .chat-btn,
                    .submitInput {
                        display: block;
                    }

                    #chat-window {
                        width: 20%;
                        margin-right: 0.5em;
                    }

                    #chat-bot {
                        background-color: #15AB5F;
                        margin-top: 2px;
                        padding-top: 1em;
                        padding-bottom: 1em;
                        max-height: 25em;
                        overflow-y: scroll;
                    }

                    .chat-text {
                        background-color: #fff;
                        padding-right: 0.3em;
                        padding-left: 0.3em;
                        border-radius: 4px;
                    }

                    .chat-btn {
                        float: right;
                    }

                    .submitInput {
                        margin-top: 1em;
                    }

                }

                .checkwork {
                    border: 1px solid #f4511e;
                    color: #f4511e;
                    transition-duration: 0.4s;
                    font-family: 'Roboto', sans-serif;
                }

                .checkwork:hover {
                    background-color: #f4511e;
                    color: black;
                }

                .carousel-control-prev-icon,
                .carousel-control-next-icon {
                    height: 30px;
                    width: 30px;
                    outline: black;
                    background-size: 100%, 100%;
                    border-radius: 50%;
                    border: 1px solid black;
                    background-image: none;
                }

                .carousel-control-next-icon:after {
                    content: '>';
                    font-size: 15px;
                    color: red;
                }

                .carousel-control-prev-icon:after {
                    content: '<';
                    font-size: 15px;
                    color: red;
                }

                .self-eval {
                    text-align: center;
                    padding-bottom: 20px;
                }

                .progress {
                    font-family: 'Roboto', sans-serif;
                    height: 53px;
                    font-size: 13px;
                    background-color: #fff;
                }

                .strengths {
                    font-size: 80px;
                    text-align: center;
                    display: inline-block;
                }

                .icon-desc {
                    font-family: 'Roboto', sans-serif;
                    display: block;
                    text-align: center;
                }

                .socialMedia {
                    font-size: 30px;
                }
            </style>
            <script>
                $(document).ready(function () {
                    $("#chatBotForm").submit(function (event) {
                        event.preventDefault();
                        let $chatMessages = $('#chat-bot-messages');
                        let $chatBot = $('#chat-bot');
                        let $userInput = $('input[name="userInput"]');
                        let $userInputValue = $userInput.val();
                        $chatMessages.append("<p class='chat-text text-right'>" + $userInputValue +
                            " <i class='fa fa-user'></i> </p>");
                        if ($userInputValue == 'aboutbot') {
                            $chatMessages.append(
                                "<p class='chat-text'><i class='fa fa-user'></i> Version1.0</p>");
                            $chatBot.scrollTop($chatBot[0].scrollHeight);
                            $userInput.val('');
                            return;
                        }

                    
                        $.ajax({
                            type: 'POST',
                            url: 'profiles/orinayo.php',
                            data: {
                                userInput: $userInputValue
                            },
                            dataType: 'text',
                            success: function( answer ){
                                if(answer == 'Get_Hotelsng_wikipage()') {
                                    answer = <?php echo json_encode(Get_Hotelsng_wikipage())?>;
                                    $chatMessages.append(
                                    "<p class='chat-text'><i class='fa fa-user'></i> " + answer['answer'] + "</p>");
                                    $chatBot.scrollTop($chatBot[0].scrollHeight);
                                    $userInput.val('');
                                } else {
                                $chatMessages.append(
                                "<p class='chat-text'><i class='fa fa-user'></i> " + answer + "</p>");
                                $chatBot.scrollTop($chatBot[0].scrollHeight);
                                $userInput.val('');
                                }
                            } 
                            });
                        });

                    $("#name").hide();
                    $("#name").fadeIn(2000);

                    $("a").on('click', function (event) {
                        if (this.hash !== "") {
                            event.preventDefault();
                            var hash = this.hash;
                            $('html, body').animate({
                                scrollTop: $(hash).offset().top
                            }, 800, function () {
                                window.location.hash = hash;
                            });
                        }
                    });
                    
                    window.sr = ScrollReveal();
                    sr.reveal('.progress', {
                        duration: 2000,
                        origin: 'left'
                    });
                    sr.reveal('.strengths', {
                        duration: 2000,
                        origin: 'right'
                    });

                    $(".chat-btn").click(function () {
                        $("#chat-bot").toggle();
                    });
                });
        </script>
    </body>
</html>

<?php } ?>
