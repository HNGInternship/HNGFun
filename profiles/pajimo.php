<?php


if (!defined('DB_USER')){
            
  require "../config.php";
}
try {
  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
  die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}

 global $conn;

 try {
  $sql = 'SELECT * FROM secret_word LIMIT 1';
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $data = $q->fetch();
  $secret_word = $data['secret_word'];
} catch (PDOException $e) {
  throw $e;
}    
try {
  $sql = "SELECT * FROM interns_data WHERE `username` = 'pajimo' LIMIT 1";
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $my_data = $q->fetch();
} catch (PDOException $e) {
  throw $e;
}

include_once("../answers.php"); 

function decider($string){
  
  if (strpos($string, ":") !== false)
  {
    $field = explode (":", $string, 2);
    $key = $field[0];
    $key = strtolower(preg_replace('/\s+/', '', $key));
  if(($key == "train")){
     $password ="password";
     $trainer =$field[1];
     $result = explode ("#", $trainer);
  if($result[2] && $result[2] == $password){
    echo"<br>Training mode<br>";
    return $result;
  } 
  else echo "opssss!!! Looks like you are trying to train me without permission";   
  }
   }
}


function assistant($string)
{    $reply = "";
    if ($string == 'what is my location') {
       
      
      $ip=$_SERVER['REMOTE_ADDR'];
      $reply =unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
      $reply =var_export('you are in '. $reply['geoplugin_regionName'] .' in '. $reply['geoplugin_countryName']);
      return $reply;
        
    }
    elseif ($string == 'tell me about your author') {
        $reply= 'Her name is <i class="em em-sunglasses"></i> Chidimma Juliet Ezekwe, she is Passionate, gifted and creative backend programmer who love to create appealing Web apps solution from concept through to completion. An enthusiastic and effective team player and always challenge the star to quo by taking up complex responsibilities. Social account ';
        return $reply;    
    }
    elseif ($string == 'open facebook') {
        $reply= "<p>Facebook opened successfully </p> <script language='javascript'> window.open(
    'https://www.facebook.com/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }
    elseif ($string == 'open twitter') {
        $reply = "<p>Twitter opened successfully </p> <script language='javascript'> window.open(
    'https://twitter.com/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }elseif ($string == 'open linkedin') {
        $reply= "<p>Linkedin opened successfully </p> <script language='javascript'> window.open(
    'https://www.linkedin.com/jobs/',
    '_blank' //
    );
    </script>
    ";
    return $reply;
    }
    elseif ($string == 'shutdown my pc') {
        $reply =  exec ('shutdown -s -t 0');
        return $reply;
    }elseif ($string == 'get my pc name') {
        $reply = getenv('username');
        return $reply;
    }
    else{
        $reply = "";
        return $reply;
    }
  
}




$existError =false;
$reply = "";//process starts
if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

  if ($_POST['msg'] == 'commands') {
    $reply = 'These are my commands <p>1. what is my location, 2. tell me about your author, 3. open facebook, 6. open twitter, 7. open linkedin, 8. shutdown my pc, 9. get my pc name.</p>';
    echo $reply;
  } 
      if($reply==""){
       $reply = assistant($_POST['msg']);
       echo $reply;
       
     }
  if($reply =="") {

    $post= $_POST['msg'];
    $result = decider($post);
    if($result){
      $question=$result[0]; 
      $answer= $result[1];
      $sql = "SELECT * FROM chatbot WHERE question = '$question' And answer = '$answer'";
      $stm = $conn->query($sql);
      $stm->setFetchMode(PDO::FETCH_ASSOC);

      $result = $stm->fetchAll();
        
        if (count(($result))> 0) {
              
          // while($result) {
          //   $strippedQ = strtolower(preg_replace('/\s+/', '', $question));
          //   $strippedA = strtolower(preg_replace('/\s+/', '', $answer));
          //   $strippedRowQ = strtolower(preg_replace('/\s+/', '', $result['question']));
          //   $strippedRowA = strtolower(preg_replace('/\s+/', '', $result['answer']));
          //   if(($strippedRowQ == $strippedQ) && ($strippedRowA == $strippedA)){
          //   $reply = "I know this already, but you can make me smarter by giving another response to this command";
          //   $existError = true;
          //   break;
            
          //   }
              
          // }  
          $existError = true; 
          echo "I know this already, but you can make me smarter by giving another response to this command";
            
        } 
      else
        if(!($existError)){
          $sql = "INSERT INTO chatbot(question, answer)
          VALUES(:quest, :ans)";
          $stm =$conn->prepare($sql);
          $stm->bindParam(':quest', $question);
          $stm->bindParam(':ans', $answer);

          $saved = $stm->execute();
            
          if ($saved) {
              echo  "Thanks to you, I am smarter now";
          } else {
              echo "Error: could not understand";
          }
            
          
        }  
  }
  else{
    $input = trim($post); 
 
  if($input){
    
    $sql = "SELECT * FROM chatbot WHERE question = '$input'";
    $stm = $conn->query($sql);
    $stm->setFetchMode(PDO::FETCH_ASSOC);

    $res = $stm->fetchAll();
    
    if (count($res) > 0) {
    
      $index = rand(0, count($res)-1);
      $response = $res[$index]['answer'];  

      echo $response;
    
    }
    else{
       echo "I did'nt get that, please rephrase or try again later";
    }       
  }
}
          
      
    
      }       
  
 

}
else{


?>





<!DOCTYPE html>

  <style type="text/css">
    #globalBody{
      width: 70%;
      margin: 0 auto;
    }
    #begin{
      background-image:url(https://images.unsplash.com/photo-1499428665502-503f6c608263);
  background-size: cover;
  background-position: center;
    }
    #first_lare{
      padding-top: 15%;
  padding-left: 25%;
  padding-right: 25%;
  padding-bottom: 10%;
  text-align: center;
  font-size: 24px;
  text-transform: uppercase;
  font-weight: 700;
    }
    .oj-flex-item{
      font-size: 20px;
      color: grey
    }
    .oj-flex-items-pad{
      text-align: center;
    }
  </style>
<html lang="en-us">
  <head>
    <title>Olamide</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-title" content="Oracle JET">
    

    <!-- This is the main css file for the default Alta theme -->
    <!-- injector:theme -->
    
    <!-- endinjector -->
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="css/app.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <div id="globalBody" class="oj-web-applayout-page">
      <!--
         ** Oracle JET V5.0.0 web application header pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern.
      -->
      <header role="banner" class="oj-web-applayout-header" style="background-color: darkblue">
        <div class="oj-web-applayout-max-width oj-flex-bar oj-sm-align-items-center">
          <div class="oj-flex-bar-middle oj-sm-align-items-baseline">
            
            <h1 class="oj-sm-only-hide oj-web-applayout-header-title" title="Application Name" style="font-weight: bold; font-size: 25px">Olamide's Portfoilio</h1>
          </div>
          <div class="oj-flex-bar-end">
            <!-- Responsive Toolbar -->
            <oj-toolbar>
              <oj-menu-button id="userMenu" display="[[smScreen() ? 'icons' : 'all']]" chroming="half">
                <span style="font-weight: bold">Contact</span>
                <span slot="endIcon" :class="[[{'oj-icon demo-appheader-avatar': smScreen(), 'oj-component-icon oj-button-menu-dropdown-icon': !smScreen()}]]"></span>
                <oj-menu id="menu1" slot="menu" style="display:none">
                  <oj-option id="pref" value="pref"><a href="https://medium.com/olamidefaniyan" target ="_blank">Medium</a></oj-option>
                  <oj-option id="help" value="help"><a href="https://twitter.com/Farry_ola" style="padding-top: 0px;" target ="_blank">Twitter</a></oj-option>
                  <oj-option id="about" value="about"><a href="https://instagram.com/olamidefaniyan_" target ="_blank">Instagram</a></oj-option>
                  <oj-option id="out" value="out"><a href="https://github.com/Pajimo" target ="_blank">Github</a></oj-option>
                </oj-menu>
              </oj-menu-button>
            </oj-toolbar>
          </div>
        </div>
      </header>
      <div role="main" class="oj-web-applayout-max-width oj-web-applayout-content" style="padding-top: 0">
        <div id="begin">
          <div id="first_lare">
            <span role="img" title="Olamide" alt="Olamide"><img class="img-responsive" id="bobo" src="https://avatars3.githubusercontent.com/u/20623732?s=460&v=4" style="width: 300px; height: 300px; border-radius: 100px;"/></span>
            <h1 style="color: blue; font-weight: bold">HI, I'M Olamide Faniyan<br/> A Software Developer/ Designer</h1>
          </div>
          <h4 align="center" style="color: grey; font-weight: bold; font-size: 25px">My Skills</h4>
          <div class="demo-flex-display oj-flex-items-pad">
            <div class="oj-flex">
              <div class="oj-flex-item">Html/Css</div>
              <div class="oj-flex-item">PHP</div>
              <div class="oj-flex-item">Javascript/jquery</div>
              <div class="oj-flex-item">Bootstrap</div>
            </div>
            
            <div class="oj-flex"
                 data-bind="css: {'oj-sm-flex-wrap-nowrap': nowrap()}">
              <div class="oj-flex-item">Figma</div>
              <div class="oj-flex-item">Git</div>
              <div class="oj-flex-item">Oraclejet</div>
              <div class="oj-flex-item">Node.js</div>
            </div>
          </div>
        
        </div>
        <style type="text/css">
          .pull-me{
    -webkit-box-shadow: 0 0 8px #FFD700;
    -moz-box-shadow: 0 0 8px #FFD700;
    box-shadow: 0 0 8px #FFD700;
    cursor:pointer;
}
.panel {
  background: #ffffbd;
    background-size:90% 90%;
    height:300px;
  display:none;
    font-family:garamond,times-new-roman,serif;
}
.panel p{
    
}
.slide {
  margin:0;
  padding:0;
  border-top:solid 2px #cc0000;
  text-align: center
}
.pull-me {
  display:block;
    position:relative;
    right:-25px;
    width:150px;
    height:20px;
  font-family:arial,sans-serif;
    font-size:14px;
  color:#ffffff;
    background:#cc0000;
  text-decoration:none;
    -moz-border-bottom-left-radius:5px;
    -moz-border-bottom-right-radius:5px;
    border-bottom-left-radius:5px;
    border-bottom-right-radius:5px;
}
.pull-me p {
    text-align:center;
}
#child4 {
    position: absolute;
    top: 80px;
}
        </style>
<div style="width: 400px" id="child4">
          <div class="panel">
              <div>
                <p style="overflow: scroll; height: 250px; width: 100%; margin: 0px;" id="textbox"></p>
                <input type="checkbox" id="click"><label>Click to send using enter</label><br/>
                <input type="text" name="" style="width: 80%; height: 24px;" id="text">
                <button style="position: absolute; width: 19%; height: 30px" id="send">Send</button>
              </div>
          </div>
          <p class="slide"><div class="pull-me" style="text-align: center">Chat with me</div></p>
        </div>
        
      </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">

          function chatbot() {
            $("#textbox").append("<p> Chatbot: Hello what can i do for you?" );
          }


          $(document).ready(function() {

chatbot();

var username = "You: "

  $(".pull-me").click(function() {

    $(".panel").slideToggle('slow')
  });


  $("#send").click(function(){
    var txt = $("#text").val();

    $("#textbox").append("<p> " + username + txt + "</p>");
    $("#text").val(" ");
  })

  $("#text").keypress(function(e) {

    if (e.which == 13){
      if ($("#click").prop("checked") ) {
        var txt = $("#text").val();
        $("#textbox").append("<p> " + username + txt + "</p>");
        $("#textbox").scrollTop($("#textbox").prop("scrollHeight"));
        $("#text").val(" ");
      }
    }
  })
});
        </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.js"></script>
    <script type="text/javascript">/**
 * @license
 * Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 * The Universal Permissive License (UPL), Version 1.0
 */
'use strict';

/**
 * Example of Require.js boostrap javascript
 */

requirejs.config(
{
  baseUrl: 'js',

  // Path mappings for the logical module names
  // Update the main-release-paths.json for release mode when updating the mappings
  paths:
  //injector:mainReleasePaths
  {
    'knockout': 'libs/knockout/knockout-3.4.2.debug',
    'jquery': 'libs/jquery/jquery-3.3.1',
    'jqueryui-amd': 'libs/jquery/jqueryui-amd-1.12.1',
    'promise': 'libs/es6-promise/es6-promise',
    'hammerjs': 'libs/hammer/hammer-2.0.8',
    'ojdnd': 'libs/dnd-polyfill/dnd-polyfill-1.0.0',
    'ojs': 'libs/oj/v5.0.0/debug',
    'ojL10n': 'libs/oj/v5.0.0/ojL10n',
    'ojtranslations': 'libs/oj/v5.0.0/resources',
    'text': 'libs/require/text',
    'signals': 'libs/js-signals/signals',
    'customElements': 'libs/webcomponents/custom-elements.min',
    'proj4': 'libs/proj4js/dist/proj4-src',
    'css': 'libs/require-css/css',
  }
  //endinjector
  ,
  // Shim configurations for modules that do not expose AMD
  shim:
  {
    'jquery':
    {
      exports: ['jQuery', '$']
    }
  }
}
);

/**
 * A top-level require call executed by the Application.
 * Although 'ojcore' and 'knockout' would be loaded in any case (they are specified as dependencies
 * by the modules themselves), we are listing them explicitly to get the references to the 'oj' and 'ko'
 * objects in the callback
 */
require(['ojs/ojcore', 'knockout', 'appController', 'ojs/ojknockout', 'ojs/ojbutton', 'ojs/ojtoolbar', 'ojs/ojmenu'],
  function (oj, ko, app) { // this callback gets executed when all required modules are loaded
    
    $(function() {
      
      function init() {
        // Bind your ViewModel for the content of the whole page body.
        ko.applyBindings(app, document.getElementById('globalBody'));
      }

      // If running in a hybrid (e.g. Cordova) environment, we need to wait for the deviceready 
      // event before executing any code that might interact with Cordova APIs or plugins.
      if ($(document.body).hasClass('oj-hybrid')) {
        document.addEventListener("deviceready", init);
      } else {
        init();
      }

    });

    

  }
);</script>

  </body>

</html>