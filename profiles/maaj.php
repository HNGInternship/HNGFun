<?php

require 'db.php';
$sec = $conn->query("Select * from secret_word LIMIT 1");
$sec = $sec->fetch(PDO::FETCH_OBJ);
$secret_word = $sec->secret_word;



//querying the database
$query = $conn->query("Select * from interns_data where username = 'maaj'");
$row = $query->fetch();

// Secret Word and others 

$name = $row['name'];
$username= $row['username'];
$image_url = $row['image_filename'];


?> 
<!DOCTYPE html>
<!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->

<!-- ************************ IMPORTANT INFORMATION ************************************
  This hybrid navigation bar template is provided as an example of how to configure
  a JET hybrid mobile application with a navigation bar as a single page application
  using ojRouter and oj-module.  It contains the Oracle JET framework and a default
  requireJS configuration file to show how JET can be setup in a common application.
  This project template can be used in conjunction with demo code from the JET
  website to test JET component behavior and interactions.

  Any CSS styling with the prefix "demo-" is for demonstration only and is not
  provided as part of the JET framework.

  Please see the demos under Cookbook/Patterns/App Shell: Hybrid Mobile and the CSS documentation
  under Support/API Docs/Non-Component Styling on the JET website for more information on how to use 
  the best practice patterns shown in this template.

  Aria Landmark role attributes are added to the different sections of the application
  for accessibility compliance. If you change the type of content for a specific
  section from what is defined, you should also change the role value for that
  section to represent the appropriate content type.
  ***************************** IMPORTANT INFORMATION ************************************ -->
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Maaj's Profile</title>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' *.oracle.com 'unsafe-inline' 'unsafe-eval' localhost:* 127.0.0.1:*; style-src 'self' *.oracle.com 'unsafe-inline'; img-src * data:"/>
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="css/alta/5.0.0/web/alta.css" id="css"/>
<!-- endinjector -->
    <!-- This contains icon fonts used by the starter template -->
    <!-- This is where you would add any app specific styling -->
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.0.0/3rdparty/require-css/css.min" type="text/css"/>
    <style>
        .oj-web-applayout-body{
            background-color: #153643;
            vertical-align: middle;
            color: #FFFFFF;
            align-content: center;
            margin: auto;
            display: table;
			height: 100%;
        }
        .oj-profile{
            background-image: url('http://res.cloudinary.com/maaj/image/upload/v1523621615/profile.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 400px;
            height: 400px;
            border-radius: 50%;
        }
        .oj-title{
            color: #ffffff;
            text-align: center;
            
        }
        .oj-head{
            color: #ffffff;
            text-align: center;
            font-size: 60px;
            text-transform: capitalize;
            font-weight: bold;
        }
     </style>

  </head>
  <body class="oj-web-applayout-body">
      <div class="oj-web-applayout-body">
          <h1 class="oj-head">Hello....</h1>
          
          <div class="oj-profile"></div>
          
              <div class="oj-title">
                  <h2 class="oj-title"><?php echo $name;?></h2>
                  <h2 class="oj-title">Slack username: <?php echo $username;?></h2>
                  
              </div>
              <div class="oj-title">
    <a href="https://instagram.com/wale_j"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="https://github.com/dmaaj"><i class="fa fa-github"></i></a>
          
      </div>    
      </div>
    

  </body>

</html>