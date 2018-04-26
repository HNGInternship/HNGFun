<?php

  $dt = date("Y-m-d h:i:sa");
?>
<?php/*
if(!defined('DB_USER')){
  require "../../config.php";   
  try {
      $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
  } catch (PDOException $pe) {
      die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
  }
}
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username = 'foluwa'");
$user = $result2->fetch(PDO::FETCH_OBJ);
/*
if($_SERVER['REQUEST_METHOD'] === 'POST'){   
    try{

      if(!isset($_POST['question'])){
        echo json_encode([
          'status' => 1,
          'answer' => "Please provide a question"
        ]);
        return;
      }

      $mem = $_POST['question'];
      $mem = preg_replace('([\s]+)', ' ', trim($mem));
      $mem = preg_replace("([?.])", "", $mem);
    $arr = explode(" ", $mem);
    
    /* Training the bot*/ 
   /* if($arr[0] == "train:"){

      unset($arr[0]);
      $q = implode(" ",$arr);
      $queries = explode("#", $q);
      if (count($queries) < 3) {
        # code...
        echo json_encode([
          'status' => 0,
          'answer' => "You need to enter a password to train me."
        ]);
        return;
      }
      $password = trim($queries[2]);
      //to verify training password
      define('trainingpassword', 'password');
      
      if ($password !== trainingpassword) {
        # code...
        echo json_encode([
          'status'=> 0,
          'answer' => "You entered a wrong passsword"
        ]);
        return;
      }
      $quest = $queries[0];
      $ans = $queries[1];

      $sql = "insert into chatbot (question, answer) values (:question, :answer)";

      $stmt = $conn->prepare($sql);
          $stmt->bindParam(':question', $quest);
          $stmt->bindParam(':answer', $ans);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

      
      echo json_encode([
        'status' => 1,
        'answer' => "Thanks for training me, I would love to learn more"
      ]);
      return;
    }
      elseif ($arr[0] == "aboutbot") {
        # code...
        echo json_encode([
          'status'=> 1,
          'answer' => "I am ZOE, Version 1.0.0. You can train me by using this format ' train: This is a question # This is the answer # password '"
        ]);
        return;
      }
      else {
        $question = implode(" ",$arr);
        //to check if answer already exists in the database...
        $question = "%$question%";
        $sql = "Select * from chatbot where question like :question";
          $stat = $conn->prepare($sql);
          $stat->bindParam(':question', $question);
          $stat->execute();

          $stat->setFetchMode(PDO::FETCH_ASSOC);
          $rows = $stat->fetchAll();
          if(count($rows)>0){
            $index = rand(0, count($rows)-1);
            $row = $rows[$index];
            $answer = $row['answer'];
            // check if answer is a function.
            $index_of_parentheses = stripos($answer, "((");
            if($index_of_parentheses === false){// if answer is not to call a function
              echo json_encode([
                'status' => 1,
                'answer' => $answer
              ]);
              return;
            }else{//otherwise call a function. but get the function name first
                $index_of_parentheses_closing = stripos($answer, "))");
                if($index_of_parentheses_closing !== false){
                    $function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
                    $function_name = trim($function_name);
                    if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
                       echo json_encode([
                        'status' => 0,
                        'answer' => "The function name should not contain white spaces"
                      ]);
                      return;
                    }
                  if(!function_exists($function_name)){
                    echo json_encode([
                      'status' => 0,
                      'answer' => "I am sorry but I could not find that function"
                    ]);
                  }else{
                    echo json_encode([
                      'status' => 1,
                      'answer' => str_replace("(($function_name))", $function_name(), $answer)
                    ]);
                  }
                  return;
                }
            }    
        }else{

          echo json_encode([
            'status' => 0,
            'answer' => "I am sorry, I cannot answer your question now. You could offer to train me."
          ]);
          return;
        }
      }
  }catch (Exception $e){
    return $e->message ;
  }
}

  function randomQuotes () {
    $quotes = array("I have a dream",
                       "Children are good", 
                       "Another quote",
                       "Another 11 quote",
                       "Another vbbv quote",
                       "Another [[[]]] quote",
                       "Anothernnn quote");
     $myQuotes = quotes[rand(0,3);];
     return $myQuotes;
    }
*/?>


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
    <title><?php echo $user->name; ?>-Hng Intern</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="css/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!-- This is the main css file for the default Alta theme -->
    <!-- injector:theme -->
    <link rel="stylesheet" href="http://www.oracle.com/webfolder/technetwork/jet/public_samples/jet/css/libs/oj/v5.0.0/alta/oj-alta-min.css" type="text/css"/>
    <!-- endinjector -->
    <style type="text/css">
    body {
          height: 100%;
          background-color: grey;
          background: linear-gradient(to bottom right, #ffffff,  grey);
    }
  header { 
     padding-bottom: 30px;
   }
  img {
    border-radius: 50%;
    height: 300px;
    width: 300px;
  }
  li {
    font-size: 25px;
  }
  .foluwa {
    font-size: 30px;
    background-color: skyblue;
  }
  .hngintern {
    font-size: 25px;
  }
 </style>

  </head>
  <body class="oj-web-applayout-body">
    <!-- Template for rendering navigation items shared between nav bar and nav list -->

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
            <div data-bind="css: smScreen() ? 'oj-flex-bar-center-absolute' : 'oj-flex-bar-middle oj-sm-align-items-baseline'">
              <span role="img" class="oj-sm-only-hide oj-icon demo-oracle-icon" title="Oracle Logo" alt="Oracle Logo"></span>
              <h1 class="oj-web-applayout-header-title" title="Application Name" data-bind="text: appName"></h1>
            </div>
            <div class="oj-flex-bar-end">
              <!-- Responsive Toolbar -->
              <div class="pull-left hngintern">HngIntern 2018</div>
              
            </div>
            <div class="oj-flex-bar-end">
              <!-- Responsive Toolbar -->
             <div class="pull-right"><?php echo $dt; ?></div> 
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
        

        <main>
            <div class="oj-hybrid-padding">
                <div>
                  <img src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg" alt="Foluwa's picture">
                  <span class="name foluwa"><?php echo $user->name; ?></span>
                </div>
                <div class="oj-web-applayout-footer-item oj-web-applayout-max-width oj-text-secondary-color oj-text-sm">
            <ul>
                          <li><a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a></li>
                          <li><a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="https://github.com/foluwa"><i class="fa fa-github"></i></a></li>
                          <li><a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a></li>
            </ul>
          </div>
          </div>
        <main>
        

        <footer class="oj-web-applayout-footer" role="contentinfo">
          Foluwa @ <a href="https://hotels.ng">Hotels.ng</a>
        </footer>
      </div>
    </div>

    <script type="text/javascript" src="http://www.oracle.com/webfolder/technetwork/jet/public_samples/jet/js/libs/require/require.js"></script>
    <script type="text/javascript" src="http://www.oracle.com/webfolder/technetwork/jet/public_samples/JET-Template-Web-NavBar/public_html/js/main.js"></script>
    <script>/*
    $(document).ready(function(){
      var Form =$('#conversation');
      Form.submit(function(e){
        e.preventDefault();
        var questionBox = $('textarea[name=inputtext]');
        var question = questionBox.val();
        $("#conversation").append("<p class='botSend'>" + question + "<?php echo $d?>" + "</p>");
        $.ajax({
          url: '/profiles/foluwa.php',
          type: 'POST',
          data: {question: question},
          dataType: 'json',
          success: function(response){
              $("#botPost").append("<p class='humanSend'>"  + response.answer +  "</p>");
          },
          error: function(error){
                alert(error);
          }
        })  
      })
    });*/
  </script>
  </body>
</html>