<?php
 $result = $conn->query("Select * from secret_word LIMIT 1");
 $result = $result->fetch(PDO::FETCH_OBJ);
 $secret_word = $result->secret_word;

 $result2 = $conn->query("Select * from interns_data where username = 'femi'");
 $user = $result2->fetch(PDO::FETCH_OBJ);

 ?>


<html lang="en-us" style="height:100%;" dir="ltr">
  <head>
    <title>@Femi Profile Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://www.oracle.com/webfolder/technetwork/jet/css/images/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Oracle JET">
    <link rel="stylesheet" id="css" href="http://www.oracle.com/webfolder/technetwork/jet/css/libs/oj/v5.0.0/alta/oj-alta-min.css">
    <link rel="stylesheet" href="./css/app.css">
    <script>
      // The "oj_whenReady" global variable enables a strategy that the busy context whenReady,
      // will implicitly add a busy state, until the application calls applicationBootstrapComplete
      // on the busy state context.
      window["oj_whenReady"] = true;
    </script>
    <script src="http://www.oracle.com/webfolder/technetwork/jet/js/libs/require/require.js"></script>
    <!-- RequireJS bootstrap file -->
    <script src=".http://www.oracle.com/webfolder/technetwork/jet./js/main.js"></script>
    <script src="http://www.oracle.com/webfolder/technetwork/jet/js/demo.js"></script>
    <link rel="stylesheet" href="http://www.oracle.com/webfolder/technetwork/jet/css/samples/cookbook/demo-grid.css" id="cookcss" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <style>

      body {
        width: 100%;
        height: 100%;
        background-image: url("./pattern2.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #0C1621;
        /*overflow-x: hidden;*/
      }

      .square {
        background-color: #FBFEFE;
        border: 2px solid #4F4F4F;
        border-radius: 5px;
        width: 460px;
        height: 600px;
        text-align: center;
        position: relative;
        top: 50px;
      }

      img {
        width: 236px;
        height: 236px;
        min-height: 140px;
        min-width: 140px;
        margin: 0 auto;
        padding-top: 25px;
      }

      h1 {
        line-height: 30px;
        font-weight: bold;
        color: #000000;
        font-size: px;
      }

      .nick {
        font-size:24px;
        color: #333333;
        margin-bottom: 38px;
      }

      .border {
        border: 0.5px solid #9F9D9D;
        /*position: relative;
        top: 70px;*/
        margin: 0 auto;
        width: 200px;
      }

      /*.input {
  font-size: 20px;
  font-family: "Montserrat";
  position: relative;
  top: 150px;
  text-align: center;
}*/

.course {
  position: relative;
  right: 60px;
  
}

.course, .studied, .internship {
  font-family: "Montserrat";
  font-size: 16px;
  color: #000000;
  text-align:left;
  margin-left: 50px;
  line-height: normal;
  /*position: relative;
  top: 110px;
  margin-right: 140px;
}

.studied {
  font-family: "Montserrat";
  font-size: 18px;
  color: #000000;
  position: relative;
  top: 100px;
  margin-right: 180px;
}

.internship {
  font-family: "Montserrat";
  font-size: 18px;
  color: #000000;
  /*position: relative;
  top: 90px;
  margin-right: 100px;
}



.para1, .para2, .para3 {
  font-family: "Open Sans";
  font-size: "18px";
  line-height: normal;
}
.para2 {
  position: relative;
  top: 100px;
  font-size: 18px;
  font-weight: 400;
}

.para3 {
  position: relative;
  top: 100px;
  font-size: 18px;
  font-weight: 400;
}

pre {
  font-family: "OCR A Extended";
  font-size: 16px;
  position: relative;
  top: 65px;
  font-size: 16px;
  /*width: 100px;
  background-color: #333333;
  border-radius: 3px;*/
}

.about {
  font-family: "Open Sans";
  font-size: 15px;
  font-weight: normal;
  width: 380px;
  margin: 0 auto;
}

.in {
  font-weight: 300;
  font-style: italic;
  font-size: 12px;
  font-family: "Montserrat";
}

    </style>
  </head>
  <body class="demo-disable-bg-image">
    <div id="sampleDemo" style="" class="demo-padding demo-container">
      <div id="componentDemoContent" style="width: 1px; min-width: 100%;">
        
        
        <div   class="demo-grid-sizes demo-flex-display">
          <div class="oj-flex oj-flex-items-pad">
            <div class="oj-sm-4 oj-flex-item" style="background-color:#0C1621">Me</div>
            <div class="oj-sm-4 oj-flex-item square">
            
                <img src="https://res.cloudinary.com/dnxuvszxh/image/upload/v1524614743/profile.jpg" alt="image">
                <h1>OLUWAFEMI</h1>
                <h1>AWOJANA</h1>
                <div class="border"></div>
                <p class="nick">@femi</p>
                <p class="about"><span class="in">UI/UX Designer|Web Developer</span><br>Hello! I am Femi.<br> I am also an intern in Hotels.ng internship program.<br>
                   I love programming and design, i am here to improve on those skill.</p>

                <!--<form action="" method="">

                    <div class="course"><input type="radio" id="course" name="studiedAt" value="Electrical Electronics Engineering" ng-model="model.course" ng-click="removeCourse('Electrical Electronics Engineering')"/>
                    <label for="course">Course studied?</label></div>
          
                    <div class="studied"><input type="radio" id="studied" name="studiedAt" value="Afe Babalola University" ng-model="model.study" ng-click="removeStudy('Afe Babalola University')"/>
                      <label for="studied">Studied at?</label></div>
          
                      <div class="internship"><input type="radio" id="intern" name="studiedAt" value="The internship offers the opportunity for a change in career path" ng-model="model.school" ng-click="removeSchool('Opportunity for a change in career path')"/>
                        <label for="intern">Why this internship?</label></div>

                        <p ng-show="model.course" class="para1">Course studied</p>
                  <p ng-show="model.study" class="para2">Studied at</p>
                  <p ng-show="model.school" class="para3">Why this internship</p>
                  <pre>{{model.mainDish}}</pre>
                  </form>
          
                  <p ng-show="model.course" class="para1">Course studied</p>
                  <p ng-show="model.study" class="para2">Studied at</p>
                  <p ng-show="model.school" class="para3">Why this internship</p>
                  <pre>{{model.mainDish}}</pre>

            </div>
            <div class="oj-sm-4 oj-flex-item" style="background-color:#0C1621">Them</div>
          </div>-->
          <!--<div class="oj-flex oj-flex-items-pad">
            <div class="oj-sm-4 oj-md-3 oj-flex-item" style="background-color:beige">They</div>
            <div class="oj-sm-4 oj-md-6 oj-flex-item" style="background-color:violet">Then</div>
            <div class="oj-sm-4 oj-md-3 oj-flex-item" style="background-color:green">Was</div>
          </div>
          <div class="oj-flex oj-flex-items-pad">
            <div class="oj-sm-4 oj-md-3 oj-lg-2 oj-flex-item" style="background-color:aqua">Me</div>
            <div class="oj-sm-4 oj-md-6 oj-lg-8 oj-flex-item" style="background-color:red">You</div>
            <div class="oj-sm-4 oj-md-3 oj-lg-2 oj-flex-item" style="background-color:purple">Them</div>
          </div>
          <div class="oj-flex oj-flex-items-pad">
            <div class="oj-sm-4 oj-md-3 oj-lg-2 oj-xl-1 oj-flex-item " style="background-color:red">Mama</div>
            <div class="oj-sm-4 oj-md-6 oj-lg-8 oj-xl-10 oj-flex-item" style="background-color:pink">Papa</div>
            <div class="oj-sm-4 oj-md-3 oj-lg-2 oj-xl-1 oj-flex-item" style="background-color:green">Pikin</div>
          </div>-->

        </div>

        
      </div>
    </div>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>-->
      <!--<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>-->

      <!--<script type="text/javascript">

      var app = angular.module ("app", []); 

      app.controller ("disappear", [
    '$scope',
     function ($scope) {

        $scope.removeCourse = function (item) {
            $scope.model.study = false;
            $scope.model.school = false;
            $scope.model.mainDish = item;
        }

        $scope.removeStudy = function (item) {
            $scope.model.course = false;
            $scope.model.school = false;
            $scope.model.mainDish = item;
        }

        $scope.removeSchool = function (item) {
            $scope.model.course = false;
            $scope.model.study = false;
            $scope.model.mainDish = item;
        }
     }
]);
      </script>-->

  </body>
</html>