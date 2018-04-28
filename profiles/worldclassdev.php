<?php 
$sql = "SELECT * FROM interns_data WHERE username = 'worldclassdev'";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$data = $query->fetchAll();
$worldclassdev = array_shift($data);

    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete); 
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }

?>


<!DOCTYPE html>
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
    <title>Justine Philip</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <link rel="icon" href="profiles/worldclassdev/css/images/favicon.ico" type="image/x-icon" />

    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="profiles/worldclassdev/css/alta/5.0.0/web/alta.min.css" id="css" />
<!-- endinjector -->
    
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="profiles/worldclassdev/css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="profiles/worldclassdev/css/app.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->
    <script type="text/html" id="navTemplate">
      <li><a href="#">
        <span :class="[[$data['iconClass']]]"></span>
        <oj-bind-text value="[[$data['name']]]"></oj-bind-text>
      </a></li>
    </script>

    <div id="globalBody" class="oj-offcanvas-outer-wrapper oj-offcanvas-page">
       <div id="pageContent" class="oj-web-applayout-page">
        <!--
           ** Oracle JET V5.0.0 web application header pattern.
           ** Please see the demos under Cookbook/Patterns/App Shell: Web
           ** and the CSS documentation under Support/API Docs/Non-Component Styling
           ** on the JET website for more information on how to use this pattern.
        -->
       
<div class="oj-hybrid-padding">
  <my-profile>
    <div class="twcd container">
        <div class="name">
            <h1><?php echo $worldclassdev['name']; ?></h1>
          </div>
          <div class="profile mx-auto">
            <img class="profile-img mx-auto" src="<?php echo $worldclassdev['image_filename']; ?>" alt="my-profile">
          </div>
          <div class="about">
              I like to call myself a developer of all things JS. But basically i love to build stuff that solves a problem irrespective of the technology involved. I'm more about the impact than the money, but somehow i find both. When im not coding, i write, game and play the guitar.
          </div>
        <?php var_dump(DB_HOST." ". DB_USER." ". DB_PASSWORD." ".DB_DATABASE); ?>
        <?php
$formaction = "profiles/worldclassdev-api/chat.php";
?>
<form action="<?php echo $formaction; ?>" method="post" >
<input name="chat" type="text" style="width: 100%" >
<input   type="submit" value="chat with me" >
</form>
    </div>  
  </my-profile>
<<<<<<< HEAD
    <?php
$formaction = "profiles/worldclassdev-api/chat.php";
?>
<form action="<?php echo $formaction; ?>" method="post" >
<input name="chat" type="text" style="width: 100%" >
<input   type="submit" value="chat with me" >
</form>
||||||| merged common ancestors
    <?php
$formaction = "profiles/worldclassdev/api/chat.php";
?>
<form action="<?php echo $formaction; ?>" method="post" >
<input name="chat" type="text" style="width: 100%" >
<input   type="submit" value="chat with me" >
</form>
=======

>>>>>>> eeccdd734718fa2940b000e5386e2a4ec2575fcd

</div>
      </div>
      </div>
   
    
    <script type="text/javascript" src="profiles/worldclassdev/js/libs/require/require.js"></script>

    <script type="text/javascript" src="profiles/worldclassdev/js/main.js"></script>
