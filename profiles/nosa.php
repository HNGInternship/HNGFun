<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
  if(!isset($conn)) {
        include '../../config.php';
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  }
  
    if(isset($_POST['q']) && $_POST['q'] != '') {
      $q = trim($_POST['q']);

      $words = explode(':', $q);
      if((count($words) > 1) && ($words[0] == 'train')) {
        $qa_array = explode('#', $words[1]);

        $question = trim($qa_array[0]);
        $question_length = strlen($question);
        $question = ($question[$question_length - 1] == '?') ? substr($question, 0, $question_length -1) : $question;

        $answer = trim($qa_array[1]);
        $password = trim($qa_array[2]);

        if(count($qa_array) != 3 || $question == '' || $answer == '') {
          echo "Incorrect training format. Train me using <span class=\"highlight\">train: question # answer # password<span>"; exit();
    }
    
        if($password == 'password') {
          $sql = "select * from chatbot where question like '{$question}%'";
          $query = $conn->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);

          if($query->rowCount()) {
            foreach ($results as $result) {
              if($answer == trim($result->answer)) {
                echo "I already know this"; exit();
              }
            }

            $sql = "insert into chatbot(question, answer) values('{$question}', '{$answer}')";
            $query = $conn->prepare($sql);
            $query->execute();

            if($query->rowCount()) {
              echo "I'm familiar with this quetion. Although I have taken note of this answer as well. Thanks for retraininig me."; exit();
            }
            else{
              echo "Sorry, something went wrong."; exit();
            }
          }

          $sql = "insert into chatbot(question, answer) values('{$question}', '{$answer}')";
          $query = $conn->prepare($sql);
          $query->execute();

          if($query->rowCount()) echo "Okay, thanks."; exit();
          
        } else  echo "Your password is incorrect"; exit();
      }

      $q_length = strlen($q);
      $q = ($q[$q_length - 1] == '?') ? substr($q, 0, $q_length - 1) : $q; // Ensure '?' is always removed question
      $sql = "select * from chatbot where question like '$q%'";
      $query = $conn->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $numOfAnswers = $query->rowCount();

      if ($numOfAnswers == 1) echo $results[0]->answer;
      else if($numOfAnswers > 1) echo $results[rand(0, $numOfAnswers - 1)]->answer; 
      else echo "Sorry, I don't understand this. <br/><br/>If it's something you think I should know, train me using <span class=\"highlight\">train: question # answer # password<span>";
      
      exit();
    }
}

///////////////////

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'nosa'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<style>
  @media screen and (max-width: 480px) {
    html,
    body {
      min-width: 320px;
    }
  }

  body.is-loading *,
  body.is-loading *:before,
  body.is-loading *:after {
    -moz-animation: none !important;
    -webkit-animation: none !important;
    -ms-animation: none !important;
    animation: none !important;
    -moz-transition: none !important;
    -webkit-transition: none !important;
    -ms-transition: none !important;
    transition: none !important;
  }

  html {
    height: 100%;
  }

  body {
    background-color: #302f2f;
  }

  body:after {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: inherit;
    opacity: 0;
    z-index: 1;
    background-color: #eee;
    background-repeat: repeat, no-repeat;
    background-size: 100px 100px, cover;
    background-position: top left, center center;
    -moz-transition: opacity 1.75s ease-out;
    -webkit-transition: opacity 1.75s ease-out;
    -ms-transition: opacity 1.75s ease-out;
    transition: opacity 1.75s ease-out;
  }

  body.is-loading:after {
    opacity: 1;
  }

  /* Type */

  body,
  input,
  select,
  textarea {
    color: #414f57;
    font-family: "Source Sans Pro", Helvetica, sans-serif;
    font-size: 14pt;
    font-weight: 300;
    line-height: 2;
    letter-spacing: 0.2em;

  }

  .upper {
    text-transform: uppercase;
  }

  @media screen and (max-width: 1680px) {

    body,
    input,
    select,
    textarea {
      font-size: 11pt;
    }

  }

  @media screen and (max-width: 480px) {

    body,
    input,
    select,
    textarea {
      font-size: 10pt;
      line-height: 1.75;
    }

  }

  a {
    -moz-transition: color 0.2s ease, border-color 0.2s ease;
    -webkit-transition: color 0.2s ease, border-color 0.2s ease;
    -ms-transition: color 0.2s ease, border-color 0.2s ease;
    transition: color 0.2s ease, border-color 0.2s ease;
    color: inherit;
    text-decoration: none;
  }

  a:before {
    -moz-transition: color 0.2s ease, text-shadow 0.2s ease;
    -webkit-transition: color 0.2s ease, text-shadow 0.2s ease;
    -ms-transition: color 0.2s ease, text-shadow 0.2s ease;
    transition: color 0.2s ease, text-shadow 0.2s ease;
  }

  a:hover {
    color: #ff7496;
  }

  strong,
  b {
    color: #313f47;
  }

  em,
  i {
    font-style: italic;
  }

  p {
    margin: 0 0 1.5em 0;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    color: #313f47;
    line-height: 1.5;
    margin: 0 0 0.75em 0;
  }

  h1 a,
  h2 a,
  h3 a,
  h4 a,
  h5 a,
  h6 a {
    color: inherit;
    text-decoration: none;
  }

  h1 {
    font-size: 1.85em;
    letter-spacing: 0.22em;
    margin: 0 0 0.525em 0;
  }

  h2 {
    font-size: 1.25em;
  }

  h3 {
    font-size: 1em;
  }

  h4 {
    font-size: 1em;
  }

  h5 {
    font-size: 1em;
  }

  h6 {
    font-size: 1em;
  }

  @media screen and (max-width: 480px) {

    h1 {
      font-size: 1.65em;
    }

  }

  sub {
    font-size: 0.8em;
    position: relative;
    top: 0.5em;
  }

  sup {
    font-size: 0.8em;
    position: relative;
    top: -0.5em;
  }

  hr {
    border: 0;
    border-bottom: solid 1px #c8cccf;
    margin: 3em 0;
  }

  /* Form */

  form {
    margin: 0 0 1.5em 0;
  }

  form>.field {
    margin: 0 0 1.5em 0;
  }

  form>.field> :last-child {
    margin-bottom: 0;
  }

  label {
    color: #313f47;
    display: block;
    font-size: 0.9em;
    margin: 0 0 0.75em 0;
  }

  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="tel"],
  select,
  textarea {
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    border-radius: 4px;
    border: solid 1px #c8cccf;
    color: inherit;
    display: block;
    outline: 0;
    padding: 0 1em;
    text-decoration: none;
    width: 100%;
  }

  input[type="text"]:invalid,
  input[type="password"]:invalid,
  input[type="email"]:invalid,
  input[type="tel"]:invalid,
  select:invalid,
  textarea:invalid {
    box-shadow: none;
  }

  input[type="text"]:focus,
  input[type="password"]:focus,
  input[type="email"]:focus,
  input[type="tel"]:focus,
  select:focus,
  textarea:focus {
    border-color: #ff7496;
  }

  .select-wrapper {
    text-decoration: none;
    display: block;
    position: relative;
  }

  .select-wrapper:before {
    content: "";
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-transform: none !important;
  }

  .select-wrapper:before {
    color: #c8cccf;
    display: block;
    height: 2.75em;
    line-height: 2.75em;
    pointer-events: none;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    width: 2.75em;
  }

  .select-wrapper select::-ms-expand {
    display: none;
  }

  input[type="text"],
  input[type="password"],
  input[type="email"],
  select {
    height: 2.75em;
  }

  textarea {
    padding: 0.75em 1em;
  }

  input[type="checkbox"],
  input[type="radio"] {
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    display: block;
    float: left;
    margin-right: -2em;
    opacity: 0;
    width: 1em;
    z-index: -1;
  }

  input[type="checkbox"]+label,
  input[type="radio"]+label {
    text-decoration: none;
    color: #414f57;
    cursor: pointer;
    display: inline-block;
    font-size: 1em;
    font-weight: 300;
    padding-left: 2.4em;
    padding-right: 0.75em;
    position: relative;
  }

  input[type="checkbox"]+label:before,
  input[type="radio"]+label:before {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-transform: none !important;
  }

  input[type="checkbox"]+label:before,
  input[type="radio"]+label:before {
    border-radius: 4px;
    border: solid 1px #c8cccf;
    content: '';
    display: inline-block;
    height: 1.65em;
    left: 0;
    line-height: 1.58125em;
    position: absolute;
    text-align: center;
    top: 0.15em;
    width: 1.65em;
  }

  input[type="checkbox"]:checked+label:before,
  input[type="radio"]:checked+label:before {
    color: #ff7496;
    content: '\f00c';
  }

  input[type="checkbox"]:focus+label:before,
  input[type="radio"]:focus+label:before {
    border-color: #ff7496;
  }

  input[type="checkbox"]+label:before {
    border-radius: 4px;
  }

  input[type="radio"]+label:before {
    border-radius: 100%;
  }

  ::-webkit-input-placeholder {
    color: #616f77 !important;
    opacity: 1.0;
  }

  :-moz-placeholder {
    color: #616f77 !important;
    opacity: 1.0;
  }

  ::-moz-placeholder {
    color: #616f77 !important;
    opacity: 1.0;
  }

  :-ms-input-placeholder {
    color: #616f77 !important;
    opacity: 1.0;
  }

  .formerize-placeholder {
    color: #616f77 !important;
    opacity: 1.0;
  }

  /* Icon */

  .icon {
    text-decoration: none;
    position: relative;
    border-bottom: none;
  }

  .icon:before {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-transform: none !important;
  }

  .icon>.label {
    display: none;
  }

  /* List */

  ol {
    list-style: decimal;
    margin: 0 0 1.5em 0;
    padding-left: 1.25em;
  }

  ol li {
    padding-left: 0.25em;
  }

  ul {
    list-style: disc;
    margin: 0 0 1.5em 0;
    padding-left: 1em;
  }

  ul li {
    padding-left: 0.5em;
  }

  ul.alt {
    list-style: none;
    padding-left: 0;
  }

  ul.alt li {
    border-top: solid 1px #c8cccf;
    padding: 0.5em 0;
  }

  ul.alt li:first-child {
    border-top: 0;
    padding-top: 0;
  }

  ul.icons {
    cursor: default;
    list-style: none;
    padding-left: 0;
    margin-top: -0.675em;
  }

  ul.icons li {
    display: inline-block;
    padding: 0.675em 0.5em;
  }

  ul.icons li a {
    text-decoration: none;
    position: relative;
    display: block;
    width: 3.75em;
    height: 3.75em;
    border-radius: 100%;
    border: solid 1px #000;
    line-height: 3.75em;
    overflow: hidden;
    text-align: center;
    text-indent: 3.75em;
    white-space: nowrap;
  }

  ul.icons li a:before {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-transform: none !important;
  }

  ul.icons li a:before {
    color: #000;
    /* text-shadow: 1.25px 0px 0px #262627, -1.25px 0px 0px #262627, 0px 1.25px 0px #262627, 0px -1.25px 0px #262627; */
  }

  ul.icons li a:hover:before {
    /* text-shadow: 1.25px 0px 0px #05f, -1.25px 0px 0px #05f, 0px 1.25px 0px #05f, 0px -1.25px 0px #05f; */
    color: #05f;
  }

  ul.icons li a:before {
    position: absolute;
    top: 0;
    left: 0;
    width: inherit;
    height: inherit;
    font-size: 1.85rem;
    line-height: inherit;
    text-align: center;
    text-indent: 0;
  }

  ul.icons li a:hover {
    border-color: #05f;
  }

  @media screen and (max-width: 480px) {

    ul.icons li a:before {
      font-size: 1.5rem;
    }

  }

  ul.actions {
    cursor: default;
    list-style: none;
    padding-left: 0;
  }

  ul.actions li {
    display: inline-block;
    padding: 0 0.75em 0 0;
    vertical-align: middle;
  }

  ul.actions li:last-child {
    padding-right: 0;
  }

  dl {
    margin: 0 0 1.5em 0;
  }

  dl dt {
    display: block;
    margin: 0 0 0.75em 0;
  }

  dl dd {
    margin-left: 1.5em;
  }

  /* Button */

  input[type="submit"],
  input[type="reset"],
  input[type="button"],
  button,
  .button {
    -moz-appearance: none;
    -webkit-appearance: none;
    -ms-appearance: none;
    appearance: none;
    -moz-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
    -webkit-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
    -ms-transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
    display: inline-block;
    height: 2.75em;
    line-height: 2.75em;
    padding: 0 1.5em;
    background-color: transparent;
    border-radius: 4px;
    border: solid 1px #c8cccf;
    color: #414f57 !important;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    white-space: nowrap;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover,
  input[type="button"]:hover,
  button:hover,
  .button:hover {
    border-color: #ff7496;
    color: #ff7496 !important;
  }

  input[type="submit"].icon,
  input[type="reset"].icon,
  input[type="button"].icon,
  button.icon,
  .button.icon {
    padding-left: 1.35em;
  }

  input[type="submit"].icon:before,
  input[type="reset"].icon:before,
  input[type="button"].icon:before,
  button.icon:before,
  .button.icon:before {
    margin-right: 0.5em;
  }

  input[type="submit"].fit,
  input[type="reset"].fit,
  input[type="button"].fit,
  button.fit,
  .button.fit {
    display: block;
    width: 100%;
    margin: 0 0 0.75em 0;
  }

  input[type="submit"].small,
  input[type="reset"].small,
  input[type="button"].small,
  button.small,
  .button.small {
    font-size: 0.8em;
  }

  input[type="submit"].big,
  input[type="reset"].big,
  input[type="button"].big,
  button.big,
  .button.big {
    font-size: 1.35em;
  }

  input[type="submit"].disabled,
  input[type="submit"]:disabled,
  input[type="reset"].disabled,
  input[type="reset"]:disabled,
  input[type="button"].disabled,
  input[type="button"]:disabled,
  button.disabled,
  button:disabled,
  .button.disabled,
  .button:disabled {
    -moz-pointer-events: none;
    -webkit-pointer-events: none;
    -ms-pointer-events: none;
    pointer-events: none;
    opacity: 0.5;
  }

  /* Main */

  #main {
    position: relative;
    max-width: 100%;
    min-width: 27em;
    padding: 4.5em 3em 3em 3em;
    background: #ffffff;
    border-radius: 4px;
    cursor: default;
    opacity: 0.95;
    text-align: center;
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -moz-transform: rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    -ms-transform: rotateX(0deg);
    transform: rotateX(0deg);
    -moz-transition: opacity 1s ease, -moz-transform 1s ease;
    -webkit-transition: opacity 1s ease, -webkit-transform 1s ease;
    -ms-transition: opacity 1s ease, -ms-transform 1s ease;
    transition: opacity 1s ease, transform 1s ease;
  }

  #main .avatar {
    position: relative;
    display: block;
    margin-bottom: 1.5em;
  }

  #main .avatar img {
    display: block;
    margin: 0 auto;
    border-radius: 100%;
    box-shadow: 0 0 0 1.5em #ffffff;
  }

  #main .avatar:before {
    content: '';
    display: block;
    position: absolute;
    top: 50%;
    left: -3em;
    width: calc(100% + 6em);
    height: 1px;
    z-index: -1;
    background: #c8cccf;
  }

  @media screen and (max-width: 480px) {

    #main {
      min-width: 0;
      width: 100%;
      padding: 4em 2em 2.5em 2em;
    }

    #main .avatar:before {
      left: -2em;
      width: calc(100% + 4em);
    }

  }

  body.is-loading #main {
    opacity: 0;
    -moz-transform: rotateX(15deg);
    -webkit-transform: rotateX(15deg);
    -ms-transform: rotateX(15deg);
    transform: rotateX(15deg);
  }

  /* Footer */

  #footer {
    -moz-align-self: -moz-flex-end;
    -webkit-align-self: -webkit-flex-end;
    -ms-align-self: -ms-flex-end;
    align-self: flex-end;
    width: 100%;
    padding: 1.5em 0 0 0;
    color: rgba(255, 255, 255, 0.75);
    cursor: default;
    text-align: center;
  }

  #footer .copyright {
    margin: 0;
    padding: 0;
    font-size: 0.9em;
    list-style: none;
  }

  #footer .copyright li {
    display: inline-block;
    margin: 0 0 0 0.45em;
    padding: 0 0 0 0.85em;
    border-left: solid 1px rgba(255, 255, 255, 0.5);
    line-height: 1;
  }

  #footer .copyright li:first-child {
    border-left: 0;
  }

  /* Wrapper */

  #wrapper {
    display: -moz-flex;
    display: -webkit-flex;
    display: -ms-flex;
    display: flex;
    -moz-align-items: center;
    -webkit-align-items: center;
    -ms-align-items: center;
    align-items: center;
    -moz-justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-justify-content: space-between;
    justify-content: space-between;
    -moz-flex-direction: column;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -moz-perspective: 1000px;
    -webkit-perspective: 1000px;
    -ms-perspective: 1000px;
    perspective: 1000px;
    position: relative;
    min-height: 100%;
    padding: 1.5em;
    z-index: 2;
  }

  #wrapper>* {
    z-index: 1;
  }

  #wrapper:before {
    content: '';
    display: block;
  }

  @media screen and (max-width: 360px) {

    #wrapper {
      padding: 0.75em;
    }

  }

  body.is-ie #wrapper {
    height: 100%;
  }


  /* Slider */

  #main .avatar .container {
    display: table;
    overflow: hidden;
    margin: 0 auto;
    box-shadow: 0 0 0 1.5em #ffffff;


  }

  #main .avatar .container img {
    display: block;
    margin: 0;
    border-radius: 100%;
    box-shadow: none;
    width: inherit;
  }

  #slider,
  #slider2 {
    background-color: #ffffff;
    height: 150px;
    width: 150px;
    overflow: visible;
    position: relative;
    margin: auto;
  }

  #mask {
    overflow: hidden;
    height: 150px;
    border-radius: 100%;
  }

  #slider ul,
  #slider2 ul {
    margin: 0;
    padding: 0;
    position: relative;
  }

  #slider li,
  #slider2 li {
    width: 150px;
    /* Width Image */
    height: 150px;
    /* Height Image */
    position: absolute;
    top: 0;
    /* Original Position - Outside of the Slider */
    right: -325px;
    list-style: none;
    padding: 0;
  }

  #slider li.firstanimation {
    animation: cycle 25s linear infinite;
  }

  #slider li.secondanimation {
    animation: cycletwo 25s linear infinite;
  }

  #slider li.thirdanimation {
    animation: cyclethree 25s linear infinite;
  }

  #slider li.fourthanimation {
    animation: cyclefour 25s linear infinite;
  }

  #slider li.fifthanimation {
    animation: cyclefive 25s linear infinite;
  }

  @keyframes cycle {
    0% {
      right: 0px;
    }
    /* When you start the slide, the first image is already visible */
    4% {
      right: 0px;
    }
    /* Original Position */
    16% {
      right: 0px;
      opacity: 1;
      z-index: 0;
    }
    /* From 4% to 16 % = for 3 seconds the image is visible */
    20% {
      right: 325px;
      opacity: 0;
      z-index: 0;
    }
    /* From 16% to 20% = for 1 second exit image */
    21% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
    /* Return to Original Position */
    92% {
      right: -325px;
      opacity: 0;
      z-index: 0;
    }
    96% {
      right: -325px;
      opacity: 0;
    }
    /* From 96% to 100% = for 1 second enter image*/
    100% {
      right: 0px;
      opacity: 1;
    }
  }

  @keyframes cycletwo {
    0% {
      right: -325px;
      opacity: 0;
    }
    /* Original Position */
    16% {
      right: -325px;
      opacity: 0;
    }
    /* Starts moving after 16% to this position */
    20% {
      right: 0px;
      opacity: 1;
    }
    24% {
      right: 0px;
      opacity: 1;
    }
    /* From 20% to 24% = for 1 second enter image*/
    36% {
      right: 0px;
      opacity: 1;
      z-index: 0;
    }
    /* From 24% to 36 % = for 3 seconds the image is visible */
    40% {
      right: 325px;
      opacity: 0;
      z-index: 0;
    }
    /* From 36% to 40% = for 1 second exit image */
    41% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
    /* Return to Original Position */
    100% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
  }

  @keyframes cyclethree {
    0% {
      right: -325px;
      opacity: 0;
    }
    36% {
      right: -325px;
      opacity: 0;
    }
    40% {
      right: 0px;
      opacity: 1;
    }
    44% {
      right: 0px;
      opacity: 1;
    }
    56% {
      right: 0px;
      opacity: 1;
    }
    60% {
      right: 325px;
      opacity: 0;
      z-index: 0;
    }
    61% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
    100% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
  }

  @keyframes cyclefour {
    0% {
      right: -325px;
      opacity: 0;
    }
    56% {
      right: -325px;
      opacity: 0;
    }
    60% {
      right: 0px;
      opacity: 1;
    }
    64% {
      right: 0px;
      opacity: 1;
    }
    76% {
      right: 0px;
      opacity: 1;
      z-index: 0;
    }
    80% {
      right: 325px;
      opacity: 0;
      z-index: 0;
    }
    81% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
    100% {
      right: -325px;
      opacity: 0;
      z-index: -1;
    }
  }

  @keyframes cyclefive {
    0% {
      right: -325px;
      opacity: 0;
    }
    76% {
      right: -325px;
      opacity: 0;
    }
    80% {
      right: 0px;
      opacity: 1;
    }
    84% {
      right: 0px;
      opacity: 1;
    }
    96% {
      right: 0px;
      opacity: 1;
      z-index: 0;
    }
    100% {
      right: 325px;
      opacity: 0;
      z-index: 0;
    }
  }

  #main footer {
    padding: 50px 0 10px;
  }

  /* Override _navbar.scss */

  .navbar {
    background-color: transparent;
  }

  .nav-item {
    border-bottom: 3px solid transparent;
  }

  .navbar-light .navbar-nav .nav-link {
    color: rgb(245, 245, 245);
  }

  .navbar-light .navbar-nav .nav-link:focus,
  .navbar-light .navbar-nav .nav-link:hover {
    color: rgb(255, 255, 255);
  }

  .navbar-toggler {
    background-color: #fff;
  }

  /* ChatBot */

  .chat-button {
    background-color: transparent;
    /* color: #ff0085 !important; */
    border: 2px solid;
  }

  .chat-button * {
    color: inherit;
  }

  .chat-button .icon {
    font-size: 20px;
    margin-right: 10px;
  }


  .chat-button:hover {
    border-color: #05f;
    color: #05f !important;
  }

  /* .chat-button:hover * {
    color: #05f !important;
  } */

  #chatContainer {
    position: absolute;
    width: 100%;
    height: 100%;
    background: #fff;
    top: 0;
    left: 0;
    border-radius: inherit;
    overflow: hidden;
    text-align: left;
    font-family: monospace;
    letter-spacing: normal;
  }

  .chat-inner {
    height: 100%;
    position: relative;
  }

  .chat-toolbar {
    position: absolute;
    top: 0;
    height: 40px;
    line-height: 40px;
    border-bottom: 1px solid #ddd;
    width: 100%;
    background: #fff;
    text-align: center;
  }

  .chat-toolbar .icon {
    margin: 0;
    font-size: 27px;
    line-height: 40px;

  }

  .chat-toolbar .close-chat {
    float: right;
    border-width: 0 0 0 1px;
    border-color: #ddd !important;
    border-radius: 0;
  }

  .chat-message-box {
    height: 100%;
    padding: 40px 0 60px 0;
    background: #f9f9f9;
  }

  .chat-message-box-inner {

    overflow-y: scroll;
    height: 100%;
    padding-bottom: 20px;
  }

  .chat-box {
    position: absolute;
    background: #fff;
    bottom: 0;
    height: 60px;
    border-top: 1px solid #ddd;

    width: 100%;
  }

  .chat-message {

    max-width: 70%;
    margin-top: 20px;
    display: table;
    min-width: 100px;
  }

  .chat-message.right {
    float: right;
    /* margin-left:30%; */
  }

  .chat-avatar {

    height: 40px;
    width: 40px;

    border-radius: 20px;
    margin: 5px 15px;

  }

  .chat-message.left .chat-avatar {
    float: left;
    background: url("//res.cloudinary.com/thecommunity-ng/image/upload/v1525046460/robot-2154228_640_zq40sa.png") no-repeat;
    background-position: center;
    background-size: contain;
  }


  .chat-message.right .chat-avatar {
    float: right;
    border: 1px solid #000;
    height: 15px;
    width: 15px;
  }

  .chat-message.left .chat-text {
    margin-left: 69px;
    border-color: #05f;
  }

  .chat-message.right .chat-text {
    margin-right: 45px;

  }

  .chat-text {
    line-height: 18px;
    border: 1px solid #ddd;
    padding: 10px;
    background: #fff;
    box-shadow: 0px 3px 7px -2px rgba(0, 0, 0, 0.12156862745098039);
    border-radius: 20px;
  }

  #chatForm {
    height: 100%;
    padding: 10px;
    display: flex;
  }

  #sendButton {

    float: right;
    margin: 0;
    background: #05f;
    color: #fff !important;
    border-width: 0;

    border-radius: 20px;
  }

  #sendButton:hover {
    background: #063ca9;

  }

  #textBox {
    width: 100%;
    margin-right: 10px;
    height: 100%;
    border-radius: 20px;

  }

  #textBox:focus {
    border-color: #0452f5;
  }

  .highlight {
    background: rgba(250, 255, 169, 0.5019607843137255);
  }

  .msg-wrapper {
    display: table;
    width: 100%;
  }

  footer {
    background: transparent;
  }
  
  .is-loading {
    margin-top: 80px;
  }
</style>

<div class="is-loading">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Main -->
    <section id="main">
      <header>
        <span class="avatar">
          <div class="container">
            <div id="content-slider">
              <div id="slider">
                <div id="mask">

                  <ul>
                    <li id="first" class="firstanimation">
                      <img src="//res.cloudinary.com/thecommunity-ng/image/upload/v1524424889/6781915_t9diqx.jpg" />
                    </li>

                    <li id="second" class="secondanimation">
                      <img src="//res.cloudinary.com/thecommunity-ng/image/upload/v1524526219/IMG_20180416_160011_2_s4jhmo.jpg" />
                    </li>

                    <li id="third" class="thirdanimation">
                      <img src="//res.cloudinary.com/thecommunity-ng/image/upload/v1524526225/IMG_20180328_175857_tqansp.jpg" />
                    </li>

                    <li id="fourth" class="fourthanimation">
                      <img src="//res.cloudinary.com/thecommunity-ng/image/upload/v1524526249/IMG_20180308_130240_1_npzrlb.jpg" />
                    </li>

                    <li id="fifth" class="fifthanimation">
                      <img src="//res.cloudinary.com/thecommunity-ng/image/upload/v1524526219/IMG_20180416_160011_2_s4jhmo.jpg" />
                    </li>
                  </ul>

                </div>
                <div class="progress-bar"></div>
              </div>
            </div>
          </div>
        </span>
        <h1 class='upper'>Nosakhare Emmanuel</h1>
        <p class='upper'>Android &amp; Full Stack Web Developer</p>
        <p>HGN Slack @
          <?= $user->username; ?>
        </p>
      </header>

      <footer>
        <ul class="icons">
          <li>
            <a href="http://github.com/officialnosa" class="fa-github">Github</a>
          </li>
          <li>
            <a href="mailto:nonreactiv@gmail.com" class="fa-envelope">Email</a>
          </li>
          <li>
            <a href="http://twitter.com/theofficialnosa" class="fa-twitter">Twitter</a>
          </li>
          <li>
            <a href="http://instagram.com/_u/the.art.spirit" class="fa-instagram">Instagram</a>
          </li>
          <li>
            <a href="http://facebook.com/neonspark" class="fa-facebook">Facebook</a>
          </li>

        </ul>
      </footer>
      <button type="button" class="chat-button" data-toggle="collapse" data-target="#chatContainer">
        <!-- <span class="glyphicon glyphicon-asterisk"></span> -->
        <i class="fa fa-comment icon"></i>
        <span>Chat with my bot</span>
      </button>
      <div id="chatContainer" class="collapse">
        <div class="chat-inner">
          <div class="chat-message-box">
            <div class="chat-message-box-inner" id="messageList">
              <div class='left chat-message'>
                <div class='chat-avatar'></div>
                <div class='chat-text'>
                  Hi, I'm Nosa's chatbot
                </div>
              </div>
              <div class='left chat-message'>
                <div class='chat-avatar'></div>
                <div class='chat-text'>
                  I'm still learning. To train me use;
                  <span class='highlight'>train: your question # your answer # password'</span>
                </div>
              </div>

            </div>
          </div>
          <div class="chat-toolbar">
            <b style="margin-left: 66.22px;">Nosa's Chatbot</b>
            <button type="button" class="close-chat" data-toggle="dropdown" data-target="#chatContainer" aria-controls="chatContainer" aria-expanded="false">
              <i class="fa fa-times icon"></i>
            </button>
          </div>
          <div class="chat-box">
            <form id="chatForm">
              <input type="text" id="textBox" name="text" value="" placeholder="Say something!">
              <input type="submit" id="sendButton" name="submit" value="Send">
            </form>
          </div>
        </div>
      </div>
    </section>


  </div>
</div>
<script type="text/javascript">
  var messageArea = document.getElementById('messageList');
  var form = document.getElementById('chatForm');

  form.addEventListener('submit', handleRequest);

  function handleRequest(e) {
    var textElement = document.getElementById('textBox');

    var text = textElement.value;
    textElement.value = '';

    if (text) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          // console.log(this.responseText);
          addMyMessage(text);
          setTimeout(addBotMessage(this.responseText), 500);
          messageArea.scrollTop = messageArea.scrollHeight;
        }
      }
      xhttp.open('POST', 'profiles/nosa.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send('q=' + text);
    }

    e.preventDefault();
  }

  function addMyMessage(message) {
    var you = `<div class='msg-wrapper'><div class='right chat-message'  >
            <div class='chat-avatar'></div>
            <div class='chat-text'>
            `+ message + `
            </div>
          </div></div>`;
    messageArea.innerHTML += you;
  }

  function addBotMessage(answer) {
    var bot = `<div class='left chat-message'  >
            <div class='chat-avatar'></div>
            <div class='chat-text'>
            `+ answer + `
            </div>
          </div>`;
    messageArea.innerHTML += bot;
  }

</script>
