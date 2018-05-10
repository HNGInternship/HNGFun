<?php


if (!defined('DB_USER')){
            
  require "../../config.php";
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