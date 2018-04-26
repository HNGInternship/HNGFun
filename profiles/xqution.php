<!DOCTYPE html>

<html lang="en-us">
  <head>
    <title>Xqution Profile Page</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1">
    <!--<link rel="icon" href="css/images/favicon.ico" type="image/x-icon" />-->

    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="xqution/css/alta/5.0.0/web/alta.css" id="css" />
<!-- endinjector -->
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="xqution/css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="xqution/css/app.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <div id="globalBody" class="oj-web-applayout-page">
      <!--
         ** Oracle JET V5.0.0 web application header pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern.
      -->
      <header role="banner" class="oj-web-applayout-header">
        <div class="oj-web-applayout-max-width oj-flex-bar oj-sm-align-items-center">
        </div>
      </header>
      <div role="main" class="oj-web-applayout-max-width oj-web-applayout-content">
	  <div>
    <div>
      <div>
        <h1>Greetings..... </br>

		<?php
			require 'db.php';
			
			$result = $conn->query("Select * from secret_word LIMIT 1");
			$result = $result->fetch(PDO::FETCH_OBJ);
			$secret_word = $result->secret_word;

			$result2 = $conn->query("Select * from interns_data where username = 'xqution'");
			$user = $result2->fetch(PDO::FETCH_OBJ);
			
			echo 'My name is: ' .$user->name . '</br>';
			echo 'My Slack username is: ' .$user->username . '</br>';
			?>
				<div id="im">
				<img src="http://res.cloudinary.com/dv3ymesru/image/upload/v1523624432/piccccc.jpg" style="border-radius: 50%; margin-left: auto; margin-right: auto;  width: 50%;">
				</div>
		</div>
		</br>
		</h1>
        <h4>Currently on the Hotels.ng Internship Program</h4>
      </div>
    </div>
      </div>
      <footer class="oj-web-applayout-footer" role="contentinfo">
        <div class="oj-web-applayout-footer-item oj-web-applayout-max-width">
          <ul>
            <oj-bind-for-each data="[[footerLinks]]">
              <template>
                <li><a :id="[[$current.data.linkId]]" :href="[[$current.data.linkTarget]]"><oj-bind-text value="[[$current.data.name]]"></oj-bind-text></a></li>
              </template>
            </oj-bind-for-each>
          </ul>
        </div>
        <div class="oj-web-applayout-footer-item oj-web-applayout-max-width oj-text-secondary-color oj-text-sm">
          Copyright © 2014, 2018 Oracle and/or its affiliates All rights reserved.
        </div>
      </footer>
    </div>
    
    <script type="text/javascript" src="xqution/js/libs/require/require.js"></script>
    <script type="text/javascript" src="xqution/js/main.js"></script>

  </body>

</html>