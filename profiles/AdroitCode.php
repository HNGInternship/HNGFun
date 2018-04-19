<?php
    # require "../db.php";
    try {
          $query = $conn->query("SELECT * FROM secret_word");
          $result = $query->fetch(PDO::FETCH_ASSOC);
          $secret_word = $result['secret_word'];

          $username = "AdroitCode";
          $fullname = "";
          $image = "";
          $query = $conn->query("SELECT * FROM interns_data where username='$username' limit 1");
          while($result = $query->fetch(PDO::FETCH_ASSOC)){
              $fullname = $result['name'];
              $image = $result['image_filename'];
          }

          /* My Chat Bot */
          function processMessage($question){
            try {
                $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
            } catch (PDOException $pe) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
            }
            /* check if in training mode (checking for train: in input) */
            $is_training = stripos($question, "train:");
            if ($is_training === false) { 
              /* bot not training, process question */
              $query = $conn->query("SELECT * FROM chatbot WHERE question LIKE '".$question."'");
              while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $answer = $result['answer'];
              }
              if (isset($answer)) {
                echo json_encode([
                  'question' => $question,
                  'answer' => $answer
                ]);
                return;
              }
              /* returned message when bot can't find answer*/
            }
            elseif ($is_training !== false) {
              # bot training process
              $train = substr($question, 6);
              $training = preg_replace('([\s]+)', ' ', trim($train));
              $sperate_ques_ans = explode("#", $training);
              if (count($sperate_ques_ans) == 2) {
                # it training password was not supplied;
                echo json_encode([
                  'question' => $question,
                  'answer' => "Please supply my training password to train me."
                ]);
                return; 
              }
              elseif (count($sperate_ques_ans) == 1 ) {
                # if training question's answer was not supplied
                echo json_encode([
                  'question' => $question,
                  'answer' => "Invalid training, supply training: question # answer # password to train me"
                ]);
                return;
              }
              $question = trim($sperate_ques_ans[0]);
              $answer = trim($sperate_ques_ans[1]);
              $password = trim($sperate_ques_ans[2]);
              if ($password === 'password') {
                # carry out insertion if password is supplied correctly
                #return "good to go on";
                $sql = "SELECT * FROM chatbot WHERE question LIKE '".$question."'";
                $query = $conn->query($sql);
                  while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $answer = $result['answer'];
                  }
                  if(isset($answer)){
                    echo json_encode([
                      'question' => $question,
                      'answer' => $answer
                    ]);
                    return;
                  }
                  else{
                    $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $question . "', '" . $answer . "')";
                    if ($conn->exec($sql)) {
                      # check if question was saved
                      echo json_encode([
                        'question' => $question,
                        'answer' => "Data Saved."
                      ]);
                      return;
                    }
                    echo json_encode([
                      'question' => $question,
                      'answer' => "Have not gotten your question"
                    ]);
                    return;
                  }
              }
              echo json_encode([
                'question' => $question,
                'answer' => "You are not authorized to train me, please supply a valid password"
              ]);
              return;
              //return "undergoing training";
            }
            echo json_encode([
              'question' => $question,
              'answer' => "Sorry am not smart enough to answer, pls train me using the train: syntax"
            ]);
            return;
            
          }
          if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
            # code...
            $message = $_POST['chatbotmessage'];
            $answer = processMessage($message);
            # echo $answer;
            return;
          }
          
          /* Chat Bot End */

      } 
  catch (PDOException $event) {
          throw $event;
  }
    //echo $secret_word;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adoit Adio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/adroitcode.css">
</head>
<body class="font-custo">
    <div class="lg:fixed bg-white xl:fixed flex sm:block md:block lg:inline-flex xl:flex">
        <!--- Left Main Content To Be Designed Here -->
        <div class="flex-1 bg-image h-screen lg:border-r xl:border-r">
            <div class="w-full h-auto">
                <div class="w-full h-16 pt-8 pl-8">
                    <div class="flex mb-4">
                        <div class="w-1/2 h-12">
                            <h1 class="text-2xl mb-8 font-semibold leading-tight"><?php echo $fullname; ?></h1>
                        </div>
                        <div class="hamburger w-1/2 h-12 text-right md:hidden z-40">
                            <svg class="mr-8 fill-current text-grey-dark h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z"/></svg>
                            <div class="menu lg:hidden z-50 bg-white border-2 border-grey pl-4 pb-4 pt-4 rounded-b-lg">
                                    <ul class="list-reset block">
                                        <li class="mr-6">
                                            <a class="no-underline text-teal-dark block items-center pt-2 pb-4 border-b border-teal" href="#about">About</a>
                                        </li>
                                        <li class="mr-6">
                                            <a class="no-underline text-teal-darker opacity-50 md:text-teal-darker md:opacity-100 block items-center pt-2 pb-4 border-b border-transparent hover:opacity-100 md:hover:border-teal" href="#chat">Chat</a>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full h-auto p-8">
                    <div class="w-2/5 h-64 mt-8 mb-4 ml-auto mr-auto border-2 border-gray rounded-lg shadow-lg">
                        <img class="w-full h-64 border-2 border-gray shadow-lg rounded-lg" src="http://res.cloudinary.com/dc9kfp5gt/image/upload/c_scale,e_art:incognito,h_340,q_100,w_330/v1519764764/IMG_20180227_214951_697_o3buej.jpg">
                    </div>
                </div>
                <div class="w-3/4 h-auto p-8 text-center ml-auto mr-auto mt-4 mb-auto">
                    <span>
                        <span class="text-lg">
                            Adroit, passionately curious Software Developer based in Lagos, Nigeria. I love learning and sharing knowledge about web development/design, am currently working on been a world class software developer, "<em class="text-teal"><?php echo $username; ?></em>".
                        </span>
                    </span>
                    <div class="h-24 mt-4">
                      <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="172.5" height="236.5" viewBox="0 0 172.5 236.5">
                        <defs>
                          <style>
                            <![CDATA[
                              .body-colour {
                                fill: #FE4444; 
                              }
                              .body-parts {
                                fill: #332E32;
                              }
                            ]]>
                          </style>
                          <circle cx="66.543" cy="41.647" r="7.343" id="left-outer"/>
                          <circle cx="105.404" cy="41.647" r="7.343" id="right-outer"/>
                            <mask id="left-mask">
                              <rect width="100%" height="100%" fill="white"></rect>
                              <use xlink:href="#left-outer" id="leftlid" fill="black"/>
                            </mask>
                            <mask id="right-mask">
                              <rect width="100%" height="100%" fill="white"></rect>
                              <use xlink:href="#right-outer" id="rightlid" fill="black"/>
                            </mask>
                        </defs>
                        <ellipse fill="#95c9de" cx="86.567" cy="226.176" rx="82.439" ry="7.011"/>
                      <g id="head">
                        <line x1="46" y1="10" x2="46" y2="40" stroke-width="3" stroke="black"/>
                        <line x1="126" y1="10" x2="126" y2="40" stroke-width="3" stroke="black"/>
                        <circle class="body-colour" cx="45.847" cy="7.221" r="4.771"/>
                        <circle class="body-colour" cx="125.556" cy="7.221" r="4.771"/>
                        <path class="body-parts" d="M93.073 21.262l15.334-13.28-3.004-4.195L90.48 20.1l.062.027c-1.237-.394-2.572-.62-3.973-.62-2.11 0-4.08.498-5.765 1.35L67.115 7.794l-2.575 2.48 14.245 11.882h.003c-2.123 1.72-3.448 4.132-3.448 6.81 0 5.222 5.026 9.457 11.23 9.457 6.2 0 11.23-4.235 11.23-9.458 0-3.18-1.87-5.988-4.727-7.702z"/>
                        <rect class="body-colour" x="51" y="27" width="70" height="44" rx="7" ry="7"/>
                        <circle class="body-colour" cx="52" cy="45" r="10"/>
                        <circle class="body-colour" cx="120" cy="45" r="10"/>
                        <g id="lefteye">
                          <circle fill="white" cx="66.543" cy="41.647" r="7.343"/>
                          <circle class="body-parts" cx="66.543" cy="41.647" r="4.045"/>
                          <use xlink:href="#left-outer" mask="url(#left-mask)" fill="#FFFFFF"/>
                        </g>
                        <g id="right-eye">
                          <circle fill="white" cx="105.404" cy="41.647" r="7.343"/>
                          <circle class="body-parts" cx="105.403" cy="41.647" r="4.276"/>
                          <use xlink:href="#right-outer" mask="url(#right-mask)" fill="#FFFFFF"/>
                        </g>
                        <use xlink:href="#right-eyelid" mask="url(#rightmask)" fill="#FFFFFF"/>
                        <circle fill="white" cx="85.9" cy="47.273" r="3.243"/>
                        <rect fill="white" x="70" y="60" width="32" height="5" rx="5" ry="5"/>
                        <rect class="body-parts" x="76" y="70" width="20" height="10"/>
                      </g>
                      <g id="body">
                        <rect class="body-colour" x="41" y="78" width="89" height="109" rx="10" ry="10"/>
                        <circle class="body-parts" cx="111.296" cy="119.922" r="5.893"/>
                        <rect fill="white" x="50" y="112" width="45" height="18" rx="4" ry="4"/>
                        <line x1="55" y1="122" x2="55" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="60" y1="122" x2="60" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="65" y1="122" x2="65" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="70" y1="122" x2="70" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="75" y1="122" x2="75" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="80" y1="122" x2="80" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="85" y1="122" x2="85" y2="129" stroke-width="1" stroke="black"/>
                        <line x1="90" y1="122" x2="90" y2="129" stroke-width="1" stroke="black"/>
                        <line class="gage" x1="60" y1="115" x2="60" y2="129" stroke-width="1.5" stroke="red"/>
                      </g>
                      <g id="left-arm">
                        <rect class="body-parts" x="26" y="100" width="6" height="120"/>
                        <circle class="body-colour" cx="29.615" cy="103.38" r="7.28"/>
                        <circle class="body-colour" cx="28.665" cy="156.831" r="5.864"/>
                        <rect class="body-parts" x="35" y="94" width="6" height="19"/>
                        <rect class="body-parts" x="15" y="208" width="27" height="19"/>
                        <rect class="body-colour" x="15" y="204" width="27" height="19"/>
                      </g>
                      <g id="right-arm">
                        <rect class="body-parts" x="138" y="100" width="6" height="120"/>
                        <circle class="body-colour" cx="140.747" cy="103.38" r="7.28"/>
                        <rect class="body-parts" x="130" y="94" width="6" height="19"/>
                        <circle class="body-colour" cx="141.767" cy="156.831" r="5.864"/>
                        <rect class="body-parts" x="128" y="208" width="27" height="19"/>
                        <rect class="body-colour" x="128" y="204" width="27" height="19"/>
                      </g>

                      </svg>
                      <span class="font-medium text-grey-darker">I'm focused and friendly, you <a href="#chat">can ask me anything.</a></span>
                    </div>
                </div>
                <div class="z-10  block pin-b bg-white pin-l h-16 mt-8 flex-1 w-1/2 sm:w-full sm:fixed md:w-full md:fixed text-center text-gray border-t pt-4">
                    <a class="no-underline mr-4" href="https://www.facebook.com/bollybkampo" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-facebook-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-facebook-icon">Facebook icon</title>
                            <path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0"/>
                        </svg>
                    </a>
                    <a class="no-underline mr-4" href="https://twitter.com/bollybkampo" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-twitter-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-twitter-icon">Twitter icon</title>
                            <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/>
                        </svg>
                    </a>
                    <a class="no-underline mr-4" href="https://medium.com/@ogundijiboladeadio" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-medium-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-medium-icon">Medium icon</title>
                            <path d="M2.846 6.36c.03-.295-.083-.586-.303-.784l-2.24-2.7v-.403H7.26l5.378 11.795 4.728-11.795H24v.403l-1.917 1.837c-.165.126-.247.333-.213.538v13.5c-.034.204.048.41.213.537l1.87 1.837v.403h-9.41v-.403l1.937-1.882c.19-.19.19-.246.19-.538V7.794l-5.39 13.688h-.727L4.278 7.794v9.174c-.052.386.076.774.347 1.053l2.52 3.06v.402H0v-.403l2.52-3.06c.27-.278.39-.67.326-1.052V6.36z"/>
                        </svg>
                    </a>
                    <a class="no-underline mr-4" href="https://github.com/adroit11">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-github-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-github-icon">GitHub icon</title>
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                    </a>
                    <a class="no-underline mr-4" href="https://www.linkedin.com/in/ogundiji-bolade-b3b00387/" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-linkedin-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-linkedin-icon">LinkedIn icon</title>
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                    </a>
                    <a class="no-underline mr-4" href="https://codepen.io/Adroit11" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-codepen-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-codepen-icon">CodePen icon</title>
                            <path d="M24 8.182l-.018-.087-.017-.05c-.01-.024-.018-.05-.03-.075-.003-.018-.015-.034-.02-.05l-.035-.067-.03-.05-.044-.06-.046-.045-.06-.045-.046-.03-.06-.044-.044-.04-.015-.02L12.58.19c-.347-.232-.796-.232-1.142 0L.453 7.502l-.015.015-.044.035-.06.05-.038.04-.05.056-.037.045-.05.06c-.02.017-.03.03-.03.046l-.05.06-.02.06c-.02.01-.02.04-.03.07l-.01.05C0 8.12 0 8.15 0 8.18v7.497c0 .044.003.09.01.135l.01.046c.005.03.01.06.02.086l.015.05c.01.027.016.053.027.075l.022.05c0 .01.015.04.03.06l.03.04c.015.01.03.04.045.06l.03.04.04.04c.01.013.01.03.03.03l.06.042.04.03.01.014 10.97 7.33c.164.12.375.163.57.163s.39-.06.57-.18l10.99-7.28.014-.01.046-.037.06-.043.048-.036.052-.058.033-.045.04-.06.03-.05.03-.07.016-.052.03-.077.015-.045.03-.08v-7.5c0-.05 0-.095-.016-.14l-.014-.045.044.003zm-11.99 6.28l-3.65-2.44 3.65-2.442 3.65 2.44-3.65 2.44zm-1.034-6.674l-4.473 2.99L2.89 8.362l8.086-5.39V7.79zm-6.33 4.233l-2.582 1.73V10.3l2.582 1.726zm1.857 1.25l4.473 2.99v4.82L2.89 15.69l3.618-2.417v-.004zm6.537 2.99l4.474-2.98 3.613 2.42-8.087 5.39v-4.82zm6.33-4.23l2.583-1.72v3.456l-2.583-1.73zm-1.855-1.24L13.042 7.8V2.97l8.085 5.39-3.612 2.415v.003z"/>
                        </svg>
                    </a>
                    <a class="no-underline mr-4" href="" target="_blank">
                        <svg class="fill-current text-teal inline-block h-4 w-4" aria-labelledby="simpleicons-discord-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title id="simpleicons-discord-icon">Discord icon</title>
                            <path d="M20.222 0c1.406 0 2.54 1.137 2.607 2.475V24l-2.677-2.273-1.47-1.338-1.604-1.398.67 2.205H3.71c-1.402 0-2.54-1.065-2.54-2.476V2.48C1.17 1.142 2.31.003 3.715.003h16.5L20.222 0zm-6.118 5.683h-.03l-.202.2c2.073.6 3.076 1.537 3.076 1.537-1.336-.668-2.54-1.002-3.744-1.137-.87-.135-1.74-.064-2.475 0h-.2c-.47 0-1.47.2-2.81.735-.467.203-.735.336-.735.336s1.002-1.002 3.21-1.537l-.135-.135s-1.672-.064-3.477 1.27c0 0-1.805 3.144-1.805 7.02 0 0 1 1.74 3.743 1.806 0 0 .4-.533.805-1.002-1.54-.468-2.14-1.404-2.14-1.404s.134.066.335.2h.06c.03 0 .044.015.06.03v.006c.016.016.03.03.06.03.33.136.66.27.93.4.466.202 1.065.403 1.8.536.93.135 1.996.2 3.21 0 .6-.135 1.2-.267 1.8-.535.39-.2.87-.4 1.397-.737 0 0-.6.936-2.205 1.404.33.466.795 1 .795 1 2.744-.06 3.81-1.8 3.87-1.726 0-3.87-1.815-7.02-1.815-7.02-1.635-1.214-3.165-1.26-3.435-1.26l.056-.02zm.168 4.413c.703 0 1.27.6 1.27 1.335 0 .74-.57 1.34-1.27 1.34-.7 0-1.27-.6-1.27-1.334.002-.74.573-1.338 1.27-1.338zm-4.543 0c.7 0 1.266.6 1.266 1.335 0 .74-.57 1.34-1.27 1.34-.7 0-1.27-.6-1.27-1.334 0-.74.57-1.338 1.27-1.338z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- no-underline text-white opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-grey-dark -->
        <!-- Right Content Goes Here -->
        <div class="flex-1 bg-white h-screen overflow-auto">
            <div class="fixed border-b w-full h-12 ss:hidden p-8 mb-4 block bg-white">
                    <div class="">
                        <ul class="list-reset flex">
                            <li class="mr-6">
                                <a class="no-underline text-teal-dark flex items-center" href="#about">About</a>
                            </li>
                            <li class="mr-6">
                                <a class="no-underline text-teal-darker md:text-teal-darker md:opacity-100 flex items-center" href="#chat">Chat</a>
                            </li>
                        </ul>
                    </div>
            </div>
            <div class="w-full h-6 ss:hidden mt-2"></div>
            <div id="about" class="w-full h-auto p-8 mt-4">
                <div class="w-full h-auto border-2 border-grey-light shadow rounded-lg p-4 mb-8">
                    <h2 class="text-base font-semibold leading-tight mb-8 pb-2 border-b">About Me</h2>
                    <div class="w-full h-auto p-8">
                        An Adroit, Driven, Goal oriented Web developer focused on solving web problem, and getting things done properly and on time. I take each day as an adventure to explore, learn and produce something new to meet human needs, I always dare to dream and think outside the box.
                        <p>Yes, I am me that dare to swim in every Oceans, Seas, and Rivers of the world. Am just <span class="text-orange-dark">an ordinary boy</span>, <span class="text-teal-darkest">with adroitness</span> <span class="text-teal-dark">doing the extra-ordinary</span>, simply because <span class="text-red-dark">I believe in possibilities</span>.</p>
                        <h2 class="text-base font-semibold leading-tight mt-8 mb-8 pb-2">Skills</h2>
                        <p class="mt-2">HTML, HTML5</p>
                        <p class="mt-2">CSS, CSS3</p>
                        <p class="mt-2">JavaScript (Beginner)</p>
                        <p class="mt-2">Responsive Designs</p>
                        <p class="mt-2">PHP (Beginner)</p>
                        <h2 class="text-base font-semibold leading-tight mt-8 mb-8 pb-2">Frameworks & Libraries</h2>
                        <p class="mt-2">Tailwind CSS (Beginner)</p>
                        <p class="mt-2">Bootstrap (Beginner)</p>
                        <p class="mt-2">React Js (Beginner)</p>
                        <p class="mt-2">Vue Js (Beginner)</p>
                    </div>
                </div>
                <div id="chat" class="w-full h-auto border-2 bg-teal-lightest border-grey-light shadow rounded-lg p-4 mb-8">
                    <h2 class="text-base font-semibold leading-tight mb-8 pb-2 border-b">Chat</h2>
                    <div class="w-full flex h-auto p-8"">
                      <div class="w-1/3 h-64 p-2">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="172.5" height="236.5" viewBox="0 0 172.5 236.5">
                          <defs>
                            <style>
                              <![CDATA[
                                .body-colour {
                                  fill: #FE4444; 
                                }
                                .body-parts {
                                  fill: #332E32;
                                }
                              ]]>
                            </style>
                            <circle cx="66.543" cy="41.647" r="7.343" id="left-outer"/>
                            <circle cx="105.404" cy="41.647" r="7.343" id="right-outer"/>
                              <mask id="left-mask">
                                <rect width="100%" height="100%" fill="white"></rect>
                                <use xlink:href="#left-outer" id="leftlid" fill="black"/>
                              </mask>
                              <mask id="right-mask">
                                <rect width="100%" height="100%" fill="white"></rect>
                                <use xlink:href="#right-outer" id="rightlid" fill="black"/>
                              </mask>
                          </defs>
                          <ellipse fill="#95c9de" cx="86.567" cy="226.176" rx="82.439" ry="7.011"/>
                        <g id="head">
                          <line x1="46" y1="10" x2="46" y2="40" stroke-width="3" stroke="black"/>
                          <line x1="126" y1="10" x2="126" y2="40" stroke-width="3" stroke="black"/>
                          <circle class="body-colour" cx="45.847" cy="7.221" r="4.771"/>
                          <circle class="body-colour" cx="125.556" cy="7.221" r="4.771"/>
                          <path class="body-parts" d="M93.073 21.262l15.334-13.28-3.004-4.195L90.48 20.1l.062.027c-1.237-.394-2.572-.62-3.973-.62-2.11 0-4.08.498-5.765 1.35L67.115 7.794l-2.575 2.48 14.245 11.882h.003c-2.123 1.72-3.448 4.132-3.448 6.81 0 5.222 5.026 9.457 11.23 9.457 6.2 0 11.23-4.235 11.23-9.458 0-3.18-1.87-5.988-4.727-7.702z"/>
                          <rect class="body-colour" x="51" y="27" width="70" height="44" rx="7" ry="7"/>
                          <circle class="body-colour" cx="52" cy="45" r="10"/>
                          <circle class="body-colour" cx="120" cy="45" r="10"/>
                          <g id="lefteye">
                            <circle fill="white" cx="66.543" cy="41.647" r="7.343"/>
                            <circle class="body-parts" cx="66.543" cy="41.647" r="4.045"/>
                            <use xlink:href="#left-outer" mask="url(#left-mask)" fill="#FFFFFF"/>
                          </g>
                          <g id="right-eye">
                            <circle fill="white" cx="105.404" cy="41.647" r="7.343"/>
                            <circle class="body-parts" cx="105.403" cy="41.647" r="4.276"/>
                            <use xlink:href="#right-outer" mask="url(#right-mask)" fill="#FFFFFF"/>
                          </g>
                          <use xlink:href="#right-eyelid" mask="url(#rightmask)" fill="#FFFFFF"/>
                          <circle fill="white" cx="85.9" cy="47.273" r="3.243"/>
                          <rect fill="white" x="70" y="60" width="32" height="5" rx="5" ry="5"/>
                          <rect class="body-parts" x="76" y="70" width="20" height="10"/>
                        </g>
                        <g id="body">
                          <rect class="body-colour" x="41" y="78" width="89" height="109" rx="10" ry="10"/>
                          <circle class="body-parts" cx="111.296" cy="119.922" r="5.893"/>
                          <rect fill="white" x="50" y="112" width="45" height="18" rx="4" ry="4"/>
                          <line x1="55" y1="122" x2="55" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="60" y1="122" x2="60" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="65" y1="122" x2="65" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="70" y1="122" x2="70" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="75" y1="122" x2="75" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="80" y1="122" x2="80" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="85" y1="122" x2="85" y2="129" stroke-width="1" stroke="black"/>
                          <line x1="90" y1="122" x2="90" y2="129" stroke-width="1" stroke="black"/>
                          <line class="gage" x1="60" y1="115" x2="60" y2="129" stroke-width="1.5" stroke="red"/>
                        </g>
                        <g id="left-arm">
                          <rect class="body-parts" x="26" y="100" width="6" height="120"/>
                          <circle class="body-colour" cx="29.615" cy="103.38" r="7.28"/>
                          <circle class="body-colour" cx="28.665" cy="156.831" r="5.864"/>
                          <rect class="body-parts" x="35" y="94" width="6" height="19"/>
                          <rect class="body-parts" x="15" y="208" width="27" height="19"/>
                          <rect class="body-colour" x="15" y="204" width="27" height="19"/>
                        </g>
                        <g id="right-arm">
                          <rect class="body-parts" x="138" y="100" width="6" height="120"/>
                          <circle class="body-colour" cx="140.747" cy="103.38" r="7.28"/>
                          <rect class="body-parts" x="130" y="94" width="6" height="19"/>
                          <circle class="body-colour" cx="141.767" cy="156.831" r="5.864"/>
                          <rect class="body-parts" x="128" y="208" width="27" height="19"/>
                          <rect class="body-colour" x="128" y="204" width="27" height="19"/>
                        </g>

                        </svg>
                      </div>
                      <div class="w-2/3 h-auto p-2">
                        <div id="chatbot" class="w-full border p-4 h-64 overflow-auto text-xs rounded-lg mb-2">
                          <div class="w-full border-l-2 p-2 border-yellow-dark">
                            Hello, my name is AdroitCode, hw may I help you?
                          </div>
                        </div>
                        <form class="w-full max-w-xs" method="post" action="AdroitCode.php">
                          <div class="md:flex md:items-center h-auto mb-6">
                            <div class="md:w-2/3 pin-b">
                              <input id="txt_question" class="appearance-none block w-full bg-white text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="chatbotmessage" placeholder="How may I help you?">
                            </div>
                            <div class="md:w-1/3 m-2">
                              <input type="submit" class="shadow bg-teal-dark w-full hover:bg-teal-light text-white font-bold py-2 px-4 rounded" type="button" value="⬆">
                            </div>
                            </div>
                        </form>
                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        $( document ).ready(function() {
        $( ".menu" ).hide();
        $( ".hamburger" ).click(function() {
        $( ".menu" ).slideToggle( "slow", function() {
        $( ".hamburger" ).show();
        });
        });
        });
    </script>
</body>
</html>
