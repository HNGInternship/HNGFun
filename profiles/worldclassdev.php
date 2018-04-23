<?php 
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
        <oj-navigation-list data="[[navDataSource]]" edge="start" item.renderer="[[oj.KnockoutTemplateUtils.getRenderer('navTemplate', true)]]" on-click="[[toggleDrawer]]" selection="{{router.stateId}}" class="oj-navigationlist oj-navigationlist-expanded oj-navigationlist-vertical oj-navigationlist-app-level oj-component-initnode oj-complete" tabindex="0" aria-multiselectable="false" role="listbox">
        <div class="oj-navigationlist-listview-container" role="presentation"><div class="oj-navigationlist-listview oj-component" tabindex="-1" role="presentation"><div class="oj-helper-detect-contraction"><div style="width: 200%; height: 200%;"></div></div><div class="oj-helper-detect-expansion"><div></div></div><ul id="ui-id-1" class="oj-navigationlist-element" role="presentation">
      <li id="ui-id-3" role="presentation" class="oj-navigationlist-item-element oj-navigationlist-item oj-selected"><a href="#" role="option" class="oj-navigationlist-focused-element oj-navigationlist-item-content" aria-selected="true" tabindex="-1" data-tabmod="-1"><span :class="[[$data['iconClass']]]" class="oj-navigationlist-item-icon demo-icon-font-24 demo-chart-icon-24"></span><span class="oj-navigationlist-item-label">
        
        <!--oj-bind-text value='[[$data['name']]]'--><!--ko text:$data['name']-->Dashboard<!--/ko--><!--/oj-bind-text-->
      </span></a></li>
    
      <li id="ui-id-5" role="presentation" class="oj-navigationlist-item-element oj-navigationlist-item oj-default"><a href="#" role="option" class="oj-navigationlist-focused-element oj-navigationlist-item-content" aria-selected="false" tabindex="-1" data-tabmod="-1"><span :class="[[$data['iconClass']]]" class="oj-navigationlist-item-icon demo-icon-font-24 demo-fire-icon-24"></span><span class="oj-navigationlist-item-label">
        
        <!--oj-bind-text value='[[$data['name']]]'--><!--ko text:$data['name']-->Incidents<!--/ko--><!--/oj-bind-text-->
      </span></a></li>
    
      <li id="ui-id-7" role="presentation" class="oj-navigationlist-item-element oj-navigationlist-item oj-default"><a href="#" role="option" class="oj-navigationlist-focused-element oj-navigationlist-item-content" aria-selected="false" tabindex="-1" data-tabmod="-1"><span :class="[[$data['iconClass']]]" class="oj-navigationlist-item-icon demo-icon-font-24 demo-people-icon-24"></span><span class="oj-navigationlist-item-label">
        
        <!--oj-bind-text value='[[$data['name']]]'--><!--ko text:$data['name']-->Customers<!--/ko--><!--/oj-bind-text-->
      </span></a></li>
    
      <li id="ui-id-9" role="presentation" class="oj-navigationlist-item-element oj-navigationlist-item oj-default"><a href="#" role="option" class="oj-navigationlist-focused-element oj-navigationlist-item-content" aria-selected="false" tabindex="-1" data-tabmod="-1"><span :class="[[$data['iconClass']]]" class="oj-navigationlist-item-icon demo-icon-font-24 demo-info-icon-24"></span><span class="oj-navigationlist-item-label">
        
        <!--oj-bind-text value='[[$data['name']]]'--><!--ko text:$data['name']-->About<!--/ko--><!--/oj-bind-text-->
      </span></a></li>
    </ul><div class="oj-listview-status-message oj-listview-status" id="ui-id-1:status" role="status" style="display: none;"><div class="oj-icon oj-listview-loading-icon"></div></div><div class="oj-helper-hidden-accessible" id="ui-id-1:info" role="status"></div></div></div></oj-navigation-list>
      </div>
      <div id="pageContent" class="oj-web-applayout-page">
        <!--
           ** Oracle JET V5.0.0 web application header pattern.
           ** Please see the demos under Cookbook/Patterns/App Shell: Web
           ** and the CSS documentation under Support/API Docs/Non-Component Styling
           ** on the JET website for more information on how to use this pattern.
        -->
        <header role="banner" class="oj-web-applayout-header">
     
        </header>
        <oj-module role="main" class="oj-web-applayout-max-width oj-web-applayout-content oj-complete" config="[[moduleConfig]]"><!-- ko ojModule: {"view":$properties.config.view, "viewModel":$properties.config.viewModel,"cleanupMode":$properties.config.cleanupMode,"animation":$properties.animation} --><!--
 Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->
<div class="oj-hybrid-padding">
  <my-profile>
    <div class="twcd container">
        <div class="name">
            <h1>Justine Philip</h1>
          </div>
          <div class="profile">
            <img class="profile-img" src="http://res.cloudinary.com/worldclassdev/image/upload/v1523643285/16845555.png" alt="my-profile">
          </div>
          <div class="about">
              I like to call myself a developer of all things JS. But basically i love to build stuff that solves a problem irrespective of the technology involved. I'm more about the impact than the money, but somehow i find both. When im not coding, i write, game and play the guitar.
          </div>
    </div>  
  </my-profile>
</div><!-- /ko --><div data-bind="_ojNodeStorage_" style="display: none;" class="oj-subtree-hidden">
        </div></oj-module>
      </div>
    </div>
    
   <script type="text/javascript" src="profiles/worldclassdev/js/libs/require/require.js"></script>
    <script type="text/javascript" src="profiles/worldclassdev/js/main.js"></script>

  

<div id="js-1485780770875"></div></body>
