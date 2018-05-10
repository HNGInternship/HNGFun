<!DOCTYPE html>
<?php
	
	if(!defined('DB_USER')){
		require "../config.php";
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select * from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "AmyXandra";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];	
			$image_filename = $row['image_filename'];	
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>
<!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->

<!-- ************************ IMPORTANT INFORMATION ************************************
  This web navigation drawer template is provided as an example of how to configure
  a JET web application with a navigation drawer as a single page application
  using ojRouter and oj-module.  It contains the Oracle JET framework and a default
  requireJS configuration file to show how JET can be setup in a common application.
  This project template can be used in conjunction with demo code from the JET
  website to test JET component behavior and interactions.

  Any CSS styling with the prefix "demo-" is for demonstration only and is not
  provided as part of the JET framework.

  Please see the demos under Cookbook/Patterns/App Shell: Web and the CSS documentation
  under Support/API Docs/Non-Component Styling on the JET website for more information on how to use 
  the best practice patterns shown in this template.

  Aria Landmark role attributes are added to the different sections of the application
  for accessibility compliance. If you change the type of content for a specific
  section from what is defined, you should also change the role value for that
  section to represent the appropriate content type.
  ***************************** IMPORTANT INFORMATION ************************************ -->
<html lang="en-us">
  <head>
    <title>Oracle JET Starter Template - Web Nav Drawer</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon" />

    <!-- This is the main css file for the default Alta theme -->
	<!-- injector:theme -->
	<link rel="stylesheet" href="css/alta/5.0.0/web/alta.css" id="css" />
	<!-- endinjector -->
    
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
     <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>
	     
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
      
      <style>
      body{
        background-color:#5eb8f1;
      }
      .my_profile{
        width:80%;
        padding:20px;
        background-color:;
        margin:0 auto;
      }
      .img-card{
        padding:20px;
        background:linear-gradient(#00fff3, #ff00eb);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius:15px;
        
      }
      .card-info{
        margin:0 auto;
      }
      .profile ul li{
        color:white;
        font-size:16px;
        list-style:none;
        margin:3px;
        padding:3px;
        font-weight:bold;
      }
      .profile ul li span{
        font-size:14px;
        font-weight:normal;
      }
      .socials{
        text-align:center;
      }
      .socials h5{
        color:#FFFFFF;
        font-size:20px;
      }
      .socials p a i{
        font-size:20px;
        color:white;
      }
      .socials p a i:hover{
        border: 2px solid #ffffff;
        font-size:25px;
          box-shadow: 0 4px 15px 0 rgba(255, 255, 255, 0.4), 0 12px 30px 0 rgba(255, 255, 255, 0.39);
        padding:6px;
        border-radius:10px;
      }
      .socials p a {
        padding:6px;
      }
      .details{
        box-shadow: 0 4px 8px 0 rgb(74, 180, 240, 0.3), 0 6px 20px 0 rgb(193, 61, 236, 0.6);
        border-radius:15px;
        margin-left:25px;
        padding:20px;
      
      }
      .details h4{
        background-color:f4f4f4;
        font-weight:bold;
        border-bottom: 2px solid rgb(193, 61, 236);
      }
      .details button{
        margin:0 auto;
        font: 18px bold;
        padding:8px 30px;
        border-radius:15px;
        background-color: rgb(74, 180, 240);
        box-shadow: 0 4px 15px 0 rgba(255, 255, 255, 0.4), 0 12px 30px 0 rgba(255, 255, 255, 0.29);
        border:none;
        color:white;
      
      }
      .details button:hover{
        background: linear-gradient(#00fff3, #ff00eb);
      }
       </style>

 </head>
  <body class="oj-web-applayout-body" style="background:#4977bb; font-family: 'Roboto', sans-serif;">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->
    <script type="text/html" id="navTemplate">
      <li><a href="#">
        <span :class="[[$data['iconClass']]]"></span>
        <oj-bind-text value="[[$data['name']]]"></oj-bind-text>
      </a></li>
    </script>

    <div id="globalBody" class="oj-offcanvas-outer-wrapper oj-offcanvas-page">
      <!--
         ** Oracle JET V5.0.0 web application navigation drawer pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern. 
         ** The off-canvas section is used when the browser is resized to a smaller media
         ** query size for a phone format and hidden until a user clicks on
         ** the header hamburger icon.
      -->
      <div id="navDrawer" role="navigation" class="oj-contrast-marker oj-web-applayout-offcanvas oj-offcanvas-start">
        <oj-navigation-list data="[[navDataSource]]"
                            edge="start"
                            item.renderer="[[oj.KnockoutTemplateUtils.getRenderer('navTemplate', true)]]"
                            on-click="[[toggleDrawer]]"
                            selection="{{router.stateId}}">
        </oj-navigation-list>
      </div>
      <div id="pageContent" class="oj-web-applayout-page">
        
 <div class="oj-hybrid-padding">
  <!-- <h1>Dashboard Content Area</h1>
  <div>
      To change the content of this section, you will make edits to the dashboard.html file located in the /js/views folder.
      <!Doctype html>
       -->
  
       <div class="col-sm-12 col-xs-12">
       <br>
       <h1 style="color:white; font-size:80px; text-align:center;">200</h1>
       
       <h3 style="font-size:25px; color:white; font-weight:bold; text-align:center;">Lool! Hello there! You've come to the right profile!</h3>
      
      <div class="col-sm-12 col-xs-12" style="text-align:center;margin-top: -215px;">
      <img src="http://res.cloudinary.com/amyxandra1/image/upload/v1523813494/IMG_20180223_115743.jpg" class="img-circle img-responsive" alt="@AmyXandra" style="margin:0 auto; position:relative; top:278px;" width="170px">
      
      <?xml version="1.0" encoding="utf-8"?>
      <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
      <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="604.47px" height="328.483px" viewBox="0 0 604.47 328.483" enable-background="new 0 0 604.47 328.483"
         xml:space="preserve">
      
           <style>
           #love1{
               animation:love 0.8s infinite;
           }
           @keyframes love{
               0% {transform:scale(1);}
               50% {transform:scale(1.05);}
               100% {transform:scale(1);}
           }
           #love2{
               animation:love2 1.35s infinite;
           }
           @keyframes love2{
               0% {transform:scale(1);}
               50% {transform:scale(1.045);}
               100% {transform:scale(1);}
           }
           #love3{
               animation:love3 0.3s infinite;
           }
           @keyframes love3{
               0% {transform:scale(1);}
               50% {transform:scale(1.008);}
               100% {transform:scale(1);}
           }
         .radio{
           display:none;
         }
           </style>
      
      <rect x="-332.104" y="-236.595" display="none" fill="#EE2B47" width="1280" height="650"/>
      <text transform="matrix(1 0 0 1 42.248 -20.4233)" display="none" fill="#FFFFFF" font-family="'MyriadPro-Bold'" font-size="25">Looks like you’re lost, you just missed our performance</text>
      <text transform="matrix(1 0 0 1 225.0249 -88.0327)" display="none" fill="#FFFFFF" font-family="'MyriadPro-Bold'" font-size="100">404</text>
      <path display="none" fill="#FFFFFF" d="M402.896,342.782c0,5.867-4.756,10.623-10.622,10.623H224.518
        c-5.866,0-10.622-4.756-10.622-10.623v-18.754c0-5.867,4.756-10.623,10.622-10.623h167.756c5.866,0,10.622,4.756,10.622,10.623
        V342.782z"/>
      <text transform="matrix(1 0 0 1 254.7178 341.3418)" display="none" font-family="'MyriadPro-Semibold'" font-size="23">Go to Home</text>
      <g>
        <path fill="#C7B299" d="M134.309,88.504l1.032-0.839l-14.512-17.793l-1.031,0.842l-0.815,0.664l-2.066,1.686l-1.849,1.509
          l-11.795,9.619c-0.202-2.461-1.894-4.541-4.527-5.293c-3.154-0.904-6.375,0.543-7.158,3.276c-0.783,2.734,1.125,5.662,4.279,6.563
          c2.119,0.608,4.282,0.17,5.694-1.035c0.109-0.04,0.243-0.063,0.339-0.142L116.075,76l12.308,15.089l-11.701,9.542
          c-0.201-2.461-1.9-4.547-4.532-5.3c-3.153-0.904-6.378,0.54-7.16,3.273c-0.782,2.733,1.123,5.661,4.276,6.563
          c2.121,0.608,4.289,0.176,5.7-1.029c0.109-0.038,0.247-0.057,0.344-0.137l14.269-11.637l1.85-1.508l2.066-1.688L134.309,88.504z"/>
        
          <rect x="115.422" y="79.702" transform="matrix(0.6321 0.7749 -0.7749 0.6321 108.934 -67.1262)" fill="#C7B299" width="19.472" height="2.907"/>
      </g>
      <path fill="#8CC63F" d="M554.69,199.753c-0.086-1.05-0.412-2.055-0.908-2.916c-0.491-0.867-1.15-1.578-1.855-2.14
        c-0.71-0.562-1.467-0.979-2.217-1.29c-0.06-0.024-0.118-0.048-0.178-0.069c0.594-1.394,1.184-2.811,1.771-4.252
        c1.073-0.236,2.163-0.522,3.233-0.919c0.659-0.233,1.281-0.57,1.906-0.895l0.444-0.285l0.455-0.273
        c0.298-0.179,0.631-0.361,0.923-0.558l0.408-0.276l0.227-0.156l0.214-0.164c0.275-0.23,0.545-0.467,0.799-0.718
        c0.514-0.5,0.979-1.038,1.402-1.608c0.842-1.138,1.506-2.381,2.008-3.673c0.503-1.293,0.854-2.631,1.06-3.985
        c0.206-1.354,0.909-4.442-0.265-6.154s-3.27-2.776-7.063,3.986c-0.318,0.568-0.607,1.147-0.901,1.723
        c-0.299,0.574-0.589,1.147-0.876,1.723c-0.573,1.146-1.145,2.286-1.71,3.42c-0.561,1.134-1.116,2.261-1.667,3.376
        c-0.526,1.063-1.049,2.114-1.568,3.158c-0.067,0.011-0.132,0.023-0.199,0.034c-1.26,0.21-2.558,0.38-3.877,0.634
        c-1.317,0.249-2.655,0.59-3.942,1.099c-1.293,0.494-2.512,1.179-3.631,1.96l-0.412,0.304l-0.204,0.153l-0.051,0.039
        c-0.024,0.018-0.018,0.011-0.067,0.051l-0.092,0.074c-0.065,0.054-0.113,0.089-0.192,0.158l-0.218,0.188
        c-0.134,0.123-0.268,0.242-0.395,0.372c-0.517,0.506-0.978,1.073-1.375,1.683c-0.793,1.221-1.3,2.626-1.46,4.053
        c-0.171,1.425-0.018,2.86,0.4,4.184c0.42,1.323,1.091,2.539,1.938,3.579c0.85,1.039,1.87,1.902,2.972,2.574
        c0.14,0.085,0.281,0.167,0.425,0.245c-0.834,1.735-1.621,3.416-2.384,4.986c-0.396,0.809-0.763,1.602-1.148,2.372
        c-0.19,0.386-0.378,0.765-0.563,1.138c-0.046,0.094-0.091,0.188-0.137,0.28c-0.043,0.08-0.084,0.163-0.126,0.245
        c-0.086,0.16-0.175,0.316-0.271,0.463c-0.377,0.593-0.839,1.06-1.341,1.35c-0.502,0.286-1.061,0.379-1.613,0.293
        c-0.553-0.084-1.08-0.344-1.527-0.672c-0.45-0.327-0.817-0.741-1.074-1.174c-0.062-0.107-0.12-0.221-0.169-0.328l-0.034-0.078
        l-0.037-0.099l-0.048-0.154c-0.061-0.219-0.084-0.44-0.083-0.659c0-0.44,0.127-0.858,0.302-1.226
        c0.022-0.044,0.047-0.085,0.07-0.129c-0.003,0.734,0.394,1.447,1.093,1.807c0.991,0.509,2.207,0.119,2.718-0.872
        c0.466-0.905-0.108-2.143-0.733-2.527c-0.627-0.388-1.443-0.587-2.065-0.32c-0.618,0.259-1.231,0.679-1.76,1.52
        c-0.257,0.422-0.449,1.093-0.515,1.688c-0.035,0.296,0.148,0.563,0.206,0.881c0.018,0.083,0.205,0.119,0.228,0.201l0.027,0.101
        l-0.138,0.167c0.05,0.159,0.021,0.331,0.089,0.481c0.271,0.6,0.632,1.178,1.167,1.669c0.533,0.491,1.191,0.911,2.009,1.119
        c0.409,0.103,0.84,0.149,1.291,0.111c0.45-0.037,0.902-0.154,1.325-0.349c0.857-0.383,1.543-1.049,2.084-1.777
        c0.137-0.184,0.261-0.373,0.382-0.566l0.088-0.145l0.049-0.082l0.037-0.067c0.052-0.089,0.104-0.18,0.155-0.27
        c0.206-0.362,0.417-0.73,0.628-1.104c0.432-0.739,0.852-1.526,1.285-2.329c0.872-1.593,1.727-3.274,2.642-5.027
        c0.024,0.007,0.049,0.015,0.072,0.023l0.457,0.136l0.465,0.111c1.242,0.275,2.539,0.327,3.771,0.106
        c1.231-0.218,2.389-0.678,3.397-1.308c1.007-0.627,1.872-1.42,2.57-2.312C554.189,204.074,554.875,201.853,554.69,199.753z
         M541.028,205.512c-1.673-1.043-3.024-2.671-3.628-4.596c-0.295-0.958-0.419-1.978-0.306-2.98c0.11-1.001,0.442-1.979,0.981-2.856
        c0.273-0.437,0.594-0.852,0.965-1.23c0.089-0.096,0.188-0.188,0.283-0.279l0.135-0.121c0.04-0.038,0.114-0.099,0.169-0.146
        l0.091-0.076l0.068-0.054l0.172-0.133l0.342-0.268c0.937-0.683,1.938-1.276,3.021-1.729c0.538-0.234,1.1-0.432,1.676-0.607
        c0.575-0.178,1.168-0.326,1.777-0.46c0.711-0.16,1.445-0.296,2.193-0.434c-0.539,1.079-1.072,2.147-1.597,3.203
        c-0.747-0.097-1.481-0.068-2.158,0.069c-0.694,0.145-1.326,0.398-1.874,0.715c-1.096,0.636-1.865,1.484-2.346,2.319
        c-0.479,0.838-0.688,1.673-0.627,2.358c0.028,0.345,0.126,0.644,0.253,0.877c0.13,0.231,0.398,0.603,0.858,0.84
        c0.615,0.316,1.371,0.074,1.687-0.541c0.316-0.614,0.075-1.37-0.54-1.687s-1.371-0.074-1.687,0.541
        c-0.025,0.047-0.046,0.097-0.063,0.146c-0.003-0.062-0.005-0.126-0.003-0.19c0.021-0.557,0.264-1.255,0.76-1.933
        c0.497-0.674,1.232-1.349,2.198-1.789c0.838-0.383,1.846-0.568,2.899-0.428c-0.405,0.815-0.804,1.627-1.195,2.43
        c-0.492,1.024-0.978,2.036-1.457,3.031c-0.479,0.994-0.948,1.977-1.401,2.946c-0.509,1.072-1.007,2.121-1.496,3.152
        C541.129,205.572,541.077,205.544,541.028,205.512z M553.35,184.568c0.454-1.025,0.925-2.056,1.404-3.089
        c0.476-1.035,0.972-2.07,1.485-3.103c0.518-1.028,1.052-2.057,1.627-3.068c0.281-0.506,0.584-1.003,0.894-1.495
        c0.308-0.491,0.632-0.972,0.982-1.428c0.351-0.453,1.023-1.28,1.693-1.708c1.104-0.706,1.407,0.9,1.477,1.161
        c0.14,0.521,0.191,1.09,0.199,1.659c-0.015,2.293-0.663,4.606-1.724,6.629c-0.533,1.012-1.188,1.949-1.951,2.766
        c-0.382,0.406-0.791,0.782-1.227,1.118c-0.217,0.169-0.44,0.326-0.669,0.476l-0.171,0.111l-0.17,0.103l-0.387,0.229
        c-0.124,0.071-0.238,0.128-0.357,0.192c-0.116,0.063-0.236,0.126-0.364,0.185l-0.375,0.177l-0.383,0.161
        c-0.515,0.205-1.035,0.387-1.57,0.535c-0.416,0.116-0.841,0.211-1.271,0.296C552.778,185.843,553.063,185.209,553.35,184.568z
         M550.914,204.338c-1.107,1.305-2.729,2.271-4.506,2.503c-0.887,0.113-1.809,0.063-2.72-0.168l-0.342-0.092l-0.012-0.005
        c0.504-1.001,1.014-2.024,1.521-3.075c0.948-1.927,1.9-3.931,2.844-6.01c0.408-0.89,0.813-1.799,1.213-2.719
        c0.046,0.023,0.092,0.045,0.135,0.067c0.616,0.326,1.219,0.71,1.744,1.195c0.521,0.484,0.975,1.056,1.283,1.711
        c0.311,0.652,0.493,1.38,0.516,2.142C552.64,201.412,552.035,203.051,550.914,204.338z"/>
      <path fill="#7FEEFF" d="M435.278,50.789l16.006-21.343c0.398-0.531,1.104-0.676,1.634-0.278c0.446,0.336,0.994,1.966,1.337,3.344
        c0.282,1.142,0.493,3.113,0.626,4.588c0.139,1.472,0.134,3.069-0.07,4.672c-0.206,1.599-0.62,3.212-1.311,4.637
        c-0.342,0.713-0.746,1.381-1.203,1.96c-0.458,0.58-0.964,1.079-1.481,1.464c-0.521,0.387-1.033,0.678-1.51,0.869
        c-0.483,0.185-0.895,0.315-1.25,0.366c-0.175,0.035-0.307,0.083-0.443,0.094c-0.096,0.011-0.152,0.054-0.211,0.079
        c0.143-0.115,0.242-0.428,0.493-0.628c0.258-0.207,0.427-0.64,0.728-0.952c0.297-0.318,0.598-0.691,0.878-1.119
        c0.278-0.428,1.105-1.75,1.326-2.285c0.505-1.235,1.579-3.862,1.918-9.682c0.127-2.187-0.581-4.39-0.581-4.39
        s0.009-0.08,0.014-0.122c0,0-16.971,22.53-17.793,23.597c-1.351,1.889-3.8,3.106-6.557,3.007c-4.101-0.146-7.323-3.145-7.196-6.699
        c0.126-3.554,3.554-6.318,7.655-6.17C431.708,45.917,434.584,48.079,435.278,50.789z"/>
      <path fill="#D9E021" d="M132.034,236.232c0.585,0.494,1.431,0.451,1.922-0.135c0.492-0.585,0.39-1.425-0.194-1.918l-23.49-19.778
        c3.079-0.527,5.853-3.814,6.214-7.742c0.435-4.704-2.505-8.835-6.583-9.211c-4.077-0.376-7.726,3.124-8.162,7.829
        c-0.289,3.16,0.91,6.101,2.992,7.774c0.083,0.146,0.157,0.324,0.294,0.441L132.034,236.232z"/>
      <path id="love3" fill="#FFBD09" d="M482.333,179.536c-3.47-0.422-5.133,2.579-5.492,3.633c-0.36-1.054-2.023-4.055-5.493-3.633
        c-3.661,0.443-4.909,5.381-2.594,9.015c2.317,3.634,8.087,7.489,8.087,7.489s5.77-3.855,8.086-7.489
        S485.994,179.979,482.333,179.536z"/>
      <path id="love2" fill="#29ABE2" d="M516.751,102.942c-4.414-0.536-6.527,3.281-6.986,4.621c-0.458-1.34-2.572-5.157-6.985-4.621
        c-4.657,0.564-6.245,6.845-3.3,11.467c2.947,4.623,10.285,9.526,10.285,9.526s7.339-4.903,10.286-9.526
        C522.997,109.787,521.409,103.507,516.751,102.942z"/>
      <path id="love1" fill="#56D115" d="M63.563,138.405c-4.458-0.54-6.593,3.314-7.056,4.669c-0.463-1.354-2.598-5.209-7.056-4.669
        c-4.703,0.57-6.307,6.914-3.332,11.581c2.976,4.669,10.388,9.622,10.388,9.622s7.412-4.953,10.388-9.622
        C69.87,145.319,68.267,138.976,63.563,138.405z"/>
      <g id="radio" style="display:none;">
        <path fill="#231F20" d="M432.042,229.481H185.667c-6.545,0-11.852-5.306-11.852-11.852v-87.611c0-6.544,5.307-11.853,11.852-11.853
          h246.375c6.546,0,11.853,5.309,11.853,11.853v87.611C443.895,224.176,438.588,229.481,432.042,229.481z"/>
        <g>
          <path fill="none" stroke="#FFFFFF" stroke-width="5.8589" stroke-miterlimit="10" d="M264.719,173.825
            c0,18.644-15.114,33.759-33.759,33.759c-18.644,0-33.76-15.115-33.76-33.759c0-18.647,15.116-33.759,33.76-33.759
            C249.604,140.066,264.719,155.178,264.719,173.825z"/>
          <path fill="none" stroke="#FFFFFF" stroke-width="5.8589" stroke-miterlimit="10" d="M420.509,173.825
            c0,18.644-15.115,33.759-33.76,33.759c-18.646,0-33.76-15.115-33.76-33.759c0-18.647,15.114-33.759,33.76-33.759
            C405.394,140.066,420.509,155.178,420.509,173.825z"/>
        </g>
        <path fill="#FFFFFF" d="M330.864,187.968h-44.02c-1.702,0-3.082-1.383-3.082-3.083v-22.121c0-1.701,1.38-3.083,3.082-3.083h44.02
          c1.702,0,3.081,1.382,3.081,3.083v22.121C333.945,186.585,332.566,187.968,330.864,187.968z"/>
        <rect x="229.473" y="103.111" fill="#231F20" width="17.623" height="8.212"/>
        <rect x="256.476" y="103.111" fill="#231F20" width="17.622" height="8.212"/>
        <rect x="283.475" y="103.111" fill="#231F20" width="17.624" height="8.212"/>
        <g>
          <rect x="201.188" y="235.869" fill="#231F20" width="14.599" height="16.424"/>
          <rect x="401.924" y="235.869" fill="#231F20" width="14.598" height="16.424"/>
        </g>
        <g>
          <path fill="#231F20" d="M301.896,173.825c0,2.77-2.248,5.015-5.019,5.015c-2.772,0-5.02-2.245-5.02-5.015
            c0-2.771,2.248-5.021,5.02-5.021C299.647,168.805,301.896,171.054,301.896,173.825z"/>
          <path fill="#231F20" d="M325.851,173.825c0,2.77-2.249,5.015-5.02,5.015c-2.769,0-5.017-2.245-5.017-5.015
            c0-2.771,2.248-5.021,5.017-5.021C323.602,168.805,325.851,171.054,325.851,173.825z"/>
        </g>
        <path fill="#231F20" d="M211.771,111.323V88.721h194.169v22.603h13.188V82.125c0-3.642-2.954-6.594-6.596-6.594H205.177
          c-3.642,0-6.596,2.953-6.596,6.594v29.198H211.771z"/>
        <ellipse fill="#5B5A5A" cx="309.191" cy="261.487" rx="119.611" ry="1.5"/>
      </g>
      </svg>
      </div>
     
      <div class="profile" style="text-align:center;">
      <ul>
      <li>Name: <span>
      <?php echo $name; ?>
      </span></li>
      <li>Username: <span>@AmyXandra</span></li>
      <li>Phone: <span>08162027522</span></li>
      <li>Email: <span>amyabafor013@gmail.com</span></li>
      <li>Skills: <span>HTML, CSS (Including css animations), BOOTSTRAP, JQUERY, PHP (learning in progress...)</span></li>
      </ul>
      </div>
      
      <div class="socials">
      <h5>Connect with me!</h5>
      <p><a href="https://web.facebook.com/amy.abafor"><i class="fab fa-facebook-f"></i></a> <a href="https://github.com/AmyXandra"><i class="fab fa-github"></i></a> <a href="https://www.linkedin.com/in/amy-abafor-00116a151/"><i class="fab fa-linkedin-in"></i></a></p>
      
      
      </div>
      
      <div style="text-align:center;">
      <button style="padding:8px 15px; border:none; background-color:white; font-size:20px; border-radius:10px;"><a href="index" style="color:black; text-decoration:none; font-weight:bold;" >Go to Home</a></button>
      </div>
           
      </div>
        
    </div>
</div>
      </div>
      
    <script type="text/javascript" src="js/libs/require/require.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

  </body>

</html>