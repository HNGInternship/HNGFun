<?php
 $result = $conn->query("Select * from secret_word LIMIT 1");
 $result = $result->fetch(PDO::FETCH_OBJ);
 $secret_word = $result->secret_word;

 $result2 = $conn->query("Select * from interns_data where username = 'femi'");
 $user = $result2->fetch(PDO::FETCH_OBJ);

 ?>

<!DOCTYPE html>
<html ng-app="app">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        
        <style>

* {
  padding: 0;
  margin: 0;
}

body {
  width: 100%;
  height: 100%;
  background-image: url("./pattern2.jpg");
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #0C1621;
  overflow-x: hidden;
  }

.square {
  position: relative;
  left: 350px;
  text-align: center;
  background-color: #FBFEFE;
  border: 2px solid #4F4F4F;
  border-radius: 5px;
  width: 460px;
  height: 850px;
}

.image {
  position: relative;
  top: 60px;
  /*left: 87px;*/
}

img {
  width: 236px;
  height: 236px;
}

/*.container {
  display: flex;
  justify-content: center;
}

.example {
  display: flex;
  justify-content: space-around;

  background-color: #FBFEFE;
  width: 602px;
}

.item img {
  display: block;
  height: 366px;
  width: 366px;
  display: relative;
  top: 89px;
}*/

h1 {
  color: #000000;
  text-align: center;
  position: relative;
  top: 70px;
  font-size: 34px;
  font-family: "Open sans";
  font-weight: bold;
  line-height: 39px;
}

p {
  color: #333333;
  font-family: "Montserrat";
  font-size: 26px;
  position: relative;
  top: 55px;
}

.border {
  border: 2px solid #000000;
  position: relative;
  top: 70px;
  width: 220px;
  left: 120px;
}

.input {
  font-size: 20px;
  font-family: "Montserrat";
  position: relative;
  top: 150px;
  text-align: center;
}

/*.course {
  position: relative;
  right: 60px;
  
}*/

.course {
  font-family: "Montserrat";
  font-size: 18px;
  color: #000000;
  position: relative;
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
  position: relative;
  top: 90px;
  margin-right: 100px;
}

.para1 {
  position: relative;
  top: 100px;
  font-size: 18px;
  font-weight: 400;
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
  position: relative;
  top: 65px;
  font-size: 16px;
  /*width: 100px;
  background-color: #333333;
  border-radius: 3px;*/
}
        </style>
    </head>
    <body ng-controller="disappear">
      <!--<div class = "container">
        <div class="example">
          <div class="item"><img src="./profile.jpg" class="circle"/></div>
        </div>
      </div>-->

      <div class="square">
        <div class="image"><img src="https://res.cloudinary.com/dnxuvszxh/image/upload/v1524614743/profile.jpg" alt="image"></div>
        <h1>OLUWAFEMI</h1>
        <h1>AWOJANA</h1>
        <div class="border"></div>
        <p>@femi</p>
        <form action="" method="">

          <div class="course"><input type="radio" id="course" name="studiedAt" value="Electrical Electronics Engineering" ng-model="model.course" ng-click="removeCourse('Electrical Electronics Engineering')"/>
          <label for="course">Course studied?</label></div>

          <div class="studied"><input type="radio" id="studied" name="studiedAt" value="Afe Babalola University" ng-model="model.study" ng-click="removeStudy('Afe Babalola University')"/>
            <label for="studied">Studied at?</label></div>

            <div class="internship"><input type="radio" id="intern" name="studiedAt" value="The internship offers the opportunity for a change in career path" ng-model="model.school" ng-click="removeSchool('Opportunity for a change in career path')"/>
              <label for="intern">Why this internship?</label></div>
        </form>

        <p ng-show="model.course" class="para1">Course studied</p>
        <p ng-show="model.study" class="para2">Studied at</p>
        <p ng-show="model.school" class="para3">Why this internship</p>
        <pre>{{model.mainDish}}</pre>

        <!--<p class="display"></p>
        <input type="textbox" name="text">-->
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>

      <script type="text/javascript">

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
      </script>

    </body>
</html>
