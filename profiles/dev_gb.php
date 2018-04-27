<?php
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
?>
<!DOCTYPE html>
<!--
 Copyright (c) 2014, 2017, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->

<!-- ************************ IMPORTANT INFORMATION ************************************
  This web navigation drawer template is provided as an example of how to configure
  a JET web application with a navigation drawer as a single page application
  using ojRouter and ojModule.  It contains the Oracle JET framework and a default
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
    <title>devgeaks.com</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon" />

    <!-- This is the main css file for the default Alta theme -->
<!-- injector:theme -->
<link rel="stylesheet" href="css/alta/3.2.0/web/alta.css" id="css" />
<!-- endinjector -->
    
    <!-- This contains icon fonts used by the starter template -->
    <link rel="stylesheet" href="css/demo-alta-site-min.css" type="text/css"/>

    <!-- This is where you would add any app specific styling -->
    <link rel="stylesheet" href="css/override.css" type="text/css"/>

  </head>
  <body class="oj-web-applayout-body">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->
    <script type="text/html" id="navTemplate">
      <li><a href="#">
        <span data-bind="css: $data['iconClass']"></span>
        <!-- ko text: $data['name'] --> <!--/ko-->
      </a></li>
    </script>

    <div id="globalBody" class="oj-offcanvas-outer-wrapper oj-offcanvas-page">
      <!--
         ** Oracle JET V3.2.0 web application navigation drawer pattern.
         ** Please see the demos under Cookbook/Patterns/App Shell: Web
         ** and the CSS documentation under Support/API Docs/Non-Component Styling
         ** on the JET website for more information on how to use this pattern. 
         ** The off-canvas section is used when the browser is resized to a smaller media
         ** query size for a phone format and hidden until a user clicks on
         ** the header hamburger icon.
      -->
      <div id="navDrawer" class="oj-contrast-marker oj-web-applayout-offcanvas oj-offcanvas-start">
        <div role="navigation" data-bind="click: toggleDrawer, ojComponent: {component: 'ojNavigationList',
          navigationLevel: 'application', item: {template: 'navTemplate'}, data: navDataSource,
          selection: router.stateId, edge: 'start'}">
        </div>
      </div>
      <div id="pageContent" class="oj-web-applayout-page">
        <!--
           ** Oracle JET V3.2.0 web application header pattern.
           ** Please see the demos under Cookbook/Patterns/App Shell: Web
           ** and the CSS documentation under Support/API Docs/Non-Component Styling
           ** on the JET website for more information on how to use this pattern.
        -->
        <header role="banner" class="oj-web-applayout-header">
          <div class="oj-web-applayout-max-width oj-flex-bar oj-sm-align-items-center">
            <!-- Offcanvas toggle button -->
            <div class="oj-flex-bar-start oj-md-hide">
              <button id="drawerToggleButton" class="oj-button-lg" data-bind="click: toggleDrawer,
                ojComponent: {component:'ojButton', label: 'Application Navigation',
                chroming: 'half', display: 'icons', icons: {start: 'oj-web-applayout-offcanvas-icon'}}">
              </button>
            </div>
            <div data-bind="css: smScreen() ? 'oj-flex-bar-center-absolute' : 'oj-flex-bar-middle oj-sm-align-items-baseline'">
              <span role="img" class="oj-sm-only-hide oj-icon demo-oracle-icon" title="Oracle Logo" alt="Oracle Logo"></span>
              
            </div>
          </div>
          <div role="navigation" class="oj-web-applayout-max-width oj-web-applayout-navbar">
            <div data-bind="ojComponent: {component: 'ojNavigationList',
              navigationLevel: 'application',
              item: {template: 'navTemplate'}, data: navDataSource,
              selection: router.stateId, edge: 'top'}"
              class="oj-web-applayout-navbar oj-sm-only-hide oj-md-condense oj-md-justify-content-flex-end">
            </div>
          </div>
        </header>
        <?php
require 'db.php';
$username = "dev_gb";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);
$name = $my_data['name'];
$img = $my_data['image_filename'];
$username =$my_data['username'];
?>
<!--
 Copyright (c) 2014, 2017, Oracle and/or its affiliates.
 The Universal Permissive License (UPL), Version 1.0
 -->
<div class="oj-flex oj-flex-items-pad">
  <div class="oj-sm-12 oj-lg-3 oj-xl-3 oj-flex-item demo-coldrop-A"><h1><img src="<?php echo $img;?>" alt="bulleted list image" 
     width="256px" height="200px"/>
   </h1><br/><p>Name: <?php echo $name;?></p><p>Slack: @<?php echo $username;?></p><p>Date:<?php
    date_default_timezone_set("Africa/Lagos");
  echo  date("l"). ", ". date("Y/m/d") . date("h:i"). " WAT";
?></p> </div>

  <div class="oj-sm-12 oj-lg-9 oj-xl-15 oj-flex-item demo-coldrop-B"><h1>What Is DevOps?</h1>
    <p>
DevOps is a term for a group of concepts that, while not all new, have catalyzed into a movement and are rapidly spreading throughout the technical community.  Like any new and popular term, people may have confused and sometimes contradictory impressions of what it is.  Here’s my take on how DevOps can be usefully defined; I propose this definition as a standard framework to more clearly discuss the various areas DevOps covers. Like “Quality” or “Agile,” DevOps is a large enough concept that it requires some nuance to fully understand.

[Update: We’re really excited to announce a new resource from The Agile Admins. We have put together a comprehensive DevOps Fundamentals course for lynda.com that covers everything from DevOps history to broad coverage of the functional areas of DevOps. The first two followups on Infrastructure Automation and Continuous Delivery are also live and there’s more to come. We hope you enjoy them.]

</p>
  </div>
  <div class="oj-sm-12 oj-lg-9 oj-xl-6 oj-flex-item demo-coldrop-C"><h1>What is DevOps Not?</h1>
    <p>
It’s Not NoOps
It is not “they’re taking our jobs!”  Some folks thinks that DevOps means that developers are taking over operations and doing it themselves.  Part of that is true and part of it isn’t.
</br></br>
It’s a misconception that DevOps is coming from the development side of the house to wipe out operations – DevOps, and its antecedents in agile operations, are being initiated out of operations teams more often than not.  This is because operations folks (and I speak for myself here as well) have realized that our existing principles, processes, and practices have not kept pace with what’s needed for success.  As businesses and development teams need more agility as the business climate becomes more fast paced, we’ve often been providing less as we try to solve our problems with more rigidity, and we need a fundamental reorientation to be able to provide systems infrastructure in an effective manner.
</p>
  </div>
   <div class="oj-sm-12 oj-lg-9 oj-xl-6 oj-flex-item demo-coldrop-D">
    <p><br/><br/><br/>
It’s Not (Just) Devs and Ops
And in the end, it’s not exclusionary.  Some people have complained “What about security people!  And network admins!  Why leave us out!?!”  The point is that all the participants in creating a product or system should collaborate from the beginning – business folks of various stripes, developers of various stripes, and operations folks of various stripes, and all this includes security, network, and whoever else.  There’s a lot of different kinds of business and developer stakeholders as well; just because everyone doesn’t get a specific call-out (“Don’t forget the icon designers!”) doesn’t mean that they aren’t included.   The original agile development guys were mostly thinking about “biz + dev” collaboration, and DevOps is pointing out issues and solutions around “dev + ops” collaboration, but the mature result of all this is “everyone collaborating”. In that sense, DevOps is just a major step for one discipline to join in on the overall culture of agile collaboration that should involve all disciplines in an organization. So whoever is participating in the delivery of the software or service is part of DevOps.
  </div>
</div>
        <footer class="oj-web-applayout-footer" role="contentinfo">
          <div class="oj-web-applayout-footer-item oj-web-applayout-max-width">
            <ul>
              <!-- ko foreach: footerLinks -->
              <li><a data-bind="text : name, attr : {id: linkId, href : linkTarget}"></a></li>
              <!-- /ko -->
            </ul>
          </div>
          <div class="oj-web-applayout-footer-item oj-web-applayout-max-width oj-text-secondary-color oj-text-sm">
            Copyright © 2018 dev_geaks.club and/or its affiliates All rights reserved.
          </div>
        </footer>
      </div>
    </div>
    
    <script type="text/javascript" src="js/libs/require/require.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

  </body>

</html>