<?php
/////////////start for stage 3 HNG
////////////////////////////////////////
if(!isset($_GET['id'])){
    require '../db.php';

}else{
    require 'db.php';
    require "answers.php";
}


$botVersion = "agbero v1.0";
try {

    $sql = 'SELECT * FROM interns_data,secret_word WHERE username ="'.'uncletee'.'"';

    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];

} catch (PDOException $e) {
    throw $e;
}




///// Move to stage 5 HNG////////////////
//////////////////////////////////////////

$response = [];
$abusiveWords = ["4r5e", "5h1t", "5hit", "a55", "anal", "anus", "ar5e", "arrse", "arse", "ass", "ass-fucker", "asses", "assfucker", "assfukka", "asshole", "assholes", "asswhole", "a_s_s", "b!tch", "b00bs", "b17ch", "b1tch", "ballbag", "balls", "ballsack", "bastard", "beastial", "beastiality", "bellend", "bestial", "bestiality", "bi+ch", "biatch", "bitch", "bitcher", "bitchers", "bitches", "bitchin", "bitching", "bloody", "blow job", "blowjob", "blowjobs", "boiolas", "bollock", "bollok", "boner", "boob", "boobs", "booobs", "boooobs", "booooobs", "booooooobs", "breasts", "buceta", "bugger", "bum", "bunny fucker", "butt", "butthole", "buttmuch", "buttplug", "c0ck", "c0cksucker", "carpet muncher", "cawk", "chink", "cipa", "cl1t", "clit", "clitoris", "clits", "cnut", "cock", "cock-sucker", "cockface", "cockhead", "cockmunch", "cockmuncher", "cocks", "cocksuck", "cocksucked", "cocksucker", "cocksucking", "cocksucks", "cocksuka", "cocksukka", "cok", "cokmuncher", "coksucka", "coon", "cox", "crap", "cum", "cummer", "cumming", "cums", "cumshot", "cunilingus", "cunillingus", "cunnilingus", "cunt", "cuntlick", "cuntlicker", "cuntlicking", "cunts", "cyalis", "cyberfuc", "cyberfuck", "cyberfucked", "cyberfucker", "cyberfuckers", "cyberfucking", "d1ck", "damn", "dick", "dickhead", "dildo", "dildos", "dink", "dinks", "dirsa", "dlck", "dog-fucker", "doggin", "dogging", "donkeyribber", "doosh", "duche", "dyke", "ejaculate", "ejaculated", "ejaculates", "ejaculating", "ejaculatings", "ejaculation", "ejakulate", "f u c k", "f u c k e r", "f4nny", "fag", "fagging", "faggitt", "faggot", "faggs", "fagot", "fagots", "fags", "fanny", "fannyflaps", "fannyfucker", "fanyy", "fatass", "fcuk", "fcuker", "fcuking", "feck", "fecker", "felching", "fellate", "fellatio", "fingerfuck", "fingerfucked", "fingerfucker", "fingerfuckers", "fingerfucking", "fingerfucks", "fistfuck", "fistfucked", "fistfucker", "fistfuckers", "fistfucking", "fistfuckings", "fistfucks", "flange", "fook", "fooker", "fuck", "fucka", "fucked", "fucker", "fuckers", "fuckhead", "fuckheads", "fuckin", "fucking", "fuckings", "fuckingshitmotherfucker", "fuckme", "fucks", "fuckwhit", "fuckwit", "fudge packer", "fudgepacker", "fuk", "fuker", "fukker", "fukkin", "fuks", "fukwhit", "fukwit", "fux", "fux0r", "f_u_c_k", "gangbang", "gangbanged", "gangbangs", "gaylord", "gaysex", "goatse", "God", "god-dam", "god-damned", "goddamn", "goddamned", "hardcoresex", "hell", "heshe", "hoar", "hoare", "hoer", "homo", "hore", "horniest", "horny", "hotsex", "jack-off", "jackoff", "jap", "jerk-off", "jism", "jiz", "jizm", "jizz", "kawk", "knob", "knobead", "knobed", "knobend", "knobhead", "knobjocky", "knobjokey", "kock", "kondum", "kondums", "kum", "kummer", "kumming", "kums", "kunilingus", "l3i+ch", "l3itch", "labia", "lust", "lusting", "m0f0", "m0fo", "m45terbate", "ma5terb8", "ma5terbate", "masochist", "master-bate", "masterb8", "masterbat*", "masterbat3", "masterbate", "masterbation", "masterbations", "masturbate", "mo-fo", "mof0", "mofo", "mothafuck", "mothafucka", "mothafuckas", "mothafuckaz", "mothafucked", "mothafucker", "mothafuckers", "mothafuckin", "mothafucking", "mothafuckings", "mothafucks", "mother fucker", "motherfuck", "motherfucked", "motherfucker", "motherfuckers", "motherfuckin", "motherfucking", "motherfuckings", "motherfuckka", "motherfucks", "muff", "mutha", "muthafecker", "muthafuckker", "muther", "mutherfucker", "n1gga", "n1gger", "nazi", "nigg3r", "nigg4h", "nigga", "niggah", "niggas", "niggaz", "nigger", "niggers", "nob", "nob jokey", "nobhead", "nobjocky", "nobjokey", "numbnuts", "nutsack", "orgasim", "orgasims", "orgasm", "orgasms", "p0rn", "pawn", "pecker", "penis", "penisfucker", "phonesex", "phuck", "phuk", "phuked", "phuking", "phukked", "phukking", "phuks", "phuq", "pigfucker", "pimpis", "piss", "pissed", "pisser", "pissers", "pisses", "pissflaps", "pissin", "pissing", "pissoff", "poop", "porn", "porno", "pornography", "pornos", "prick", "pricks", "pron", "pube", "pusse", "pussi", "pussies", "pussy", "pussys", "rectum", "retard", "rimjaw", "rimming", "s hit", "s.o.b.", "sadist", "schlong", "screwing", "scroat", "scrote", "scrotum", "semen", "sex", "sh!+", "sh!t", "sh1t", "shag", "shagger", "shaggin", "shagging", "shemale", "shi+", "shit", "shitdick", "shite", "shited", "shitey", "shitfuck", "shitfull", "shithead", "shiting", "shitings", "shits", "shitted", "shitter", "shitters", "shitting", "shittings", "shitty", "skank", "slut", "sluts", "smegma", "smut", "snatch", "son-of-a-bitch", "spac", "spunk", "s_h_i_t", "t1tt1e5", "t1tties", "teets", "teez", "testical", "testicle", "tit", "titfuck", "tits", "titt", "tittie5", "tittiefucker", "titties", "tittyfuck", "tittywank", "titwank", "tosser", "turd", "tw4t", "twat", "twathead", "twatty", "twunt", "twunter", "v14gra", "v1gra", "vagina", "viagra", "vulva", "w00se", "wang", "wank", "wanker", "wanky", "whoar", "whore", "willies", "willy", "xrated", "xxx"];




/**
 * IsTrainable is called to check if the string from the form is trainable.
 * @param $string
 * @return bool|mixed - returns false if not trainable and an array if trainnable
 */


function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $ready = trim($ready,$delimiters[0]);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}



function askQuestion($string){

    $questionAsked =  prepareInputParams($string);
    $foundQuestion = findByQuestion($questionAsked);
     $foundAnswer =    $foundQuestion["answer"];
//     return($foundAnswer);
    return getQuestionFunction( $foundAnswer );


}

//print_r(performTraining('train:What is the time in sokoto#The time $$ in ((location))#Adenekan'));
function performTraining($string){
    $delimeters         = [":","#"];
    $trainnigParameters =   multiexplode ($delimeters ,$string);
    $isBotTrainnable = isTrainable($trainnigParameters);
    if( $trainnigParameters[0] == "train"){
        if ($isBotTrainnable["code"] == 204){
            return  $isBotTrainnable;
        }
        $question      = prepareInputParams($trainnigParameters[1]) ;
        $answer      = prepareInputParams($trainnigParameters[2]);
        $password      = trim($trainnigParameters[3]);
        $questionHasAbusiveWords    =   _profanityCheck( $question );
        $answerHasAbusiveWords      = _profanityCheck($answer);
        $functionHasError   =   whiteSpaceNotExistInFunction($answer);
        $isAuthenticated    = isAuthenticated( $password ,'adenekan');
        if($isAuthenticated['code'] == 401){
            return $isAuthenticated;
        }else if($questionHasAbusiveWords['code'] == 401){  // 401 is assumed to be an error code
            return  $questionHasAbusiveWords;
        }else if( $answerHasAbusiveWords['code'] == 401){
            return $answerHasAbusiveWords;
        }else if($functionHasError['code'] == 401){
            return $functionHasError;
        }
        //Add only if neccesary.

        return saveTrainingParams($question,$answer);
    }
    return false;
}




function getQuestionFunction($foundAnswer){
    $errorResponses = [
            "You may have to give me trainning with a function I understand",
            "Boss, this is really hard or me, I do not have the skill set to answer the question,give me training with a function",
            "In lasisi's voice, give me training jooooooooooooooooorrrrrrrr with a function ",
            "I can only do better if I get good training with a function I understand",
            "I can only perform with essential training"
    ];
    $functionSStart = stripos($foundAnswer, "((");

    //There is o function in the answer
    if(!$functionSStart){
        return ["code" => 200, "response" => $foundAnswer ];
    }else{
        $foundFunction = get_string_between($foundAnswer);

        $foundFunction  = prepareInputParams($foundFunction);
        if(function_exists($foundFunction)){
            return [

                'code' => 200,
                'response' => str_replace("(($foundFunction))", $foundFunction(), $foundAnswer)
            ];
        }else{
            return [
                'code' => 204, // The essense of the 204 is to make client know that he should show trainnig rules
                'response' =>  $errorResponses[rand(0,count($errorResponses)-1)]
            ];
        }

    }

}


/**
 * Returns the string in between a character set
 * @param $string
 * @param $start
 * @param $end
 * @return bool|string
 */
function get_string_between($string, $start = "((", $end="))"){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


/**
 * When there are two or more functions in a string, tfunctions can get the list of functions in an array
 * @param $str
 * @param $startDelimiter
 * @param $endDelimiter
 * @return array
 */
function getFuctionsNames($str, $startDelimiter, $endDelimiter) {
    $contents = array();
    $startDelimiterLength = strlen($startDelimiter);
    $endDelimiterLength = strlen($endDelimiter);
    $startFrom = $contentStart = $contentEnd = 0;
    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
        $contentStart += $startDelimiterLength;
        $contentEnd = strpos($str, $endDelimiter, $contentStart);
        if (false === $contentEnd) {
            break;
        }
        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
        $startFrom = $contentEnd + $endDelimiterLength;
    }

    return $contents;
}




/**
 * functions will accepts an array parameter
 * that has been exploded into a question,answer,password
 * forrmat. It will tell is the bot is trainabe or not.
 * @param $array
 * @return array
 */
function isTrainable($array){
    $errorMessage = [
            "Please you have to give me the training in a right format",
            "I can only understand a training only when in the right format",
            "Please train me only in a format I understand",
            "Hello boss, what if you try me in a format I understand",
            "Trainnig can only be allowed in a right format"
    ];
    $returnParams = [];

   if (count($array) > 4){
        $returnParams["code"] = 204;
        $returnParams["response"] =  "You have now giving me more information than i need";
        return  $returnParams;
    }else if (count($array)!=4 ){
    $returnParams["code"] = 204;
    $returnParams["response"] =  $errorMessage[rand(0,count($errorMessage) -1 )];
       return  $returnParams;
    }

    return true;

}


/**
 * Method will prepare a string to be very sensible. Mostly string will be a question
 * @param $string
 * @return null|string|string[]
 */

function prepareInputParams($string){

    $semiPrepared =  preg_replace('([\s]+)', ' ', trim($string));
    $prepared     =  preg_replace("([?.-])", "",trim($semiPrepared) );
    return    $prepared;
}


/**
 * function will check for any abusive word
 * @param $message
 * @return bool|array true if passed the check and an array if the text falsed.
 */
function _profanityCheck($message){
    global $abusiveWords;
    $replies = [
        'Hey! that seem to be very abusive!',
        'The way you talk, yo mama would be ashamed. I\'m sure she taught you better. Never use abusive words',
        'I thought you are my friend, please stop the use of abusive word',
        "I beg now  small small, shey na because say I be bot? That is why u are abusing me",
        "why don't you want us to get back to business, you are very abusive",
    ];
    $reply = [];

    $abusiveWords = strtolower(implode(',', (array)$abusiveWords));
    $abusiveWords = explode(',', $abusiveWords);
    $message = strtolower($message);

    $bits = explode(' ', $message);

//    print_r(  $bits);


    foreach ($bits as $word) {
        if(in_array($word,$abusiveWords)){
            $reply['code'] = 401;
            $reply['response'] = $replies[rand(0, count($replies) - 1)];
            return $reply;
        }
    }
//    print_r($reply);
    return true;


}


/**
 * function will save $question and answer to the database
 * @param $question
 * @param $answer
 * @return bool
 */
function saveTrainingParams($question,$answer){

    $response = [
            "Thank you for the training",
            "I will never forger what you just taught me",
            "Let me thank you for training me in german - Danke für das Training",
            "Let me thank you for training me in french - Merci pour la formation",
            'Let me thank you for training me in igbo - Daalụ maka ọzụzụ',
            'Let me thank you for training me in yoruba-O ṣeun fun sisẹsẹ',
            'Let me thank you for training me in hausa - Na gode da horarwa'

    ];
    try{
        global $conn;
        $sql = "insert into chatbot (question, answer) values (:question, :answer)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':answer', $answer);
        $stmt->execute();

        return ($stmt->rowCount() == 1 ) ? ['code'=>200,'response'=>$response[rand(0, count($response) - 1)]]:false;

    } catch (PDOException $e) {
    throw $e;
}


}


/**
 * function will check for authentication
 * @param $password
 * @param $setPassword
 * @return array|bool
 */
function isAuthenticated($password,$setPassword){
    $reponseCart =[
            'you are not approved to train me',
            'you seem not to be my master,am sorry get master to give permission to train me',
            'please just give a in-correct password,that is the only way you can train me since you cannot provide my password',
            'I sometimes get agrresive when I talk to people but you trying to play smart by not providing password'
    ];
    $failedAuthResponse = ["code"=>401,"response"=>$reponseCart[rand(0, count($reponseCart) - 1)]];
    return (strtolower(trim($password))!=strtolower(trim($setPassword)))? $failedAuthResponse:true;
}


/**
 * The function will search the database for the question if its exists.
 * @param $question
 * @return array
 */
function findByQuestion($question){
    global $conn;
    $wildQuestion = "%$question%";
    try{
        $sql = "select * from chatbot where question like :question OR question = :quest ORDER BY RAND()
                  LIMIT 1";
        $stmt =  $conn->prepare($sql);
        $stmt->bindParam(':question', $wildQuestion);
        $stmt->bindParam(':quest', $question);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }catch(PDOException $e){
        throw $e;
    }
}


function whiteSpaceNotExistInFunction($answer){
    $response  = [];
    $responseErr = [
        "Hey boss there is a there is a problem with the answer you want to train me with",
        "Boss please check the answer you will like to train me with well, this can give problem in future if I accept, so I will not",
        "I think there is a problem with the answer,I do not want to have your wahala in future"
    ];
    $foundFunction = get_string_between($answer, '((', "))");

    $badChars = "!@#$%^&*()_-+={}[]";
    $functionSStart = stripos($answer, "((");
    $functionEnd    = stripos($answer, "))");
    $diff =   $functionEnd  - $functionSStart;


    if($functionSStart && $functionEnd ){
        if (($functionSStart > $functionEnd)|| ($diff == 2) ){
            $response["code"] = 401;
            $response["response"] =  $responseErr[rand(0,count( $responseErr)-1)];
            return  $response;
        }
    }


    $badCharsArray = str_split($badChars);

    foreach ($badCharsArray as $badchar){
        if (strpos($foundFunction,$badchar) || strpos($foundFunction,' ')){

            $response["code"] = 401;
            $response["response"] =  $responseErr[rand(0,count( $responseErr)-1)];
            return  $response;
        }
    };
    return true;
}













///////////////////////////////////////////


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <style type="text/css">
          body{
              background: #FFFFFF
          }
          
          .landing{
              background: #FFFFFF;
          }
          .section-heading{
              border-top: 4px solid #000000;
              border-bottom: 2px solid #109AF7;
               padding:5px;
              display: inline-block;
              margin-bottom: 15px;
          }
          section h3.section-subheading {
              margin-bottom: 75px;
            margin-top: 10px;
            text-transform: none;
              font-size: 16px;
            font-weight: 400;
            }
          
          .b0{
              border:0px solid #fff;
          }
          
          .text-center {
            text-align: center!important;
                  }
          
          .text-muted {
                color: #777;
            }
          
          .img-me {
            border: 10px solid #f4f4f4;
            margin-top: 18px;
          }
          
          img{
              max-width: 100%;
          }
          
          .img-circle {
              border-radius: 50%;
          }
          
          .name {
            color: #109af7;
            font-weight:700;
            
            }
          
          .font-thin {
            font-weight: 500;
            text-transform: uppercase;
        }   
          
          .text-muted {
                 color: #777;
            }
          
          .download-resume-btn {
            margin-top: 20px;
          }
          
          .btn-blue {
            background: transparent;
            border: 2px solid #109af7;
            border-radius: 1px;
            color: #109af7;
            font-size: 16px;
            font-weight: 400;
            padding: 15px 20px;
            text-transform: uppercase;
            -webkit-transition: .3s;
            transition: .3s;
          }
          
          .btn-blue:hover{
                  color: #fff;
            background: rgba(0,0,0,0) -webkit-linear-gradient(left,#00c6ff,#0072ff);
            background: rgba(0,0,0,0) linear-gradient(to right,#00c6ff,#0072ff);

          }

          /*Chat area*/
          ::selection{
              background: rgba(82,179,217,0.3);
              color: inherit;
          }
          a{
              color: rgba(82,179,217,0.9);
          }

          /* M E N U */

          .menu {
              position: fixed;
              top: 0px;
              left: 0px;
              right: 0px;
              width: 100%;
              height: 50px;
              background: rgba(82,179,217,0.9);
              z-index: 100;
              -webkit-touch-callout: none;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
          }

          .back {
              position: absolute;
              width: 90px;
              height: 50px;
              top: 0px;
              left: 0px;
              color: #fff;
              line-height: 50px;
              font-size: 30px;
              padding-left: 10px;
              cursor: pointer;
          }
          .back img {
              position: absolute;
              top: 5px;
              left: 30px;
              width: 40px;
              height: 40px;
              background-color: rgba(255,255,255,0.98);
              border-radius: 100%;
              -webkit-border-radius: 100%;
              -moz-border-radius: 100%;
              -ms-border-radius: 100%;
              margin-left: 15px;
          }
          .back:active {
              background: rgba(255,255,255,0.2);
          }
          .name{
              position: absolute;
              top: 3px;
              left: 110px;
              font-family: 'Lato';
              font-size: 25px;
              font-weight: 300;
              color: rgba(255,255,255,0.98);
              cursor: default;
          }
          .last{
              position: absolute;
              top: 30px;
              left: 115px;
              font-family: 'Lato';
              font-size: 11px;
              font-weight: 400;
              color: rgba(255,255,255,0.6);
              cursor: default;
          }

          /* M E S S A G E S */

          .chat {
              list-style: none;
              background: none;
              margin: 0;
              padding: 0 0 50px 0;
              margin-top: 60px;
              margin-bottom: 10px;
          }
          .chat li {
              padding: 0.5rem;
              overflow: hidden;
              display: flex;
          }
          .chat .avatar {
              width: 40px;
              height: 40px;
              position: relative;
              display: block;
              z-index: 2;
              border-radius: 100%;
              -webkit-border-radius: 100%;
              -moz-border-radius: 100%;
              -ms-border-radius: 100%;
              background-color: rgba(255,255,255,0.9);
          }
          .chat .avatar img {
              width: 40px;
              height: 40px;
              border-radius: 100%;
              -webkit-border-radius: 100%;
              -moz-border-radius: 100%;
              -ms-border-radius: 100%;
              background-color: rgba(255,255,255,0.9);
              -webkit-touch-callout: none;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
          }
          .chat .day {
              position: relative;
              display: block;
              text-align: center;
              color: #c0c0c0;
              height: 20px;
              text-shadow: 7px 0px 0px #e5e5e5, 6px 0px 0px #e5e5e5, 5px 0px 0px #e5e5e5, 4px 0px 0px #e5e5e5, 3px 0px 0px #e5e5e5, 2px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 0px 0px 0px #e5e5e5, -1px 0px 0px #e5e5e5, -2px 0px 0px #e5e5e5, -3px 0px 0px #e5e5e5, -4px 0px 0px #e5e5e5, -5px 0px 0px #e5e5e5, -6px 0px 0px #e5e5e5, -7px 0px 0px #e5e5e5;
              box-shadow: inset 20px 0px 0px #e5e5e5, inset -20px 0px 0px #e5e5e5, inset 0px -2px 0px #d7d7d7;
              line-height: 38px;
              margin-top: 5px;
              margin-bottom: 20px;
              cursor: default;
              -webkit-touch-callout: none;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
          }

          .other .msg {
              order: 1;
              border-top-left-radius: 0px;
              box-shadow: -1px 2px 0px #D4D4D4;
          }
          .other:before {
              content: "";
              position: relative;
              top: 0px;
              right: 0px;
              left: 40px;
              width: 0px;
              height: 0px;
              border: 5px solid #fff;
              border-left-color: transparent;
              border-bottom-color: transparent;
          }

          .self {
              justify-content: flex-end;
              align-items: flex-end;
          }
          .self .msg {
              order: 1;
              border-bottom-right-radius: 0px;
              box-shadow: 1px 2px 0px #D4D4D4;
          }
          .self .avatar {
              order: 2;
          }
          .self .avatar:after {
              content: "";
              position: relative;
              display: inline-block;
              bottom: 19px;
              right: 0px;
              width: 0px;
              height: 0px;
              border: 5px solid #fff;
              border-right-color: transparent;
              border-top-color: transparent;
              box-shadow: 0px 2px 0px #D4D4D4;
          }

          .msg {
              background: white;
              min-width: 50px;
              padding: 10px;
              border-radius: 2px;
              box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
          }
          .msg p {
              font-size: 0.8rem;
              margin: 0 0 0.2rem 0;
              color: #777;
          }
          .msg img {
              position: relative;
              display: block;
              width: 450px;
              border-radius: 5px;
              box-shadow: 0px 0px 3px #eee;
              transition: all .4s cubic-bezier(0.565, -0.260, 0.255, 1.410);
              cursor: default;
              -webkit-touch-callout: none;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
          }



          @media screen and (max-width: 800px) {
              .msg img {
                  width: 300px;
              }
          }
          @media screen and (max-width: 550px) {
              .msg img {
                  width: 200px;
              }
          }

          .msg time {
              font-size: 0.7rem;
              color: #ccc;
              margin-top: 3px;
              float: right;
              cursor: default;
              -webkit-touch-callout: none;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
          }
          .msg time:before{
              content:"\f017";
              color: #ddd;
              font-family: FontAwesome;
              display: inline-block;
              margin-right: 4px;
          }

          emoji{
              display: inline-block;
              height: 18px;
              width: 18px;
              background-size: cover;
              background-repeat: no-repeat;
              margin-top: -7px;
              margin-right: 2px;
              transform: translate3d(0px, 3px, 0px);
          }
          emoji.please{background-image: url(https://imgur.com/ftowh0s.png);}
          emoji.lmao{background-image: url(https://i.imgur.com/MllSy5N.png);}
          emoji.happy{background-image: url(https://imgur.com/5WUpcPZ.png);}
          emoji.pizza{background-image: url(https://imgur.com/voEvJld.png);}
          emoji.cryalot{background-image: url(https://i.imgur.com/UUrRRo6.png);}
          emoji.books{background-image: url(https://i.imgur.com/UjZLf1R.png);}
          emoji.moai{background-image: url(https://imgur.com/uSpaYy8.png);}
          emoji.suffocated{background-image: url(https://i.imgur.com/jfTyB5F.png);}
          emoji.scream{background-image: url(https://i.imgur.com/tOLNJgg.png);}
          emoji.hearth_blue{background-image: url(https://i.imgur.com/gR9juts.png);}
          emoji.funny{background-image: url(https://i.imgur.com/qKia58V.png);}

          @-webikt-keyframes pulse {
              from { opacity: 0; }
              to { opacity: 0.5; }
          }

          ::-webkit-scrollbar {
              min-width: 12px;
              width: 12px;
              max-width: 12px;
              min-height: 12px;
              height: 12px;
              max-height: 12px;
              background: #e5e5e5;
              box-shadow: inset 0px 50px 0px rgba(82,179,217,0.9), inset 0px -52px 0px #fafafa;
          }

          ::-webkit-scrollbar-thumb {
              background: #bbb;
              border: none;
              border-radius: 100px;
              border: solid 3px #e5e5e5;
              box-shadow: inset 0px 0px 3px #999;
          }

          ::-webkit-scrollbar-thumb:hover {
              background: #b0b0b0;
              box-shadow: inset 0px 0px 3px #888;
          }

          ::-webkit-scrollbar-thumb:active {
              background: #aaa;
              box-shadow: inset 0px 0px 3px #7f7f7f;
          }

          ::-webkit-scrollbar-button {
              display: block;
              height: 26px;
          }

          /* T Y P E */

          .chat-bot-area{
              position: relative;
              overflow: scroll;
              max-height: 500px;
          }

          .default-col-md-4{
              border: none;
              border-radius: 0px;
              margin: 10px;
              padding: 0px;
          }


          input.textarea {
              position: absolute;
              bottom: 0px;
              left: 0px;
              right: 0px;
              width: 100%;
              height: 50px;
              z-index: 99;
              background: #fafafa;
              border: none;
              outline: none;
              padding-left: 55px;
              padding-right: 55px;
              color: #666;
              font-weight: 400;
          }
          .emojis {
              position: absolute;
              display: block;
              bottom: 8px;
              left: 7px;
              width: 34px;
              height: 34px;
              background-image: url(https://i.imgur.com/5WUpcPZ.png);
              background-repeat: no-repeat;
              background-size: cover;
              z-index: 100;
              cursor: pointer;
          }
          .emojis:active {
              opacity: 0.9;
          }
        

      </style>
  </head>
  <body>
     <section class="container landing">
         <div class="row">
            <div class="col-md-12 text-center">
             <h2 class="section-heading ">ABOUT ME</h2>
                <h3 class="section-subheading text muted">Am a guy that with serious interest in technology.</h3>
             </div>
         </div>
         <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4  text-center  b0">
                <img class="img-circle img-me" src="<?php  echo ($data['image_filename'])?>">
             </div>
             <div class="col-lg-7 col-md-7 col-sm-7    b0">
                <h3 class = "name">@<?php echo ($data['username']) ?></h3>
                 <h4 class="font-thin">Technophile</h4>
                 <p class = "text-muted">
                    I have serious interest in the Nigeria technology startup space, as well as the use of emerging technology is resolving societal issues. However as a beginner in the technology space I am eager to be exposed to different analytical thinking and management skills.
                 </p>
                 <P class="text-muted">
                    I am currently seeking for opportunities in the technology space.
                 </P>
                 <a class="btn btn-blue download-resume-bt" href="">Buzz me</a>

             </div>
         </div>
         <div class="row">
             <div class="col-md-4 default-col-md-4"></div>
             <div class="col-md-4">
                 <div class="chat-bot-area">
                     <ol class="chat">
                         <li class="other">
                             <div class="avatar"><img src="https://mybluerobot.com/wp-content/uploads/2013/10/MBR_avatar_Mathew-Halpern.jpg" draggable="false"/></div>
                             <div class="msg">
                                 <p>Hola! Te vienes a cenar al centro? Te vienes a cenar al centro?</p>
                                 <time>20:17</time>
                             </div>
                         </li>
                         <li class="self">
                             <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
                             <div class="msg">
                                 <p>Puff...</p>
                                 <p>Aún estoy haciendo el contexto de Góngora... <emoji class="books"/></p>
                                 <p>Mejor otro día</p>
                                 <time>20:18</time>
                             </div>
                         </li>
                         <li class="other">
                             <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                             <div class="msg">
                                 <p>Qué contexto de Góngora? <emoji class="suffocated"/></p>
                                 <time>20:18</time>
                             </div>
                         </li>
                         <li class="self">
                             <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
                             <div class="msg">
                                 <p>El que mandó Marialu</p>
                                 <p>Es para mañana...</p>
                                 <time>20:18</time>
                             </div>
                         </li>
                         <li class="other">
                             <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                             <div class="msg">
                                 <p><emoji class="scream"/></p>
                                 <p>Pásamelo! <emoji class="please"/></p>
                                 <time>20:18</time>
                             </div>
                         </li>
                         <li class="self">
                             <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
                             <div class="msg">
                                 <img src="https://i.imgur.com/QAROObc.jpg" draggable="false"/>
                                 <time>20:19</time>
                             </div>
                         </li>
                         <li class="other">
                             <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
                             <div class="msg">
                                 <p>Gracias! <emoji class="hearth_blue"/></p>
                                 <time>20:20</time>
                             </div>
                         </li>
                         <div class="day">Hoy</div>
                         <li class="self">
                             <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
                             <div class="msg">
                                 <p>Te apetece jugar a Minecraft?</p>
                                 <time>18:03</time>
                             </div>
                         </li>






                     </ol>

                 </div>

                     <input id="textString" class="textarea" type="text" placeholder="Type here!"/>
                     <div class="emojis"></div



             </div>
             <div class="col-md-4 default-col-md-4"></div>
         </div>
    </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  <script>
      // Js function will get the input text.
      $(document).keypress(function(event) {
          var keycode = event.keyCode || event.which;
          if(keycode == '13') {
              var textString = $("#textString").val();
              if (textString){
                  console.log("you have to type something");
              }else{
                  console.log(textString);
              }

          }
      });


  </script>
  </body>
 </html> 


   

