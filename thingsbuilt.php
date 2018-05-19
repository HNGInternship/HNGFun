<?php
include_once("header.php");
?>

<head>
  <title>Things we've built</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- custom styles -->
  <style>
    body {
      background: #fff;
      width: 100%;
      padding: 0;
      margin: 0;
      text-align: center;
      font-family: 'Lato';
    }
    .row {
      margin-top: 10px;
    }
    .col-md-4 {
      margin-top: 10px;
      position: relative;
    }
    .text-block {
      position: absolute;
      top: 35px;
      bottom: 50px;
      right: 50px;
      padding-right: 80px;
      color: #fff;
      font-weight: bolder;
      font-variant: small-caps;
      font-size: 20px;
      text-shadow: black 0px 5px 10px, black 0px -5px 10px; 
    }
    h2 {
      margin-top: 5px;
      font-weight: bold;
    }
    .subtag {
      margin: 0px;
      font-weight: lighter;
    }
    img {
      width: 90%;
      height: 150px;
      cursor: pointer;
      box-shadow: 2px 0 2px #555;
    }
    img:hover {
      width: 95%;
      box-shadow: 5px 5px 5px aquamarine, -2px 0 2px aqua;
    }
    .modal-para {
      text-align: left;
    }
    #p1 {
      font-weight: bold;
    }
    img#modpic {
      width: 80%;
      height: 45%;
      border: 1px solid lightgrey;
      box-shadow: 2px 0 5px grey;
    }
    /* background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url(pic.jpeg);*/

    /* pagination style */
    .page {
      display: none;
    }
    .page-active {
      display: block;
    }
    #pagination-btn {
      margin-top: 10px;
      list-style: none;
      display: inline-flex;
      line-spacing: 100px;
    }
  </style>
</head>

<body>
  <main>
    <div class="container">

      <h2>Things We've Built</h2>
      <hr style="width:5%;border:1px solid #555;margin-top:0;margin-bottom:1em;">
      <p class="subtag">NHG 4.0 has been a life-transforming journey for interns across Africa.</p>
      <p class="subtag">Don't take our word for it... see what our interns have built</p>

      <section class="page" id="page1">
      <div class="row">
        <div class="col-md-4" id="project1">
          <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png">
          <p class="text-block">HNG<br/>Internship</p>
        </div>
        <div class="col-md-4" id="project2">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR86NHWKQO3eMVzheK4Hd0q7QS3piRtAkhcBaIwr3-nCXpk2BXc">
          <p class="text-block">CV Design<br/>23 Interns</p>        
        </div>
        <div class="col-md-4" id="project3">
          <img src="http://res.cloudinary.com/pajimo/image/upload/v1525094886/download.png">
          <p class="text-block">Transcriber App<br/>17 Interns</p>
        </div>
        <div class="col-md-4" id="project4">
          <img src="http://res.cloudinary.com/sastech/image/upload/v1525475538/android_ouacfi.jpg">
          <p class="text-block">Android App</p>
        </div>
        <div class="col-md-4" id="project5">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFn-00QAOXZBeLhETx1HwDlHw5JHHyWDAyMBwEnlRGu3Ird9K9Eg">
          <p class="text-block">IG Vendors<br/>19 Interns</p>
        </div>
        <div class="col-md-4" id="project6">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2FIZQvP4PRirshrIqCK5XTd6W1zsExEefvT9m2xGtU9kNcbLlXA">
          <p class="text-block">Wireframes<br/>20 Interns</p>
        </div>
        <div class="col-md-4" id="project7">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUpu6fNbNOAeJpjSKJ9i9e9TdAVKxcBKaP7VwBmIhNDBxXi3WAqA">
          <p class="text-block">Power Pack<br/>19 Interns</p>
        </div>
        <div class="col-md-4" id="project8">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLyA34KEHTfPTraZruJjKYeIO2kBTiPKQzC6TEBa1hP3LYKfMq">
          <p class="text-block">Banner Design<br/>15 Interns</p>
        </div>
        <div class="col-md-4" id="project9">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXBCsMzKv9WxEAkD72wajAu2OVYdcWs8H9LVBKrousmA8lhq88BQ">
          <p class="text-block">Dragon Heart<br/>17 Interns</p>
        </div>
      </div>
    </div>
  </section>

    <section class="page container" id="page2">
      <div class="row">
        <div class="col-md-4" id="project10">
          <img src="http://res.cloudinary.com/sastech/image/upload/v1525475548/android-main_xy84dg.jpg">
          <p class="text-block">Other Apps</p>
        </div>
        <div class="col-md-4" id="project11">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR86NHWKQO3eMVzheK4Hd0q7QS3piRtAkhcBaIwr3-nCXpk2BXc">
          <p class="text-block">CV Design<br/>23 Interns</p>        
        </div>
        <div class="col-md-4" id="project12">
          <img src="http://res.cloudinary.com/pajimo/image/upload/v1525094886/download.png">
          <p class="text-block">Transcriber App<br/>17 Interns</p>
        </div>
      </div>
    </div>
  </section>
  </main>


<!-- *************************** modal ****************************************************-->

  <!-- First Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

  <!-- Modal content-->

  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">HNG Fun Website</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- second Modal -->
  <div class="modal fade" id="myModal2" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->

  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 2</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- third Modal -->
  <div class="modal fade" id="myModal3" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 3</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- fourth Modal -->
  <div class="modal fade" id="myModal4" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 4</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- fifth Modal -->
  <div class="modal fade" id="myModal5" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 5</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- sixth Modal -->
  <div class="modal fade" id="myModal6" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 6</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- seventh Modal -->
  <div class="modal fade" id="myModal7" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 7</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- eigth Modal -->
  <div class="modal fade" id="myModal8" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 8</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- 9th Modal -->
  <div class="modal fade" id="myModal9" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 9</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- 10th Modal -->
  <div class="modal fade" id="myModal10" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 10</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- 11th Modal -->
  <div class="modal fade" id="myModal11" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 11</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

  <!-- 12th Modal -->
  <div class="modal fade" id="myModal12" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:20px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" style="padding:40px auto;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <h4 class="text-left">Project 12</h4>
            <hr>
            <p class="modal-para" id="p1">Built by a team of 21 interns</p>
            <p class="modal-para">The HNG is a 3-month remote internship progrm designed to locate the most talented software developers iin Nigeria and the whole of Africa. Everyone is welcome to participate (there is no entrance exam).<br/>
              <a href="#">Visit Website&#8608;</a></p>
          </div>
          <div class="col-md-7">
            <img src="http://res.cloudinary.com/sastech/image/upload/v1525475530/hngint_fobqbt.png" alt="pic" id="modpic">
          </div>
        </div>
      </div>

    <div class="modal-footer" style="margin-top: 10px;">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
  </div>
</div>
</div>
</div>

<ul id="pagination-btn" class="pagination-lg pull-right"></ul>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://www.solodev.com/assets/pagination/jquery.twbsPagination.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      // first modal
      $("#project1").click(function(){
          $("#myModal").modal();
      });

      //second
      $("#project2").click(function(){        
          $("#myModal2").modal();
      });

      //third
      $("#project3").click(function(){
        $("#myModal3").modal();
      });

      //fourth
      $("#project4").click(function(){
        $("#myModal4").modal();
      });

      //fifth
      $("#project5").click(function(){
        $("#myModal5").modal();
      });

      //sixth
      $("#project6").click(function(){
        $("#myModal6").modal();
      });

      //seventh
      $("#project7").click(function(){
        $("#myModal7").modal();
      });

      //eight
      $("#project8").click(function(){
        $("#myModal8").modal();
      });      

      //nineth
      $("#project9").click(function(){
        $("#myModal9").modal();
      });            

      //10th
      $("#project10").click(function(){
        $("#myModal10").modal();
      });                  

      //11th
      $("#project11").click(function(){
        $("#myModal11").modal();
      });                  

      //12th
      $("#project12").click(function(){
        $("#myModal12").modal();
      });                        

      //////////////////pagination
      $("#pagination-btn").twbsPagination({
        totalPages: 5,
        //the current page that show on start
        startPage: 1,

        //max visible pages
        visiblePages: 5,

        initiateStartPageClick: true,

        //templates for pagination links
        href: false,

        hrefVariable: '{{number}}',

        // text labels
        first: 'First',
        prev: 'Previous',
        next: 'Next',
        last: 'Last',

        // carousel-style
        loop: false,

        //callback
        onPageClick: function (event, page) {
          $('.page-active').removeClass('page-active');
          $('#page'+page).addClass('page-active');
        },

        // pagination classes
        paginationClass: 'pagination',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first',
        pageClass: 'page',
        activeClass: 'active',
        disabledClass: 'disabled'
      });


    });
</script>

</body>

<?php
include_once("footer.php");
?>